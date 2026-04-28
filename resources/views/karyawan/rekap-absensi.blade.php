@extends('layouts.app')
@section('page-title', 'Rekap Absensi')
@section('page-subtitle', 'Lihat ringkasan kehadiranmu per bulan.')

@section('sidebar-menu')
    <a href="{{ route('karyawan.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
            {{ request()->routeIs('karyawan.beranda') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>
    <a href="{{ route('karyawan.riwayat.absen') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
            {{ request()->routeIs('karyawan.riwayat.absen') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Riwayat Absen
    </a>
    <a href="{{ route('karyawan.rekap.absensi') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
            {{ request()->routeIs('karyawan.rekap.absensi') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Rekap Absensi
    </a>
    <a href="{{ route('karyawan.riwayat.cuti') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
            {{ request()->routeIs('karyawan.riwayat.cuti') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Riwayat Cuti
    </a>
@endsection

@section('content')

    {{-- Header + Filter --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="font-semibold text-gray-800 text-lg sm:text-xl">
                {{ \Carbon\Carbon::parse($bulan)->locale('id')->isoFormat('MMMM YYYY') }}
            </h2>
            <p class="text-xs text-gray-400 mt-0.5">Rekap kehadiranmu bulan ini</p>
        </div>
        <form method="GET" action="{{ route('karyawan.rekap.absensi') }}" class="w-full sm:w-auto">
            <input type="month" name="bulan" value="{{ $bulan }}" onchange="this.form.submit()"
                class="w-full sm:w-auto border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 shadow-sm">
        </form>
    </div>

    {{-- Rekap Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
        {{-- Hadir --}}
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-center gap-3 sm:gap-4 shadow-sm">
            <div
                class="w-10 h-10 sm:w-14 sm:h-14 bg-green-50 rounded-xl sm:rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 sm:w-7 sm:h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="min-w-0">
                <p class="text-[10px] sm:text-xs text-gray-400 truncate">Hadir</p>
                <p class="text-xl sm:text-3xl font-bold text-green-600 leading-none mt-1">{{ $rekap['hadir'] }}</p>
            </div>
        </div>

        {{-- Telat --}}
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-center gap-3 sm:gap-4 shadow-sm">
            <div
                class="w-10 h-10 sm:w-14 sm:h-14 bg-yellow-50 rounded-xl sm:rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 sm:w-7 sm:h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="min-w-0">
                <p class="text-[10px] sm:text-xs text-gray-400 truncate">Telat</p>
                <p class="text-xl sm:text-3xl font-bold text-yellow-500 leading-none mt-1">{{ $rekap['telat'] }}</p>
            </div>
        </div>

        {{-- Izin --}}
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-center gap-3 sm:gap-4 shadow-sm">
            <div
                class="w-10 h-10 sm:w-14 sm:h-14 bg-blue-50 rounded-xl sm:rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 sm:w-7 sm:h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div class="min-w-0">
                <p class="text-[10px] sm:text-xs text-gray-400 truncate">Izin</p>
                <p class="text-xl sm:text-3xl font-bold text-blue-500 leading-none mt-1">{{ $rekap['izin'] }}</p>
            </div>
        </div>

        {{-- Alpha --}}
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 flex items-center gap-3 sm:gap-4 shadow-sm">
            <div
                class="w-10 h-10 sm:w-14 sm:h-14 bg-red-50 rounded-xl sm:rounded-2xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 sm:w-7 sm:h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="min-w-0">
                <p class="text-[10px] sm:text-xs text-gray-400 truncate">Alpha</p>
                <p class="text-xl sm:text-3xl font-bold text-red-500 leading-none mt-1">{{ $rekap['alpha'] }}</p>
            </div>
        </div>
    </div>

    {{-- Progress Bar Kehadiran --}}
    <div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-semibold text-gray-700">Tingkat kehadiran</p>
            <p class="text-sm font-bold text-green-600">{{ $persentaseHadir }}%</p>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-2.5">
            <div class="bg-green-500 h-2.5 rounded-full transition-all duration-700"
                style="width: {{ $persentaseHadir }}%"></div>
        </div>
        <p class="text-[11px] text-gray-400 mt-2 italic text-center sm:text-left">
            {{ $rekap['hadir'] + $rekap['telat'] }} masuk / {{ $hariKerja }} hari kerja
        </p>
    </div>

    {{-- Tabel Detail Absensi --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <p class="font-semibold text-gray-800 text-sm">Detail Absensi</p>
            <span class="text-[10px] bg-gray-100 px-2 py-1 rounded-md text-gray-500 sm:hidden">Geser tabel &rarr;</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-wider">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Tanggal</th>
                        <th class="px-5 py-3 font-semibold text-center">Masuk</th>
                        <th class="px-5 py-3 font-semibold text-center">Pulang</th>
                        <th class="px-5 py-3 font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($absensiList as $absen)
                        <tr class="hover:bg-gray-50 transition-colors whitespace-nowrap">
                            <td class="px-5 py-3">
                                <div class="text-gray-800 font-medium">
                                    {{ $absen->tanggal->locale('id')->isoFormat('DD MMM YYYY') }}
                                </div>
                                <div class="text-[10px] text-gray-400 sm:hidden">
                                    {{ $absen->tanggal->locale('id')->isoFormat('dddd') }}
                                </div>
                            </td>
                            <td class="px-5 py-3 text-center text-green-600 font-semibold">
                                {{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '--:--' }}
                            </td>
                            <td class="px-5 py-3 text-center text-red-400">
                                {{ $absen->jam_pulang ? \Carbon\Carbon::parse($absen->jam_pulang)->format('H:i') : '--:--' }}
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
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase {{ $badge }}">
                                    {{ $absen->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg class="w-10 h-10 mb-2 opacity-20" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p>Data belum tersedia.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
