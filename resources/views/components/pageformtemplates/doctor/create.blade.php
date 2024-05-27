@php
    $departments = App\Models\Department::get()->pluck('default_title', 'id');
@endphp
<div class="form-control">
    <label class="label" for="">Full Name</label>
    <input @change="$dispatch('titlechange', {key: 'create-doctor', value: $el.value});" name="data[name]" type="text" class="input input-bordered w-full" required />
</div>
{{-- <div class="form-control">
    <label class="label" for="">Slug</label>
    <input @titlechange.window="if ($event.detail.key == 'create-doctor') {$el.value = $event.detail.value.toLowerCase().replace(/ /g, '-').replace(/[@#\$%\^\&*()_\+=\[\]{};':\\\|,\.<>\/\?~`]/g, '');}" name="slug" type="text" class="input input-bordered w-full" required />
</div> --}}
<div class="flex flex-row space-x-4 w-full">
    <div class="flex-grow form-control">
        <label class="label" for="">Departmant</label>
        <select class="select select-md select-bordered text-base-content" name="department_id" id="">
            <option value="">--Select One--</option>
            @foreach ($departments as $id => $name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="flex-grow form-control">
        <label class="label" for="">Designation</label>
        <input name="data[designation]" type="text" class="input input-bordered w-full" required />
    </div>
</div>
<div class="flex flex-row space-x-4 w-full">
    <div class="flex-grow form-control">
        <label class="label" for="">Qualification</label>
        <input name="data[qualification]" type="text" class="input input-bordered w-full" required />
    </div>
    <div class="flex-grow form-control">
        <label class="label" for="">Specialisations</label>
        <input name="data[specialisations]" type="text" class="input input-bordered w-full" />
    </div>
</div>
<div class="form-control">
    <label class="label" for="">Intro Video Link</label>
    <input name="data[video_link]" type="text" class="input input-bordered w-full" />
</div>
<div class="form-control">
    <label class="label">
        <span class="label-text">Experience Summary</span>
    </label>
    <textarea name="data[exp_summary]" class="textarea textarea-bordered h-24"></textarea>
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'photo',
        'authorised' => true,
        'label' => 'Photo (Same across translations)',
        'validations' => ['size' => '100 kb'],
        'width' => 'full'
    ]"/>
<x-pageformtemplates.metatags />

