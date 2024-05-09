<div class="flex flex-row justify-between  items-center bg-white relative lg:px-7 xl:px-12 pt-4 max-w-screen-2xl mx-auto">
    @php
        $route = 'home';
        if (App::currentLocale() == 'ar') {
            $route = 'home.ar';
        }
    @endphp
    <a href="{{route($route)}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route($route)}}', route: {{$route}}})"><img src="/images/speciality.png" class=" bg-gray-600 bg-opacity-5 w-52 px-3 py-2  rounded-full  " alt="craft_logo"></a>

    <div x-data="{open:!open}" class="w-1/6 flex justify-end p-2 lg:hidden overflow-y-scroll">
        <button @click="open = !open">
        <x-easyadmin::display.icon icon="icons.menu-bar" height="h-5" width="w-5"/>
        </button>
        <div x-show="open" class="w-screen h-screen  fixed bg-white top-0 left-0 z-50 overflow-y-scroll bg-white/95">
            <button @click="open = !open" class="flex justify-end w-full py-5 px-4 fill-current text-gray-700">
            <x-easyadmin::display.icon icon="icons.close-button" height="h-5" width="w-5"/>
            </button>
            <ul class="flex flex-col text-center gap-y-4 mt-8 mb-8">
                <!-- <div class="flex flex-row justify-center gap-2">
                    <li><button @click="direction = 'ltr'" class="text-base text-gray-700 hover:text-pink-400 cursor-pointer " :class="{' text-pink-700':direction === 'ltr'}">English</button></li>
                    <span class="inline-block">|</span>
                    <li><button  @click="direction = 'rtl'" class="text-base text-gray-700  hover:text-pink-400 cursor-pointer"  :class="{' text-pink-700':direction ==='rtl'}">Arabic</button></li>
                </div> -->

                <!-- <li><a class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.home')}}</a></li> -->
                <li><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'about'])}}"
                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'about'])}}', route: 'webpages.guest.show'})"
                        class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.about')}}</a></li>

                <li  x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange flex flex-row justify-center gap-1 cursor-pointer">
                       <p>{{ __('header.departments')}}</p>
                       <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>

                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto  rounded-lg " x-on:click.outside="open = false">
                    <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right   ">
                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.emergency_medicine_and_critical_care')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.orthopaedics_and_trauma_surgery')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.physiotherapy')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.neurology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.cardiology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.urology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.ent')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.dermatology_&_cosmetology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.pediatrics_&_pediatric_surgery')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.clinical_psychology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}'})"
                                    class="text-gray-700 sm:text-base  text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer   ">{{ __('header.craniofacial_surgery')}}</a></li>
                    </ul>
                    </div>



                </li>
                <li x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700 flex flex-row justify-center gap-1  text-base transition-all duration-300 ease-in-out hover:text-darkorange  cursor-pointer">
                        <p>{{ __('header.facilities')}}</p>
                        <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>
                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto  rounded-lg " x-on:click.outside="open = false">
                    <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right    ">
                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-emergency-medicine-and-critical-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-emergency-medicine-and-critical-care'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.24×7_emergency_medicine_and_critical_care')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-cardiac-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-cardiac-care'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.24×7_cardiac_care')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'delivery-packages'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'delivery-packages'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.delivery_packages')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-check-up-packages'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-check-up-packages'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.health_check-up_packages')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.health_insurance')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'nicu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'nicu'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.nicu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'sicu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'sicu'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.sicu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'micu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'micu'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.micu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ccu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ccu'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.ccu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.other_facilities')}}</a></li>
                    </ul>
                    </div>
                </li>
                <li><a href="{{route('doctors.loc', ['locale' => app()->currentLocale()])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('doctors.loc', ['locale' => app()->currentLocale()])}}'})"
                        class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer">{{ __('header.doctors')}}</a></li>

                        <li x-data="{open : false}" class="flex flex-col  justify-center ">
                    <button @click="open = !open" class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange flex flex-row justify-center gap-1 cursor-pointer">
                        <p>{{ __('header.media')}}</p>
                        <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                    </button>
                    <div x-show="open" class="w-60 h-fit bg-white flex flex-col mx-auto  rounded-lg " x-on:click.outside="open = false">
                        <ul class=" p-6 flex flex-col gap-2 ltr:text-left rtl:text-right  ">
                            <li><a href="{{route('photos.loc', ['locale' => app()->currentLocale()])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('photos.loc', ['locale' => app()->currentLocale()])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.our_photos')}}</a></li>

                            <li><a href="{{route('videos.loc', ['locale' => app()->currentLocale()])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('videos.loc', ['locale' => app()->currentLocale()])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.our_videos')}}</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'careers'])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'careers'])}}'})"
                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.career')}}</a></li>

                <li><a href="{{route('contact' )}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('contact')}}', route: 'contact'})"
                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.contact')}}</a></li>

                <li><a href="{{route('booking')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking' )}}', route: 'booking'})"
                        class="bg-darkorange text-white rounded-full font-helvetica text-base py-3 px-4 block shadow-2xl cursor-pointer transition-all duration-700 ease-in-out hover:bg-black">{{ __('header.schedule_an_appointment')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="hidden lg:flex ">
        <ul class="flex flex-row items-center text-center gap-3 xl:gap-x-6">
            <!-- <li><button @click="direction = 'ltr'" class="lg:text-base xl:text-base ltr:font-semibold text-gray-700  hover:text-pink-400 ltr:text-pink-700 cursor-pointer">English</li> -->
            <!-- <span class="inline-block">|</span> -->
            <!-- <li><button @click="direction = 'rtl'" class="lg:text-base xl:text-base rtl:font-semibold text-gray-700  hover:text-pink-400 rtl:text-pink-700 cursor-pointer ">Arabic</li> -->

            {{-- <li><a class="text-gray-700  lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.about')}}</a></li> --}}

            <li>
                <a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'about'])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'about'])}}'})"
                    class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.about')}}</a>
            </li>

            <li x-data="{open : false}"  @mouseleave="open = false" >
                <button @mouseover="open = true" class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center">
                    <p>{{ __('header.departments')}}</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white  border-t-2 border-darkorange  shadow-xl z-20 w-60 ">
                    <ul class=" p-6 flex flex-col gap-3 ltr:text-left rtl:text-right">
                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}'})"
                                    class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.emergency_medicine_and_critical_care')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.orthopaedics_and_trauma_surgery')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.physiotherapy')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.neurology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.cardiology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.urology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.ent')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.dermatology_&_cosmetology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.pediatrics_&_pediatric_surgery')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.clinical_psychology')}}</a></li>

                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer  ">{{ __('header.craniofacial_surgery')}}</a></li>
                    </ul>
                </div>
            </li>
            <li  x-data="{open : false}"  @mouseleave="open = false" >
                <button @mouseover="open = true" class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center ">
                    <p>{{ __('header.facilities')}}</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white  border-t-2 border-darkorange  shadow-xl z-20 w-60">
                    <ul class="text-left p-6 flex flex-col gap-3 ltr:text-left rtl:text-right">
                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-emergency-medicine-and-critical-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-emergency-medicine-and-critical-care'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.24×7_emergency_medicine_and_critical_care')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-cardiac-care'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-cardiac-care'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.24×7_cardiac_care')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'delivery-packages'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'delivery-packages'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.delivery_packages')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-check-up-packages'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-check-up-packages'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.health_check-up_packages')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.health_insurance')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'nicu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'nicu'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.nicu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'sicu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'sicu'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.sicu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'micu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'micu'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.micu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ccu'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ccu'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.ccu')}}</a></li>

                        <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}"
                                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.other_facilities')}}</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="{{route('doctors.loc', ['locale' => app()->currentLocale()])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('doctors.loc', ['locale' => app()->currentLocale()])}}'})"
                    class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.doctors')}}</a></li>

            <li x-data="{open : false}"  @mouseleave="open = false">
                <button @mouseover="open = true" class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer flex flex-row items-center">
                    <p>{{ __('header.media')}}</p>
                    <x-easyadmin::display.icon icon="icons.chevron_down" height="h-5" width="w-5"/>
                </button>
                <div x-show="open" class="absolute h-fit bg-white  border-t-2 border-darkorange  shadow-xl z-20 w-60">
                    <ul class="text-left p-6 flex flex-col gap-3 ltr:text-left rtl:text-right">
                        <li><a href="{{route('photos.loc', ['locale' => app()->currentLocale()])}}"
                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('photos.loc', ['locale' => app()->currentLocale()])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.our_photos')}}</a></li>

                        <li><a href="{{route('videos.loc', ['locale' => app()->currentLocale()])}}"
                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('videos.loc', ['locale' => app()->currentLocale()])}}'})"
                                class="text-gray-700   text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.our_videos')}}</a></li>
                    </ul>
                </div>

            </li>
            <li>
                <a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'careers'])}}"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'careers'])}}'})"
                    class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.career')}}</a>
            </li>
            <li><a href="{{route('contact')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('contact')}}', route: 'contact'})"
                    class="text-gray-700   lg:text-base xl:text-base transition-all duration-300 ease-in-out hover:text-darkorange cursor-pointer ">{{ __('header.contact')}}</a></li>

            <li><a href="{{route('booking')}}" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('booking' )}}',route:'booking'})"
                    class="bg-darkorange hover:bg-black  text-white rounded-full font-helvetica lg:text-base xl:text-base  py-3 px-4 shadow-2xl transition-all duration-700 ease-in-out cursor-pointer">{{ __('header.schedule_an_appointment')}}</a></li>
        </ul>

    </div>
</div>
