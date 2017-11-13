<h3>Comments for approval</h3>

<hr>

<ul class="list-group">

    @foreach($commentsInPolitics as $post)
        <div class="container mt-3">

            @if($post->comments->count() > 0)

                <li class="list-group-item list-group-item-primary">
                    {{ $post->title }}
                </li>

                @foreach($post->comments as $comment)

                    <form method="POST" action="{{ route('admin.approve.comment') }}">

                        {{ method_field('PATCH') }}

                        {{ csrf_field() }}

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
                        </li>

                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" checked="checked" name="is_approved" value="1">
                                Approve this comment and make public?
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </div>
                    </form>


                @endforeach

            @endif

        </div>
    @endforeach

</ul>