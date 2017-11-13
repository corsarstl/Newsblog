<div id="carouselExampleIndicators" class="carousel slide ml-3" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        @foreach($latest3Posts as $post)
            @if ($loop->first)
                <div class="carousel-item active">
            @else
                <div class="carousel-item">
            @endif
                <img class="d-block w-100" src="/images/posts/{{ $post->image_name }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <a href="/{{ $post->category->name }}">
                        <h2 class="text-danger">{{ $post->category->name }}</h2>
                    </a>
                    <a href="/{{ $post->category->name }}/{{ $post->id }}">
                        <h3 class="text-white">{{ $post->title }}</h3>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>