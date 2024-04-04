@props(['instance', 'locale'])
<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" type="text" class="input input-bordered w-full"
            value="{{$instance->translations_array[$locale]['title'] ?? ''}}" required />
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'image',
        'authorised' => true,
        'label' => 'Image (Same across translations)',
        'validations' => ['size' => '100 kb'],
        'width' => 'full',
        'properties' => []
    ]"
    :_old="[
        'image' => $instance->image
    ]"/>
