<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="Blog" />
            <div class="flex flex-row flex-wrap justify-center items-stretch">
                @foreach ($departments as $d)
                {{-- {{dd($a->current_translation)}} --}}
                    <div class="md:w-1/4 p-3 box-border">
                        <x-dept-component
                            title="{{$d->current_translation->data['title']}}"
                            src="{{$d->current_translation->display_image}}"
                            href="{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $d->current_translation->slug])}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <x-footer-component />
    </div>
</x-guest-layout>
