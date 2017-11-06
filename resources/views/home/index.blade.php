@extends('layouts.master')

@section('content')
    <div class="container">

        @foreach($categories as $category)
            <h2 class="blog-post-title">
                <a href="/{{ $category->id }}">
                    {{ $category->name }}
                </a>
            </h2>

            @foreach($category->posts as $post)
                <a href="/{{ $post->category->id }}/{{ $post->id }}">
                    <p>{{ $post->title }}</p>
                </a>
            @endforeach

        @endforeach

    </div>
@endsection