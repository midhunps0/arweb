@props(['title','content','src'=>'/images/dep2.jpg'])
<div class=" flex flex-col items-center     bg-beige  rounded-3xl max-w-xs sm:max-w-sm h-full  ">
    <div class="h-1/2 sm:w-2/3 md:w-4/5 flex flex-col items-center  ">
        <p class="text-4xl font-helvetica mt-8 ltr:text-left rtl:text-right w-3/4">{{ $title }}</p>
        <p class="text-base font-thin  font-helvetica ltr:text-left rtl:text-right mt-6 mb-6 w-3/4">{{ $content }}</p>
    </div>
    <div class="w-full md:h-80">
        <img src="{{$src}}" class=" w-full h-80 md:h-full rounded-br-3xl rounded-bl-3xl " alt="">
    </div>
</div>