<x-guest-layout>
    <div class="text-base">
        <x-main-menu-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="Blog" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($blog as $a)
                {{-- {{dd($a->current_translation)}} --}}
                    <div class="w-1/4 p-3 box-border">
                        <x-blogcard-component
                            title="{{$a->current_translation->data['title']}}"
                            image_url="{{$a->current_translation->display_image}}"
                            slug="{{$a->current_translation->slug}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>