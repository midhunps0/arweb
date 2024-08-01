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
            <h4 class="font-bold my-4 px-2">Our Doctors</h4>
            <div class="flex flex-row flex-wrap">
                {{-- {{dd($data['doctors'])}} --}}
                @foreach ($data['doctors'] as $d)
                <div class="w-1/2 p-2">
                    <x-doctorcard
                    index="1"
                    name="{{$d->current_translation['data']['name']}}"
                    designation="{{$d->current_translation['data']['designation']}}"
                    department="{{$d->default_department}}"
                    qualification="{{$d->current_translation['data']['qualification']}}"
                    specialization="{{$d->current_translation['data']['specialisations']}}"
                    experience="{{$d->current_translation['data']['exp_summary'] ?? ''}}"
                    video_link="{{$d->current_translation['data']['video_link'] ?? null}}"
                    photo_url="{{$d->photo_url}}"
                    show_details="{{false}}"
                    />
                    {{-- <div class="box-border aspect-video border border-gray rounded-lg p-2">
                        <div @click="openScreen({{$loop->index}})" class="w-full h-full object-fill overflow-hidden rounded-lg cursor-pointer">
                            <img src="{{$p->image_url}}" alt="">
                        </div>
                    </div> --}}
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-10">
            <x-footer-component />
        </div>
    </div>
</x-guest-layout>
