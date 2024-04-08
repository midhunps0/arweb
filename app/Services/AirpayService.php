<?php
namespace App\Services;

use App\Helpers\AirpayChecksumHelper;
use App\Models\AirpayPayment;
use Illuminate\Support\Carbon;
use Modules\Ynotz\AppSettings\Models\AppSetting;

class AirpayService
{
    public function airpayForm($email, $phone, $name, $spCd, $consId, $sdate, $stime)
    {
        $amount = AppSetting::where('slug', 'booking_price')
            ->get()->first()->value;
        $orderId = Carbon::now()->format('Ymd-his-').$phone;
        $lastname = 'none';
        $alldata   = $email.$name.$lastname.$amount.$orderId;
        $username = config('app_settings.airpay_username');
        $password = config('app_settings.airpay_password');
        $secret = config('app_settings.airpay_api_key');

        $mercid = config('app_settings.airpay_mercid');
        $privatekey = AirpayChecksumHelper::encrypt($username.":|:".$password, $secret);
        $currency = '356';
        $isocurrency= 'INR';
        $keySha256 = AirpayChecksumHelper::encryptSha256($username."~:~".$password);
        $checksum = AirpayChecksumHelper::calculateChecksumSha256($alldata.date('Y-m-d'),$keySha256);
        $hiddenmod = "";

        $data = [
            'buyerEmail' => $email,
            'buyerPhone' => $phone,
            'buyerFirstName' => $name,
            'buyerLastName' => $lastname,
            // 'buyerAddress' => '',
            'amount' => $amount,
            // 'buyerCity' => '',
            // 'buyerState' => '',
            // 'buyerPinCode' => '',
            // 'buyerCountry' => '',
            'orderid' => $orderId,
            'currency' => '356',
            'isocurrency' => 'INR',
        ];

        $fields = view('airpay.post-fields', [
            'orderid' => $orderId,
            'mercid' => $mercid,
            'privatekey' => $privatekey,
            'currency' => $currency,
            'isocurrency' => $isocurrency,
            'hiddenmod' => $hiddenmod,
            'fields' => AirpayChecksumHelper::getFormFields($data, $checksum)
        ])->render();
        AirpayPayment::create([
            'transaction_id' => $orderId,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'amount' => $amount,
            'sp_cd' => $spCd,
            'cons_id' => $consId,
            'selected_date' => $sdate,
            'selected_time' => $stime
        ]);
        return $fields;
    }

    public function processResoponse($data)
    {
        $txn = AirpayPayment::where('transaction_id', $data['TRANSACTIONID'])
            ->get()->first();
        $success = $data['TRANSACTIONPAYMENTSTATUS'] == 'SUCCESS';
        $txn->airpay_transaction_id = $data['APTRANSACTIONID'];

        if ($success) {
            $txn->amount= $data['AMOUNT'];
            $txn->airpay_transaction_type = $data['TRANSACTIONTYPE'];
            $txn->status = $success;
            $txn->save();
            $result = (new BookingService())->confirmBOoking($txn);
            if ($result->Success) {
                $txn->refresh();
                $txn->solver_confirmed = true;
                $txn->save();
                return [
                    'success' => true,
                    'appointment_id' => $result->PayLoad[0]->AppointmentId,
                    'name' => $txn->name,
                    'phone' => $txn->phone,
                    'email' => $txn->email,
                    'date' => $txn->selected_date,
                    'time' => $txn->selected_time,
                ];
            } else {
                return [
                    'success' => false,
                    'status' => 'payment_complete',
                    'transaction_id' => $txn->airpay_transaction_id
                ];
            }
        } else {
            $txn->transaction_remarks = $data['REASON'];
            $txn->save();
            $txn->refresh();
            info('payment failure');
            info($data);
            return [
                'success' => false,
                'status' => 'payment_failed',
                'transaction_id' => $txn->airpay_transaction_id,
                'reason' =>  $txn->transaction_remarks,
            ];
        }
    }

    public function processNotification($data) {
        info('airpay notification');
        info($data);
        $txn = AirpayPayment::where('transaction_id', $data['TRANSACTIONID'])
            ->get()->first();
        if (!$txn->status) {
            // $this->processResoponse($data);
        }
    }
}
?>
