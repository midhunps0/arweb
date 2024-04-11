<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="flex flex-row">
                {{-- main body --}}
                <div class="md:w-3/4">
                    @if (isset($instance->current_translation->display_image))
                        <div>
                            <img src="{{$instance->current_translation->display_image}}" alt="">
                        </div>
                    @endif
                    <div>
                        @if (isset($instance->current_translation->data['body']))
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                        @endif
                    </div>
                </div>
                {{-- Sidebar --}}
                <div class="md:w-1/4">
                    @if (isset($instance->current_translation->data['sidebar']))
                    <div class="border border-gray bg-lightgray rounded-md p-2">
                    <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['sidebar'])"/>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-10">
            <x-footer-component />
        </div>
    </div>
</x-guest-layout>
