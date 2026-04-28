@extends('layouts.app')
@section('page-title', 'Analisis Keuangan')
@section('page-subtitle', 'Laporan pemasukan, pengeluaran, dan penggajian.')

@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>
    <a href="{{ route('admin.karyawan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
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
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Riwayat Pengajuan Cuti
    </a>
    <a href="{{ route('admin.keuangan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-600 md:bg-green-50 text-white md:text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Analisis Keuangan
    </a>
    <a href="{{ route('admin.penggajian.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Kelola Gaji Karyawan
    </a>
@endsection
@section('content')
    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gray-500 md:bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-white md:text-gray-400 mb-2">Total gaji di bulan ini</p>
            <p class="text-xl font-bold text-white md:text-green-600">Rp{{ number_format($totalGajiBulanIni, 0, ',', '.') }}</p>
        </div>
        <div class="bg-gray-500 md:bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-white md:text-gray-400 mb-2">Total pendapatan di bulan ini</p>
            <p class="text-xl font-bold text-white md:text-green-600">
                Rp{{ number_format($keuanganBulanIni?->total_pendapatan ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-red-500 md:bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-white md:text-gray-400 mb-2">Total pengeluaran di bulan ini</p>
            <p class="text-xl font-bold text-white md:text-red-500">
                Rp{{ number_format($keuanganBulanIni?->total_pengeluaran ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-green-600 md:bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-white md:text-gray-400 mb-2">Total keuntungan di bulan ini</p>
            <p class="text-xl font-bold text-white md:text-green-600">
                Rp{{ number_format($keuanganBulanIni?->keuntungan ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Chart --}}
    <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Grafik pendapatan (6 bulan terakhir)</p>
        <canvas id="chartPendapatan" height="100"></canvas>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Grafik pengeluaran (6 bulan terakhir)</p>
        <canvas id="chartPengeluaran" height="100"></canvas>
    </div>

    {{-- Form Input Keuangan --}}
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <p class="text-sm font-medium text-gray-700 mb-4">Input data keuangan bulanan</p>
        <form method="POST" action="{{ route('admin.keuangan.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Bulan</label>
                    <input type="month" name="bulan" value="{{ $bulanIni }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Total Pendapatan (Rp)</label>
                    <input type="number" name="total_pendapatan" placeholder="0"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Total Pengeluaran (Rp)</label>
                    <input type="number" name="total_pengeluaran" placeholder="0"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Catatan</label>
                    <input type="text" name="catatan" placeholder="Opsional"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
            </div>
            <button type="submit"
                class="px-6 py-2.5 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                Simpan data keuangan
            </button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        const labels = @json(collect($grafik)->pluck('bulan'));
        const pendapatan = @json(collect($grafik)->pluck('pendapatan'));
        const pengeluaran = @json(collect($grafik)->pluck('pengeluaran'));

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
            options: {
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
            }
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
            options: {
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
            }
        });
    </script>
@endsection
