<div>
    <label class="label" for="">Title</label>
    <input name="data[title]" type="text" class="input input-bordered w-full" required />
</div>
<x-easyadmin::inputs.imageuploader
    :element="[
        'key' => 'image',
        'authorised' => true,
        'label' => 'Image',
        'validations' => ['size' => '100 kb'],
        'width' => 'full',
        'properties' => ['required' => true]
    ]"/>


