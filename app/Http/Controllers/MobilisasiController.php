<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Mobilisasi;
use Illuminate\Http\Request;

class MobilisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Mobilisasi::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ]);

        if ($request->search) {

            $query->whereHas(
                'kontrak',
                function ($q) use ($request) {

                    $q->where(
                        'nomor_kontrak',
                        'like',
                        '%' . $request->search . '%'
                    );

                }
            );

        }

        if ($request->status) {

            $query->where(
                'status',
                $request->status
            );

        }

        $mobilisasis = $query->latest()->paginate(10);

        if (auth()->user()->role == 'pemimpin') {

            return view(
                'mobilisasi.pemimpin.index',
                compact('mobilisasis')
            );

        }

        return view(
            'mobilisasi.admin.index',
            compact('mobilisasis')
        );
    }

    public function create()
    {
        $kontraks = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])
        ->whereDoesntHave('mobilisasi')
        ->get();

        return view(
            'mobilisasi.admin.create',
            compact('kontraks')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'kontrak_id' => 'required',
            'tanggal_kirim' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'lokasi_proyek' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        Mobilisasi::create([
            'kontrak_id' => $request->kontrak_id,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_kembali' => $request->tanggal_kembali,
            'lokasi_proyek' => $request->lokasi_proyek,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('mobilisasi.index')
            ->with(
                'success',
                'Mobilisasi berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $mobilisasi = Mobilisasi::findOrFail($id);

        $kontraks = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])->get();

        return view(
            'mobilisasi.admin.edit',
            compact(
                'mobilisasi',
                'kontraks'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kontrak_id' => 'required',
            'tanggal_kirim' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'lokasi_proyek' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $mobilisasi = Mobilisasi::findOrFail($id);

        $mobilisasi->update([
            'kontrak_id' => $request->kontrak_id,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_kembali' => $request->tanggal_kembali,
            'lokasi_proyek' => $request->lokasi_proyek,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('mobilisasi.index')
            ->with(
                'success',
                'Mobilisasi berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $mobilisasi = Mobilisasi::findOrFail($id);

        $mobilisasi->delete();

        return redirect()
            ->route('mobilisasi.index')
            ->with(
                'success',
                'Mobilisasi berhasil dihapus'
            );
    }
}