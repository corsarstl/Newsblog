<div class="comments">
    <ul class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item mt-3">
                <p>
                    <strong>{{ $comment->user->name }}</strong>
                    wrote
                    <em>{{ $comment->created_at->diffForHumans() }}</em>
                </p>

                <hr>

                <p>{{ $comment->body }}</p>
            </li>
        @endforeach
    </ul>
</div>