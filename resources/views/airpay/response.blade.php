<x-guest-layout>
    <x-header-component />
    <x-page-title title="Booking Status" />
        <div  class="my-16 w-1/2 m-auto">
            @if($success)
                <div>
                    <p class="font-bold text-center my-4">Your booking is confirmed with the following details:</p>
                    <div class="border border-gray p-4 m-auto font-bold">
                        <div class="flex flex-row w-full gap-y-6">
                            <div class="flex-grow">Appointment ID: {{$appointment_id}}</div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex-grow">Name: {{$name}}</div>
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex-grow">Phone Number: {{$phone}}</div>
                        </div>
                        <div class="font-bold text-center mt-12 text-primary">
                            The confirmation messase has been sent to your email id: {{$email ?? 'sasas@sasd.asdas'}}.<br>
                            Thank you!
                        </div>
                    </div>
                </div>
            @else
                <div>
                    @if ($status == 'payment_complete')
                        <p>
                            Payment was complete; but failed to confirm your booking with our server. Please contact our customer care.
                        </p>
                        <p>
                            <span class="text-lg font-bold">Transaction ID:</span>&nbsp;
                            <span class="text-lg font-bold">{{$transaction_id}}</span>
                        </p>
                    @endif
                </div>
            @endif
        </div>
    <x-footer-component/>
</x-guest-layout>
