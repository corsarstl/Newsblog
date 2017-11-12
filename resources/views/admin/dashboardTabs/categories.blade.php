<h4>List of categories:</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
    </tr>
    </thead>
    <tbody>
        @foreach($categoriesForMenu as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<form method="POST" action="{{ route('admin.add.category') }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Category name:</label>
        <input type="text" id="name" name="name" aria-describedby="titleHelp"
               placeholder="Enter the name" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add category</button>
    </div>

    @include('layouts.errors')

</form>