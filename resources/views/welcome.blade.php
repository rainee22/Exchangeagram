<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen items-center justify-center bg-white">
    <div>
        <h1 class="text-2xl font-medium text-gray-500">Exchange-a-gram</h1>

        <div class="mt-2 flex space-x-2 justify-center">
            <a class="text-sm text-blue-500" href="{{ route('login') }}">Login</a>
            <a class="text-sm text-blue-500" href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>

</html>
