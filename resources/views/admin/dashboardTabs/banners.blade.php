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
            <td>{{ $banner->image_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<form method="POST" action="{{ route('admin.add.tag') }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Tag name:</label>
        <input type="text" id="name" name="name" aria-describedby="titleHelp"
               placeholder="Enter the tag" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add tag</button>
    </div>

    @include('layouts.errors')

</form>