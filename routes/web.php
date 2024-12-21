<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard z dynamicznym przekierowaniem dla różnych ról
Route::get('/dashboard', function () {
    $role = Auth::user()->role->name;

    if ($role === 'student') {
        return redirect('/student/dashboard');
    } elseif ($role === 'parent') {
        return redirect('/parent/dashboard');
    } elseif ($role === 'admin') {
        return redirect('/admin/dashboard');
    }elseif ($role === 'teacher') {
        return redirect('/teacher/dashboard');
    }

    return abort(403, 'Nie masz dostępu.');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupa tras dla użytkowników
Route::middleware('auth')->group(function () {
    // Trasy dla profilu użytkownika
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Panel ucznia
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->middleware('role:student');

    // Panel rodzica
    Route::get('/parent/dashboard', function () {
        return view('parent.dashboard');
    })->middleware('role:parent');

    // Panel administratora
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin');

    // Panel nauczyciela
    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    })->middleware('role:teacher');
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('home');
})->name('home');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index.alias');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create'); // Formularz dodawania
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store'); // Zapis nowego użytkownika
    Route::get('/admin/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit'); // Formularz edycji
    Route::put('/admin/{user}', [AdminController::class, 'update'])->name('admin.update'); // Aktualizacja użytkownika
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy'); // Usunięcie użytkownika
});
    Route::middleware(['auth', 'role:teacher'])->group(function () {
        Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::get('/teacher/students', [TeacherController::class, 'students'])->name('teacher.students');
        Route::post('/teacher/add-grade', [TeacherController::class, 'addGrade'])->name('teacher.addGrade');
        Route::post('/teacher/send-message', [TeacherController::class, 'sendMessage'])->name('teacher.sendMessage');
});
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/messages', [StudentController::class, 'messages'])->name('student.messages');
    Route::get('/student/grades', [StudentController::class, 'grades'])->name('student.grades');
});


require __DIR__.'/auth.php';
