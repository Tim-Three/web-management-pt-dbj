@extends('layouts.app')
@section('page-title', 'Hai, selamat datang Admin!')
@section('page-subtitle', 'Ringkasan aktivitas karyawan hari ini.')

@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-600 md:bg-green-50 text-white md:text-green-700 font-medium text-sm mb-1">
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
    <a href="{{ route('admin.cuti.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Riwayat Pengajuan Cuti
    </a>
    <a href="{{ route('admin.keuangan.index') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
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

    {{-- Row 1: Stats + Kehadiran Terkini --}}
    <div class="flex flex-col gap-4 mb-4 md:grid" style="grid-template-columns: 300px 1fr;">

        {{-- Kiri: Total Karyawan + Detail Kehadiran (side by side on mobile, stacked on desktop) --}}
        <div class="flex gap-4 flex-row md:flex-col">

            {{-- Total Karyawan Card (hijau) --}}
            <div class="bg-green-600 rounded-2xl p-4 md:p-5 flex items-start justify-between min-h-28 w-1/2 md:w-full">
                <div>
                    <p class="text-green-200 text-xs md:text-sm mb-2 md:mb-3">Total karyawan</p>
                    <p class="text-3xl md:text-5xl font-bold text-white">{{ $totalKaryawan }}</p>
                </div>
                <div class="min-w-8 h-8 md:w-9 md:h-9 bg-white rounded-xl items-center justify-center md:flex hidden">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>

            {{-- Detail Kehadiran Hari Ini --}}
            <div
                class="bg-white rounded-2xl p-4 md:p-5 border border-gray-100 flex items-start justify-between min-h-28 w-1/2 md:w-full">
                <div class="flex-1">
                    <p class="text-2xs md:text-xs text-gray-400 mb-2 md:mb-4">Detail kehadiran <br> hari ini</p>
                    <div class="flex justify-start gap-2 md:gap-10">
                        <div>
                            <p class="text-3xl font-bold text-gray-800">{{ $hadir }}</p>
                            <p class="text-xs text-gray-400 mt-1">Hadir</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-800">{{ $telat }}</p>
                            <p class="text-xs text-gray-400 mt-1">Telat</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-800">{{ $izin }}</p>
                            <p class="text-xs text-gray-400 mt-1">Izin</p>
                        </div>
                    </div>
                </div>
                <div
                    class="min-w-8 h-8 md:w-9 md:h-9 bg-gray-100 rounded-xl flex items-center justify-center flex-shrink-0 md:block hidden">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kanan: Kehadiran Terkini --}}
        <div class="bg-white rounded-2xl p-4 md:p-5 border border-gray-100 min-h-32">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <p class="text-sm md:text-base font-semibold text-gray-700">Kehadiran terkini</p>
                <div class="w-8 h-8 md:w-9 md:h-9 bg-gray-100 rounded-xl flex items-center justify-center">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="space-y-2 md:space-y-4">
                @forelse($kehadiranTerkini as $k)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 md:gap-3">
                            <img src="{{ $k->foto ? Storage::url($k->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($k->name) . '&background=6366f1&color=fff&size=64' }}"
                                class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover" id="preview-edit">
                            <div>
                                <div class="flex items-center gap-1 md:gap-2">
                                    <p class="text-2xs md:text-sm font-medium text-gray-800">{{ $k->user->name }}</p>
                                    <span
                                        class="px-1 md:px-2 py-0.5 rounded-full text-3xs md:text-xs font-medium {{ $k->status === 'telat' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                                        {{ $k->status === 'telat' ? 'Telat hadir' : 'Tepat waktu' }}
                                    </span>
                                </div>
                                <p class="text-3xs md:text-xs text-gray-400">{{ $k->user->posisi ?? 'Karyawan' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xs md:text-sm font-semibold text-gray-700">
                                {{ \Carbon\Carbon::parse($k->jam_masuk)->format('h:i A') }}
                            </p>
                            <p class="text-3xs md:text-xs text-gray-400">Check in</p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 text-center py-4">Belum ada kehadiran hari ini.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Row 2: Tabel Data Karyawan --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden h-full">
        <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 flex items-center justify-between">
            <p class="font-semibold text-gray-800 text-sm md:text-base">Data karyawan</p>
            <div class="w-8 h-8 md:w-9 md:h-9 bg-gray-100 rounded-xl flex items-center justify-center">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
            <table class="w-full text-3xs md:text-sm min-w-full">
                <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                    <tr>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Nama</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden sm:table-cell">Posisi</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden md:table-cell">Email</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden lg:table-cell">No.Telp</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium hidden xl:table-cell">Domisili</th>
                        <th class="px-3 md:px-6 py-2 md:py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($karyawanList as $k)
                        @php
                            $absenHariIni = $k->absensis->first();
                            $statusBadge = match ($absenHariIni?->status ?? 'alpha') {
                                'hadir' => ['bg-green-100 text-green-700', 'Masuk'],
                                'telat' => ['bg-yellow-100 text-yellow-700', 'Telat'],
                                'izin' => ['bg-blue-100 text-blue-700', 'Izin'],
                                default => ['bg-red-100 text-red-700', 'Alpha'],
                            };
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <div class="flex items-center gap-2 md:gap-3">
                                    <img src="{{ $k->foto ? Storage::url($k->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($k->name) . '&background=6366f1&color=fff&size=64' }}"
                                        class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover" id="preview-edit">
                                    <div>
                                        <div class="flex items-center gap-1 md:gap-2">
                                            <p class="font-medium text-gray-800 text-2xs md:text-sm">{{ $k->name }}</p>
                                            <span
                                                class="px-1 md:px-2 py-0.5 rounded-full text-3xs md:text-xs font-medium {{ $statusBadge[0] }}">{{ $statusBadge[1] }}</span>
                                        </div>
                                        <p class="text-3xs md:text-xs text-gray-400">{{ $k->nip ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 md:px-6 py-2 md:py-3 text-gray-400 text-2xs md:text-sm hidden sm:table-cell">
                                {{ $k->posisi ?? '-' }}</td>
                            <td class="px-3 md:px-6 py-2 md:py-3 text-gray-400 text-2xs md:text-sm hidden md:table-cell">
                                {{ $k->email }}</td>
                            <td class="px-3 md:px-6 py-2 md:py-3 text-gray-400 text-2xs md:text-sm hidden lg:table-cell">
                                {{ $k->no_telp ?? '-' }}</td>
                            <td class="px-3 md:px-6 py-2 md:py-3 text-gray-400 text-2xs md:text-sm hidden xl:table-cell">
                                {{ $k->domisili ?? '-' }}</td>
                            <td class="px-3 md:px-6 py-2 md:py-3 relative">
                                {{-- Dropdown trigger --}}
                                <button onclick="toggleDropdown(event, 'dropdown-{{ $k->id }}')"
                                    class="text-gray-400 hover:text-gray-700 p-1 rounded-lg hover:bg-gray-100">
                                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                </svg>
                                </button>
                                {{-- Dropdown menu --}}
                                <div id="dropdown-{{ $k->id }}"
                                    class="hidden absolute right-3 md:right-6 top-8 md:top-10 bg-white border border-gray-100 rounded-xl shadow-lg z-10 w-32 md:w-36 py-1">
                                    <a href="{{ route('admin.karyawan.edit', $k) }}"
                                        class="flex items-center gap-2 px-3 md:px-4 py-2 text-2xs md:text-sm text-gray-600 hover:bg-gray-50">
                                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit Karyawan
                                    </a>
                                    <form method="POST" action="{{ route('admin.karyawan.destroy', $k) }}"
                                        onsubmit="return confirm('Yakin hapus karyawan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center gap-2 px-3 md:px-4 py-2 text-2xs md:text-sm text-red-400 hover:bg-red-50 w-full text-left">
                                            <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- Pagination --}}
        @if ($karyawanList->hasPages())
            <div class="px-4 md:px-6 py-3 md:py-4 border-t border-gray-100">
        @endif
        </div>

        {{-- Script untuk dropdown --}}
        <script>
            function toggleDropdown(event, id) {
                event.stopPropagation();
                const all = document.querySelectorAll('[id^="dropdown-"]');
                all.forEach(el => {
                    if (el.id !== id) el.classList.add('hidden');
                });
                document.getElementById(id).classList.toggle('hidden');
            }
            document.addEventListener('click', () => {
                document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
            });
        </script>

@endsection
