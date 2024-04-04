<div class="flex flex-row justify-between  items-center bg-white shadow-sm relative px-2">
    <img src="/images/speciality.png" class="h-16 bg-gray-300 bg-opacity-10 p-3 rounded-3xl " alt="craft_logo">
    
    <div x-data="{open:!open}" class="w-1/6 flex justify-end p-2 lg:hidden overflow-y-scroll">
        <button @click="open = !open">
        <x-easyadmin::display.icon icon="icons.menu-bar" height="h-5" width="w-5"/>
        </button>
        <div x-show="open" class="w-screen h-screen  fixed bg-white top-0 left-0 z-50 overflow-y-scroll bg-white/95">
        <button @click="open = !open" class="flex justify-end w-full py-5 px-4 fill-current text-gray-700">
        <x-easyadmin::display.icon icon="icons.close-button" height="h-5" width="w-5"/>
        </button>
            <ul class="flex flex-col text-center gap-y-4 mt-8 mb-8">
                <div class="flex flex-row justify-center gap-2">
                    <li><button @click="direction = 'ltr'" class="text-sm sm:text-base text-gray-700 hover:text-pink-400 cursor-pointer " :class="{' text-pink-700':direction === 'ltr'}">English</button></li>
                    <span class="inline-block">|</span>
                    <li><button  @click="direction = 'rtl'" class="text-sm sm:text-base text-gray-700  hover:text-pink-400 cursor-pointer"  :class="{' text-pink-700':direction ==='rtl'}">Arabic</button></li>
                </div>
                
                <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Home</a></li>
                <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">About</a></li>
                <li  x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange flex flex-row justify-center gap-1 cursor-pointer">
                       <p>Departments</p>
                       <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>
                    
                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto border border-darkorange rounded-lg " x-on:click.outside="open = false">
                    <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right   ">
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Emergency Medicine And Critical Care</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Orthopaedics And Trauma Surgery</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Physiotherapy</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Neurology</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Cardiology</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Urology</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">ENT</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Dermatology & Cosmetology</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Pediatrics & Pediatric Surgery</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Clinical psychology</a></li>
                        <li><a class="text-gray-700 sm:text-base  text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">Craniofacial Surgery</a></li>
                    </ul>
                    </div>
                
                    

                </li>
                <li x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange flex flex-row justify-center gap-1 cursor-pointer">
                        <p>Facilities</p>
                        <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>
                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto border border-darkorange rounded-lg " x-on:click.outside="open = false">
                    <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right    ">
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">24×7 Emergency Medicine And Critical Care</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">24×7 Cardiac Care</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Delivery Packages</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Health Check-up Packages</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Health Insurance</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">NICU</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">SICU</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">MICU</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">CCU</a></li>
                        <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Other Facilities</a></li> 
                    </ul> 
                    </div>
                </li>
                <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer">Doctors</a></li>
                <li x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange flex flex-row justify-center gap-1 cursor-pointer">
                        <p>Media</p>
                        <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>
                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto border border-darkorange rounded-lg " x-on:click.outside="open = false">
                        <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right  ">
                            <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Our Photos</a></li>
                            <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Our Videos</a></li>
                        </ul>
                    </div>
                </li>
                <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Career</a></li>
                <li><a class="text-gray-700   text-sm sm:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Contact</a></li>
                <li><a class="bg-darkorange hover:bg-black  text-white rounded-full font-helvetica text-sm  py-3 px-4 shadow-2xl cursor-pointer">Schedule an appointment</a></li>
            </ul>
        </div>
    </div>
    <div class="hidden lg:flex w-h/6">
        <ul class="flex flex-row text-center gap-3 xl:gap-x-6">
            <li><button @click="direction = 'ltr'" class="lg:text-sm xl:text-base ltr:font-semibold text-gray-700  hover:text-pink-400 ltr:text-pink-700 cursor-pointer">English</li>
            <span class="inline-block">|</span>
            <li><button @click="direction = 'rtl'" class="lg:text-sm xl:text-base rtl:font-semibold text-gray-700  hover:text-pink-400 rtl:text-pink-700 cursor-pointer ">Arabic</li>
            
            <li><a class="text-gray-700  lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">About</a></li>
            <li x-data="{open : false}"  @mouseleave="open = false" >
                <button @mouseover="open = true" class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center">
                    <p>Departments</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white   border-t-4 border-darkorange shadow-xl z-20 w-60 ">
                    <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right">
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Emergency Medicine And Critical Care</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Orthopaedics And Trauma Surgery</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Physiotherapy</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Neurology</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Cardiology</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Urology</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">ENT</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Dermatology & Cosmetology</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Pediatrics & Pediatric Surgery</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Clinical psychology</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">Craniofacial Surgery</a></li>
                    </ul>
                </div>
            </li>
            <li  x-data="{open : false}"  @mouseleave="open = false" >
                <button @mouseover="open = true" class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center ">
                    <p>Facilities</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white   border-t-4 border-darkorange shadow-xl z-20 w-60">
                    <ul class="text-left p-6 flex flex-col gap-2 ltr:text-left rtl:text-right">
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">24×7 Emergency Medicine And Critical Care</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">24×7 Cardiac Care</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Delivery Packages</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Health Check-up Packages</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Health Insurance</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">NICU</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">SICU</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">MICU</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">CCU</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Other Facilities</a></li>
                    </ul>
                </div>
            </li>
            <li><a class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Doctors</a></li>
            <li x-data="{open : false}"  @mouseleave="open = false">
                <button @mouseover="open = true" class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center">
                    <p>Media</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white   border-t-4 border-darkorange shadow-xl z-20 w-60">
                    <ul class="text-left p-6 flex flex-col gap-2 ltr:text-left rtl:text-right">
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Our Photos</a></li>
                        <li><a class="text-gray-700   text-sm transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Our Videos</a></li>
                    </ul>
                </div>

            </li>
            <li><a class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Career</a></li>
            <li><a class="text-gray-700   lg:text-sm xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">Contact</a></li>
            <li><a class="bg-darkorange hover:bg-black  text-white rounded-full font-helvetica lg:text-sm xl:text-base  py-3 px-4 shadow-2xl cursor-pointer">Schedule an appointment</a></li> 
        </ul>

    </div>
</div>