@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edytuj użytkownika</h1>

    <form method="POST" action="{{ route('admin.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!-- Imię -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Imię i Nazwisko</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <!-- Rola -->
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Rola</label>
            <select name="role_id" id="role_id" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Przycisk Zapisz -->
        <div class="mt-6">
            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow focus:outline-none focus:ring focus:ring-blue-300">
                Zapisz
            </button>
        </div>
    </form>
</div>
@endsection
