@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Witaj w panelu administratora!</p>
                    <div class="mt-6 flex flex-wrap">
                        <!-- Zarządzanie użytkownikami -->
                        <a href="{{ route('admin.index') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                            Zarządzaj użytkownikami
                        </a>

                        

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
