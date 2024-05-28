@props(['instance', 'locale'])

<div class="form-control">
    <label class="label">
        <span class="label-text">Title</span>
    </label>
    <textarea name="data[title]" class="textarea textarea-bordered h-24">
        {{$instance->translations_array[$locale]['title'] ?? ''}}
    </textarea>
</div>
<div>
    <label class="label" for="">Sub Title</label>
    <input name="data[sub_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['sub_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Departments Title</label>
    <input name="data[departments_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['departments_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Welcome Title</label>
    <input name="data[welcome_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['welcome_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Welcome Description</label>
    <input name="data[welcome_description]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['welcome_description'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Value Title</label>
    <input name="data[value_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['value_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Value Description</label>
    <input name="data[value_description]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['value_description'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Mission Title</label>
    <input name="data[mission_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['mission_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Mission Description</label>
    <input name="data[mission_description]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['mission_description'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Vision Title</label>
    <input name="data[vision_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['vision_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Vision Description</label>
    <input name="data[vision_description]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['vision_description'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Review Title</label>
    <input name="data[review_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['review_title'] ?? ''}}" required />
</div>
{{-- <div>
    <label class="label" for="">Commitment Description</label>
    <input name="data[commitment_description]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['commitment_description'] ?? ''}}" required />
</div> --}}
<div>
    <label class="label" for="">Blog Title</label>
    <input name="data[blog_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['blog_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Action Title</label>
    <input name="data[action_title]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['action_title'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Action Sub Title</label>
    <input name="data[action_subtitle]" type="text" class="input input-bordered w-full" value="{{$instance->translations_array[$locale]['action_subtitle'] ?? ''}}" required />
</div>
<div>
    <label class="label" for="">Slug</label>
    <input name="slug" type="text" class="input input-bordered w-full" value="{{$instance->getTranslation($locale)->slug ?? ''}}" required />
</div>
<x-pageformtemplates.metatags />

