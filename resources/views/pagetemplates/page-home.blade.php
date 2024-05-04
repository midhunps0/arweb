<x-guest-layout>
    {{-- <div class="bg-white items-center max-w-8xl  mx-auto text-base-content "> --}}
        {{-- {{dd($data)}} --}}
    <div class="font-helvetica max-w-8xl mx-auto">
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
                        <img src="/images/image9.png" class="w-96 lg:w-full rounded-2xl" alt="doctor_image">
                    </div>
                    <x-button-fixed title="{{ __('button.chat_now')}}"/>
                </div>


                <div class="max-w-9/10  mx-auto text-center mt-6 lg:mt-36 ">
                    <p class="text-3xl lg:text-6xl font-semi-bold ">{{$instance->current_translation->data['departments_title']}}</p>
                    <div class="flex flex-col gap-y-6 xl:gap-y-8 lg:gap-y-4 xl:gap mt-6 lg:mt-20">
                        <div class="flex flex-col justify-center gap-y-6 lg:flex-row lg:gap-x-6 xl:gap-x-8  ">
                            <x-dept-component src="{{url('/images/orthopedicsqr-modified.png')}}" title="{{ __('header.orthopaedics_and_trauma_surgery')}}" 
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/neurologysqr-modified.png')}}" title="{{ __('header.neurology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}'})"/>
                            <x-dept-component src="{{url('/images/cardilogysqr-modified.png')}}" title="{{ __('header.cardiology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'cardiology'])}}'})"/>
                            <x-dept-component src="{{url('/images/physiotherapysqr-modified.png')}}" title="{{ __('header.physiotherapy')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}'})"/>
                            <x-dept-component src="{{url('/images/entsqr-modified.png')}}" title="{{ __('header.ent')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}'})"/>
                        </div>
                        <div class="flex flex-col gap-y-6 lg:flex-row justify-center lg:gap-x-6 xl:gap-x-8">
                            
                            <x-dept-component src="{{url('/images/dermatologysqr-modified.png')}}" title="{!! __('header.dermatology_&_cosmetology')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}'})"/>
                            <x-dept-component src="{{url('/images/pediatricsqr-modified.png')}}" title="{!! __('header.pediatrics_&_pediatric_surgery')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/clinicalpic1-modified.png')}}" title="{{ __('header.clinical_psychology')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}'})"/>
                                                <x-dept-component src="{{url('/images/cranio-maxillofacial-surgery-modified.png')}}" title="{{ __('header.craniofacial_surgery')}}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}'})"/>
                            <x-dept-component src="{{url('/images/emergencymedsqr-modified.png')}}" title="{!! __('header.emergency_medicine')!!}"
                                                href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}'})"/>
                        </div>
                        
                        <div class="my-6">
                            <x-button-component title="View All Departments" href="{{route('all_departments')}}"/>
                        </div>
                    </div>
                </div>
                <div class="mt-6 max-w-9/10  mx-auto">
                    {{--  --}}
                    <div class="bg-white flex flex-col lg:flex-row h-fit lg:mt-16">

                        <div class="lg:w-1/2  p-6  flex flex-col justify-center gap-y-4">
                            <p class="text-sm text-darkorange bg-beige text-center rounded-full py-1 w-16">{{ __('header.about') }}</p>
                            <p class="text-3xl lg:text-6xl" >{{$instance->current_translation->data['welcome_title']}}</p>
                            <p class="text-sm lg:text-lg">{{$instance->current_translation->data['welcome_description']}}</p>
                            <div class="mt-6"><x-button-component title="{{ __('button.more_about_us')}}"/></div>
                        </div>
                        <div class="lg:w-1/2 py-6 lg:py-20 ">
                            <img src="{{url('/images/doctor1.jpg')}}" class=" w-full  rounded-3xl "alt="doctor_image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-black/95">
                <div class="max-w-screen-2xl mx-auto">
                    <div class="flex flex-col items-center ">
                        <div class="lg:hidden max-w-9/10  mx-auto flex flex-col gap-y-6 mt-6">
                            <x-blog-card title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" src="/images/values.png" />
                            <x-blog-card title="{{$instance->current_translation->data['mission_title']}}" content="{{$instance->current_translation->data['mission_description']}}" src="/images/mission.png" />
                            <x-blog-card title="{{$instance->current_translation->data['vision_title']}}" content="{{$instance->current_translation->data['vision_description']}}" src="/images/vision.png" />
                        </div>
                        <div class="max-w-9/10  mx-auto hidden lg:flex flex-row lg:gap-2 xl:gap-4 py-20 items-stretch">
                            <!-- <div class="w-1/2 flex h-full">
                            <x-blog-big title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" />
                            </div> -->
                            <div class="w-1/2 flex flex-col lg:gap-3">
                            <x-blogcard-bigsc  title="{{$instance->current_translation->data['value_title']}}" content="{{$instance->current_translation->data['value_description']}}" src="/images/values.png" />
                            <x-blogcard-bigsc  title="{{$instance->current_translation->data['vision_title']}}" content="{{$instance->current_translation->data['vision_description']}}" src="/images/vision.png"/>
                            </div>
                            <div class="w-1/2 flex flex-col lg:gap-3">
                                <x-blogcard-bigsc  title="{{$instance->current_translation->data['mission_title']}}" content="{{$instance->current_translation->data['mission_description']}}" src="/images/mission.png" />
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
                                <x-transparent-button href="{{route('all_departments')}}"/>
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
                            <x-rblogcard img_url="{{url('/images/preventive-healthcare1.jpg')}}" title="{{ __('header.preventive_health') }}"/>
                            <x-rblogcard img_url="{{url('/images/mental-health.webp')}}" title="{{ __('header.mental_health') }}"/>
                            <x-rblogcard img_url="{{url('/images/lifestyle-transformed.webp')}}" title="{{__('header.lifestyle')}}"/>
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
