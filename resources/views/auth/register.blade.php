@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div id="heading">
        <h2>Register</h2>
    </div>

    <form action="{{ route('create-user') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div>
            <label for="name">
                Name : <input type="text" name="name" id="name" required>
            </label>
        </div>
        <div>
            <label for="email">
                Email : <input type="email" name="email" id="email" required>
            </label>
        </div>

        <div>
            <label for="contactno">
                Contact No : <input type="text" name="contactno" id="contactno" min="10" required>
            </label>
        </div>

        <div>
            <label for="avatar">
                Avatar : <input type="file" name="avatar" id="avatar" required>
            </label>
        </div>

        <div>
            <label for="password">
                Password : <input type="password" name="password" id="password" required>
            </label>
        </div>

        <div>
            <label for="password_confirmation">
                Password_Confirmation : <input type="password" name="password_confirmation" id="password_confirmation"
                    required>
            </label>
        </div>

        <div>
            <input type="submit" value="Register">
        </div>
    </form>
@endsection
