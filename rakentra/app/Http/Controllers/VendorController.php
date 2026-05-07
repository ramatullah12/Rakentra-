<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $query = Vendor::query();

        if ($request->search) {
            $query->where('nama_vendor', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $vendors = $query->latest()->paginate(10);

        if (auth()->user()->role == 'pemimpin') {
            return view('vendor.pemimpin.index', compact('vendors'));
        }

        return view('vendor.admin.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_vendor' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'status' => 'aktif'
        ]);

        return redirect()->route('vendor.index')
            ->with('success', 'Vendor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);

        return view('vendor.admin.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_vendor' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
            'status' => 'required'
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->update([
            'nama_vendor' => $request->nama_vendor,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);

        return redirect()->route('vendor.index')
            ->with('success', 'Vendor berhasil diupdate');
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        $vendor->delete();

        return redirect()->route('vendor.index')
            ->with('success', 'Vendor berhasil dihapus');
    }
}