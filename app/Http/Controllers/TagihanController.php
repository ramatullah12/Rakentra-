<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TagihanController extends Controller
{
    public function index(Request $request)
    {
        $query = Tagihan::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ]);

        if ($request->search) {

            $query->where(
                'nomor_tagihan',
                'like',
                '%' . $request->search . '%'
            );

        }

        $tagihans = $query
            ->latest()
            ->paginate(10);

        return view(
            'tagihan.admin.index',
            compact('tagihans')
        );
    }

    public function pemimpin(Request $request)
    {
        $query = Tagihan::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ]);

        if ($request->search) {

            $query->where(
                'nomor_tagihan',
                'like',
                '%' . $request->search . '%'
            );

        }

        $tagihans = $query
            ->latest()
            ->paginate(10);

        return view(
            'tagihan.pemimpin.index',
            compact('tagihans')
        );
    }

    public function create()
    {
        $kontraks = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])->get();

        return view(
            'tagihan.admin.create',
            compact('kontraks')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'kontrak_id' => 'required',
            'tanggal_tagihan' => 'required',
            'jatuh_tempo' => 'required',
            'subtotal' => 'required',
            'ppn' => 'required',
            'status_tagihan' => 'required',
        ]);

        $total = $request->subtotal + $request->ppn;

        $nomor = 'INV-' . date('Ymd') . '-' . rand(1000,9999);

        Tagihan::create([
            'kontrak_id' => $request->kontrak_id,
            'nomor_tagihan' => $nomor,
            'tanggal_tagihan' => $request->tanggal_tagihan,
            'jatuh_tempo' => $request->jatuh_tempo,
            'subtotal' => $request->subtotal,
            'ppn' => $request->ppn,
            'total' => $total,
            'status_tagihan' => $request->status_tagihan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan berhasil dibuat'
            );
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $kontraks = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])->get();

        return view(
            'tagihan.admin.edit',
            compact(
                'tagihan',
                'kontraks'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kontrak_id' => 'required',
            'tanggal_tagihan' => 'required',
            'jatuh_tempo' => 'required',
            'subtotal' => 'required',
            'ppn' => 'required',
            'status_tagihan' => 'required',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        $total = $request->subtotal + $request->ppn;

        $tagihan->update([
            'kontrak_id' => $request->kontrak_id,
            'tanggal_tagihan' => $request->tanggal_tagihan,
            'jatuh_tempo' => $request->jatuh_tempo,
            'subtotal' => $request->subtotal,
            'ppn' => $request->ppn,
            'total' => $total,
            'status_tagihan' => $request->status_tagihan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $tagihan->delete();

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan berhasil dihapus'
            );
    }

    public function faktur($id)
    {
        $tagihan = Tagihan::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ])->findOrFail($id);

        return view(
            'tagihan.admin.faktur',
            compact('tagihan')
        );
    }

    public function cetak($id)
    {
        $tagihan = Tagihan::with([
            'kontrak.booking.pelanggan',
            'kontrak.booking.alat'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'tagihan.pdf.invoice',
            compact('tagihan')
        );

        return $pdf->download(
            'invoice-' . $tagihan->nomor_tagihan . '.pdf'
        );
    }
}