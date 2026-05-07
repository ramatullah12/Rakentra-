<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $tagihan->nomor_tagihan }}</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            color:#1e293b;
            font-size:13px;
            margin:0;
            padding:0;
        }

        .container{
            padding:40px;
        }

        .header{
            width:100%;
            margin-bottom:40px;
        }

        .header-table{
            width:100%;
        }

        .header-left h1{
            margin:0;
            font-size:34px;
            color:#0f172a;
        }

        .header-left p{
            margin:4px 0;
            color:#64748b;
        }

        .invoice-box{
            text-align:right;
        }

        .invoice-number{
            font-size:18px;
            font-weight:bold;
            margin-bottom:10px;
        }

        .badge{
            display:inline-block;
            padding:8px 14px;
            border-radius:8px;
            color:white;
            font-size:12px;
            font-weight:bold;
        }

        .paid{
            background:#16a34a;
        }

        .pending{
            background:#f59e0b;
        }

        .late{
            background:#dc2626;
        }

        .section{
            margin-bottom:35px;
        }

        .section-title{
            font-size:16px;
            font-weight:bold;
            margin-bottom:15px;
            color:#0f172a;
        }

        .info-table{
            width:100%;
        }

        .info-table td{
            padding:6px 0;
            vertical-align:top;
        }

        .label{
            width:140px;
            color:#64748b;
        }

        .value{
            font-weight:bold;
        }

        .table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        .table th{
            background:#0f172a;
            color:white;
            padding:14px;
            text-align:left;
            font-size:12px;
        }

        .table td{
            padding:14px;
            border-bottom:1px solid #e2e8f0;
        }

        .text-right{
            text-align:right;
        }

        .summary{
            width:320px;
            margin-left:auto;
            margin-top:30px;
        }

        .summary-table{
            width:100%;
            border-collapse:collapse;
        }

        .summary-table td{
            padding:10px 0;
        }

        .summary-total{
            border-top:2px solid #cbd5e1;
            font-size:18px;
            font-weight:bold;
            color:#16a34a;
        }

        .footer{
            margin-top:70px;
            text-align:center;
            color:#94a3b8;
            font-size:12px;
        }

        .signature{
            margin-top:60px;
            width:250px;
            text-align:center;
            margin-left:auto;
        }

        .signature-line{
            margin-top:70px;
            border-top:1px solid #0f172a;
            padding-top:8px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <table class="header-table">

            <tr>

                <td class="header-left">

                    <h1>INVOICE</h1>

                    <p>Rakentra Rental Alat Berat</p>

                    <p>Sistem Manajemen Rental Alat Berat</p>

                </td>

                <td class="invoice-box">

                    <div class="invoice-number">

                        {{ $tagihan->nomor_tagihan }}

                    </div>

                    @if($tagihan->status_tagihan == 'dibayar')

                        <span class="badge paid">
                            DIBAYAR
                        </span>

                    @elseif($tagihan->status_tagihan == 'pending')

                        <span class="badge pending">
                            PENDING
                        </span>

                    @else

                        <span class="badge late">
                            JATUH TEMPO
                        </span>

                    @endif

                </td>

            </tr>

        </table>

    </div>

    <div class="section">

        <table width="100%">

            <tr>

                <td width="50%" valign="top">

                    <div class="section-title">
                        Data Pelanggan
                    </div>

                    <table class="info-table">

                        <tr>

                            <td class="label">
                                Nama
                            </td>

                            <td class="value">

                                {{ $tagihan->kontrak->booking->pelanggan->nama }}

                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                No HP
                            </td>

                            <td class="value">

                                {{ $tagihan->kontrak->booking->pelanggan->hp }}

                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Alamat
                            </td>

                            <td class="value">

                                {{ $tagihan->kontrak->booking->pelanggan->alamat }}

                            </td>

                        </tr>

                    </table>

                </td>

                <td width="50%" valign="top">

                    <div class="section-title">
                        Informasi Tagihan
                    </div>

                    <table class="info-table">

                        <tr>

                            <td class="label">
                                Nomor Kontrak
                            </td>

                            <td class="value">

                                {{ $tagihan->kontrak->nomor_kontrak }}

                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Tanggal
                            </td>

                            <td class="value">

                                {{ $tagihan->tanggal_tagihan }}

                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Jatuh Tempo
                            </td>

                            <td class="value">

                                {{ $tagihan->jatuh_tempo }}

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

        </table>

    </div>

    <div class="section">

        <div class="section-title">
            Detail Rental
        </div>

        <table class="table">

            <thead>

                <tr>

                    <th>
                        Nama Alat
                    </th>

                    <th>
                        Kode Alat
                    </th>

                    <th>
                        Durasi
                    </th>

                    <th class="text-right">
                        Harga
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>

                        {{ $tagihan->kontrak->booking->alat->nama_alat }}

                    </td>

                    <td>

                        {{ $tagihan->kontrak->booking->alat->kode_alat }}

                    </td>

                    <td>

                        {{ $tagihan->kontrak->durasi }} Hari

                    </td>

                    <td class="text-right">

                        Rp {{ number_format($tagihan->subtotal,0,',','.') }}

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <div class="summary">

        <table class="summary-table">

            <tr>

                <td>
                    Subtotal
                </td>

                <td class="text-right">

                    Rp {{ number_format($tagihan->subtotal,0,',','.') }}

                </td>

            </tr>

            <tr>

                <td>
                    PPN
                </td>

                <td class="text-right">

                    Rp {{ number_format($tagihan->ppn,0,',','.') }}

                </td>

            </tr>

            <tr class="summary-total">

                <td>
                    TOTAL
                </td>

                <td class="text-right">

                    Rp {{ number_format($tagihan->total,0,',','.') }}

                </td>

            </tr>

        </table>

    </div>

    @if($tagihan->keterangan)

        <div class="section">

            <div class="section-title">
                Keterangan
            </div>

            <p>

                {{ $tagihan->keterangan }}

            </p>

        </div>

    @endif

    <div class="signature">

        <div>
            Rakentra Rental
        </div>

        <div class="signature-line">
            Admin
        </div>

    </div>

    <div class="footer">

        Invoice ini dibuat otomatis oleh sistem Rakentra Rental Alat Berat

    </div>

</div>

</body>
</html>