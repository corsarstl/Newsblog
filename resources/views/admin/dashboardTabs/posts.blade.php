<h3>Add Post</h3>

<form method="POST" action="{{ route('admin.add.post') }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="postTitle">Title:</label>

        <input type="text" id="postTitle" name="title" aria-describedby="titleHelp"
               placeholder="Enter the title" class="form-control">

        <small id="passwordHelpBlock" class="form-text text-muted">
            Must be min 20 characters long.
        </small>
    </div>

    <div class="form-group">
        <label for="postBody">Body:</label>

        <textarea class="form-control" id="postBody" name="body" rows="3"
                  placeholder="What is this post about?"></textarea>

        <small id="passwordHelpBlock" class="form-text text-muted">
            Must be min 1000 characters long.
        </small>
    </div>

    <div class="form-group">
        <label for="postImage">Add image <em>(max. 800Kb)</em>:</label>

        <input type="file" class="form-control-file" id="postImage" name="image_name">
    </div>

    <div class="form-group">
        <label for="postCategory">Select category:</label>

        <select class="form-control" id="postCategory" name="category_id">
            <option value="" selected disabled hidden>...</option>

            @foreach($categoriesForMenu as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="postTags">Select tags:</label>

        <select multiple class="form-control" id="postTags" name="tags[]">

            @foreach($tagsForDashboard as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach

        </select>

        <small id="passwordHelpBlock" class="form-text text-muted">
            Multiple tags can be selected.
        </small>

    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" checked="checked" name="is_analytic" value="1">
            Add post to Analytics section?
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add post</button>
    </div>

    @include('layouts.errors')

</form>