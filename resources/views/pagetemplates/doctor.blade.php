<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24">
            <x-page-title title="{{$instance->current_translation->data['name']}}" />
            <div class="flex flex-row justify-end p-4">
                <a href="{{route('doctors.guest.show', ['locale' => app()->currentLocale(), 'slug' => $instance->current_translation->slug])}}" class="btn btn-sm"
                    @click.prevent.stop="$dispatch('linkaction', {link: '{{route('doctors.guest.show', ['locale' => app()->currentLocale(), 'slug' => $instance->current_translation->slug])}}'})">
                    All Doctors
                </a>
            </div>
            <div class="flex flex-row flex-wrap gap-y-8 border border-gray rounded-sm shadow-lg p-4 my-16">
                {{-- Sidebar --}}
                <div class="md:w-1/2 lg:w-1/4">
                    {{-- {{dd($instance->current_translation)}} --}}
                    <div>
                        <x-doctorcard-component
                            name="{{$instance->current_translation->data['name']}}"
                            photo_url="{{$instance->photo_url}}"
                            designation="{{$instance->current_translation->data['designation']}}"
                            qualification="{{$instance->current_translation->data['qualification']}}"
                            slug="{{$instance->current_translation->slug}}"/>
                    </div>
                </div>
                {{-- main body --}}
                <div class="md:w-1/2 lg:w-3/4 flex flex-col gap-y-8">
                    <div class="fle flex-row">
                        <span class="font-bold">Designation:</span>
                        <span>{{$instance->current_translation->data['designation']}}</span>
                    </div>
                    <div class="fle flex-row">
                        <span class="font-bold">Department:</span>
                        <span>{{$instance->current_translation->data['department']}}</span>
                    </div>
                    <div class="fle flex-row">
                        <span class="font-bold">Qualification:</span>
                        <span>{{$instance->current_translation->data['qualification']}}</span>
                    </div>
                    <div class="fle flex-row">
                        <span class="font-bold">Specialisations:</span>
                        <span>{{$instance->current_translation->data['specialisations']}}</span>
                    </div>
                    @if (isset($instance->current_translation->data['exp_summary']))
                        <div class="fle flex-row">
                            <span class="font-bold">Experience Summary:</span>
                            <span>{{$instance->current_translation->data['exp_summary']}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <x-footer/>
    </div>
</x-guest-layout>
