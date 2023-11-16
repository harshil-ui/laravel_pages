@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h2>Login</h2>

    <form action="{{ route('post-login') }}" method="post">
        @csrf

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required>

        <br><br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required> <br><br>

        <input type="submit" value="Login">

    </form>

    <div>
        <h4>Don't have Account <a href="{{ route('register') }}">Create here</a></h4>
    </div>

@endsection
