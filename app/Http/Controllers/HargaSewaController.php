<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\HargaSewa;
use Illuminate\Http\Request;

class HargaSewaController extends Controller
{
    public function index()
    {
        $hargaSewas = HargaSewa::with('alat')
            ->latest()
            ->paginate(10);

        if(auth()->user()->role == 'pemimpin'){

            return view(
                'harga-sewa.pemimpin.index',
                compact('hargaSewas')
            );

        }

        return view(
            'harga-sewa.admin.index',
            compact('hargaSewas')
        );
    }

    public function create()
    {
        $alats = Alat::all();

        return view(
            'harga-sewa.admin.create',
            compact('alats')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required',
            'harga_harian' => 'required',
        ]);

        HargaSewa::create([
            'alat_id' => $request->alat_id,
            'harga_harian' => $request->harga_harian,
            'harga_mingguan' => $request->harga_mingguan,
            'harga_bulanan' => $request->harga_bulanan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('harga-sewa.index')
            ->with(
                'success',
                'Harga sewa berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $hargaSewa = HargaSewa::findOrFail($id);

        $alats = Alat::all();

        return view(
            'harga-sewa.admin.edit',
            compact(
                'hargaSewa',
                'alats'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $hargaSewa = HargaSewa::findOrFail($id);

        $hargaSewa->update([
            'alat_id' => $request->alat_id,
            'harga_harian' => $request->harga_harian,
            'harga_mingguan' => $request->harga_mingguan,
            'harga_bulanan' => $request->harga_bulanan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('harga-sewa.index')
            ->with(
                'success',
                'Harga sewa berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $hargaSewa = HargaSewa::findOrFail($id);

        $hargaSewa->delete();

        return redirect()
            ->route('harga-sewa.index')
            ->with(
                'success',
                'Harga sewa berhasil dihapus'
            );
    }
}