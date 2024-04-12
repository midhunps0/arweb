<x-guest-layout>
    <div class="font-helvetica lg:text-base max-w-8xl mx-auto">
        <x-header-component/>
        <div class="max-w-screen-2xl mx-auto">
            <div class="max-w-9/10 mx-auto">
                <p class="text-center text-2xl lg:text-7xl mt-20">Schedule An Appointment</p>
                <p class="text-center my-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="flex flex-col lg:flex-row my-16 lg:my-32 gap-4">
                    <div class="w-full lg:w-1/2">
                        <form method="post" action="">
                            @csrf
                            <div class="flex flex-col gap-4 my-6">
                                <div class="flex flex-col gap-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="w-full border-0 rounded-xl bg-lightpink ">
                                </div>
                                <div class="flex flex-col gap-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="w-full border-0 rounded-xl bg-lightpink">
                                </div>
                                <div class="flex flex-col gap-2">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" placeholder="Type your message" class="w-full border-0 rounded-xl bg-lightpink"></textarea>
                                </div>
                                <div class="flex flex-row items-center gap-2">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="checkbox">I accept the <span class="underline underline-offset-2">Terms & Conditions</span></label>
                                </div>
                            </div>
                            <button class="bg-black hover:bg-darkorange hover:transition-all duration-300 ease-in-out rounded-full font-helvetica text-base text-white py-2 px-4 lg:py-3 lg:px-8 shadow-2xl my-6">Submit</button>
                        </form>
                    </div>
                    <div class="w-full lg:w-1/2 flex justify-center">
                        <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.3410709795403!2d76.19075557595602!3d10.234051589883649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0819ec9023725b%3A0x444c40e245149091!2sAR%20Super%20Speciality%20Hospital!5e0!3m2!1sen!2sin!4v1712903777053!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 ">
            <x-footer-component />
        </div>
    </div>
    

</x-guest-layout>