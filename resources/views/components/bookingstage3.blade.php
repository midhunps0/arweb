<div x-show="tab === 2 " class="flex flex-col lg:w-2/3 m-auto">

    <div class="flex justify-end">
        <a href="" @click.prevent="tab -= 1" class="flex rtl:flex-row-reverse justify-center right-0 items-center mt-5 md:mt-10 lg:mt-10 rounded-full bg-blue w-16 text-white  p-2 ">
            <x-easyadmin::display.icon icon="icons.arrow-left" height="h-3" width="w-3"/>
            <p class="text-xs">Back</p>
        </a>
    </div>

    <p class="text-base">Enter Your Details </p>


    <div>
        <form method="POST" action="">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="relative">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name"
                            class="w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                border-gray"
                            required>
                        </input>

                </div>
                <div class="relative">
                        <label for="phone no.">Phone No.</label>
                        <input id="phone no." name="phone no." type="text" autocomplete="phone no."
                            class="w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                border-gray"
                            required>
                        </input>

                </div>
            </div>
            <span class="mt-6 lg:mt-10 flex justify-end w-2/3"><x-booking-button-component :title="'PROCEED TO PAYMENT'"/></span>
        </form>
    </div>

</div>
