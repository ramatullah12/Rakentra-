<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $data = $query->latest()->paginate(10);

        if (auth()->user()->role == 'admin') {
            return view('pelanggan.admin.index', compact('data'));
        } elseif (auth()->user()->role == 'pemimpin') {
            return view('pelanggan.pemimpin.index', compact('data'));
        }

        abort(403);
    }

    public function create()
    {
        return view('pelanggan.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'status' => 'aktif'
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    public function edit(Pelanggan $pelanggan)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        return view('pelanggan.admin.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diupdate');
    }

    public function destroy(Pelanggan $pelanggan)
    {
    }
}