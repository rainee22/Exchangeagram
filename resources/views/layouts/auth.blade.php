<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <main>
            <div class="flex h-screen items-center justify-center">
                <div class="w-full max-w-[360px]">
                    <div class="border border-gray-300 bg-white py-6 px-10">
                        <div class="flex items-center justify-center py-6">
                            <img class="h-10 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}"
                                alt="Exchangeagram">
                        </div>

                        {{ $slot }}
                    </div>

                    {{ $footer }}
                </div>
            </div>
        </main>
    </div>
</body>

</html>
