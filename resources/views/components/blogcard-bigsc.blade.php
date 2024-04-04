@props(['title','content','src'=>'/images/dep2.jpg'])
<div class="flex flex-row  items-center   bg-beige  rounded-3xl   ">
    <div class="w-1/2  flex flex-col items-center ">
        <p class="text-4xl font-helvetica mt-8 ltr:text-left rtl:text-right w-3/4">{{ $title }}</p>
        <p class="text-sm font-thin  font-helvetica ltr:text-left rtl:text-right mt-6 w-3/4 ">{{ $content }}</p>
    </div>
    <div class="w-1/2  h-full">
        <img src="{{$src}}" class="object-cover w-full h-48 md:h-full ltr:rounded-tr-3xl ltr:rounded-br-3xl rtl:rounded-tl-3xl rtl:rounded-bl-3xl " alt="">
    </div>
</div>