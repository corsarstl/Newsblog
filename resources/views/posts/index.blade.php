@extends('layouts.master')

@section('content')
    <div class="container">

        <h2 class="blog-post-title">
            {{ $category->name }}
        </h2>

        @foreach($posts as $post)
            <a href="/{{ $post->category->id }}/{{ $post->id }}">
                <p>{{ $post->title }}</p>
            </a>
        @endforeach

    </div>
@endsection