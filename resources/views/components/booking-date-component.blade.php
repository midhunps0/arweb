@props(['month'=>'Mar','date'=>'28','day'=>'Thursday'])
<button   class="w-24  h-20 lg:w-20 xl:w-24 shadow-xl border border-gray/40 flex flex-col items-center justify-center">
    <p class="text-xs">{{$month}}</p>
    <p class="text-base">{{$date}}</p>
    <p class="text-xs">{{$day}}</p>
</button>
