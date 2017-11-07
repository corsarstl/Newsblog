@extends('layouts.master')

@section('content')
    <div class="container card mt-3">
        <div class="card-body">

            <h3>{{ $post->title }}</h3>

            <img src="/images/{{ $post->image_id }}.jpg" class="img-fluid" alt="Responsive image">

            {{ $post->body }}

        </div>

    </div>
@endsection