<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="/">News Blog</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($categoriesForMenu as $category)
                        <a class="dropdown-item" href="/{{ $category->name }}">{{ $category->name }}</a>
                    @endforeach

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="/analytics">Analytics</a>
                </div>
            </li>

            <form class="form-inline my-2 my-lg-0" action="/search" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="type tag..." aria-label="Search" name="tag" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>



        @if (Auth::check())
            <p class="h5 text-white mx-auto">Welcome back, {{ Auth::user()->name }}!</p>

            <form class="form-inline">
                <a class="btn btn-outline-warning" href="/logout" role="button">Logout</a>
            </form>
        @endif


        @if (!Auth::check())
            <form class="form-inline">
                <a class="btn btn-outline-success" href="/login" role="button">Login</a>&nbsp;
                <a class="btn btn-outline-success" href="/register" role="button">Register</a>
            </form>
        @endif
    </div>
</nav>