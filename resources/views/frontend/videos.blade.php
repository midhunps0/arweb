<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24 text-justify">
            <x-page-title title="Our Photos" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($videos as $v)
                    <div class="md:w-1/3 box-border p-2">
                        <div>
                            <div class="relative z-10" style="position:relative;padding-bottom:56.25%">
                                <iframe width="100%" height="100%"
                                    class="w-full absolute top-0 left-0" src="{{$v->link}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                    referrerpolicy="origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer-component/>
    </div>
</x-guest-layout>
