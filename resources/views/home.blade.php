<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Strona Główna</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        <div class="min-h-screen flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">
                    Witamy w Dzienniku Lekcyjnym
                </h1>
                <p class="mt-4 text-lg text-gray-600">
                    Zarządzaj szkołą, klasami i uczniami w prosty sposób.
                </p>
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-gray font-semibold rounded-lg shadow-md hover:bg-blue-700">
                        Zaloguj się
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-500 text-gray font-semibold rounded-lg shadow-md hover:bg-blue-700">
                        Zarejestruj się
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
