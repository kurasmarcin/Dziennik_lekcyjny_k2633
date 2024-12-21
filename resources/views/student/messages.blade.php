@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Twoje wiadomości</h1>

    @if ($messages->count() > 0)
        <ul class="space-y-4">
            @foreach ($messages as $message)
                <li class="bg-gray-100 p-4 rounded-lg shadow">
                    <p class="text-sm text-gray-600">Od: {{ $message->sender->name }}</p>
                    <p class="text-gray-800">{{ $message->content }}</p>
                    <p class="text-xs text-gray-500 mt-2">Wysłano: {{ $message->created_at->format('d-m-Y H:i') }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">Nie masz żadnych wiadomości.</p>
    @endif
</div>
@endsection
