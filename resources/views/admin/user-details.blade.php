@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Szczegóły użytkownika: {{ $user->name }}</h1>

    <!-- Oceny -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Oceny</h2>
        @if ($user->grades->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nauczyciel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ocena</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentarz</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($user->grades as $grade)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $grade->teacher->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $grade->grade }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $grade->comment ?? 'Brak komentarza' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Brak ocen.</p>
        @endif
    </div>

    <!-- Wiadomości -->
    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Wiadomości</h2>
        @if ($messages->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Od</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Do</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Treść</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($messages as $message)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $message->sender->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $message->recipient->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $message->content }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Brak wiadomości.</p>
        @endif
    </div>
</div>
@endsection
