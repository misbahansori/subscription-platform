@component('mail::message')
# {{ $post->title }}

{{ $post->body }}

@component('mail::button', ['url' => $post->url])
    See Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
