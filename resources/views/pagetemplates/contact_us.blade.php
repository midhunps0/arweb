<x-guest-layout>
    <div class="font-helvetica text-base max-w-8xl mx-auto">
        <x-header-component/>
        <div class="max-w-screen-2xl mx-auto">
            <div class="max-w-9/10 mx-auto">
                <x-page-title title="{{__('footer.contact_us')}}" />
                <div class="flex flex-col lg:flex-row-reverse my-12 lg:my-20 gap-4 border border-customOrange rounded-lg p-4">
                    <div x-data="{
                            loading: false,
                            successMessage: false,
                            errorMessage: false,
                            doSubmit(e) {
                                let f = e.target;
                                let fd = new FormData(f);
                                this.loading = true;
                                axios.post('{{route('mail.contact')}}', fd).then((r) => {
                                    console.log('mail response');
                                    console.log(r);
                                    this.loading = false;
                                    if (r.data.success) {
                                        this.successMessage = true;
                                    } else {
                                        this.errorMessage = true;
                                    }
                                    document.getElementById('contact-form').reset();
                                }).catch((e) => {
                                    this.loading = false;
                                    this.errorMessage = true;
                                });
                            }
                        }" class="w-full lg:w-1/2">
                        <form id="contact-form" method="post" action="" @submit.prevent.stop="doSubmit" class="relative">
                            @csrf
                            <div class="flex flex-col gap-4 my-6">
                                <div class="flex flex-col gap-2">
                                <label for="name">{{__('footer.name')}}</label>
                                <input type="text" name="name" id="name" class="w-full border-0 rounded-xl bg-lightpink ">
                                </div>
                                <div class="flex flex-col gap-2">
                                <label for="email">{{__('footer.email')}}</label>
                                <input type="email" name="email" id="email" class="w-full border-0 rounded-xl bg-lightpink">
                                </div>
                                <div class="flex flex-col gap-2">
                                <label for="message">{{__('footer.message')}}</label>
                                <textarea name="message" id="message" placeholder="{{__('footer.type_your_msg')}}" class="w-full border-0 rounded-xl bg-lightpink"></textarea>
                                </div>
                                {{-- <div class="flex flex-row items-center gap-2">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="checkbox">{!!__('footer.terms_&_conditions')!!}</label>
                                </div> --}}
                            </div>
                            <button type="submit" class="bg-black hover:bg-darkorange hover:transition-all duration-300 ease-in-out rounded-full font-helvetica text-base text-white py-2 px-4 lg:py-3 lg:px-8 shadow-2xl my-6">{{ __('button.submit')}}</button>

                            <div x-show="loading" class="absolute w-full h-full top-0 left-0 bg-darkorange bg-opacity-90 flex justify-center items-center text-white">
                                <div class="font-bold animate-pulse m-2 p-2">
                                    Please wait while we are submitting your message..
                                </div>
                            </div>
                            <div x-show="successMessage" class="absolute w-full h-full top-0 left-0 bg-gray-600 bg-opacity-90 flex justify-center items-center text-white">
                                <div class="font-bold m-2 p-2 text-center">
                                    Your message was submitted successfully. We will get back to you shortly.<br>Thank you!<br>
                                    <button type="button" @click="successMessage = false;" class="btn btn-success">Ok</button>
                                </div>
                            </div>
                            <div x-show="errorMessage" class="absolute w-full h-full top-0 left-0 bg-gray-600 bg-opacity-90 flex justify-center items-center text-white">
                                <div class="font-bold m-2 p-2 text-center">
                                    Sorry, your message couldn't be submitted due to some unexpected error. Please try again.<br>
                                    <button type="button" @click="errorMessage = false;" class="btn btn-warning">Ok</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w-full lg:w-1/2 flex justify-center lg:justify-normal">
                        <iframe class="rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.3410709795403!2d76.19075557595602!3d10.234051589883649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0819ec9023725b%3A0x444c40e245149091!2sAR%20Super%20Speciality%20Hospital!5e0!3m2!1sen!2sin!4v1712903777053!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <x-footer-component />
        </div>
    </div>


</x-guest-layout>
