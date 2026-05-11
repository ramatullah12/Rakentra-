<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $query = Alat::query();

        if ($request->search) {

            $query->where('nama_alat', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_alat', 'like', '%' . $request->search . '%');

        }

        if ($request->status) {

            $query->where('status', $request->status);

        }

        $alats = $query->latest()->paginate(10);

        return view(
            'alat.admin.admin',
            compact('alats')
        );
    }

    public function create()
    {
        return view('alat.admin.create');
    }

    public function edit($id)
    {
        $alat = Alat::findOrFail($id);

        return view(
            'alat.admin.edit',
            compact('alat')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alat'     => 'required|string|max:255',
            'kode_alat'     => 'required|string|max:100|unique:alats,kode_alat',
            'lokasi'        => 'required|string|max:255',
            'hour_meter'    => 'required|numeric|min:0',
            'status'        => 'required|in:tersedia,disewa,maintenance',
        ]);

        Alat::create($validated);

        return redirect()
            ->route('alat.index')
            ->with(
                'success',
                'Data alat berhasil ditambahkan'
            );
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);

        $validated = $request->validate([
            'nama_alat'     => 'required|string|max:255',
            'kode_alat'     => 'required|string|max:100|unique:alats,kode_alat,' . $alat->id,
            'lokasi'        => 'required|string|max:255',
            'hour_meter'    => 'required|numeric|min:0',
            'status'        => 'required|in:tersedia,disewa,maintenance',
        ]);

        $alat->update($validated);

        return redirect()
            ->route('alat.index')
            ->with(
                'success',
                'Data alat berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $alat = Alat::findOrFail($id);

        $alat->delete();

        return redirect()
            ->route('alat.index')
            ->with(
                'success',
                'Data alat berhasil dihapus'
            );
    }

    public function mekanik(Request $request)
    {
        $query = Alat::query();

        if ($request->search) {

            $query->where('nama_alat', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_alat', 'like', '%' . $request->search . '%');

        }

        $alats = $query->latest()->paginate(10);

        return view(
            'alat.mekanik.mekanik',
            compact('alats')
        );
    }

    public function pemimpin(Request $request)
    {
        $query = Alat::query();

        if ($request->search) {

            $query->where('nama_alat', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_alat', 'like', '%' . $request->search . '%');

        }

        if ($request->status) {

            $query->where('status', $request->status);

        }

        $alats = $query->latest()->paginate(10);

        return view(
            'alat.pemimpin.pemimpin',
            compact('alats')
        );
    }
}