@extends('layouts.app')
@section('page-title', 'Haii, selamat datang Admin!')
@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
        Beranda
    </a>
    <a href="{{ route('admin.karyawan.index') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Data Karyawan
    </a>
    <a href="{{ route('admin.cuti.index') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Riwayat Pengajuan Cuti
    </a>
    <a href="{{ route('admin.keuangan.index') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        Analisis Keuangan
    </a>
    <a href="{{ route('admin.penggajian.index') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Penggajian
    </a>
@endsection
@section('content')
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-2">Total karyawan</p>
        <p class="text-4xl font-bold text-green-600">{{ $totalKaryawan }}</p>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-3">Detail kehadiran hari ini</p>
        <div class="flex gap-6">
            <div><p class="text-2xl font-bold text-gray-800">{{ $hadir }}</p><p class="text-xs text-gray-400">Hadir</p></div>
            <div><p class="text-2xl font-bold text-yellow-500">{{ $telat }}</p><p class="text-xs text-gray-400">Telat</p></div>
            <div><p class="text-2xl font-bold text-blue-500">{{ $izin }}</p><p class="text-xs text-gray-400">Izin</p></div>
        </div>
    </div>
</div>

{{-- Kehadiran Terkini --}}
<div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6">
    <p class="text-sm font-medium text-gray-700 mb-4">Kehadiran terkini</p>
    <div class="space-y-3">
        @forelse($kehadiranTerkini as $k)
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ $k->user->name }}&background=6366f1&color=fff" class="w-9 h-9 rounded-full">
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ $k->user->name }}</p>
                    <p class="text-xs text-gray-400">{{ $k->user->posisi ?? '-' }}</p>
                </div>
                <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $k->status === 'telat' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                    {{ $k->status === 'telat' ? 'Telat hadir' : 'Tepat waktu' }}
                </span>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-700">{{ \Carbon\Carbon::parse($k->jam_masuk)->format('H:i A') }}</p>
                <p class="text-xs text-gray-400">Check in</p>
            </div>
        </div>
        @empty
        <p class="text-sm text-gray-400">Belum ada kehadiran hari ini.</p>
        @endforelse
    </div>
</div>

{{-- Tabel Karyawan --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <p class="font-semibold text-gray-800">Data karyawan</p>
    </div>
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-400 text-xs">
            <tr>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Posisi</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">No.Telp</th>
                <th class="px-6 py-3 text-left">Domisili</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($karyawanList as $k)
            @php
                $absenHariIni = $k->absensis->first();
                $statusBadge = match($absenHariIni?->status ?? 'alpha') {
                    'hadir' => ['bg-green-100 text-green-700', 'Masuk'],
                    'telat' => ['bg-yellow-100 text-yellow-700', 'Telat'],
                    'izin'  => ['bg-blue-100 text-blue-700', 'Izin'],
                    default => ['bg-red-100 text-red-700', 'Alpha'],
                };
            @endphp
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3">
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name={{ $k->name }}&background=6366f1&color=fff" class="w-8 h-8 rounded-full">
                        <div>
                            <p class="font-medium text-gray-800">{{ $k->name }}
                                <span class="ml-1 px-2 py-0.5 rounded-full text-xs {{ $statusBadge[0] }}">{{ $statusBadge[1] }}</span>
                            </p>
                            <p class="text-xs text-gray-400">{{ $k->nip ?? '-' }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-3 text-gray-500">{{ $k->posisi ?? '-' }}</td>
                <td class="px-6 py-3 text-gray-500">{{ $k->email }}</td>
                <td class="px-6 py-3 text-gray-500">{{ $k->no_telp ?? '-' }}</td>
                <td class="px-6 py-3 text-gray-500">{{ $k->domisili ?? '-' }}</td>
                <td class="px-6 py-3">
                    <a href="{{ route('admin.karyawan.edit', $k) }}" class="text-gray-400 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/></svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection