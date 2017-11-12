@extends('admin.master')

@section('content')
    <div class="col-sm-8">

        <h2>Login</h2>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            @include('layouts.errors')

        </form>

        <img src="/images/for_admin_login.png" alt="for admins only" class="img-thumbnail img-fluid">

    </div>

@endsection