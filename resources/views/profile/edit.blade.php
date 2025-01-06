@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edytuj profil</h1>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formularz zmiany danych użytkownika -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <!-- Imię -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Imię i Nazwisko</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div class="flex justify-end space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Zapisz
            </button>
        </div>
    </form>

    <hr class="my-6">

    <!-- Formularz zmiany hasła -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Zmień hasło</h2>

    @if (session('password_success'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('password_success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf
        @method('PATCH')

        <!-- Bieżące hasło -->
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">Bieżące hasło</label>
            <input type="password" name="current_password" id="current_password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('current_password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nowe hasło -->
        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-700">Nowe hasło</label>
            <input type="password" name="new_password" id="new_password" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('new_password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Potwierdzenie nowego hasła -->
        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Potwierdź nowe hasło</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div class="flex justify-end space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Zmień hasło
            </button>
        </div>
    </form>
</div>
@endsection
