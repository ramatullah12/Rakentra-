<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Inspeksi;
use App\Models\Operasional;
use App\Models\Mekanik;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class InspeksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Inspeksi::with([
            'alat',
            'operasional',
            'mekanik'
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

        if (auth()->user()->role == 'mekanik') {
            return $this->mekanik($request);
        }

        if (auth()->user()->role == 'pemimpin') {
            return $this->pemimpin($request);
        }

        return view(
            'inspeksi.admin.index',
            compact('inspeksis')
        );
    }

    public function mekanik(Request $request)
    {
        $query = Inspeksi::with([
            'alat',
            'operasional',
            'mekanik'
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
            'operasional',
            'mekanik'
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

        $mekaniks = Mekanik::all();

        $operasionals = Operasional::with([
            'mobilisasi.kontrak'
        ])->get();

        return view(
            'inspeksi.mekanik.create',
            compact(
                'alats',
                'mekaniks',
                'operasionals'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required',
            'operasional_id' => 'nullable',
            'mekanik_id' => 'required',
            'tanggal_inspeksi' => 'required|date|after_or_equal:today',
            'kondisi_alat' => 'required',
            'hasil_inspeksi' => 'required',
            'foto_kerusakan' => 'nullable|image',
            'status' => 'required',
        ]);

        $foto = null;

        if ($request->hasFile('foto_kerusakan')) {

            $upload = Cloudinary::uploadApi()->upload(
                $request->file('foto_kerusakan')->getRealPath(),
                [
                    'folder' => 'rakentra/inspeksi'
                ]
            );

            $foto = $upload['secure_url'];
        }

        Inspeksi::create([
            'alat_id' => $request->alat_id,
            'operasional_id' => $request->operasional_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'kondisi_alat' => $request->kondisi_alat,
            'hasil_inspeksi' => $request->hasil_inspeksi,
            'foto_kerusakan' => $foto,
            'status' => $request->status,
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

        $mekaniks = Mekanik::all();

        $operasionals = Operasional::with([
            'mobilisasi.kontrak'
        ])->get();

        return view(
            'inspeksi.mekanik.edit',
            compact(
                'inspeksi',
                'alats',
                'mekaniks',
                'operasionals'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alat_id' => 'required',
            'operasional_id' => 'nullable',
            'mekanik_id' => 'required',
            'tanggal_inspeksi' => 'required',
            'kondisi_alat' => 'required',
            'hasil_inspeksi' => 'required',
            'foto_kerusakan' => 'nullable|image',
            'status' => 'required',
        ]);

        $inspeksi = Inspeksi::findOrFail($id);

        $foto = $inspeksi->foto_kerusakan;

        if ($request->hasFile('foto_kerusakan')) {

            $upload = Cloudinary::uploadApi()->upload(
                $request->file('foto_kerusakan')->getRealPath(),
                [
                    'folder' => 'rakentra/inspeksi'
                ]
            );

            $foto = $upload['secure_url'];
        }

        $inspeksi->update([
            'alat_id' => $request->alat_id,
            'operasional_id' => $request->operasional_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'kondisi_alat' => $request->kondisi_alat,
            'hasil_inspeksi' => $request->hasil_inspeksi,
            'foto_kerusakan' => $foto,
            'status' => $request->status,
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