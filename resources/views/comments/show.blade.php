<div class="comments">
    <ul class="list-group">

        @if(!Auth::user())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hello, stranger!</strong> Please, sign in to rate the comments.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @foreach($post->comments as $comment)

            @if($comment->post->category->id == 7 & $comment->is_approved == 0)

                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    Comment will be shown after moderation.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

            @else

                <li class="list-group-item mt-3" data-commentid="{{ $comment->id }}">
                    <div>
                        <span>
                            <strong>{{ $comment->user->name }}</strong>
                            wrote
                            <em>{{ $comment->created_at->diffForHumans() }}</em>
                        </span>
                        <span class="float-right">
                            <strong>Rating: {{ $comment->likesCount() }}</strong>
                        </span>
                    </div>

                    <hr>

                    <p>{{ $comment->body }}</p>

                    @if(Auth::user())
                        <div>
                            <a href="#" class="like">{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ? Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 1 ? 'You like this comment' : 'Like' : 'Like' }}</a> |
                            <a href="#" class="like">{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ? Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 0 ? 'You don\'t like this comment' : 'Dislike' : 'Dislike' }}</a>

                            @if(Auth::user() == $comment->user)
                                <a href="#"> | Edit</a>
                            @endif
                        </div>
                    @endif

                </li>

             @endif
        @endforeach
    </ul>
</div>

<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
</script>
