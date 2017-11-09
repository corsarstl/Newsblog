<div class="container col-sm-6">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Top 3 hot posts:</h4>

            <ol>
                @foreach($posts->top3posts() as $post)
                    <li class="card-text">{{ $post->title }} ({{ $post->comments->count() }})</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>