@extends('layouts.master')

@section('content')
    <div class="container">

        <h2 class="blog-post-title">
            <u>All posts in category: {{ $category_name }}</u>
        </h2>

        @foreach($posts as $post)
            <a href="{{ route('showCategory', ['category_name' => $category_name]) }}/{{ $post->id }}">
                <p>{{ $post->title }}</p>
            </a>
        @endforeach

    </div>

    {{ $posts->links() }}
@endsection