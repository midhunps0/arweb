<x-guest-layout>
    {{-- <div class="bg-white items-center max-w-8xl  mx-auto text-base-content "> --}}
    <div class="font-helvetica">
        <x-header-component />
        <div class="">
            <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto mt-16 flex flex-col lg:flex-row lg:gap-x-6  gap-y-6 ltr:text-left rtl:text-right  ">
                <div class="flex flex-col gap-y-6 xl:gap-10  lg:w-1/2">
                    <p class="text-xs text-darkorange bg-beige text-center rounded-xl p-2 w-40">Harness Your Well-being</p>
                    <p class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl">We provide<br><span class="text-customOrange">Integrated World<br>Class Patient Service<span></p>
                    <p class="text-sm sm:text-base">All the Lorem Ipsum generators on the Internet tend to repeat
                        predefined chunks as necessary,making this the first true generator.</p>
                    <span class="lg:mt-6"><x-button-component /></span>
                </div>

                <div class="flex justify-center lg:w-1/2">
                    <img src="/images/image9.png" class="w-96 lg:w-full rounded-2xl" alt="doctor_image">
                </div>
                <x-button-fixed />
            </div>


            <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto text-center mt-6">
                <p class="text-3xl lg:text-5xl font-semi-bold ">Comprehensive Healthcare<br> Departments</p>
                <div class="flex flex-col gap-y-6 lg:gap-y-4 xl:gap-y-8 mt-6">
                    <div class="flex flex-col justify-center gap-y-6 lg:flex-row lg:gap-x-4  xl:justify-between">
                        <x-dept-component src="{{url('/images/img6.png')}}"/>
                        <x-dept-component src="{{url('/images/img7.png')}}" :title="'Neurology'"/>
                        <x-dept-component src="{{url('/images/img1.png')}}" :title="'Cardiology'"/>
                        <x-dept-component src="{{url('/images/img4.png')}}" :title="'Physiotherapy'"/>
                    </div>
                    <div class="flex flex-col gap-y-6 lg:flex-row justify-center lg:gap-x-4  xl:justify-between">
                        <x-dept-component src="{{url('/images/img5.png')}}" :title="'ENT'"/>
                        <x-dept-component src="{{url('/images/img1.png')}}" :title="'Dermatology & Cosmetology'"/>
                        <x-dept-component src="{{url('/images/img6.png')}}" :title="'Pediatrics & Pediatric surgery'"/>
                        <x-dept-component src="{{url('/images/img7.png')}}" :title="'Clinical Surgery'"/>
                    </div>

                </div>
            </div>
            <div class="mt-6 max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto">
            <x-sub-white />
            </div>
            <div class=" bg-black/95 flex flex-col items-center ">
                <div class="lg:hidden max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto flex flex-col gap-y-6 mt-6">
                    <x-blog-card :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                    <x-blog-card :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                    <x-blog-card :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                </div>
                <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto hidden lg:flex flex-row lg:gap-2 xl:gap-4 mt-32 -mb-32 ">
                    <div class="w-1/2">
                    <x-blog-big :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                    </div>
                    <div class="w-1/2 flex flex-col  lg:gap-2 xl:gap-4">
                    <x-blogcard-bigsc  :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                    <x-blogcard-bigsc  :title="'Our Mission'" :content="'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to makelec'" />
                    </div>
                </div>
            </div>
            <div class="bg-black/95 ">
                <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto">
                <x-sub-black />
                </div>

            </div>
            <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto mt-6">
                <x-blog-component/>
            </div>
            <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto mt-6">
                <x-ready-component />
            </div>
            <div class="mt-10">
                <x-footer-component />
            </div>

        </div>
    </div>
</x-guest-layout>
