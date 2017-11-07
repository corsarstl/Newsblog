@extends('layouts.master')

@section('content')
    <div class="container card mt-3">
        <div class="card-body">

            <h3>{{ $post->title }}</h3>

            <img src="/images/{{ $post->image_id }}.jpg" class="img-fluid" alt="Responsive image">

            {{ $post->body }}

            <hr>

            <div class="comments">
                <ul class="list-group">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            <strong>
                                {{ $comment->created_at->diffForHumans() }}: &nbsp;
                            </strong>

                            {{ $comment->body }}
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection