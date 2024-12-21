<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Karta rejestracji -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <!-- Nagłówek -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Zarejestruj się w <span class="text-blue-500">Dzienniku Lekcyjnym</span>
            </h1>

            <!-- Formularz rejestracji -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Imię -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Imię i Nazwisko</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Hasło -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Hasło</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Potwierdzenie hasła -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potwierdź hasło</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Link do logowania i przycisk rejestracji -->
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline text-center">
                        Masz już konto? Zaloguj się
                    </a>

                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        Zarejestruj się
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
