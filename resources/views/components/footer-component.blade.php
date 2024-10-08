<div class="bg-black/95">
        <div class="max-w-screen-2xl mx-auto">
                <div class= "flex flex-col lg:flex-row max-w-9/10  mx-auto ">
                        <div class="lg:w-1/3 pt-16  flex flex-col justify-start gap-y-8 ">
                                <div class="flex justify-center p-1 w-fit">
                                        <img src="/images/logo.webp" class="h-12" alt="AR HOSPITAL Logo">
                                </div>
                                <div class="flex flex-row items-center gap-x-1 mt-6 ">
                                        <span class="fill-current text-white flex items-center ">
                                        <x-easyadmin::display.icon icon="icons.phone-icon" height="h-3.5" width="w-3.5"/>
                                        </span>
                                        <p class="text-white text-sm lg:text-base">0480 2800300<span class="italic">({{__('footer.24/7_general_enquiry')}})</span></p>
                                </div>
                                <div class="flex flex-row items-center gap-x-1 ">
                                        <span class="fill-current text-white flex items-center">
                                        <x-easyadmin::display.icon icon="icons.envelope-icon" height="h-4" width="w-4"/>
                                        </span>
                                        <p class="text-white text-sm lg:text-base underline underline-offset-2">info@arhospital.in</p>
                                </div>

                                <div class="flex flex-row items-start gap-x-1 ">
                                        <span class="fill-current text-white flex items-start">
                                        <x-easyadmin::display.icon icon="icons.location-icon" height="h-4" width="w-4"/>
                                        </span>
                                        <p class="text-white text-sm lg:text-base ">{!!__('footer.ar_address_kodungallur')!!}</p>
                                </div>
                                <div class="flex flex-row items-center gap-x-2 ">
                                <div class="flex items-center gap-x-3">
                                        <a href="https://www.facebook.com/arsuperspecialityhospital/" target="blank" class="fill-current text-white"><x-easyadmin::display.icon icon="icons.facebook-icon" height="h-4" width="w-4"/></a>
                                        <a href="https://www.instagram.com/arhospital/" target="blank" class="fill-current text-white"><x-easyadmin::display.icon icon="icons.instagram-icon" height="h-4" width="w-4"/></a>
                                        {{-- <a href="https://in.linkedin.com/in/ar-medical-centre-aa5b91216" target="blank" class="fill-current text-white"><x-easyadmin::display.icon icon="icons.linkedin-icon" height="h-4" width="w-4"/></a> --}}
                                        <a href="https://www.youtube.com/@arhospital" target="blank" class="fill-current text-white"><x-easyadmin::display.icon icon="icons.youtube-icon" height="h-4" width="w-4"/></a>
                                </div>
                                </div>

                        </div>
                        <div class="lg:w-2/3  ltr:text-left rtl:text-right pt-16 flex flex-col lg:flex-row justify-end gap-x-2  ">
                                <div class="lg:w-1/4 mb-8 ">
                                <p class="text-lg font-normal text-white mb-4">{{ __('header.departments')}}</p>
                                <ul class="flex flex-col gap-3">
                                    @for ($i = 0; $i < 10; $i++)
                                    <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $departments_data[$i]->translations_slugs[app()->currentLocale()]])}}"
                                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $departments_data[$i]->translations_slugs[app()->currentLocale()]])}}'})"
                                            class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">
                                            {{$departments_data[$i]['current_translation']['data']['title']}}
                                        </a></li>
                                    @endfor

                                        {{-- <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'clinical-psychology'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.clinical_psychology')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'craniofacial-surgery'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.craniofacial_surgery')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'dermatology-cosmetology'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.dermatology_&_cosmetology')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'emergency-medicine-and-critical-care'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{!!__('footer.emergency_medicine_and_critical_care')!!}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ent'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.ent')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'neurology'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.neurology')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'orthopaedics-and-trauma-surgery'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{!! __('footer.orthopaedics_and_trauma_surgery')!!}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'pediatrics-pediatric-surgery'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{!!__('footer.pediatrics_&_pediatric_surgery')!!}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'physiotherapy'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.physiotherapy')}}</a></li>

                                        <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}"
                                                @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'urology'])}}'})"
                                                class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.urology')}}</a></li> --}}

                                    </ul>
                                </div>
                                <div class="lg:w-1/4 mb-8 ">
                                    <ul class="flex flex-col gap-3">
                                    @for ($j = 10; $j < count($departments_data); $j++)
                                    <li><a href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $departments_data[$j]->translations_slugs[app()->currentLocale()]])}}"
                                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $departments_data[$j]->translations_slugs[app()->currentLocale()]])}}'})"
                                            class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">
                                            {{$departments_data[$j]['current_translation']['data']['title']}}</a></li>
                                    @endfor
                                    </ul>
                                </div>
                                <div class="lg:w-1/4 mb-8 ">
                                    <p class="text-lg font-normal text-white mb-4 ">{{ __('header.facilities')}}</p>
                                        <ul class="flex flex-col gap-3">
                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-critical-care'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => '24x7-critical-care'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{!!__('header.24x7_critical_care')!!}</a></li>

                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'intensive-care-units'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'intensive-care-units'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.intensive_care_unit')}}</a></li>

                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'services'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'services'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.services')}}</a></li>

                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'health-insurance'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.health_insurance')}}</a></li>

                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'international-patients'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'international-patients'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.international_patients')}}</a></li>

                                                <li><a href="{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('facilities.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'other-facilities'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.other_facilities')}}</a></li>
                                        </ul>
                                        <p class="text-lg font-normal text-white mb-4">{{ __('header.about')}}</p>
                                        <ul class="flex flex-col gap-3">
                                                <li><a href="{{route('doctors.loc', ['locale' => app()->currentLocale()])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('doctors.loc', ['locale' => app()->currentLocale()])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.doctors')}}</a></li>



                                                <li><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(),'slug' => 'careers'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'careers'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('footer.careers')}}</a></li>
                                        </ul>
                                </div>
                                <div class="lg:w-1/4 mb-8 ">
                                        <p class="text-lg font-normal text-white mb-4">{{ __('footer.resources')}}</p>
                                        <ul class="flex flex-col gap-3">
                                                <li><a href="{{route('webpages.guest.show', ['locale' => app()->currentLocale(),'slug' => 'ebooks'])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('webpages.guest.show', ['locale' => app()->currentLocale(), 'slug' => 'ebooks'])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('footer.ebook')}}</a></li>
                                                <li><a href="{{route('blog.loc', ['locale' => app()->currentLocale()])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('blog.loc',['locale' => app()->currentLocale()])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('footer.blogs')}}</a></li>
                                                <li><a href="{{route('photos.loc', ['locale' => app()->currentLocale()])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('photos.loc', ['locale' => app()->currentLocale()])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.our_photos')}}</a></li>
                                                <li><a href="{{route('videos.loc', ['locale' => app()->currentLocale()])}}"
                                                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('videos.loc', ['locale' => app()->currentLocale()])}}'})"
                                                        class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.our_videos')}}</a></li>

                                                <li><a href="https://www.youtube.com/@arhospital/videos" target="blank" class="text-sm lg:text-base text-white hover:underline underline-offset-2 font-thin">{{ __('header.our_youtube')}}</a></li>
                                        </ul>
                                </div>


                        </div>

                </div>
                <div class="flex flex-col lg:flex-row justify-between gap-y-2    mt-16 max-w-9/10  mx-auto  ">
                <p class="text-white text-sm lg:text-base">{{ __('footer.right_reserved')}}</p>
                <p class="text-white text-sm lg:text-base mb-8">{{ __('footer.privacy_policy')}}</p>
                </div>
        </div>
</div>
