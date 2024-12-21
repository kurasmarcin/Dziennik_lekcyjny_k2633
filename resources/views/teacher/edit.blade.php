@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edytuj ocenę</h1>
    <form method="POST" action="{{ route('teacher.grades.update', $grade->id) }}">
        @csrf
        @method('PUT')

        <!-- Dane ucznia -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Uczeń</label>
            <div class="mt-1 p-2 bg-gray-100 rounded-md">
                {{ $grade->student->name }}
            </div>
        </div>

        <!-- Ocena -->
        <div class="mb-4">
            <label for="grade" class="block text-sm font-medium text-gray-700">Ocena</label>
            <input type="number" id="grade" name="grade" value="{{ $grade->grade }}" required min="1" max="6"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <!-- Komentarz -->
        <div class="mb-4">
            <label for="comment" class="block text-sm font-medium text-gray-700">Komentarz</label>
            <textarea id="comment" name="comment" rows="3"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ $grade->comment }}</textarea>
        </div>

        <!-- Przyciski -->
        <div class="flex justify-between items-center">
            <!-- Anuluj -->
            <a href="{{ route('teacher.students') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                Anuluj
            </a>
       
            <!-- Zapisz -->
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Zapisz
            </button>
        </div>
    </form>
</div>
@endsection
