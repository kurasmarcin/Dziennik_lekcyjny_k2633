<nav x-data="{ open: false }" class="bg-gray-800 text-white">
    <!-- Główna nawigacja -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Lewa część: Logo i linki -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center text-lg font-bold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 00-2.905 1.666m5.81 0A4 4 0 1012 4.354zm0 0c1.5 0 3.9.514 5 2.267a7.92 7.92 0 011.5 4.379v1.235c0 1.5-1.5 2.5-4 2.5s-4-1-4-2.5v-1.235c0-.604.096-1.188.27-1.735m3.73 3.735h0" />
                    </svg>
                    <span class="ml-2">Dziennik Lekcyjny</span>
                </a>

                <!-- Linki -->
                <div class="hidden sm:flex sm:space-x-4 ml-10">
                    <a href="{{ route('dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Profil
                    </a>
                </div>
            </div>

            <!-- Prawa część: Ustawienia i wylogowanie -->
            <div class="hidden sm:flex sm:items-center space-x-4">
                <!-- Wyświetlanie nazwy użytkownika -->
                <span class="text-gray-200">{{ Auth::user()->name }}</span>

                <!-- Wylogowanie -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Wyloguj się
                    </button>
                </form>
            </div>

            <!-- Hamburger dla urządzeń mobilnych -->
            <div class="flex sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu rozwijane dla urządzeń mobilnych -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                Dashboard
            </a>
            <a href="{{ route('profile.edit') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                Profil
            </a>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="text-base font-medium text-gray-300">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block text-left w-full text-gray-300 hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-base font-medium">
                        Wyloguj się
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
