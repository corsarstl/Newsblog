<div class="container col-sm-6 mt-3">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Top 3 hot posts:</h4>

            <ol>
                @foreach($top3posts as $post)
                    <li class="card-text">
                        <a href="/{{ $post->CategoryName }}/{{ $post->PostId }}">{{ $post->title }}</a> ({{ $post->CommentCount }})</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>