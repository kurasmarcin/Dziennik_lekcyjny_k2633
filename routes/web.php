<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});

require __DIR__.'/auth.php';
