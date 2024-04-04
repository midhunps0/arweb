@props(['title','content','src'=>'/images/dep2.jpg'])
<div class="flex flex-col items-center  bg-beige rounded-3xl   h-3/4 ">
    <div class=" h-1/2 flex flex-col  items-center w-full lg:p-2 xl:p-10 ">
        <p class="text-4xl font-helvetica mt-8 ltr:text-left rtl:text-right w-3/4">{{ $title }}</p>
        <p class="text-sm font-thin  font-helvetica ltr:text-left rtl:text-right mt-6 mb-6 w-3/4 ">{{ $content }}</p>
    </div>
    <div class="h-1/2 w-full  ">
        <img src="{{$src}}" class="object-cover h-full w-full rounded-bl-3xl rounded-br-3xl " alt="">
    </div>
</div>