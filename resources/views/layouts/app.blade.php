<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <title>@yield('title')</title>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body>

    @if (session('error'))
        <strong>{{ session('error') }}</strong>
    @endif

    @foreach ($errors->all() as $message)
        {
        <h3>{{ $message }}</h3>
        }
    @endforeach

    <main class="container">
        @yield('content')
    </main>

</body>

</html>
