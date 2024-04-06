@props(['time'=>'9:00 AM'])
<button :disabled="!selected" class="w-28 h-12 lg:w-24 xl:w-28 shadow-lg border border-gray/25 flex flex-col items-center justify-center disabled:shadow-none"  >
    <p class="text-base">{{$time}}</p>
</button>
