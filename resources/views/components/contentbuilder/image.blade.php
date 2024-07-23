@props(['data'])
<div class="img w-full {{$data->attribs->classes}}">
    <img class="w-full" src="{{$data->url}}"
        alt="{{$data->attribs->alt}}"
        width="{{$data->attribs->width}}"
        height="{{$data->attribs->height}}">
</div>
