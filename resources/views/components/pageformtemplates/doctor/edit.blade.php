@props(['instance', 'locale'])
@php
    $departments = App\Models\Department::get()->pluck('default_title', 'id');
@endphp
<div class="form-control">
    <label class="label" for="">Name</label>
    <input @change="$dispatch('titlechange', {key: 'edit-doctor', value: $el.value});" name="data[name]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['name'] ?? ''}}" required />
</div>
{{-- <div class="form-control">
    <label class="label" for="">Slug</label>
    <input @titlechange.window="if ($event.detail.key == 'edit-doctor') {$el.value = $event.detail.value.toLowerCase().replace(/ /g, '-').replace(/[@#\$%\^\&*()_\+=\[\]{};':\\\|,\.<>\/\?~`]/g, '');}" name="slug" type="text" class="input input-bordered w-full"
    value="{{$instance->getTranslation($locale)->slug ?? ''}}" required />
</div> --}}
<div class="flex flex-row space-x-4 w-full">
    <div class="flex-grow form-control">
        <label class="label" for="">Departmant</label>
        {{-- <input name="data[department]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['department'] ?? ''}}" required /> --}}
        <select class="select select-md select-bordered text-base-content" name="department_id" id="">
            <option value="">--Select One--</option>
            @foreach ($departments as $id => $name)
                <option class="text-base-content" value="{{$id}}" @if ($instance->department_id == $id)
                    selected
                @endif>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="flex-grow form-control">
        <label class="label" for="">Designation</label>
        <input name="data[designation]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['designation'] ?? ''}}" required />
    </div>
</div>
<div class="flex flex-row space-x-4 w-full">
    <div class="flex-grow form-control">
        <label class="label" for="">Qualification</label>
        <input name="data[qualification]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['qualification'] ?? ''}}" required />
    </div>
    <div class="flex-grow form-control">
        <label class="label" for="">Specialisations</label>
        <input name="data[specialisations]" type="text" class="input input-bordered w-full"
        value="{{$instance->translations_array[$locale]['specialisations'] ?? ''}}" />
    </div>
</div>
<div class="form-control">
    <label class="label" for="">Intro Video Link</label>
    <input name="data[video_link]" type="text" class="input input-bordered w-full"
    value="{{$instance->translations_array[$locale]['video_link'] ?? ''}}"  />
</div>
<div class="form-control" x-data="{chVal: true}" x-init="chVal = {{$instance->is_active}};">
    <label class="label" for="">Is Active?</label>
    <input x-on:change="chVal = $el.checked ? 1 : 0" type="checkbox" class="checkbox checkbox-primary" @if ($instance->is_active)
        checked
    @endif/>
    <input type="hidden" name="is_active" :value="chVal">
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Experience Summary</span>
    </label>
    <textarea name="data[exp_summary]" class="textarea textarea-bordered h-24">
        {{$instance->translations_array[$locale]['exp_summary'] ?? ''}}
    </textarea>
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'photo',
        'authorised' => true,
        'label' => 'Photo (Same across translations)',
        'validations' => ['size' => '100 kb'],
        'width' => 'full'
    ]"
    :_old="[
        'photo' => $instance->photo
    ]"/>
<x-pageformtemplates.metatags :instance="$instance" locale="{{$locale}}"/>
