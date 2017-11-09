<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($posts->latest3posts() as $post)
            @if ($loop->first)
                <div class="carousel-item active">
            @else
                <div class="carousel-item">
            @endif
                <img class="d-block w-100" src="/images/{{ $post->image_id }}.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="text-danger">{{ $post->category->name }}</h2>
                    <h3 class="text-white">{{ $post->title }}</h3>
                </div>
            </div>
        @endforeach
        {{--<div class="carousel-item">--}}
            {{--<img class="d-block w-100" src="/images/2.jpg" alt="Second slide">--}}
            {{--<div class="carousel-caption d-none d-md-block">--}}
                {{--<h2 class="text-danger">Category 2</h2>--}}
                {{--<h3 class="text-white">Post title 1</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="carousel-item">--}}
            {{--<img class="d-block w-100" src="/images/3.jpg" alt="Third slide">--}}
            {{--<div class="carousel-caption d-none d-md-block">--}}
                {{--<h2 class="text-danger">Category 3</h2>--}}
                {{--<h3 class="text-white">Post title 1</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
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