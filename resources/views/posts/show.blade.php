@extends('layouts.master')

@section('content')
    <div class="container card mt-3">
        <div class="card-body">

            <h1>{{ $post->title }}</h1>

            <img src="/images/{{ $post->image_id }}.jpg" class="img-fluid" alt="Responsive image">

            {{ $post->body }}

        </div>

    </div>
@endsection