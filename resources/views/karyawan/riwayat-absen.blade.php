@extends('layouts.app')
@section('page-title', 'Riwayat Absen')
@section('page-subtitle', 'Riwayat kehadiran kamu dalam beberapa waktu terakhir.')

@section('sidebar-menu')
    <a href="{{ route('karyawan.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>
    <a href="{{ route('karyawan.riwayat.absen') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Riwayat Absen
    </a>
    <a href="{{ route('karyawan.riwayat.cuti') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Riwayat Cuti
    </a>
@endsection
@section('content')
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800 text-sm md:text-base">Riwayat Absensi</h2>
        </div>
        <table class="w-full text-3xs md:text-sm min-w-full">
            <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                <tr>
                    <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Tanggal</th>
                    <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden sm:table-cell">Jam Masuk</th>
                    <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden md:table-cell">Jam Pulang</th>
                    <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($riwayat as $absen)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 md:px-6 py-2 md:py-3 text-gray-700">
                            <span class="hidden md:block">{{ $absen->tanggal->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</span>
                            <span class="md:hidden">{{ $absen->tanggal->locale('id')->isoFormat('ddd, DD MMM') }}</span>
                        </td>
                        <td class="px-3 md:px-6 py-2 md:py-3 text-green-600 font-medium hidden sm:table-cell">
                            {{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '-' }}
                        </td>
                        <td class="px-3 md:px-6 py-2 md:py-3 text-red-500 font-medium hidden md:table-cell">
                            {{ $absen->jam_pulang ? \Carbon\Carbon::parse($absen->jam_pulang)->format('H:i') : '-' }}
                        </td>
                        <td class="px-3 md:px-6 py-2 md:py-3">
                            @php
                                $statusColor = match ($absen->status) {
                                    'hadir' => 'bg-green-100 text-green-700',
                                    'telat' => 'bg-yellow-100 text-yellow-700',
                                    'izin' => 'bg-blue-100 text-blue-700',
                                    default => 'bg-red-100 text-red-700',
                                };
                            @endphp
                            <span class="px-1 md:px-2.5 py-0.5 md:py-1 rounded-full text-3xs md:text-xs font-medium {{ $statusColor }}">
                                {{ ucfirst($absen->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-3 md:px-6 py-4 md:py-8 text-center text-gray-400 text-xs md:text-sm">Belum ada riwayat absensi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 md:px-6 py-3 md:py-4 border-t border-gray-100">{{ $riwayat->links() }}</div>
    </div>
@endsection
