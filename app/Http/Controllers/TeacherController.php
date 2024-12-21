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
}
