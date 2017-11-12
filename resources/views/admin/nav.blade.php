<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="/">News Blog</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        @if (Auth::check())
            <p class="h5 text-white mx-auto">Welcome back, Master!</p>

            <form class="form-inline">
                <a class="btn btn-outline-warning" href="{{ route('admin.logout') }}" role="button">Logout</a>
            </form>
        @endif

    </div>
</nav>