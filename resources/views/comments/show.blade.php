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

                <div>
                    <i class="fa fa-thumbs-up like" aria-hidden="true"></i>
                    <i class="fa fa-thumbs-down like" aria-hidden="true"></i>
                </div>

                @if(Auth::user() == $comment->user)
                    <a href="">Edit</a>
                @endif
            </li>
        @endforeach
    </ul>
</div>