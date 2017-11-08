@extends('layouts.master')

@section('content')
    <div class="container">

        <h2 class="blog-post-title">
            <u>All posts by tag: {{ $tag->name }}</u>
        </h2>

        @foreach($posts as $post)
            <a href="/{{ $post->category->name }}/{{ $post->id }}">
                <p>{{ $post->title }}</p>
            </a>
        @endforeach

    </div>
@endsection