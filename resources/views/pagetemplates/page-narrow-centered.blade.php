<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="md:w-3/4 m-auto">
                {{-- <div>
                    <img src="{{$instance->current_translation->display_image}}" alt="">
                </div> --}}
                <div>
                    <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <x-footer-component />
        </div>
    </div>
</x-guest-layout>
