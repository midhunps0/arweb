@props(['title','content','src'=>'/images/dep2.jpg'])
<div class="flex flex-row   justify-center  bg-beige  rounded-3xl w-full h-1/2 ">
    <div class="w-1/2  pt-10 px-6 xl:pr-8 xl:pt-12 ">
        <p class="text-4xl font-helvetica  ltr:text-left rtl:text-right ">{{ $title }}</p>
        <p class="text-sm lg:text-base font-thin  font-helvetica ltr:text-left rtl:text-right mt-6">{{ $content }}</p>
    </div>
    <div class="w-1/2  h-full">
        <img src="{{$src}}" class="object-cover w-full h-48 md:h-full ltr:rounded-tr-3xl ltr:rounded-br-3xl rtl:rounded-tl-3xl rtl:rounded-bl-3xl " alt="">
    </div>
</div>