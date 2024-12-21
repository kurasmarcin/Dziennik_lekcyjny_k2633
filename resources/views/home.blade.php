<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strona Główna</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Logo -->
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 3a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3V6a3 3 0 00-3-3H5zm3 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm-1 5a1 1 0 112 0 1 1 0 01-2 0zm4 0a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Nagłówek -->
        <h1 class="text-4xl font-extrabold text-gray-800">
            Witamy w <span class="text-blue-500">Dzienniku Lekcyjnym</span>
        </h1>
        <p class="mt-4 text-lg text-gray-600">
            Zarządzaj szkołą, klasami i uczniami w prosty sposób.
        </p>

        <!-- Przyciski -->
        <div class="mt-8 flex space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                Zaloguj się
            </a>
            <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-blue-500 font-medium rounded-lg shadow-md border border-blue-500 hover:bg-blue-100 focus:outline-none focus:ring focus:ring-blue-300">
                Zarejestruj się
            </a>
        </div>
    </div>
</body>
</html>
