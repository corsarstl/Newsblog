@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        <div class="row">
            @include('home.slider')
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include('home.top5commentators')

            @include('home.top3posts')
        </div>
    </div>

    <hr>

    <div class="container">

        @foreach($categories as $category)
            <h2 class="blog-post-title">
                <a href="{{ route('showCategory', ['category_name' => $category->name]) }}">
                    {{ $category->name }}
                </a>
            </h2>

            @foreach($category->postsForList as $post)
                <a href="{{ route('showCategory', ['category_name' => $category->name]) }}/{{ $post->id }}">
                    <p>{{ $post->title }}</p>
                </a>
            @endforeach
        @endforeach

    </div>
@endsection



