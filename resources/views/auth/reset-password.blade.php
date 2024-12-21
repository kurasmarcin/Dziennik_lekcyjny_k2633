<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Karta resetowania hasła -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <!-- Nagłówek -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Zresetuj swoje <span class="text-blue-500">hasło</span>
            </h1>

            <!-- Formularz resetowania hasła -->
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token resetowania -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Adres email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nowe hasło -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Nowe hasło</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Potwierdzenie hasła -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potwierdź hasło</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-300 focus:border-blue-500" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Przyciski -->
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        {{ __('Zresetuj hasło') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
