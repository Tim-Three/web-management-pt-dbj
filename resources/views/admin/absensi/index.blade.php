@extends('layouts.app')
@section('page-title', 'Rekap Absensi')
@section('page-subtitle', 'Pantau kehadiran seluruh karyawan per bulan.')

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

    {{-- Header + Filter Bulan --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="font-semibold text-gray-800 text-lg sm:text-xl text-center sm:text-left">
                Bulan: {{ \Carbon\Carbon::parse($bulan)->locale('id')->isoFormat('MMMM YYYY') }}
            </h2>
            <p class="text-xs text-gray-400 mt-0.5 text-center sm:text-left">Rekap kehadiran seluruh karyawan</p>
        </div>
        <form method="GET" action="{{ route('admin.absensi.index') }}" class="w-full sm:w-auto">
            <input type="month" name="bulan" value="{{ $bulan }}" onchange="this.form.submit()"
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 ">
        </form>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
        @php
            $cards = [
                [
                    'label' => 'Total Hadir',
                    'val' => $summary['hadir'],
                    'color' => 'green',
                    'icon' => 'M5 13l4 4L19 7',
                    'desc' => 'record hadir',
                ],
                [
                    'label' => 'Total Telat',
                    'val' => $summary['telat'],
                    'color' => 'yellow',
                    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    'desc' => 'record telat',
                ],
                [
                    'label' => 'Total Izin',
                    'val' => $summary['izin'],
                    'color' => 'blue',
                    'icon' =>
                        'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'desc' => 'record izin',
                ],
                [
                    'label' => 'Total Alpha',
                    'val' => $summary['alpha'],
                    'color' => 'red',
                    'icon' => 'M6 18L18 6M6 6l12 12',
                    'desc' => 'record alpha',
                ],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-start justify-between ">
                <div class="min-w-0">
                    <p class="text-[10px] sm:text-xs text-gray-400 mb-1 truncate">{{ $card['label'] }}</p>
                    <p class="text-xl sm:text-3xl font-bold text-{{ $card['color'] }}-600 leading-tight">
                        {{ $card['val'] }}</p>
                    <p class="text-[9px] sm:text-xs text-gray-300 mt-1 uppercase tracking-wider">{{ $card['desc'] }}</p>
                </div>
                <div
                    class="w-8 h-8 sm:w-10 sm:h-10 bg-{{ $card['color'] }}-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 text-{{ $card['color'] }}-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}" />
                    </svg>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Main Layout: Per Karyawan & Detail Harian (Responsif: Stack di HP) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Rekap Per Karyawan (Pindah ke Atas di Mobile) --}}
        <div class="lg:col-span-1 bg-white rounded-2xl border border-gray-100 overflow-hidden h-fit ">
            <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50">
                <p class="font-semibold text-gray-800 text-sm">Rekap per karyawan</p>
                <p class="text-[10px] text-gray-400 mt-0.5 italic">*Total akumulasi bulan ini</p>
            </div>
            <div class="divide-y divide-gray-50 max-h-[400px] lg:max-h-[600px] overflow-y-auto">
                @foreach ($rekap as $r)
                    <div class="px-4 py-3 flex items-center gap-3 hover:bg-gray-50 transition-colors">
                        <img src="{{ $r['user']->foto ? Storage::url($r['user']->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($r['user']->name) . '&background=6366f1&color=fff' }}"
                            class="w-9 h-9 rounded-full object-cover ring-2 ring-gray-100 flex-shrink-0">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-800 truncate">{{ $r['user']->name }}</p>
                            <div class="flex flex-wrap gap-1.5 mt-1">
                                <span
                                    class="text-[9px] px-1.5 py-0.5 rounded bg-green-50 text-green-700 border border-green-100">{{ $r['hadir'] }}H</span>
                                <span
                                    class="text-[9px] px-1.5 py-0.5 rounded bg-yellow-50 text-yellow-700 border border-yellow-100">{{ $r['telat'] }}T</span>
                                <span
                                    class="text-[9px] px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-100">{{ $r['izin'] }}I</span>
                                <span
                                    class="text-[9px] px-1.5 py-0.5 rounded bg-red-50 text-red-700 border border-red-100">{{ $r['alpha'] }}A</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tabel Absensi Harian --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100  overflow-hidden flex flex-col">
            <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-gray-800 text-sm">Detail absensi harian</p>
                    <p class="text-[10px] text-gray-400">Log kehadiran seluruh staf</p>
                </div>
                <div class="sm:hidden text-[10px] bg-gray-100 px-2 py-1 rounded text-gray-500">Geser &rarr;</div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-tighter sm:tracking-normal">
                        <tr>
                            <th class="px-5 py-3 font-medium">Karyawan</th>
                            <th class="px-5 py-3 font-medium text-center">Tgl</th>
                            <th class="px-5 py-3 font-medium text-center">Masuk</th>
                            <th class="px-5 py-3 font-medium text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($absensiHarian as $absen)
                            <tr
                                class="hover:bg-gray-50 transition-colors whitespace-nowrap sm:whitespace-normal text-xs sm:text-sm">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-2.5">
                                        <img src="{{ $absen->user->foto ? Storage::url($absen->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($absen->user->name) . '&background=6366f1&color=fff' }}"
                                            class="w-7 h-7 rounded-full object-cover sm:hidden">
                                        <div class="min-w-0">
                                            <p class="font-semibold text-gray-800 leading-tight truncate">
                                                {{ $absen->user->name }}</p>
                                            <p class="text-[10px] text-gray-400 hidden sm:block">
                                                {{ $absen->user->posisi ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-center text-gray-600">
                                    {{ $absen->tanggal->locale('id')->isoFormat('DD/MM') }}
                                </td>
                                <td class="px-5 py-3 text-center">
                                    <span
                                        class="text-green-600 font-medium">{{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '--:--' }}</span>
                                </td>
                                <td class="px-5 py-3 text-center">
                                    @php
                                        $badge = match ($absen->status) {
                                            'hadir' => 'bg-green-100 text-green-700',
                                            'telat' => 'bg-yellow-100 text-yellow-700',
                                            'izin' => 'bg-blue-100 text-blue-700',
                                            default => 'bg-red-100 text-red-700',
                                        };
                                    @endphp
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $badge }}">
                                        {{ substr($absen->status, 0, 1) }}<span
                                            class="hidden sm:inline">{{ substr($absen->status, 1) }}</span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-10 text-center text-gray-400">Data kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-5 py-4 border-t border-gray-50 bg-gray-50/30">
                {{ $absensiHarian->appends(['bulan' => $bulan])->links() }}
            </div>
        </div>

    </div>
@endsection
