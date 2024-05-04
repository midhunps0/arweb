@props(['src'=>'/images/img1.png','title'=>'','href'=>''])
<div x-data="{open:false}" class="relative flex justify-center" @mouseleave="open = false">
    <img src="{{$src}}" class="w-80 lg:w-56 xl:w-80   " alt="hospital_department_image" @mouseover="open = true" >
    <div x-show="open" class="  absolute  top-0 bottom-0 bg-gradient-to-b from-transparent to-black/50 rounded-2xl  w-80 lg:w-56  xl:w-full  transition-all duration-700 ease-in-out"></div>
    <a x-show="!open" class="w-48 lg:w-36  xl:w-48 absolute  bottom-8  bg-beige text-darkorange font-helvetica rounded-lg text-left py-2 px-3 transition-all duration-700 ease-in-out">{{$title}}</a>
    <div  x-show="open" class=" absolute top-1/2 w-72 lg:w-64  transition-all duration-700 ease-in-out "><x-button-component title="{{ __('button.know_more')}}" href={{$href}} /></div>
</div>