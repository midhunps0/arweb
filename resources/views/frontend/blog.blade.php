<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="Blog" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($blog as $a)
                    <div class="md:w-1/3 p-3 box-border">
                        <x-rblogcard
                            title="{{$a->current_translation->data['title']}}"
                            img_url="{{$a->current_translation->display_image}}"
                            slug="{{$a->current_translation->slug}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer-component />
    </div>
</x-guest-layout>
