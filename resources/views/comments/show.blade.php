<div class="comments">
    <ul class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item mt-3" data-commentId="{{ $comment->id }}">
                <p>
                    <strong>{{ $comment->user->name }}</strong>
                    wrote
                    <em>{{ $comment->created_at->diffForHumans() }}</em>
                </p>

                <hr>

                <p>{{ $comment->body }}</p>

{{--                @if(Auth::user())--}}
                    <div>
                        {{--<a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true"></i>--}}
                            {{--{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ?--}}
                            {{--Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 1 ?--}}
                            {{--'You like this post' : 'Like' : 'Like' }}--}}
                        {{--</a>--}}
                        {{--<a href="#"><i class="fa fa-thumbs-down like" aria-hidden="true"></i>--}}
                            {{--{{ Auth::user()->likes()->where('comment_id', $comment->id)->first() ?--}}
                            {{--Auth::user()->likes()->where('comment_id', $comment->id)->first()->like == 0 ?--}}
                            {{--'You don\`t like this post' : 'Dislike' : 'Dislike' }}--}}
                        {{--</a>--}}

                        {{--<i class="fa fa-thumbs-up like" aria-hidden="true"></i>--}}
                        {{--<i class="fa fa-thumbs-down like" aria-hidden="true"></i>--}}

                        <a href="#" class="like">Like</a>
                        <a href="#" class="like">Dislike</a>
                    </div>
                {{--@endif--}}

                @if(Auth::user() == $comment->user)
                    <a href="">Edit</a>
                @endif
            </li>
        @endforeach
    </ul>
</div>

<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
</script>
<script src="/js/app.js"></script>