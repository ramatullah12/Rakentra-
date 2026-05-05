<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();

        if (auth()->user()->role == 'pemimpin') {
            return view('user.pemimpin.index', compact('data'));
        }

        abort(403);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mekanik',
            'status' => 'aktif'
        ]);

        return redirect()->route('login')->with('success','Akun berhasil dibuat');
    }

    public function edit(User $user)
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        return view('user.pemimpin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role != 'pemimpin') {
            abort(403);
        }

        $request->validate([
            'role' => 'required|in:admin,mekanik',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $user->update([
            'role' => $request->role,
            'status' => $request->status
        ]);

        return redirect()->route('user.index')->with('success','Akses berhasil diupdate');
    }
}