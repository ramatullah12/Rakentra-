<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SPK - {{ $kontrak->nomor_kontrak }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #2563eb;
            font-size: 28px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }
        .info-section {
            margin-bottom: 30px;
        }
        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }
        .info-grid td {
            padding: 8px 0;
            vertical-align: top;
        }
        .label {
            width: 150px;
            font-weight: bold;
            color: #64748b;
        }
        .value {
            color: #1e293b;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th {
            background-color: #f8fafc;
            color: #64748b;
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12px;
            text-transform: uppercase;
        }
        .table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }
        .footer {
            margin-top: 50px;
            width: 100%;
        }
        .signature-box {
            width: 250px;
            text-align: center;
        }
        .signature-space {
            height: 80px;
        }
        .signature-name {
            font-weight: bold;
            border-top: 1px solid #333;
            padding-top: 5px;
        }
        .total-box {
            margin-top: 20px;
            text-align: right;
        }
        .total-amount {
            font-size: 20px;
            font-weight: bold;
            color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Surat Perintah Kerja (SPK)</h1>
            <p>Rakentra Asset & Rental Management System</p>
        </div>

        <div class="info-section">
            <table class="info-grid">
                <tr>
                    <td class="label">Nomor Kontrak</td>
                    <td class="value">: <strong>{{ $kontrak->nomor_kontrak }}</strong></td>
                </tr>
                <tr>
                    <td class="label">Tanggal Kontrak</td>
                    <td class="value">: {{ \Carbon\Carbon::parse($kontrak->tanggal_kontrak)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label">Pelanggan</td>
                    <td class="value">: {{ $kontrak->booking->pelanggan->nama }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat Pelanggan</td>
                    <td class="value">: {{ $kontrak->booking->pelanggan->alamat }}</td>
                </tr>
            </table>
        </div>

        <h3>Rincian Pekerjaan / Sewa</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Unit Alat Berat</th>
                    <th>Kode Alat</th>
                    <th>Durasi Sewa</th>
                    <th>Lokasi Kerja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $kontrak->booking->alat->nama_alat }}</td>
                    <td>{{ $kontrak->booking->alat->kode_alat }}</td>
                    <td>{{ $kontrak->durasi }} Hari</td>
                    <td>{{ $kontrak->booking->alat->lokasi ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total-box">
            <p style="margin-bottom: 5px;">Total Nilai Kontrak:</p>
            <div class="total-amount">Rp {{ number_format($kontrak->nilai_kontrak, 0, ',', '.') }}</div>
        </div>

        <div style="margin-top: 40px;">
            <p><strong>Keterangan:</strong></p>
            <p style="font-size: 13px; color: #64748b;">
                {{ $kontrak->keterangan ?? 'Tidak ada keterangan tambahan.' }}
            </p>
        </div>

        <table class="footer">
            <tr>
                <td class="signature-box">
                    <p>Pihak Pertama (Penyewa)</p>
                    <div class="signature-space"></div>
                    <div class="signature-name">( {{ $kontrak->booking->pelanggan->nama }} )</div>
                </td>
                <td style="width: 200px;"></td>
                <td class="signature-box">
                    <p>Pihak Kedua (Rakentra)</p>
                    <div class="signature-space"></div>
                    <div class="signature-name">( Admin Rakentra )</div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
