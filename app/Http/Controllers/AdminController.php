<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Message;

class AdminController extends Controller
{
    /**
     * Wyświetla listę użytkowników.
     */
    public function index()
    {
        $users = User::with('role')->get(); // Pobiera użytkowników wraz z ich rolami
        return view('admin.index', compact('users')); // Renderuje widok listy
    }
    


    /**
     * Wyświetla formularz tworzenia użytkownika.
     */
    public function create()
    {
        $roles = Role::all(); // Pobierz wszystkie role
        return view('admin.create', compact('roles'));
    }

    /**
     * Dodaje nowego użytkownika.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Użytkownik został dodany.');
    }

    /**
     * Wyświetla formularz edycji użytkownika.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // Pobierz wszystkie role
        return view('admin.edit', compact('user', 'roles'));
    }

    /**
     * Aktualizuje dane użytkownika.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }

    /**
     * Usuwa użytkownika.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Użytkownik został usunięty.');
    }
    public function showUserDetails($id)
{
    $user = User::with('grades.teacher')->findOrFail($id);

    // Pobierz wiadomości, w których użytkownik jest nadawcą lub odbiorcą
    $messages = Message::where('sender_id', $id)
                        ->orWhere('recipient_id', $id)
                        ->with(['sender', 'recipient'])
                        ->get();

    return view('admin.user-details', compact('user', 'messages'));
}

}
