@props(['slug' => '', 'img_url'=>'', 'title' => '',])
@php
    $link = route('articles.guest.show', ['slug' => '_X_', 'locale' => app()->currentLocale()]);
@endphp
<div class="w-80 lg:w-full flex flex-col h-full hover:scale-105 transition-all">
    <div  class="relative p-2 h-full rounded-lg">
        <a class="flex flex-row items-center p-1 gap-1" href="{{$link}}" @click.prevent.stop="$dispatch('linkaction', {
            link: '{{$link}}'.replace('_X_', a.current_translation.slug), route: 'articles.guest.show'
        })">
        <img :src="a.display_image" class=" rounded-xl w-full h-48 xl:h-60 cursor-pointer"  alt="" >
        </a>
{{--
        <div class="flex flex-row justify-between mt-2">
            <p class="text-sm">{{$date}}</p>
            <p class="text-sm">{{$type}}</p>
        </div> --}}
        <div class="mt-2">
            <p class="font-normal">
                <a class="flex flex-row items-center p-1 gap-1" href="{{$link}}" @click.prevent.stop="$dispatch('linkaction', {
                    link: '{{$link}}'.replace('_X_', a.current_translation.slug), route: 'articles.guest.show'
                })" x-text="a.current_translation.data.title"></a>
            </p>
            {{-- <p class="text-base font-thin">{{$description}}</p> --}}
        </div>
    </div>
</div>
