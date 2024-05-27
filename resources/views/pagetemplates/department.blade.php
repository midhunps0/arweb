<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['title']}}" />
            <div class="flex flex-row">
                {{-- main body --}}
                <div class="m-auto">
                    <div>
                        @if (isset($instance->current_translation->data['body']))
                        <x-contentbuilder.renderer :content="json_decode($instance->current_translation->data['body'])"/>
                        @endif
                    </div>
                </div>
                {{-- Sidebar --}}
                {{-- <div class="md:w-1/4 px-3 py-6">
                    <div class="w-full max-h-full overflow-y-scroll">
                        <h3 class="bg-lightgray font-bold p-2">Other Departments</h3>
                        @foreach ($data['allDepartments'] as $d)
                            <p class="p-2">
                                <a @click.prevent.stop="$dispatch('linkaction', {link: '{{route('departments.guest.show', ['locale' => app()->currentLocale(), 'slug' => $d['slug']])}}', route: 'departments.guest.show'});" href="{{route('articles.guest.show', ['locale' => app()->currentLocale(), 'slug' => $d['slug']])}}"
                                    class="hover:text-pink underline">{{$d['title']}}</a>
                            </p>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="mt-10">
            <x-footer-component />
        </div>
    </div>
</x-guest-layout>
