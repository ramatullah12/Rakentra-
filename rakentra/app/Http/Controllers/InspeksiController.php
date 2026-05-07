<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Inspeksi;
use App\Models\Operasional;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class InspeksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Inspeksi::with([
            'alat',
            'operasional'
        ]);

        if ($request->search) {

            $query->whereHas('alat', function ($q) use ($request) {

                $q->where(
                    'nama_alat',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        $inspeksis = $query
            ->latest()
            ->paginate(10);

        return view(
            'inspeksi.admin.index',
            compact('inspeksis')
        );
    }

    public function mekanik(Request $request)
    {
        $query = Inspeksi::with([
            'alat',
            'operasional'
        ]);

        if ($request->search) {

            $query->whereHas('alat', function ($q) use ($request) {

                $q->where(
                    'nama_alat',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        $inspeksis = $query
            ->latest()
            ->paginate(10);

        return view(
            'inspeksi.mekanik.index',
            compact('inspeksis')
        );
    }

    public function pemimpin(Request $request)
    {
        $query = Inspeksi::with([
            'alat',
            'operasional'
        ]);

        if ($request->search) {

            $query->whereHas('alat', function ($q) use ($request) {

                $q->where(
                    'nama_alat',
                    'like',
                    '%' . $request->search . '%'
                );

            });

        }

        if ($request->kondisi) {

            $query->where(
                'kondisi_alat',
                $request->kondisi
            );

        }

        $inspeksis = $query
            ->latest()
            ->paginate(10);

        return view(
            'inspeksi.pemimpin.index',
            compact('inspeksis')
        );
    }

    public function create()
    {
        $alats = Alat::all();

        $operasionals = Operasional::with([
            'mobilisasi.kontrak'
        ])->get();

        return view(
            'inspeksi.mekanik.create',
            compact(
                'alats',
                'operasionals'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required',
            'operasional_id' => 'nullable',
            'tanggal_inspeksi' => 'required',
            'kondisi_alat' => 'required',
            'hasil_inspeksi' => 'required',
            'foto_kerusakan' => 'nullable|image',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $foto = null;

        if ($request->hasFile('foto_kerusakan')) {

            $upload = Cloudinary::upload(
                $request->file('foto_kerusakan')->getRealPath(),
                [
                    'folder' => 'rakentra/inspeksi'
                ]
            );

            $foto = $upload->getSecurePath();
        }

        Inspeksi::create([
            'alat_id' => $request->alat_id,
            'operasional_id' => $request->operasional_id,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'kondisi_alat' => $request->kondisi_alat,
            'hasil_inspeksi' => $request->hasil_inspeksi,
            'foto_kerusakan' => $foto,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('inspeksi.mekanik')
            ->with(
                'success',
                'Data inspeksi berhasil ditambahkan'
            );
    }

    public function show(Inspeksi $inspeksi)
    {
        //
    }

    public function edit($id)
    {
        $inspeksi = Inspeksi::findOrFail($id);

        $alats = Alat::all();

        $operasionals = Operasional::with([
            'mobilisasi.kontrak'
        ])->get();

        return view(
            'inspeksi.mekanik.edit',
            compact(
                'inspeksi',
                'alats',
                'operasionals'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alat_id' => 'required',
            'operasional_id' => 'nullable',
            'tanggal_inspeksi' => 'required',
            'kondisi_alat' => 'required',
            'hasil_inspeksi' => 'required',
            'foto_kerusakan' => 'nullable|image',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $inspeksi = Inspeksi::findOrFail($id);

        $foto = $inspeksi->foto_kerusakan;

        if ($request->hasFile('foto_kerusakan')) {

            $upload = Cloudinary::upload(
                $request->file('foto_kerusakan')->getRealPath(),
                [
                    'folder' => 'rakentra/inspeksi'
                ]
            );

            $foto = $upload->getSecurePath();
        }

        $inspeksi->update([
            'alat_id' => $request->alat_id,
            'operasional_id' => $request->operasional_id,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'kondisi_alat' => $request->kondisi_alat,
            'hasil_inspeksi' => $request->hasil_inspeksi,
            'foto_kerusakan' => $foto,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('inspeksi.mekanik')
            ->with(
                'success',
                'Data inspeksi berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $inspeksi = Inspeksi::findOrFail($id);

        $inspeksi->delete();

        return redirect()
            ->route('inspeksi.index')
            ->with(
                'success',
                'Data inspeksi berhasil dihapus'
            );
    }
}