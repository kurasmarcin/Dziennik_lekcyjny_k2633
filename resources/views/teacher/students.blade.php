@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Lista uczniów</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imię i Nazwisko</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email ucznia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Oceny</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcje</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($student->grades->count() > 0)
                                @foreach ($student->grades as $grade)
                                    <div class="flex items-center space-x-2">
                                        <span class="inline-block bg-gray-100 text-gray-800 text-sm px-2 py-1 rounded-full">
                                            {{ $grade->grade }} ({{ $grade->comment ?? 'Brak komentarza' }})
                                        </span>
                                        <button onclick="openEditGradeModal('{{ $grade->id }}', '{{ $grade->grade }}', '{{ $grade->comment }}')"
                                                class="text-yellow-500 hover:text-yellow-700">
                                            Edytuj
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                <span class="text-gray-500">Brak ocen</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4">
                            <!-- Dodaj ocenę -->
                            <button onclick="openGradeModal('{{ $student->id }}')"
                                    class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                Dodaj ocenę
                            </button>
                            <!-- Wyślij wiadomość -->
                            <button onclick="openMessageModal('{{ $student->id }}')"
                                    class="text-green-600 hover:text-green-900 focus:outline-none">
                                Wyślij wiadomość
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal do Dodawania Ocen -->
<div id="gradeModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h2 class="text-xl font-medium text-gray-800 mb-4">Dodaj ocenę</h2>
        <form id="gradeForm" method="POST" action="{{ route('teacher.addGrade') }}">
            @csrf
            <input type="hidden" name="student_id" id="gradeStudentId">

            <!-- Ocena -->
            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium text-gray-700">Ocena</label>
                <input type="number" name="grade" id="grade" min="1" max="6" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <!-- Komentarz -->
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700">Komentarz</label>
                <textarea name="comment" id="comment" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeGradeModal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                    Anuluj
                </button>
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                    Zapisz
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal do Edycji Ocen -->
<div id="editGradeModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h2 class="text-xl font-medium text-gray-800 mb-4">Edytuj ocenę</h2>
        <form id="editGradeForm" method="POST" action="{{ route('teacher.updateGrade') }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="grade_id" id="editGradeId">

            <!-- Ocena -->
            <div class="mb-4">
                <label for="editGrade" class="block text-sm font-medium text-gray-700">Ocena</label>
                <input type="number" name="grade" id="editGrade" min="1" max="6" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <!-- Komentarz -->
            <div class="mb-4">
                <label for="editComment" class="block text-sm font-medium text-gray-700">Komentarz</label>
                <textarea name="comment" id="editComment" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeEditGradeModal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                    Anuluj
                </button>
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                    Zapisz
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal do Wysyłania Wiadomości -->
<div id="messageModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h2 class="text-xl font-medium text-gray-800 mb-4">Wyślij wiadomość</h2>
        <form id="messageForm" method="POST" action="{{ route('teacher.sendMessage') }}">
            @csrf
            <input type="hidden" name="recipient_id" id="messageRecipientId">

            <!-- Treść wiadomości -->
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Treść wiadomości</label>
                <textarea name="message" id="message" rows="4" required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeMessageModal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                    Anuluj
                </button>
                <button type="submit"
                        class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md">
                    Wyślij
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openGradeModal(studentId) {
        document.getElementById('gradeStudentId').value = studentId;
        document.getElementById('gradeModal').classList.remove('hidden');
    }

    function closeGradeModal() {
        document.getElementById('gradeModal').classList.add('hidden');
    }

    function openEditGradeModal(gradeId, grade, comment) {
        document.getElementById('editGradeId').value = gradeId;
        document.getElementById('editGrade').value = grade;
        document.getElementById('editComment').value = comment;
        document.getElementById('editGradeModal').classList.remove('hidden');
    }

    function closeEditGradeModal() {
        document.getElementById('editGradeModal').classList.add('hidden');
    }

    function openMessageModal(studentId) {
        document.getElementById('messageRecipientId').value = studentId;
        document.getElementById('messageModal').classList.remove('hidden');
    }

    function closeMessageModal() {
        document.getElementById('messageModal').classList.add('hidden');
    }
</script>
@endsection
