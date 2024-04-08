@props(['src'=>'/images/img1.png','title'=>'Orthopediac and sports medicine'])
<div x-data="{open:false}" class="relative flex justify-center" @mouseleave="open = false">
    <img src="{{$src}}" class="lg:h-64 h-72    " alt="hospital_department_image" @mouseover="open = true" >
    <div x-show="open" class="  absolute  top-0 bg-gradient-to-b from-transparent to-black/50 rounded-3xl h-72 w-72 lg:w-full lg:h-64 transition-all duration-700 ease-in-out"></div>
    <a x-show="!open" class="  w-48 absolute  bottom-8  bg-beige text-darkorange font-helvetica rounded-lg text-left py-2 px-3 transition-all duration-700 ease-in-out">{{$title}}</a>
    <div  x-show="open" class=" absolute top-1/2 w-72 lg:w-64  transition-all duration-700 ease-in-out "><x-button-component title="{{ __('button.know_more')}}" /></div>
</div>