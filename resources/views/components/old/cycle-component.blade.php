@props(['ref_key', 'title', 'icon' => 'icons.sperm'])
<div @click.prevent.dispatch="$dispatch('hfeature', {ref: '{{$ref_key}}'})" class="border border-gray h-28 w-28 lg:w-36 lg:h-36 flex flex-col justify-center bg-white cursor-pointer"
:class="currentKey == '{{$ref_key}}' ? 'text-pink' : 'text-darkgray shadow-[0px_10px_12px_-4px_rgba(0,0,0,0.3)]  hover:shadow-[0px_0px_0px_0px_rgba(0,0,0,0.3)]'"
>
        <div class="flex justify-center ">
            <x-easyadmin::display.icon icon="{{$icon}}" height="h-10" width="w-8 sm:w-10" />
        </div>
        <h4 class="font-medium hover:font-bold text-base font-questrial text-center
            ">{{$title}}</h4>
</div>
