<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use App\Models\Message;

class TeacherController extends Controller
{
    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function students()
{
    $students = User::whereHas('role', function ($query) {
        $query->where('name', 'student');
    })->get();

    return view('teacher.students', compact('students'));
}

    
public function addGrade(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:users,id',
        'grade' => 'required|integer|min:1|max:6',
        'comment' => 'nullable|string',
    ]);

    Grade::create([
        'student_id' => $request->student_id,
        'teacher_id' => auth()->id(),
        'grade' => $request->grade,
        'comment' => $request->comment,
    ]);

    return redirect()->route('teacher.students')->with('success', 'Ocena została dodana.');
}
public function editGrade(Grade $grade)
{
    // Tylko nauczyciel, który dodał ocenę, może ją edytować
    if ($grade->teacher_id !== auth()->id()) {
        abort(403, 'Nie masz dostępu do edycji tej oceny.');
    }

    return view('teacher.grades.edit', compact('grade'));
}

public function updateGrade(Request $request)
{
    $request->validate([
        'grade_id' => 'required|exists:grades,id',
        'grade' => 'required|integer|min:1|max:6',
        'comment' => 'nullable|string',
    ]);

    $grade = Grade::findOrFail($request->grade_id);
    $grade->update([
        'grade' => $request->grade,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Ocena została zaktualizowana.');
}

public function sendMessage(Request $request)
{
    $request->validate([
        'recipient_id' => 'required|exists:users,id',
        'message' => 'required|string',
    ]);

    Message::create([
        'sender_id' => auth()->id(),
        'recipient_id' => $request->recipient_id,
        'content' => $request->message,
    ]);

    return redirect()->route('teacher.students')->with('success', 'Wiadomość została wysłana.');
}
public function sentMessages()
{
    $messages = Message::where('sender_id', auth()->id())
                       ->with('recipient') // Ładowanie relacji odbiorcy
                       ->latest() // Sortowanie od najnowszych
                       ->get();

    return view('teacher.messages', compact('messages'));
}


}
