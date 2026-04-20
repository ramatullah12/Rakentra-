@extends('layouts.app')

@section('content')

<h2>Dashboard Executive</h2>
<p>Selamat datang di sistem Rakentra</p>

<div style="display:flex; gap:20px; margin-top:20px;">

    <div style="background:#fff; padding:20px; border-radius:10px; width:25%;">
        <h4>Total Alat Berat</h4>
        <h2>{{ $totalAlat }}</h2>
    </div>

    <div style="background:#fff; padding:20px; border-radius:10px; width:25%;">
        <h4>Alat Disewa</h4>
        <h2>{{ $alatDisewa }}</h2>
    </div>

    <div style="background:#fff; padding:20px; border-radius:10px; width:25%;">
        <h4>Total Pelanggan</h4>
        <h2>{{ $totalPelanggan }}</h2>
    </div>

    <div style="background:#fff; padding:20px; border-radius:10px; width:25%;">
        <h4>Revenue</h4>
        <h2>Rp {{ number_format($revenue) }}</h2>
    </div>

</div>

<div style="display:flex; margin-top:30px; gap:20px;">

    <div style="width:70%; background:#fff; padding:20px; border-radius:10px;">
        <h4>Revenue & Booking Trend</h4>
        <canvas id="lineChart"></canvas>
    </div>

    <div style="width:30%; background:#fff; padding:20px; border-radius:10px;">
        <h4>Status Alat</h4>
        <canvas id="pieChart"></canvas>
    </div>

</div>

{{-- TABLE --}}
<div style="margin-top:30px; background:#fff; padding:20px; border-radius:10px;">
    <h4>Booking Terbaru</h4>

    <table border="1" width="100%" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Pelanggan</th>
            <th>Alat</th>
            <th>Status</th>
        </tr>

        @foreach($booking as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->pelanggan->nama ?? '-' }}</td>
            <td>{{ $b->alat->nama ?? '-' }}</td>
            <td>{{ $b->status }}</td>
        </tr>
        @endforeach

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('lineChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        datasets: [{
            label: 'Booking',
            data: [10,20,15,30,25,40],
        }]
    }
});

const pie = document.getElementById('pieChart');
new Chart(pie, {
    type: 'pie',
    data: {
        labels: ['Tersedia','Disewa','Maintenance'],
        datasets: [{
            data: [{{ $tersedia }}, {{ $disewa }}, {{ $maintenance }}]
        }]
    }
});
</script>

@endsection