<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Logo -->
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 3a3 3 0 00-3 3v8a3 3 0 003 3h10a3 3 0 003-3V6a3 3 0 00-3-3H5zm3 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm-1 5a1 1 0 112 0 1 1 0 01-2 0zm4 0a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Karta logowania -->
        <div class="w-full max-w-sm bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-extrabold text-center text-gray-800 mb-6">
                Zaloguj się do <span class="text-blue-500">Dziennika Lekcyjnego</span>
            </h1>

            <!-- Wyświetlanie statusu sesji -->
            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formularz logowania -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required autofocus autocomplete="username"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Hasło -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Hasło</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Zapamiętaj mnie -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="rounded border-gray-300 text-blue-500 shadow-sm focus:ring-blue-400">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Zapamiętaj mnie</label>
                </div>

                <!-- Przypomnienie hasła i przycisk logowania -->
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline text-center">
                        Nie pamiętasz hasła?
                    </a>

                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        Zaloguj się
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
