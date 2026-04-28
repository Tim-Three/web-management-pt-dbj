@extends('layouts.app')
@section('page-title', 'Riwayat Pengajuan Cuti')
@section('page-subtitle', 'Pantau dan kelola pengajuan cuti karyawan.')

@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>
    <a href="{{ route('admin.karyawan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md text-gray-600 hover:bg-gray-50 text-sm mb-1">
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
        class="flex items-center gap-3 px-2 py-2 rounded-md bg-green-600 md:bg-green-50 text-white md:text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Riwayat Pengajuan Cuti
    </a>
    <a href="{{ route('admin.keuangan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Analisis Keuangan
    </a>
    <a href="{{ route('admin.penggajian.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-md text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Kelola Gaji Karyawan
    </a>
@endsection

@section('content')

    {{-- Pengajuan Pending --}}
    @php $pending = $cutis->where('status', 'pending'); @endphp
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-gray-800">Pengajuan cuti menunggu persetujuan</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $pending->count() }} pengajuan pending</p>
            </div>
        </div>

        @if($pending->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-3xs md:text-sm min-w-full">
                    <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                        <tr>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Nama</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden sm:table-cell">Posisi</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden md:table-cell">Alasan cuti</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium hidden md:table-cell">Tanggal izin</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium">Tanggal mulai</th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium hidden sm:table-cell">Tanggal akhir
                            </th>
                            <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($cutis as $cuti)
                            @if($cuti->status === 'pending')
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2 md:gap-3">
                                            <img src="https://ui-avatars.com/api/?name={{ $cuti->user->name }}&background=6366f1&color=fff"
                                                class="w-8 h-8 md:w-9 md:h-9 rounded-full flex-shrink-0 object-cover">
                                            <div>
                                                <p class="font-medium text-gray-800 text-2xs md:text-sm">{{ $cuti->user->name }}</p>
                                                <p class="text-3xs md:text-xs text-gray-400">{{ $cuti->user->nip ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 md:px-6 py-2 md:py-4 text-gray-500 text-2xs md:text-sm hidden sm:table-cell">
                                        {{ $cuti->user->posisi ?? '-' }}</td>
                                    <td
                                        class="px-3 md:px-6 py-2 md:py-4 text-gray-600 max-w-xs text-2xs md:text-sm hidden md:table-cell">
                                        <p class="truncate">{{ $cuti->alasan }}</p>
                                    </td>
                                    <td
                                        class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm hidden md:table-cell">
                                        {{ $cuti->tanggal_pengajuan->format('d/m/Y') }}</td>
                                    <td class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm">
                                        {{ $cuti->dari->format('d/m/Y') }}</td>
                                    <td
                                        class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm hidden sm:table-cell">
                                        {{ $cuti->sampai->format('d/m/Y') }}</td>
                                    <td class="px-3 md:px-6 py-2 md:py-4">
                                        <div class="flex items-center justify-center gap-1 md:gap-2">
                                            <form method="POST" action="{{ route('admin.cuti.approve', $cuti) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="px-2 py-1 md:px-3 md:py-1.5 bg-green-600 text-white text-3xs md:text-xs font-medium rounded-md hover:bg-green-700 transition">
                                                    Setujui
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.cuti.tolak', $cuti) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="px-2 py-1 md:px-3 md:py-1.5 bg-red-500 text-white text-3xs md:text-xs font-medium rounded-md hover:bg-red-600 transition">
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="px-6 py-10 text-center text-gray-400 text-sm">
                Tidak ada pengajuan cuti yang menunggu persetujuan.
            </div>
        @endif
    </div>

    {{-- Riwayat Semua Cuti --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Riwayat semua pengajuan cuti</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-3xs md:text-sm min-w-full">
                <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                    <tr>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Nama</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden sm:table-cell">Posisi</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden md:table-cell">Alasan cuti</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium hidden md:table-cell">Tanggal izin</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium">Tanggal mulai</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium hidden sm:table-cell">Tanggal akhir
                        </th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-center font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($cutis as $cuti)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-3 md:px-6 py-2 md:py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2 md:gap-3">
                                                <img src="https://ui-avatars.com/api/?name={{ $cuti->user->name }}&background=6366f1&color=fff"
                                                    class="w-8 h-8 md:w-9 md:h-9 rounded-full flex-shrink-0 object-cover">
                                                <div>
                                                    <p class="font-medium text-gray-800 text-2xs md:text-sm">{{ $cuti->user->name }}</p>
                                                    <p class="text-3xs md:text-xs text-gray-400">{{ $cuti->user->nip ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 text-gray-500 text-2xs md:text-sm hidden sm:table-cell">
                                            {{ $cuti->user->posisi ?? '-' }}</td>
                                        <td
                                            class="px-3 md:px-6 py-2 md:py-4 text-gray-600 max-w-xs text-2xs md:text-sm hidden md:table-cell">
                                            <p class="truncate">{{ $cuti->alasan }}</p>
                                        </td>
                                        <td
                                            class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm hidden md:table-cell">
                                            {{ $cuti->tanggal_pengajuan->format('d/m/Y') }}</td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm">
                                            {{ $cuti->dari->format('d/m/Y') }}</td>
                                        <td
                                            class="px-3 md:px-6 py-2 md:py-4 text-center text-gray-500 text-2xs md:text-sm hidden sm:table-cell">
                                            {{ $cuti->sampai->format('d/m/Y') }}</td>
                                        <td class="px-3 md:px-6 py-2 md:py-4 text-center">
                                            @php
                                                $badge = match ($cuti->status) {
                                                    'disetujui' => ['bg-green-100 text-green-700 border border-green-200', 'Disetujui'],
                                                    'ditolak' => ['bg-red-100 text-red-600 border border-red-200', 'Ditolak'],
                                                    default => ['bg-yellow-100 text-yellow-700 border border-yellow-200', 'Pending'],
                                                };
                                            @endphp
                                        <span
                                                class="px-1.5 py-0.5 md:px-3 md:py-1 rounded-full text-3xs md:text-xs font-medium {{ $badge[0] }}">
                                                {{ $badge[1] }}
                                            </span>
                                        </td>
                                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada data pengajuan cuti.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4">{{ $cutis->links() }}</div>
    </div>

@endsection