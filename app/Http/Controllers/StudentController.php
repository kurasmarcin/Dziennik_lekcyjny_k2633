<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Dashboard studenta
    public function dashboard()
    {
        return view('student.dashboard');
    }

    // Wyświetlanie wiadomości od nauczyciela
    public function messages()
    {
        $messages = Message::where('recipient_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('student.messages', compact('messages'));
    }

    // Wyświetlanie ocen
    public function grades()
    {
        $grades = Grade::where('student_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('student.grades', compact('grades'));
    }
}

