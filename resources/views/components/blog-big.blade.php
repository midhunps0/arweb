@props(['title','content','src'=>'/images/dep2.jpg'])
<div class="flex flex-col justify-center items-center  bg-beige rounded-3xl  ">
    <div class="h-1/2  w-full pt-10 px-6 xl:px-8 xl:pt-12">
        <p class="text-6xl font-helvetica  ltr:text-left rtl:text-right ">{{ $title }}</p>
        <p class="text-sm lg:text-base font-thin  font-helvetica ltr:text-left rtl:text-right mt-4  ">{{ $content }}</p>
    </div>
    <div class="h-1/2 flex flex-shrink ">
        <img src="{{$src}}" class=" object-cover w-full  rounded-bl-3xl rounded-br-3xl " alt="">
    </div>
</div>
