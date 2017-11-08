@extends('layouts.master')

@section('content')
    <div class="container card mt-3">
        <div class="card-body">

            <h3>{{ $post->title }}</h3>

            @if($post->tags)
                <h4>Tags:
                    @foreach($post->tags as $tag)
                        <a href="/tags/{{ $tag->name }}">
                            <span class="badge badge-info">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </h4>
            @endif

            <img src="/images/{{ $post->image_id }}.jpg" class="img-fluid" alt="Responsive image">

            {{ $post->body }}

            <hr>

            @include('comments.show')

            @if (Auth::check())
                @include('comments.create')
            @endif

        </div>
    </div>
@endsection