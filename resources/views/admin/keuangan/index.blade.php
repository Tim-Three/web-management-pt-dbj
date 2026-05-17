@extends('layouts.app')
@section('page-title', 'Analisis Keuangan')
@section('page-subtitle', 'Laporan pemasukan, pengeluaran, dan penggajian.')

@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.beranda') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>

    <a href="{{ route('admin.karyawan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.karyawan.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Data Karyawan
    </a>

    <a href="{{ route('admin.absensi.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.absensi.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
        Rekap Absensi
    </a>

    <a href="{{ route('admin.cuti.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.cuti.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Riwayat Pengajuan Cuti
    </a>

    <a href="{{ route('admin.keuangan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.keuangan.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Analisis Keuangan
    </a>

    <a href="{{ route('admin.penggajian.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('admin.penggajian.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Kelola Gaji Karyawan
    </a>
@endsection

@section('content')

    {{-- Summary Cards --}}
    {{-- HP: grid-cols-1 (numpuk), Tablet & Laptop ke atas: sm:grid-cols-4 (berjejer 4 kolom) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        {{-- Card Gaji --}}
        <div class="card-keuangan rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-start justify-between shadow-sm min-w-0"
            data-color="gray">
            <div class="min-w-0 flex-1 pr-2">
                <p
                    class="card-k-label text-[11px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider mb-2 line-clamp-2 leading-tight">
                    Total Gaji Bulan Ini</p>
                <p class="card-k-value text-base sm:text-sm md:text-xl font-bold break-words whitespace-normal">
                    Rp{{ number_format($totalGajiBulanIni, 0, ',', '.') }}
                </p>
            </div>
            <div class="card-k-icon w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        {{-- Card Pendapatan --}}
        <div class="card-keuangan rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-start justify-between shadow-sm min-w-0"
            data-color="green">
            <div class="min-w-0 flex-1 pr-2">
                <p
                    class="card-k-label text-[11px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider mb-2 line-clamp-2 leading-tight">
                    Total Pendapatan</p>
                <p class="card-k-value text-base sm:text-sm md:text-xl font-bold break-words whitespace-normal">
                    Rp{{ number_format($keuanganBulanIni?->total_pendapatan ?? 0, 0, ',', '.') }}
                </p>
            </div>
            <div class="card-k-icon w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </div>
        </div>

        {{-- Card Pengeluaran --}}
        <div class="card-keuangan rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-start justify-between shadow-sm min-w-0"
            data-color="red">
            <div class="min-w-0 flex-1 pr-2">
                <p
                    class="card-k-label text-[11px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider mb-2 line-clamp-2 leading-tight">
                    Total Pengeluaran</p>
                <p class="card-k-value text-base sm:text-sm md:text-xl font-bold break-words whitespace-normal">
                    Rp{{ number_format($keuanganBulanIni?->total_pengeluaran ?? 0, 0, ',', '.') }}
                </p>
            </div>
            <div class="card-k-icon w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                </svg>
            </div>
        </div>

        {{-- Card Keuntungan --}}
        <div class="card-keuangan rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-start justify-between shadow-sm min-w-0"
            data-color="emerald">
            <div class="min-w-0 flex-1 pr-2">
                <p
                    class="card-k-label text-[11px] sm:text-[10px] md:text-xs font-bold uppercase tracking-wider mb-2 line-clamp-2 leading-tight">
                    Total Keuntungan</p>
                <p class="card-k-value text-base sm:text-sm md:text-xl font-bold break-words whitespace-normal">
                    Rp{{ number_format($keuanganBulanIni?->keuntungan ?? 0, 0, ',', '.') }}
                </p>
            </div>
            <div class="card-k-icon w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>

    </div>

    {{-- Chart Section --}}
    {{-- Gaya box & font tetap 100% sama, cuma canvas dibungkus aspek rasio responsif yang dinamis --}}
    <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Grafik pendapatan (6 bulan terakhir)</p>
        <div class="relative w-full h-[180px] sm:h-[240px] md:h-[260px]">
            <canvas id="chartPendapatan"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Grafik pengeluaran (6 bulan terakhir)</p>
        <div class="relative w-full h-[180px] sm:h-[240px] md:h-[260px]">
            <canvas id="chartPengeluaran"></canvas>
        </div>
    </div>

    {{-- Form Input Keuangan --}}
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex items-center gap-2 mb-6">
            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <p class="text-sm font-bold text-gray-700">Input Data Keuangan Bulanan</p>
        </div>

        <form method="POST" action="{{ route('admin.keuangan.store') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-6">
                {{-- Row 1: 3 Kolom --}}
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-gray-500 ml-1">Bulan</label>
                    <input type="month" name="bulan" value="{{ $bulanIni }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-gray-500 ml-1">Pendapatan (Rp)</label>
                    <input type="number" name="total_pendapatan" placeholder="0"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold text-gray-500 ml-1">Pengeluaran (Rp)</label>
                    <input type="number" name="total_pengeluaran" placeholder="0"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition-all">
                </div>

                {{-- Row 2: Full Width untuk Catatan --}}
                <div class="space-y-1.5 sm:col-span-3">
                    <label class="text-xs font-semibold text-gray-500 ml-1">Catatan</label>
                    <textarea name="catatan" rows="3" placeholder="Tambahkan catatan detail di sini (opsional)..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-50 transition-all"></textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                    Simpan data keuangan
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        const labels = @json(collect($grafik)->pluck('bulan'));
        const pendapatan = @json(collect($grafik)->pluck('pendapatan'));
        const pengeluaran = @json(collect($grafik)->pluck('pengeluaran'));

        // Opsi konfigurasi chart yang mengizinkan responsivitas murni tanpa merusak aspek rasio
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false, // Memaksa chart mengikuti tinggi wrapper div di atas, bukan rasio kaku
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        new Chart(document.getElementById('chartPendapatan'), {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    data: pendapatan,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3b82f6',
                }]
            },
            options: chartOptions
        });

        new Chart(document.getElementById('chartPengeluaran'), {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    data: pengeluaran,
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239,68,68,0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ef4444',
                }]
            },
            options: chartOptions
        });
    </script>
@endsection
