<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Karta potwierdzenia hasła -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <!-- Nagłówek -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Potwierdź swoje <span class="text-blue-500">hasło</span>
            </h1>

            <!-- Informacja -->
            <p class="mb-4 text-sm text-gray-600 text-center">
                {{ __('To jest bezpieczna część aplikacji. Prosimy o potwierdzenie hasła przed kontynuowaniem.') }}
            </p>

            <!-- Formularz potwierdzenia hasła -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Hasło -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Hasło</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Przycisk potwierdzenia -->
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        {{ __('Potwierdź') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
