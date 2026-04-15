@extends('layouts.app')
@section('page-title', 'Hai, selamat datang ' . auth()->user()->name . '!')
@section('page-subtitle', 'Lakukan absensi dan pantau aktivitas kamu hari ini.')

@section('sidebar-menu')
    <a href="{{ route('karyawan.beranda') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        Beranda
    </a>
    <a href="{{ route('karyawan.riwayat.absen') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
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
    {{-- Status Cards --}}
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <div class="flex justify-between align-center">
                <p class="text-xs text-gray-400 mb-2">Hari ini</p>
                <div class="flex justify-center items-center p-2 bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $today->locale('id')->isoFormat('dddd') }}</p>
            <p class="text-sm text-gray-400 mt-1">{{ $today->format('d/m/Y') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-gray-400 mb-2">Status absensi</p>
            @if ($absensiHariIni)
                <p class="text-3xl font-bold text-gray-800">Sudah absen</p>
                <p class="text-sm text-green-600 mt-1">Masuk {{ $absensiHariIni->jam_masuk }}</p>
            @else
                <p class="text-3xl font-bold text-gray-800">Belum absen</p>
                <p class="text-sm text-red-500 mt-1">Anda belum melakukan absensi</p>
            @endif
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-xs text-gray-400 mb-2">Status cuti</p>
            @if ($cutiAktif)
                <p class="text-3xl font-bold text-gray-800">Sedang cuti</p>
                <p class="text-sm text-green-600 mt-1">Anda sedang mengambil cuti</p>
            @else
                <p class="text-3xl font-bold text-gray-800">Tidak cuti</p>
                <p class="text-sm text-gray-400 mt-1">Anda sedang masuk kerja</p>
            @endif
        </div>
    </div>

    {{-- Absen Buttons --}}
    <div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Lakukan absensi</p>
        <div class="grid grid-cols-2 gap-3">
            {{-- Tambah variabel pengecekan --}}
            @php
                $sedangCuti = $cutiAktif !== null;
                $sudahAbsenMasuk = $absensiHariIni !== null;
                $sudahAbsenPulang = $absensiHariIni?->jam_pulang !== null;
            @endphp
            <form method="POST" action="{{ route('karyawan.absen.masuk') }}">
                @csrf
                <button type="submit" {{ $sudahAbsenMasuk || $sedangCuti ? 'disabled' : '' }}
                    class="w-full py-4 rounded-xl font-semibold text-sm transition
                    {{ $sudahAbsenMasuk
                        ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                        : ($sedangCuti
                            ? 'bg-blue-100 text-blue-400 cursor-not-allowed'
                            : 'bg-green-600 text-white hover:bg-green-700') }}">
                    {{ $sedangCuti ? 'Sedang Cuti' : 'Absen Masuk' }}
                </button>
            </form>
            <form method="POST" action="{{ route('karyawan.absen.pulang') }}">
                @csrf
                <button type="submit" {{ $sedangCuti || !$sudahAbsenMasuk || $sudahAbsenPulang ? 'disabled' : '' }}
                    class="w-full py-4 rounded-xl font-semibold text-sm transition
                    {{ $sedangCuti || !$sudahAbsenMasuk || $sudahAbsenPulang ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-gray-700 text-white hover:bg-gray-800' }}">
                        Absen Pulang
                </button>
            </form>
        </div>
    </div>

    {{-- Form Cuti --}}
    <div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Formulir pengajuan cuti</p>
        <form method="POST" action="{{ route('karyawan.cuti.ajukan') }}">
            @csrf
            <div class="flex items-center gap-3 mb-4">
                <div class="flex-1">
                    <label class="text-xs text-gray-400 mb-1 block">Dari:</label>
                    <input type="date" name="dari" value="{{ old('dari') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    @error('dari')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <span class="text-gray-400 mt-4">—</span>
                <div class="flex-1">
                    <label class="text-xs text-gray-400 mb-1 block">Sampai:</label>
                    <input type="date" name="sampai" value="{{ old('sampai') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    @error('sampai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="text-xs text-gray-400 mb-1 block">Alasan cuti</label>
                <textarea name="alasan" rows="3" placeholder="Alasan anda mengambil cuti"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 resize-none">{{ old('alasan') }}</textarea>
                @error('alasan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full py-3.5 bg-green-600 text-white rounded-xl font-semibold text-sm hover:bg-green-700 transition">
                Ajukan cuti
            </button>
        </form>
    </div>

    {{-- Riwayat --}}
    <div class="grid grid-cols-2 gap-4">
        {{-- Riwayat Absensi --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-sm font-medium text-gray-700 mb-1">Riwayat absensi</p>
            <p class="text-xs text-gray-400 mb-4">6 hari terakhir:</p>
            <div class="space-y-3">
                <div class="grid grid-cols-3 text-xs text-gray-400 border-b border-gray-50 pb-2">
                    <span></span><span class="text-center">Masuk</span><span class="text-center">Keluar</span>
                </div>
                @forelse($riwayatAbsen as $absen)
                    <div class="grid grid-cols-3 text-sm items-center">
                        <span
                            class="text-gray-600 text-xs">{{ $absen->tanggal->locale('id')->isoFormat('dddd DD/MM/YYYY') }}</span>
                        <span
                            class="text-center text-green-600 font-medium">{{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '-' }}</span>
                        <span
                            class="text-center text-red-500 font-medium">{{ $absen->jam_pulang ? \Carbon\Carbon::parse($absen->jam_pulang)->format('H:i') : '-' }}</span>
                    </div>
                @empty
                    <p class="text-xs text-gray-400">Belum ada riwayat absensi.</p>
                @endforelse
            </div>
        </div>

        {{-- Riwayat Cuti --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <p class="text-sm font-medium text-gray-700 mb-4">Riwayat cuti</p>
            <div class="space-y-3">
                <div class="grid grid-cols-3 text-xs text-gray-400 border-b border-gray-50 pb-2">
                    <span>Tanggal pengajuan</span><span class="text-center">Dari</span><span
                        class="text-center">Sampai</span>
                </div>
                @forelse($riwayatCuti as $cuti)
                    <div class="grid grid-cols-3 text-xs items-center">
                        <span class="text-gray-700 font-medium">{{ $cuti->tanggal_pengajuan->format('d F Y') }}</span>
                        <span class="text-center text-gray-500">{{ $cuti->dari->format('d/m/y') }}</span>
                        <span class="text-center text-gray-500">{{ $cuti->sampai->format('d/m/y') }}</span>
                    </div>
                @empty
                    <p class="text-xs text-gray-400">Belum ada riwayat cuti.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
