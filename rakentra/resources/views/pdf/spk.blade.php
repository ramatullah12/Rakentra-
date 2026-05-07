<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>SPK</title>

    <style>

        body{
            font-family: sans-serif;
            font-size:14px;
        }

        .title{
            text-align:center;
            margin-bottom:30px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        td{
            padding:8px;
            border:1px solid #000;
        }

    </style>

</head>
<body>

    <div class="title">

        <h2>
            SURAT PERINTAH KERJA
        </h2>

    </div>

    <table>

        <tr>
            <td width="30%">Nomor Kontrak</td>
            <td>{{ $kontrak->nomor_kontrak }}</td>
        </tr>

        <tr>
            <td>Pelanggan</td>
            <td>{{ $kontrak->booking->pelanggan->nama }}</td>
        </tr>

        <tr>
            <td>Alat</td>
            <td>{{ $kontrak->booking->alat->nama_alat }}</td>
        </tr>

        <tr>
            <td>Tanggal Kontrak</td>
            <td>{{ $kontrak->tanggal_kontrak }}</td>
        </tr>

        <tr>
            <td>Durasi</td>
            <td>{{ $kontrak->durasi }} Hari</td>
        </tr>

        <tr>
            <td>Nilai Kontrak</td>
            <td>
                Rp {{ number_format($kontrak->nilai_kontrak,0,',','.') }}
            </td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>{{ $kontrak->keterangan }}</td>
        </tr>

    </table>

    <br><br><br>

    <div style="text-align:right;">

        <p>Admin Rental Alat Berat</p>

        <br><br><br>

        <p>
            ___________________
        </p>

    </div>

</body>
</html>