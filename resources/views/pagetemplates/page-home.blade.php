<x-guest-layout>
    {{-- <div class="bg-white items-center max-w-8xl  mx-auto text-base-content "> --}}
        {{-- {{dd($data)}} --}}
    <div class="max-w-8xl mx-auto text-base">
        <x-header-component />
        <div>
            <div class="max-w-screen-2xl mx-auto">
                <div class="max-w-9/10  mx-auto mt-16 flex flex-col lg:flex-row lg:gap-x-6  gap-y-6 ltr:text-left rtl:text-right  ">
                    <div class="flex flex-col gap-y-6 xl:gap-6  lg:w-1/2 justify-center">
                        <p class="text-sm text-darkorange bg-beige text-center rounded-full px-2 py-1 w-44">{{ __('header.harness_your_well_being')}}</p>
                        <p class="text-3xl sm:text-4xl md:text-6xl xl:text-7xl">
                            {!!$instance->current_translation->data['title']!!}
                        </p>
                        <p class="text-sm sm:text-base md:text-lg">{{$instance->current_translation->data['sub_title']}}</p>
                        <!-- <div class="lg:mt-6"><x-button-component title="{{ __('button.know_more')}}" /></div> -->
                    </div>

                    <div class="flex justify-center lg:w-1/2">
                        {{-- <img src="/images/image9.png" class="w-96 lg:w-full rounded-2xl" alt="doctor_image"> --}}
                        <div x-data="{
                            currentIndex: 0,
                        }"
                        x-init="
                            setInterval(() => {
                                //console.log('currentIndex: '+currentIndex);
                                currentIndex = currentIndex < 3 ? currentIndex + 1 : 0;
                            }, 3000);
                        " class="md:flex justify-center lg:flex lg:justify-normal relative w-full m-auto md:w-4/5 lg:m-0">
                        {{-- <div class="w-4/5 lg:w-3/4 shadow-[5px_5px_4px_2px_rgba(0,0,0,0.3)] z-10" alt="baby_image"> --}}
                            <img src="/images/slider/bg.png" width="330px" height="330px" class="h-full w-full" class="object-fit" alt="baby_image">
                        {{-- </div> --}}
                        <div x-show="currentIndex == 0" class="h-full w-full shadow-[5px_5px_4px_2px_rgba(0,0,0,0.3)] z-10 absolute top-0 left-0 rounded-3xl overflow-hidden" alt="nicu sicu micu ccu"
                            x-transition:enter="transition ease-in-out duration-1000"
                            x-transition:enter-start="cube-enter-start"
                            x-transition:enter-end="cube-enter-end"
                            x-transition:leave="transition ease-in-out duration-1000"
                            x-transition:leave-start="cube-enter-end"
                            x-transition:leave-end="cube-leave-end"
                            >
                            <img src="/images/slider/world_class_care.webp" width="330px" height="330px" class="h-full w-full" class="object-fit" alt="0% emi offer">
                        </div>
                        <div x-show="currentIndex == 1" class="h-full w-full shadow-[5px_5px_7px_2px_rgba(0,0,0,0.3)] z-10 absolute top-0 left-0 rounded-3xl overflow-hidden"
                            x-transition:enter="transition ease-in-out duration-1000"
                            x-transition:enter-start="cube-enter-start"
                            x-transition:enter-end="cube-enter-end"
                            x-transition:leave="transition ease-in-out duration-1000"
                            x-transition:leave-start="cube-leave-start"
                            x-transition:leave-end="cube-leave-end"
                            >
                            <img src="/images/slider/cardiac_care.webp" width="330px" height="330px" class="h-full w-full" class="object-fit" alt="baby_image" alt="santhwanam package">
                        </div>
                        <div x-show="currentIndex == 2" class="h-full w-full shadow-[5px_5px_4px_2px_rgba(0,0,0,0.3)] z-10 absolute top-0 left-0 rounded-3xl overflow-hidden" alt="baby_image"
                            x-transition:enter="transition ease-in-out duration-1000"
                            x-transition:enter-start="cube-enter-start"
                            x-transition:enter-end="cube-enter-end"
                            x-transition:leave="transition ease-in-out duration-1000"
                            x-transition:leave-start="cube-leave-start"
                            x-transition:leave-end="cube-leave-end"
                            >
                            <img src="/images/slider/24x7_emergency.webp" width="330px" height="330px" class="h-full w-full" class="object-fit" alt="now in cochin">
                        </div>
                        <div x-show="currentIndex == 3" class="h-full w-full shadow-[5px_5px_4px_2px_rgba(0,0,0,0.3)] z-10 absolute top-0 left-0 rounded-3xl overflow-hidden" alt="emergency care"
                            x-transition:enter="transition ease-in-out duration-1000"
                            x-transition:enter-start="cube-enter-start"
                            x-transition:enter-end="cube-enter-end"
                            x-transition:leave="transition ease-in-out duration-1000"
                            x-transition:leave-start="cube-leave-start"
                            x-transition:leave-end="cube-leave-end"
                            >
                            <img src="/images/slider/nicu_sicu.webp" width="330px" height="330px" class="h-full w-full" class="object-fit" alt="ranked among tp 10">
                        </div>
                    </div>
                    <!-- <div class="flex justify-center">
                        <div
                            class="flex flex-col justify-center lg:hidden absolute  bg-lightgray/80 z-20  text-center font-franklin w-4/5 sm:w-11/12 md:w-11/12  text-2xl md:text-3xl py-6 md:py-12 md:-mt-16  -mt-12 shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)]">
                            <p class="text-darkgray">{!!__('homecontent.most_trusted_hospital')!!}</p>
                            <p class="text-darkgray">{!!__('homecontent.for_infertility_treatment')!!}</p>
                        </div>
                    </div> -->
                    </div>
                    <x-button-fixed title="{{ __('button.chat_now')}}"/>
                </div>


                <div class="max-w-9/10  mx-auto text-center mt-6 lg:mt-36 ">
                    <p class="text-3xl lg:text-6xl font-semi-bold ">{{$instance->current_translation->data['departments_title']}}</p>
                    <div class="flex flex-col gap-y-6 xl:gap-y-8 lg:gap-y-4 xl:gap mt-6 lg:mt-20">
                        <div class="flex flex-col justify-center gap-y-6 lg:flex-row lg:gap-x-6 xl:gap-x-8  ">
                            <x-dept-component src="{{url('/images/orthopedicsqr_modified.webp')}}" title="{{ __('header.orthopaedics_and_trauma_surgery')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/neurologywarm.webp')}}" title="{{ __('header.neurology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}'})"/>
                            <x-dept-component src="{{url('/images/cardiologywarm.webp')}}" title="{{ __('header.cardiology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}'})"/>
                            <x-dept-component src="{{url('/images/physiotherapynew_modified.webp')}}" title="{{ __('header.physiotherapy')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}'})"/>
                            <x-dept-component src="{{url('/images/entsqr_modified.webp')}}" title="{{ __('header.ent')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}'})"/>
                        </div>
                        <div class="flex flex-col gap-y-6 lg:flex-row justify-center lg:gap-x-6 xl:gap-x-8">

                            <x-dept-component src="{{url('/images/dermatologywarm.webp')}}" title="{!! __('header.dermatology_&_cosmetology')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}'})" />
                            <x-dept-component src="{{url('/images/pediatricsqr.webp')}}" title="{!! __('header.pediatrics_&_pediatric_surgery')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/clinical_psychology_modified.webp')}}" title="{{ __('header.clinical_psychology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}'})"/>
                            <x-dept-component src="{{url('/images/cranio_maxillofacial_surgery.webp')}}" title="{{ __('header.craniofacial_surgery')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/emergency_criticalcare_modified.webp')}}" title="{!! __('header.emergency_medicine')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}'})"/>
                        </div>

                        <div class="my-6">
                            <x-button-component title="View All Departments" href="{{route('departments.loc', ['locale' => app()->currentLocale()])}}"/>
                        </div>
                    </div>
                </div>
                <div class="mt-6 max-w-9/10  mx-auto">
                    {{--  --}}
                    <div class="bg-white flex flex-col lg:flex-row  lg:mt-16">

                        <div class="lg:w-1/2  p-6  flex flex-col justify-center gap-y-4">
                            <p class="text-sm text-darkorange bg-beige text-center rounded-full py-1 w-16">{{ __('header.about') }}</p>
                            <p class="text-3xl lg:text-6xl" >{{$instance->current_translation->data['welcome_title']}}</p>
                            <p class="text-sm lg:text-lg">{{$instance->current_translation->data['welcome_description']}}</p>
                            <div class="mt-6"><x-button-component title="{{ __('button.more_about_us')}}"/></div>
                        </div>
                        <div class="lg:w-1/2 py-6 lg:py-20 ">
                            <img src="{{url('/images/ar_campus_modified.webp')}}" class=" w-full rounded-3xl "alt="ar_hospital_image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-black/95">
                <div class="max-w-screen-2xl mx-auto">
                    <div class="flex flex-col items-center ">
                        <div class="lg:hidden max-w-9/10  mx-auto flex flex-col gap-y-6 mt-6">
                            <x-blog-card title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" src="/images/value.webp" />
                            <x-blog-card title="{{$instance->current_translation->data['mission_title']}}" content="{{$instance->current_translation->data['mission_description']}}" src="/images/mission.webp" />
                            <x-blog-card title="{{$instance->current_translation->data['vision_title']}}" content="{{$instance->current_translation->data['vision_description']}}" src="/images/vision.webp" />
                        </div>
                        <div class="max-w-9/10  mx-auto hidden lg:flex flex-row lg:gap-2 xl:gap-4 py-20 items-stretch">
                            <!-- <div class="w-1/2 flex h-full">
                            <x-blog-big title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" />
                            </div> -->
                            <div class="w-1/2 flex flex-col lg:gap-3">
                            <x-blogcard-bigsc  title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" src="/images/value.webp" />
                            <x-blogcard-bigsc  title="{{$instance->current_translation->data['vision_title']}}" content="{{$instance->current_translation->data['vision_description']}}" src="/images/vision.webp"/>
                            </div>
                            <div class="w-1/2 flex flex-col lg:gap-3">
                                <x-blogcard-bigsc  title="{{$instance->current_translation->data['mission_title']}}" content="{{$instance->current_translation->data['mission_description']}}" src="/images/mission.webp" />
                                <div class="flex flex-row justify-center bg-beige rounded-3xl w-full h-1/2 ">
                                    <div class="w-full h-full">
                                        <img src="/images/doctor-patient.webp" class="object-cover w-full h-full rounded-3xl " alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-9/10  mx-auto">
                        <div class=" flex flex-col-reverse items-center lg:flex-row lg:gap-6 py-12">
                            <div class="lg:w-1/2 mt-6 lg:py-6">
                                <img src="{{url('/images/img5.png')}}" class=""alt="doctor_image">
                            </div>
                            <div class="lg:w-1/2 text-white   flex flex-col justify-center   gap-y-4">
                                <p class="text-sm text-darkorange bg-beige text-center rounded-full py-1 w-16">{{ __('header.about') }}</p>
                                <p class="text-3xl lg:text-5xl " >{{$instance->current_translation->data['commitment_title']}}</p>
                                <p class="text-sm lg:text-lg">{{$instance->current_translation->data['commitment_description']}}</p>
                                <x-transparent-button href="{{route('departments.loc', ['locale' => app()->currentLocale()])}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-screen-2xl mx-auto">
                <div class=" mt-10 xl:mt-16 max-w-9/10  mx-auto">
                    <div class="flex flex-col gap-4 ">
                        <p class="text-sm text-darkorange bg-beige text-center rounded-full py-1 w-16">{{ __('header.blogs') }}</p>
                        <p class="text-3xl lg:text-6xl " >{{$instance->current_translation->data['blog_title']}}</p>
                        <div class="mt-6 lg:py-6"><x-button-component href="{{route('blog.loc', ['locale' => app()->currentLocale()])}}"
                                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('blog.loc',['locale' => app()->currentLocale()])}}'})"  title="{{ __('button.view_all')}}"/></div>
                        <div class="flex flex-col items-center lg:flex-row lg:gap-2 xl:gap-6 mt-6">
                            <x-rblogcard img_url="{{url('/images/preventive-healthcare1.jpg')}}" title="{{ __('header.preventive_health') }}" slug="the-importance-of-preventive-healthcare"/>
                            <x-rblogcard img_url="{{url('/images/mental-health.webp')}}" title="{{ __('header.mental_health') }}" slug="mental-health-awareness-and-support"/>
                            <x-rblogcard img_url="{{url('/images/lifestyle-transformed.webp')}}" title="{{__('header.lifestyle')}}" slug="importance-of-lifestyle"/>
                        </div>
                    </div>
                </div>
                <div class="max-w-9/10  mx-auto mt-6 lg:mt-32">
                    <div class="bg-darkorange rounded-xl text-white p-4 lg:p-16 text-center">
                        <p class="text-3xl md:text-4xl lg:text-6xl">{{$instance->current_translation->data['action_title']}}</p>
                        <p class="text-base mt-2 ">{{$instance->current_translation->data['action_subtitle']}}</p>
                        <div class="mt-16 mb-4"><x-beige-button title="{{__('header.schedule_an_appointment')}}" /></div>
                    </div>
                </div>
            </div>


            <div class="mt-10 ">
                <x-footer-component />
            </div>

        </div>
    </div>
</x-guest-layout>
