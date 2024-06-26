@props(['slug' => '', 'img_url'=>'', 'title' => '',])
@php
    $link = route('articles.guest.show', ['slug' => $slug, 'locale' => app()->currentLocale()]);
@endphp
<div class="w-80 lg:w-full flex flex-col h-full">
    <div  class="relative p-2 bg-base-100 h-full rounded-lg">
        <img  src="{{$img_url}}" class=" rounded-xl w-full h-48 xl:h-60 cursor-pointer"  alt="" >
{{--
        <div class="flex flex-row justify-between mt-2">
            <p class="text-sm">{{$date}}</p>
            <p class="text-sm">{{$type}}</p>
        </div> --}}
        <div class="mt-2">
            <p class="font-normal">
                <a class="flex flex-row items-center p-1 gap-1" href="{{$link}}" @click.prevent.stop="$dispatch('linkaction', {
                    link: '{{$link}}', route: 'articles.guest.show'
                })">
                    {{$title}}
                </a>
            </p>
            {{-- <p class="text-base font-thin">{{$description}}</p> --}}
        </div>
    </div>
</div>
