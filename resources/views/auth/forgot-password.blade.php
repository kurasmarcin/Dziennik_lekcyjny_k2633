<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Karta resetowania hasła -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <!-- Nagłówek -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Resetuj hasło w <span class="text-blue-500">Dzienniku Lekcyjnym</span>
            </h1>

            <!-- Informacja -->
            <p class="mb-4 text-sm text-gray-600 text-center">
                {{ __('Nie pamiętasz hasła? Wprowadź swój adres email, a wyślemy Ci link do zresetowania hasła.') }}
            </p>

            <!-- Wyświetlanie statusu sesji -->
            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formularz resetowania hasła -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Adres email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Przyciski -->
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        {{ __('Wyślij link resetujący hasło') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
