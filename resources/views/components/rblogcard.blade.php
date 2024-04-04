@props(['src'=>'/images/blog1.jpg','date'=>'date','type'=>'type','title'=>'blog title','description'=>'blog description'])
<div x-data="{open:!open}" class="w-80 lg:w-80 flex flex-col " @mouseleave="open = !open">
    <div @mouseover="open = true" class="relative">
        <img x-show="!open" src="{{$src}}" class="border rounded-xl w-full h-48"  alt="" >
        <img x-show="open" src="/images/img7.png" class="transition-colors duration-600 ease-in-out border rounded-xl w-full h-48"  alt="" >
        <div class="flex flex-row justify-between mt-2">
            <p class="text-sm">{{$date}}</p>
            <p class="text-sm">{{$type}}</p>
        </div>
        <div class="mt-4">
            <p class="text-xl font-normal">{{$title}}</p>
            <p class="text-base font-thin">{{$description}}</p>
        </div>
    </div>

</div>