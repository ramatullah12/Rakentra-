<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\MaterialRequest;
use App\Models\Mekanik;
use Illuminate\Http\Request;

class MaterialRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = MaterialRequest::with([
            'maintenance.alat',
            'mekanik'
        ]);

        if ($request->search) {

            $query->where(
                'nama_material',
                'like',
                '%' . $request->search . '%'
            );

        }

        $materials = $query
            ->latest()
            ->paginate(10);

        if (auth()->user()->role == 'mekanik') {

            return $this->mekanik($request);

        }

        if (auth()->user()->role == 'pemimpin') {

            return $this->pemimpin($request);

        }

        return view(
            'material.admin.index',
            compact('materials')
        );
    }

    public function mekanik(Request $request)
    {
        $query = MaterialRequest::with([
            'maintenance.alat',
            'mekanik'
        ]);

        if ($request->search) {

            $query->where(
                'nama_material',
                'like',
                '%' . $request->search . '%'
            );

        }

        $materials = $query
            ->latest()
            ->paginate(10);

        return view(
            'material.mekanik.index',
            compact('materials')
        );
    }

    public function pemimpin(Request $request)
    {
        $query = MaterialRequest::with([
            'maintenance.alat',
            'mekanik'
        ]);

        if ($request->search) {

            $query->where(
                'nama_material',
                'like',
                '%' . $request->search . '%'
            );

        }

        $materials = $query
            ->latest()
            ->paginate(10);

        return view(
            'material.pemimpin.index',
            compact('materials')
        );
    }

    public function create()
    {
        $maintenances = Maintenance::with([
            'alat'
        ])->get();

        $mekaniks = Mekanik::all();

        return view(
            'material.mekanik.create',
            compact(
                'maintenances',
                'mekaniks'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'maintenance_id' => 'required',
            'mekanik_id' => 'required',
            'nama_material' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'supplier' => 'nullable',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        MaterialRequest::create([
            'maintenance_id' => $request->maintenance_id,
            'mekanik_id' => $request->mekanik_id,
            'nama_material' => $request->nama_material,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('material.mekanik')
            ->with(
                'success',
                'Material request berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $material = MaterialRequest::findOrFail($id);

        $maintenances = Maintenance::with([
            'alat'
        ])->get();

        $mekaniks = Mekanik::all();

        return view(
            'material.mekanik.edit',
            compact(
                'material',
                'maintenances',
                'mekaniks'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'maintenance_id' => 'required',
            'mekanik_id' => 'required',
            'nama_material' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'supplier' => 'nullable',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $material = MaterialRequest::findOrFail($id);

        $material->update([
            'maintenance_id' => $request->maintenance_id,
            'mekanik_id' => $request->mekanik_id,
            'nama_material' => $request->nama_material,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('material.mekanik')
            ->with(
                'success',
                'Material request berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $material = MaterialRequest::findOrFail($id);

        $material->delete();

        return redirect()
            ->route('material.index')
            ->with(
                'success',
                'Material request berhasil dihapus'
            );
    }
}