<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kontrak;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Barryvdh\DomPDF\Facade\Pdf;

class KontrakController extends Controller
{
    public function index(Request $request)
    {
        $query = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ]);

        if ($request->search) {

            $query->where(
                'nomor_kontrak',
                'like',
                '%' . $request->search . '%'
            );

        }

        if ($request->status) {

            $query->where(
                'status',
                $request->status
            );

        }

        $kontraks = $query->latest()->paginate(10);

        if (auth()->user()->role == 'pemimpin') {

            return view(
                'kontrak.pemimpin.index',
                compact('kontraks')
            );

        }

        return view(
            'kontrak.admin.index',
            compact('kontraks')
        );
    }

    public function create()
    {
        $bookings = Booking::with([
            'pelanggan',
            'alat'
        ])
        ->whereDoesntHave('kontrak')
        ->get();

        return view(
            'kontrak.admin.create',
            compact('bookings')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'tanggal_kontrak' => 'required',
            'durasi' => 'required',
            'nilai_kontrak' => 'required',
            'file_po' => 'nullable|mimes:pdf,jpg,jpeg,png',
            'file_spk' => 'nullable|mimes:pdf,jpg,jpeg,png',
        ]);

        $filePo = null;
        $fileSpk = null;

        if ($request->hasFile('file_po')) {

            $uploadPo = Cloudinary::uploadApi()->upload(
                $request->file('file_po')->getRealPath(),
                [
                    'folder' => 'po'
                ]
            );

            $filePo = $uploadPo['secure_url'];

        }

        if ($request->hasFile('file_spk')) {

            $uploadSpk = Cloudinary::uploadApi()->upload(
                $request->file('file_spk')->getRealPath(),
                [
                    'folder' => 'spk'
                ]
            );

            $fileSpk = $uploadSpk['secure_url'];

        }

        $nomor = 'KTR-' . date('Ymd') . '-' . rand(1000,9999);

        Kontrak::create([
            'booking_id' => $request->booking_id,
            'nomor_kontrak' => $nomor,
            'tanggal_kontrak' => $request->tanggal_kontrak,
            'durasi' => $request->durasi,
            'nilai_kontrak' => $request->nilai_kontrak,
            'file_po' => $filePo,
            'file_spk' => $fileSpk,
            'status' => 'aktif',
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kontrak.index')
            ->with(
                'success',
                'Kontrak berhasil dibuat'
            );
    }

    public function edit($id)
    {
        $kontrak = Kontrak::findOrFail($id);

        $bookings = Booking::with([
            'pelanggan',
            'alat'
        ])->get();

        return view(
            'kontrak.admin.edit',
            compact(
                'kontrak',
                'bookings'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required',
            'tanggal_kontrak' => 'required',
            'durasi' => 'required',
            'nilai_kontrak' => 'required',
            'status' => 'required',
            'file_po' => 'nullable|mimes:pdf,jpg,jpeg,png',
            'file_spk' => 'nullable|mimes:pdf,jpg,jpeg,png',
        ]);

        $kontrak = Kontrak::findOrFail($id);

        $filePo = $kontrak->file_po;
        $fileSpk = $kontrak->file_spk;

        if ($request->hasFile('file_po')) {

            $uploadPo = Cloudinary::uploadApi()->upload(
                $request->file('file_po')->getRealPath(),
                [
                    'folder' => 'po'
                ]
            );

            $filePo = $uploadPo['secure_url'];

        }

        if ($request->hasFile('file_spk')) {

            $uploadSpk = Cloudinary::uploadApi()->upload(
                $request->file('file_spk')->getRealPath(),
                [
                    'folder' => 'spk'
                ]
            );

            $fileSpk = $uploadSpk['secure_url'];

        }

        $kontrak->update([
            'booking_id' => $request->booking_id,
            'tanggal_kontrak' => $request->tanggal_kontrak,
            'durasi' => $request->durasi,
            'nilai_kontrak' => $request->nilai_kontrak,
            'file_po' => $filePo,
            'file_spk' => $fileSpk,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kontrak.index')
            ->with(
                'success',
                'Kontrak berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $kontrak = Kontrak::findOrFail($id);

        $kontrak->delete();

        return redirect()
            ->route('kontrak.index')
            ->with(
                'success',
                'Kontrak berhasil dihapus'
            );
    }

    public function spk($id)
    {
        $kontrak = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'kontrak.pdf.spk',
            compact('kontrak')
        );

        return $pdf->download(
            'SPK-' . $kontrak->nomor_kontrak . '.pdf'
        );
    }
}