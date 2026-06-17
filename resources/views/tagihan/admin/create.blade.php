@extends('layout.admin')

@section('title', 'Tambah Tagihan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('tagihan.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Terbitkan Tagihan</h4>
            <small class="text-secondary">Buat invoice baru berdasarkan kontrak sewa unit</small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">

            @if ($errors->any())
            <div class="alert border-0 mb-4 d-flex align-items-start gap-3"
                 style="background:rgba(220,38,38,0.12);border-left:4px solid #dc2626 !important;border-radius:14px;">
                <i class="bi bi-exclamation-triangle-fill text-danger mt-1"></i>
                <div>
                    <strong class="text-danger">Kesalahan Input:</strong>
                    <ul class="mb-0 mt-1 text-danger" style="font-size:13px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:24px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('tagihan.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            {{-- Section 1: Kontrak & Status --}}
                            <div class="col-md-8">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">REFERENSI KONTRAK <span class="text-danger">*</span></label>
                                <select name="kontrak_id" required class="form-select"
                                        style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:55px;">
                                    <option value="">-- Pilih Kontrak Pelanggan --</option>
                                    @foreach($kontraks as $kontrak)
                                        <option value="{{ $kontrak->id }}" {{ old('kontrak_id') == $kontrak->id ? 'selected' : '' }}>
                                            {{ $kontrak->nomor_kontrak }} | {{ $kontrak->booking->pelanggan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">STATUS TAGIHAN <span class="text-danger">*</span></label>
                                <select name="status_tagihan" required class="form-select"
                                        style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:55px;">
                                    @foreach(['pending' => 'Pending', 'dibayar' => 'Dibayar', 'jatuh_tempo' => 'Jatuh Tempo'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('status_tagihan') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Section 2: Waktu --}}
                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">TANGGAL TAGIHAN <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_tagihan" required class="form-control"
                                       style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                       value="{{ old('tanggal_tagihan', date('Y-m-d')) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">TANGGAL JATUH TEMPO <span class="text-danger">*</span></label>
                                <input type="date" name="jatuh_tempo" required class="form-control"
                                       style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                       value="{{ old('jatuh_tempo', date('Y-m-d', strtotime('+7 days'))) }}">
                            </div>

                            {{-- Section 3: Nominal --}}
                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">SUBTOTAL (RP) <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;overflow:hidden;">
                                    <span class="input-group-text border-0 text-secondary" style="background:transparent;">Rp</span>
                                    <input type="number" id="subtotal" name="subtotal" required class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           placeholder="Nilai sewa" value="{{ old('subtotal') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">PPN (RP)</label>
                                <div class="input-group" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;overflow:hidden;">
                                    <span class="input-group-text border-0 text-secondary" style="background:transparent;">Rp</span>
                                    <input type="number" id="ppn" name="ppn" required class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           value="{{ old('ppn', 0) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">GRAND TOTAL (RP)</label>
                                <div class="input-group" style="background:rgba(37,99,235,0.1);border:1px solid rgba(37,99,235,0.2);border-radius:12px;overflow:hidden;">
                                    <span class="input-group-text border-0 text-primary fw-bold" style="background:transparent;">Rp</span>
                                    <input type="text" id="total_display" readonly class="form-control border-0 text-white fw-bold"
                                           style="background:transparent;box-shadow:none;height:50px;" value="0">
                                    <input type="hidden" name="total" id="total_hidden">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">CATATAN INVOICE</label>
                                <textarea name="keterangan" rows="3" class="form-control"
                                          style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;"
                                          placeholder="Keterangan rincian biaya atau catatan transfer...">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5 pt-4" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('tagihan.index') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-bold"
                                    style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:45px;box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                                <i class="bi bi-receipt-cutoff me-2"></i>Terbitkan Invoice
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subtotalInput = document.getElementById('subtotal');
        const ppnInput = document.getElementById('ppn');
        const totalDisplay = document.getElementById('total_display');
        const totalHidden = document.getElementById('total_hidden');

        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        function calculate() {
            const subtotal = parseFloat(subtotalInput.value) || 0;
            const ppn = parseFloat(ppnInput.value) || 0;
            const total = subtotal + ppn;
            
            totalDisplay.value = formatNumber(total);
            totalHidden.value = total;
        }

        subtotalInput.addEventListener('input', calculate);
        ppnInput.addEventListener('input', calculate);
        
        calculate();
    });
</script>

@endsection