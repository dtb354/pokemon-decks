<x-layout>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>All Posts</title>
    </head>
    <body>

    <h1>Featured Post</h1>

    @if($firstPost)
        <div style="border: 2px solid #000; padding: 10px; margin-bottom: 20px;">
            <h2>{{ $firstPost->name }}</h2>
            <p>{{ $firstPost->text }}</p>
            <p>{{ $firstPost->id }}</p>
        </div>
    @else
        <p>No posts found.</p>
    @endif

    <h1>All Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="{{ route('posts.show', $post) }}"> {{ $post-> name }}</a></li>
        @endforeach
    </ul>


    </body>
    </html>
</x-layout>



