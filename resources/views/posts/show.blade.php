<h1>{{$post->name}}</h1>

@if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}" style="max-width: 400px;">
@endif
