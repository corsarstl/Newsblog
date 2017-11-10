@extends('layouts.master')

@section('content')
    <div class="container">

        <h2 class="blog-post-title">
            <u>All posts by tag containing: {{ $tagName }}</u>
        </h2>

        @if($posts->count() < 1 )
            <h3>Sorry, no results for your query!</h3>

            <p>Try search something else or <a href="{{ route('home') }}">go to home page.</a></p>

        @endif

        @foreach($posts as $post)

                <i>Tags for this post:</i>
                @foreach($post->tags as $tag)
                    <a href="/tags/{{ $tag->name }}">
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    </a>
                @endforeach

            <a href="/{{ $post->category->name }}/{{ $post->id }}">
                <p>{{ $post->title }}</p>
            </a>
        @endforeach

    </div>

    {{ $posts->links() }}
@endsection