<div class="container col-sm-6 mt-3">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Top 5 commentators:</h4>

            <ol>
                @foreach($top5commentators as $user)
                    <li class="card-text">
                        <a href="/users/{{ $user->name }}">
                            {{ $user->name }}
                        </a>

                        ({{ $user->CommentCount }})
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>