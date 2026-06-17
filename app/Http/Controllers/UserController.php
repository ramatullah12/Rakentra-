<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        $data = User::where('role', '!=', 'pemimpin')->latest()->get();

        return view('user.pemimpin.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mekanik'
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
    }

    public function edit(User $user)
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        if ($user->role == 'pemimpin') {
            abort(403);
        }

        return view('user.pemimpin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        if ($user->role == 'pemimpin') {
            abort(403);
        }

        $request->validate([
            'role' => 'required|in:admin,mekanik'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()->route('user.index')->with('success', 'Role berhasil diupdate');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        if ($user->role == 'pemimpin') {
            abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}