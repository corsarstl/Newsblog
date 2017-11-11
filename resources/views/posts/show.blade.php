@extends('layouts.master')

@section('content')
    <div class="container card mt-3">
        <div class="card-body">

            <h3>{{ $post->title }}</h3>

            @if($post->tags->count() > 0)
                <h5>Tags:
                    @foreach($post->tags as $tag)
                        <a href="/tags/{{ $tag->name }}">
                            <span class="badge badge-info">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </h5>
            @endif

            <p>
                <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;now: {{ $readingNow }} |
                <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;total: {{ $readCount }}

                @if($post->is_analytic == 1)
                    <a class="btn btn-warning ml-5" href="{{ route('showAnalytics') }}" role="button">Analytic post</a>
                @endif
            </p>

            <img src="/images/posts/{{ $post->image_id }}.jpg" class="img-fluid" alt="Responsive image">

            @if (!Auth::check() & ($post->is_analytic == true))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hello, stranger!</strong> Please, sign in to read the full version of the article.

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{ $post->analyticsIfNotLoggedIn() }}...
            @else
                {{ $post->body }}
            @endif

            <hr>

            @if ($post->comments->count() > 0)
                @include('comments.show')
            @endif

            @if (Auth::check())
                @include('comments.create')
            @endif

        </div>
    </div>
@endsection