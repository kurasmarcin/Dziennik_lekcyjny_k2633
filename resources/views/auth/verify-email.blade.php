<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-gray-100">
        <!-- Karta weryfikacji -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
            <!-- Nagłówek -->
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Zweryfikuj swój <span class="text-blue-500">adres email</span>
            </h1>

            <!-- Informacja -->
            <p class="mb-4 text-sm text-gray-600 text-center">
                {{ __('Dziękujemy za rejestrację! Przed rozpoczęciem, prosimy o zweryfikowanie adresu email poprzez kliknięcie w link, który został wysłany. Jeśli nie otrzymałeś wiadomości, możemy wysłać ją ponownie.') }}
            </p>

            <!-- Komunikat o wysłaniu linku -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ __('Nowy link weryfikacyjny został wysłany na podany adres email.') }}
                </div>
            @endif

            <!-- Formularze -->
            <div class="mt-6 flex flex-col space-y-4">
                <!-- Resend Verification Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        {{ __('Wyślij ponownie link weryfikacyjny') }}
                    </button>
                </form>

                <!-- Log Out -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-gray-500 text-white font-bold rounded-lg shadow-md hover:bg-gray-600 focus:ring focus:ring-gray-300">
                        {{ __('Wyloguj się') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
