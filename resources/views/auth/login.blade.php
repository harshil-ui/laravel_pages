<h2>Login</h2>

<form action="{{ route('post-login') }}" method="post">
    @csrf

    <label for="email">Email : </label>
    <input type="email" name="email" id="email">

    <br><br>

    <label for="password">Password :</label>
    <input type="password" name="password" id="password"> <br><br>

    <input type="submit" value="Login">
</form>
