<?php

namespace App\Http\Controllers;

use App\Models\Mobilisasi;
use App\Models\Operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    public function index(Request $request)
    {
        $query = Operasional::with([
            'mobilisasi.kontrak.booking.pelanggan',
            'mobilisasi.kontrak.booking.alat'
        ]);

        if ($request->search) {

            $query->whereHas(
                'mobilisasi.kontrak',
                function ($q) use ($request) {

                    $q->where(
                        'nomor_kontrak',
                        'like',
                        '%' . $request->search . '%'
                    );

                }
            );

        }

        $operasionals = $query
            ->latest()
            ->paginate(10);

        if (auth()->user()->role == 'pemimpin') {

            return view(
                'operasional.pemimpin.index',
                compact('operasionals')
            );

        }

        if (auth()->user()->role == 'mekanik') {

            return view(
                'operasional.mekanik.index',
                compact('operasionals')
            );

        }

        return view(
            'operasional.admin.index',
            compact('operasionals')
        );
    }

    public function create()
    {
        $mobilisasis = Mobilisasi::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ])->get();

        return view(
            'operasional.admin.create',
            compact('mobilisasis')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobilisasi_id' => 'required',
            'tanggal' => 'required',
            'hour_meter' => 'required',
            'lokasi' => 'required',
            'jam_operasional' => 'required',
            'penggunaan_alat' => 'required',
            'biaya_operasional' => 'required',
            'status_unit' => 'required',
        ]);

        Operasional::create([
            'mobilisasi_id' => $request->mobilisasi_id,
            'tanggal' => $request->tanggal,
            'hour_meter' => $request->hour_meter,
            'lokasi' => $request->lokasi,
            'jam_operasional' => $request->jam_operasional,
            'penggunaan_alat' => $request->penggunaan_alat,
            'biaya_operasional' => $request->biaya_operasional,
            'status_unit' => $request->status_unit,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('operasional.index')
            ->with(
                'success',
                'Data operasional berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $operasional = Operasional::findOrFail($id);

        $mobilisasis = Mobilisasi::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ])->get();

        return view(
            'operasional.admin.edit',
            compact(
                'operasional',
                'mobilisasis'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $operasional = Operasional::findOrFail($id);

        if (auth()->user()->role == 'mekanik') {

            $request->validate([
                'hour_meter' => 'required',
                'lokasi' => 'required',
            ]);

            $operasional->update([
                'hour_meter' => $request->hour_meter,
                'lokasi' => $request->lokasi,
            ]);

            return redirect()
                ->route('operasional.mekanik')
                ->with(
                    'success',
                    'HM dan lokasi berhasil diupdate'
                );

        }

        $request->validate([
            'mobilisasi_id' => 'required',
            'tanggal' => 'required',
            'hour_meter' => 'required',
            'lokasi' => 'required',
            'jam_operasional' => 'required',
            'penggunaan_alat' => 'required',
            'biaya_operasional' => 'required',
            'status_unit' => 'required',
        ]);

        $operasional->update([
            'mobilisasi_id' => $request->mobilisasi_id,
            'tanggal' => $request->tanggal,
            'hour_meter' => $request->hour_meter,
            'lokasi' => $request->lokasi,
            'jam_operasional' => $request->jam_operasional,
            'penggunaan_alat' => $request->penggunaan_alat,
            'biaya_operasional' => $request->biaya_operasional,
            'status_unit' => $request->status_unit,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('operasional.index')
            ->with(
                'success',
                'Data operasional berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $operasional = Operasional::findOrFail($id);

        $operasional->delete();

        return redirect()
            ->route('operasional.index')
            ->with(
                'success',
                'Data operasional berhasil dihapus'
            );
    }
}