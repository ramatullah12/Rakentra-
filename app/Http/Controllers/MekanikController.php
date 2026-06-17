<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    public function index()
    {
        $mekaniks = Mekanik::latest()
            ->paginate(10);

        if(auth()->user()->role == 'pemimpin'){

            return view(
                'mekanik.pemimpin.index',
                compact('mekaniks')
            );

        }

        return view(
            'mekanik.admin.index',
            compact('mekaniks')
        );
    }

    public function create()
    {
        return view('mekanik.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mekanik' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'spesialisasi' => 'required',
            'status' => 'required',
        ]);

        Mekanik::create([
            'nama_mekanik' => $request->nama_mekanik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'spesialisasi' => $request->spesialisasi,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('mekanik.index')
            ->with(
                'success',
                'Data mekanik berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $mekanik = Mekanik::findOrFail($id);

        return view(
            'mekanik.admin.edit',
            compact('mekanik')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mekanik' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'spesialisasi' => 'required',
            'status' => 'required',
        ]);

        $mekanik = Mekanik::findOrFail($id);

        $mekanik->update([
            'nama_mekanik' => $request->nama_mekanik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'spesialisasi' => $request->spesialisasi,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('mekanik.index')
            ->with(
                'success',
                'Data mekanik berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $mekanik = Mekanik::findOrFail($id);

        $mekanik->delete();

        return redirect()
            ->route('mekanik.index')
            ->with(
                'success',
                'Data mekanik berhasil dihapus'
            );
    }
}