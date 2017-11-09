<div class="container col-sm-6">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Top 5 commentators:</h4>

            <ol>
                @foreach($users as $user)
                    <li class="card-text">{{ $user->name }} ({{ $user->comments->count() }})</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>