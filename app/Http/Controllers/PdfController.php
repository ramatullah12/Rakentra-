<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function spk($id)
    {
        $kontrak = Kontrak::with([
            'booking.pelanggan',
            'booking.alat'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'pdf.spk',
            compact('kontrak')
        );

        return $pdf->stream(
            'SPK-'.$kontrak->nomor_kontrak.'.pdf'
        );
    }
}
