@extends('admin.master')

@section('content')

    @if ($flash = session('message'))
        <div id="flash-message" class="alert alert-success" role="alert">
            {{ $flash }}
        </div>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="home" aria-selected="true">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tags-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="profile" aria-selected="false">Tags</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="contact" aria-selected="false">Posts</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" id="politics-tab" data-toggle="tab" href="#politics" role="tab" aria-controls="contact" aria-selected="false">Politics</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" id="banners-tab" data-toggle="tab" href="#banners" role="tab" aria-controls="contact" aria-selected="false">Banners</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            @include('admin.dashboardTabs.categories')
        </div>

        <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
            @include('admin.dashboardTabs.tags')
        </div>

        <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
            @include('admin.dashboardTabs.posts')
        </div>

        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">...</div>

        <div class="tab-pane fade" id="politics" role="tabpanel" aria-labelledby="politics-tab">...</div>

        <div class="tab-pane fade" id="banners" role="tabpanel" aria-labelledby="banners-tab">
            @include('admin.dashboardTabs.banners')
        </div>
    </div>

@endsection