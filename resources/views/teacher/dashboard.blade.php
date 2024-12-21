@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Panel Nauczyciela</h1>
    <div class="flex flex-col space-y-4">
        <!-- Przycisk Lista Uczniów -->
        <a href="{{ route('teacher.students') }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow">
            Zarządzaj uczniami
        </a>

        <!-- Przycisk Wysłane Wiadomości -->
        <a href="{{ route('teacher.messages') }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow">
            Wysłane wiadomości
        </a>
    </div>
</div>
@endsection
