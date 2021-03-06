<h4>List of tags:</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tag Name</th>
    </tr>
    </thead>
    <tbody>
        @foreach($tagsForDashboard as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->name }}</td>
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