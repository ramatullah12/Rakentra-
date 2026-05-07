<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Booking;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with([
            'pelanggan',
            'alat'
        ]);

        if ($request->search) {

            $query->whereHas('pelanggan', function ($q) use ($request) {

                $q->where('nama', 'like', '%' . $request->search . '%');

            });

        }

        if ($request->status) {

            $query->where('status', $request->status);

        }

        $bookings = $query->latest()->paginate(10);

        if (auth()->user()->role == 'pemimpin') {

            return view(
                'booking.pemimpin.index',
                compact('bookings')
            );

        }

        return view(
            'booking.admin.index',
            compact('bookings')
        );
    }

    public function create()
    {
        $pelanggans = Pelanggan::where(
            'status',
            'aktif'
        )->get();

        $alats = Alat::where(
            'status',
            'tersedia'
        )->get();

        return view(
            'booking.admin.create',
            compact(
                'pelanggans',
                'alats'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'alat_id' => 'required',
            'tanggal_booking' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        Booking::create([
            'pelanggan_id' => $request->pelanggan_id,
            'alat_id' => $request->alat_id,
            'tanggal_booking' => $request->tanggal_booking,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
            'status' => 'pending'
        ]);

        Alat::where('id', $request->alat_id)
            ->update([
                'status' => 'disewa'
            ]);

        return redirect()
            ->route('booking.index')
            ->with(
                'success',
                'Booking berhasil dibuat'
            );
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        $pelanggans = Pelanggan::all();

        $alats = Alat::all();

        return view(
            'booking.admin.edit',
            compact(
                'booking',
                'pelanggans',
                'alats'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'alat_id' => 'required',
            'tanggal_booking' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([
            'pelanggan_id' => $request->pelanggan_id,
            'alat_id' => $request->alat_id,
            'tanggal_booking' => $request->tanggal_booking,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('booking.index')
            ->with(
                'success',
                'Booking berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        Alat::where(
            'id',
            $booking->alat_id
        )->update([
            'status' => 'tersedia'
        ]);

        $booking->delete();

        return redirect()
            ->route('booking.index')
            ->with(
                'success',
                'Booking berhasil dihapus'
            );
    }
}