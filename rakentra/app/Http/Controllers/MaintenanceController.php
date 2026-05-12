<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Inspeksi;
use App\Models\Maintenance;
use App\Models\Mekanik;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Maintenance::with([
            'alat',
            'inspeksi',
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

        $maintenances = $query
            ->latest()
            ->paginate(10);

        if (auth()->user()->role == 'mekanik') {

            return $this->mekanik($request);

        }

        if (auth()->user()->role == 'pemimpin') {

            return $this->pemimpin($request);

        }

        return view(
            'maintenance.admin.index',
            compact('maintenances')
        );
    }

    public function mekanik(Request $request)
    {
        $query = Maintenance::with([
            'alat',
            'inspeksi',
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

        $maintenances = $query
            ->latest()
            ->paginate(10);

        return view(
            'maintenance.mekanik.index',
            compact('maintenances')
        );
    }

    public function pemimpin(Request $request)
    {
        $query = Maintenance::with([
            'alat',
            'inspeksi',
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

        $maintenances = $query
            ->latest()
            ->paginate(10);

        return view(
            'maintenance.pemimpin.index',
            compact('maintenances')
        );
    }

    public function create()
    {
        $alats = Alat::all();

        $mekaniks = Mekanik::all();

        $inspeksis = Inspeksi::with([
            'alat'
        ])->get();

        return view(
            'maintenance.mekanik.create',
            compact(
                'alats',
                'mekaniks',
                'inspeksis'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required',
            'inspeksi_id' => 'nullable',
            'mekanik_id' => 'required',
            'tanggal_maintenance' => 'required|date|after_or_equal:today',
            'jenis_maintenance' => 'required',
            'deskripsi_kerusakan' => 'required',
            'tindakan_perbaikan' => 'nullable',
            'biaya' => 'required',
            'status' => 'required',
            'foto_perbaikan.*' => 'nullable|image',
            'keterangan' => 'nullable',
        ]);

        $fotos = [];

        if ($request->hasFile('foto_perbaikan')) {

            foreach ($request->file('foto_perbaikan') as $file) {

                $upload = Cloudinary::uploadApi()->upload(
                    $file->getRealPath(),
                    [
                        'folder' => 'rakentra/maintenance'
                    ]
                );

                $fotos[] = $upload['secure_url'];
            }
        }

        Maintenance::create([
            'alat_id' => $request->alat_id,
            'inspeksi_id' => $request->inspeksi_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_maintenance' => $request->tanggal_maintenance,
            'jenis_maintenance' => $request->jenis_maintenance,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'tindakan_perbaikan' => $request->tindakan_perbaikan,
            'biaya' => $request->biaya,
            'status' => $request->status,
            'foto_perbaikan' => $fotos,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('maintenance.mekanik')
            ->with(
                'success',
                'Data maintenance berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        $alats = Alat::all();

        $mekaniks = Mekanik::all();

        $inspeksis = Inspeksi::with([
            'alat'
        ])->get();

        return view(
            'maintenance.mekanik.edit',
            compact(
                'maintenance',
                'alats',
                'mekaniks',
                'inspeksis'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alat_id' => 'required',
            'inspeksi_id' => 'nullable',
            'mekanik_id' => 'required',
            'tanggal_maintenance' => 'required',
            'jenis_maintenance' => 'required',
            'deskripsi_kerusakan' => 'required',
            'tindakan_perbaikan' => 'nullable',
            'biaya' => 'required',
            'status' => 'required',
            'foto_perbaikan.*' => 'nullable|image',
            'keterangan' => 'nullable',
        ]);

        $maintenance = Maintenance::findOrFail($id);

        $fotos = $maintenance->foto_perbaikan ?? [];

        if ($request->hasFile('foto_perbaikan')) {

            $fotos = [];

            foreach ($request->file('foto_perbaikan') as $file) {

                $upload = Cloudinary::uploadApi()->upload(
                    $file->getRealPath(),
                    [
                        'folder' => 'rakentra/maintenance'
                    ]
                );

                $fotos[] = $upload['secure_url'];
            }
        }

        $maintenance->update([
            'alat_id' => $request->alat_id,
            'inspeksi_id' => $request->inspeksi_id,
            'mekanik_id' => $request->mekanik_id,
            'tanggal_maintenance' => $request->tanggal_maintenance,
            'jenis_maintenance' => $request->jenis_maintenance,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'tindakan_perbaikan' => $request->tindakan_perbaikan,
            'biaya' => $request->biaya,
            'status' => $request->status,
            'foto_perbaikan' => $fotos,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('maintenance.mekanik')
            ->with(
                'success',
                'Data maintenance berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        $maintenance->delete();

        return redirect()
            ->route('maintenance.index')
            ->with(
                'success',
                'Data maintenance berhasil dihapus'
            );
    }
}