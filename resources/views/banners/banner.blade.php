@foreach($banners as $banner)
    @unless($loop->index == 4)
        <div class="card mt-3" style="width: 10rem;">
            <img class="card-img-top" src="/images/banners/{{ $banner->image_id }}.jpg" alt="Card image cap">
            <div class="card-body pl-1">
                <p>Product: {{ $banner->product_name }}</p>
                <p>Price: $ {{ $banner->price }}</p>
                <p>Site: <a href="http://example.com">{{ $banner->seller_site }}</a></p>
            </div>
        </div>
    @endunless
@endforeach
