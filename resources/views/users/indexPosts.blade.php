@extends('layouts.master')

@section('content')

    <div class="container">

        <h2 class="blog-post-title">
            <u>All posts by user:</u>

            <p>{{ $user_name}}</p>
        </h2>

        @if(!Auth::user())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hello, stranger!</strong> Please, sign in to rate the comments.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @foreach($comments as $comment)
            <li class="list-group-item mt-3" data-commentid="{{ $comment->id }}">
                <div>
                    <p>Post title:
                        <a href="/{{ $comment->post->category->name }}/{{ $comment->post->id }}">
                            <b>{{ $comment->post->title }}</b>
                        </a>
                    </p>

                    <span>
                        Was written
                        <em>{{ $comment->created_at->diffForHumans() }}</em>
                    </span>

                    <span class="float-right">
                        <strong>Rating: {{ $comment->likesCount() }}</strong>
                    </span>
                </div>

                <hr>

                <p>{{ $comment->body }}</p>

                @if(Auth::user())
                    <div>
                        <a href="#" class="like">{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ? Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 1 ? 'You like this comment' : 'Like' : 'Like' }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ? Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 0 ? 'You don\'t like this comment' : 'Dislike' : 'Dislike' }}</a>
                    </div>
                @endif

                @if(Auth::user() == $comment->user)
                    <a href="">Edit</a>
                @endif
            </li>
        @endforeach

    </div>
@endsection