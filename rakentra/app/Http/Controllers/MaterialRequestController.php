<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\MaterialRequest;
use App\Models\Mekanik;
use App\Models\Vendor;
use Illuminate\Http\Request;

class MaterialRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = MaterialRequest::with([
            'maintenance.alat',
            'mekanik',
            'vendor'
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
            'mekanik',
            'vendor'
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
            'mekanik',
            'vendor'
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
        $vendors = Vendor::all();

        return view(
            'material.mekanik.create',
            compact(
                'maintenances',
                'mekaniks',
                'vendors'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'maintenance_id' => 'required',
            'mekanik_id' => 'required',
            'vendor_id' => 'nullable',
            'nama_material' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'supplier' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        MaterialRequest::create([
            'maintenance_id' => $request->maintenance_id,
            'mekanik_id' => $request->mekanik_id,
            'vendor_id' => $request->vendor_id,
            'nama_material' => $request->nama_material,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'status' => 'pending', // Default to pending
            'keterangan' => $request->keterangan,
        ]);

        $route = auth()->user()->role == 'admin' ? 'material.index' : 'material.mekanik';

        return redirect()
            ->route($route)
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
        $vendors = Vendor::all();

        if (auth()->user()->role == 'admin') {
            return view(
                'material.admin.edit',
                compact(
                    'material',
                    'maintenances',
                    'mekaniks',
                    'vendors'
                )
            );
        }

        return view(
            'material.mekanik.edit',
            compact(
                'material',
                'maintenances',
                'mekaniks',
                'vendors'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'maintenance_id' => 'required',
            'mekanik_id' => 'required',
            'vendor_id' => 'nullable',
            'nama_material' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'supplier' => 'nullable',
            'keterangan' => 'nullable',
        ];

        if (auth()->user()->role == 'admin') {
            $rules['status'] = 'required';
        }

        $request->validate($rules);

        $material = MaterialRequest::findOrFail($id);

        $data = [
            'maintenance_id' => $request->maintenance_id,
            'mekanik_id' => $request->mekanik_id,
            'vendor_id' => $request->vendor_id,
            'nama_material' => $request->nama_material,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'supplier' => $request->supplier,
            'keterangan' => $request->keterangan,
        ];

        if (auth()->user()->role == 'admin') {
            $data['status'] = $request->status;
        }

        $material->update($data);

        $route = auth()->user()->role == 'admin' ? 'material.index' : 'material.mekanik';

        return redirect()
            ->route($route)
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