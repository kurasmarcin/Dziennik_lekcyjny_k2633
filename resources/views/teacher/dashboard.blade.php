@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Panel nauczyciela</h1>
    <p class="text-gray-600 text-center mb-6">Witaj w panelu nauczyciela!</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Zobacz listę uczniów -->
        <a href="{{ route('teacher.students') }}"
           class="block bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg shadow-md text-center">
            Zobacz listę uczniów
        </a>

        
    </div>
</div>
@endsection
