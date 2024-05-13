@props([
    'index' => 0,
    'name' => '',
    'designation'=>'',
    'department'=>'',
    'qualification'=>'',
    'specialization'=>'',
    'experience'=>'',
    'video_link' => null,
    'photo_url' => null
    ])
<div x-data="{ open:false }" class="border border-customOrange rounded-lg flex
    flex-col md:flex-row relative">
    <div class="md:w-1/4 p-2 flex flex-col justify-center gap-y-2">
        <img src="{{$photo_url ?? ''}}" class="rounded-lg max-w-52 md:max-w-none" alt="doctor_image">

        {{-- @if ((isset($video_link) && $video_link != '') || $experience != '') --}}
        <div class="flex justify-end absolute top-4 right-4">
            <button @click.prevent="openScreen({{$index}})"class="bg-darkorange rounded-full px-4 py-2 flex justify-center items-center space-x-4 w-full text-white">
                <span>Details</span>
                <x-easyadmin::display.icon icon="icons.youtube-icon" height="h-6" width="w-6" class="fill-current"/>
            </button>
        </div>
        {{-- @endif --}}
    </div>
    <div class="p-4 md:p-10 md:w-3/4">

        <div x-show="false" class="fixed top-0 left-0 w-full h-full  ">
            <div class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto flex flex-col justify-center  bg-white/95 h-screen">
                <div class="flex justify-end ">
                    <button @click="" class="flex justify-end top-0 w-full px-6 py-11 fill-current text-darkorange">
                    <x-easyadmin::display.icon icon="icons.close-button" height="h-6" width="w-6"/>
                    </button>
                </div>
                <div class=" flex justify-center items-center ">

                    <div class="flex flex-col items-center justify-center ">
                    <iframe width="560" height="415" class="w-2/3 " src="https://www.youtube.com/embed/LUucaju0hHU?si=eYlE4vghjiveYFB-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <div class="flex flex-col items-start justify-start p-4 lg:w-2/3 ">
                            <p class="font-semibold">Experience & Expertise</p>
                            <p class="mt-2 h-52 overflow-y-scroll ">{{$experience}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <p class="text-3xl text-darkorange font-semibold">{{$name}}</p>
        <p class="">{{$designation}}</p>

        <div  class="mt-2 flex flex-col gap-y-2 md:gap-y-8">
            <div>
                <p class="font-semibold">Department</p>
                <p>{{$department}}</p>
            </div>
            <div>
                <p class="font-semibold">Qualification</p>
                <p>{{$qualification}}</p>
            </div>
            @if ($specialization != '')
            <div>
                <p class="font-semibold">Specialization</p>
                <p>{{$specialization}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
