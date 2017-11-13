<h4>List of banners:</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Seller Site</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
        @foreach($bannersForDashboard as $banner)
            <tr>
                <th scope="row">{{ $banner->id }}</th>
                <td>{{ $banner->product_name }}</td>
                <td>$ {{ $banner->price }}</td>
                <td>{{ $banner->seller_site }}</td>
                <td><img src="/images/banners/{{ $banner->image_name }}" alt="image_name"></td>
            </tr>
        @endforeach
    </tbody>
</table>

<hr>

<h3>Add Banner</h3>

<form method="POST" action="{{ route('admin.add.banner') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="productName">Product name:</label>
        <input type="text" id="productName" name="product_name" aria-describedby="titleHelp"
               placeholder="Enter the name" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" aria-describedby="titleHelp"
               placeholder="Enter the price" class="form-control">
    </div>

    <div class="form-group">
        <label for="sellerSite">Seller site:</label>
        <input type="text" id="sellerSite" name="seller_site" aria-describedby="titleHelp"
               placeholder="Enter the site" class="form-control">
    </div>


    <div class="form-group">
        <label for="bannerImage">Add image:</label>
        <input type="file" class="form-control-file" id="bannerImage" name="image_name">
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add banner</button>
    </div>

    @include('layouts.errors')

</form>