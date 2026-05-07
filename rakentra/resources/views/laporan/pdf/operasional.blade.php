<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Operasional
    </title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#1e293b;
            margin:30px;
        }

        .header{
            text-align:center;
            margin-bottom:30px;
        }

        .header h2{
            margin:0;
            font-size:24px;
        }

        .header p{
            margin-top:5px;
            color:#64748b;
        }

        .info{
            margin-bottom:20px;
        }

        .info table{
            width:100%;
        }

        .info td{
            padding:4px 0;
        }

        .table{
            width:100%;
            border-collapse:collapse;
        }

        .table th{
            background:#1e293b;
            color:white;
            padding:12px;
            border:1px solid #cbd5e1;
            text-align:left;
        }

        .table td{
            padding:10px;
            border:1px solid #cbd5e1;
        }

        .table tr:nth-child(even){
            background:#f8fafc;
        }

        .footer{
            margin-top:40px;
            text-align:right;
        }

        .signature{
            margin-top:80px;
        }

    </style>

</head>

<body>

    <div class="header">

        <h2>
            LAPORAN OPERASIONAL
        </h2>

        <p>
            Sistem Rental Alat Berat
        </p>

    </div>

    <div class="info">

        <table>

            <tr>

                <td width="150">
                    Tanggal Cetak
                </td>

                <td width="10">
                    :
                </td>

                <td>
                    {{ date('d M Y') }}
                </td>

            </tr>

            <tr>

                <td>
                    Total Data
                </td>

                <td>
                    :
                </td>

                <td>
                    {{ $operasionals->count() }} Operasional
                </td>

            </tr>

        </table>

    </div>

    <table class="table">

        <thead>

            <tr>

                <th width="40">
                    No
                </th>

                <th>
                    Nama Alat
                </th>

                <th>
                    Lokasi
                </th>

                <th>
                    Operator
                </th>

                <th>
                    Jam Operasional
                </th>

                <th>
                    Biaya Operasional
                </th>

                <th>
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($operasionals as $i => $operasional)

                <tr>

                    <td>

                        {{ $i + 1 }}

                    </td>

                    <td>

                        {{ $operasional->alat->nama_alat ?? '-' }}

                    </td>

                    <td>

                        {{ $operasional->lokasi ?? '-' }}

                    </td>

                    <td>

                        {{ $operasional->operator ?? '-' }}

                    </td>

                    <td>

                        {{ $operasional->jam_operasional ?? 0 }} Jam

                    </td>

                    <td>

                        Rp {{ number_format($operasional->biaya_operasional,0,',','.') }}

                    </td>

                    <td>

                        {{ ucfirst($operasional->status) }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        style="text-align:center;
                               padding:20px;">

                        Data operasional tidak tersedia

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">

        <p>
            Dicetak oleh sistem pada
            {{ now()->format('d M Y H:i') }}
        </p>

        <div class="signature">

            <p>
                Pimpinan
            </p>

            <br><br><br>

            <p>
                _______________________
            </p>

        </div>

    </div>

</body>

</html>