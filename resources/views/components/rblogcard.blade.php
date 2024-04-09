@props(['src'=>'/images/blog1.jpg','date'=>'date','type'=>'type','title'=>'blog title','description'=>'blog description'])
<div class="w-80 lg:w-full flex flex-col " @mouseleave="open = !open">
    <div  class="relative">
        <img  src="{{$src}}" class=" rounded-xl w-full h-48 cursor-pointer"  alt="" >
        
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