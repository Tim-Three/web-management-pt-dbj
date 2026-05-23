@extends('layouts.app')
@section('page-title', 'Data Karyawan')
@section('page-subtitle', 'Kelola data seluruh karyawan PT DBJ.')

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

    {{-- Summary Cards (Format yang konsisten dengan Row 1) --}}
    <div class="flex flex-col gap-4 mb-6 md:grid md:grid-cols-4">

        {{-- Container buat Mobile (Flex Row) / Buat Desktop (Langsung Grid) --}}
        {{-- Di HP dia bakal bagi dua kolom (50-50), di Desktop dia bakal jadi bagian dari grid 4 kolom --}}
        <div class="flex flex-row md:contents gap-4">

            {{-- 1. Total Karyawan Card (Hijau) --}}
            <div class="bg-green-600 rounded-2xl p-4 md:p-5 flex items-start justify-between min-h-[112px] w-1/2 md:w-full">
                <div>
                    <p class="text-green-200 text-2xs md:text-xs mb-2 md:mb-3">Total karyawan</p>
                    <p class="text-3xl md:text-5xl font-bold text-white">{{ $totalKaryawan }}</p>
                </div>
                <div class="min-w-8 h-8 md:w-9 md:h-9 bg-white rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>

            {{-- 2. Detail Kehadiran Card (Gabungan Hadir, Telat, Izin di HP) --}}
            {{-- Di HP ini jadi satu kotak gede sebelah kanan --}}
            <div
                class="bg-white rounded-2xl p-4 md:p-5 border border-gray-100 flex items-start justify-between min-h-[112px] w-1/2 md:hidden">
                <div class="flex-1">
                    <p class="text-2xs text-gray-400 mb-2">Detail kehadiran <br> hari ini</p>
                    <div class="flex justify-start gap-3">
                        <div>
                            <p class="text-xl font-bold text-gray-800">{{ $hadir }}</p>
                            <p class="text-[10px] text-gray-400">Hadir</p>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-800">{{ $telat }}</p>
                            <p class="text-[10px] text-gray-400">Telat</p>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-800">{{ $izin }}</p>
                            <p class="text-[10px] text-gray-400">Izin</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. Tampilan Desktop buat Hadir, Telat, Izin (Terpisah 3 kolom) --}}
            <div class="bg-white rounded-2xl p-5 border border-gray-100 hidden md:block">
                <p class="text-xs text-gray-400 mb-2">Hadir hari ini</p>
                <p class="text-3xl font-bold text-gray-800">{{ $hadir }}</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 hidden md:block">
                <p class="text-xs text-gray-400 mb-2">Telat hari ini</p>
                <p class="text-3xl font-bold text-gray-800">{{ $telat }}</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 hidden md:block">
                <p class="text-xs text-gray-400 mb-2">Izin/Cuti hari ini</p>
                <p class="text-3xl font-bold text-gray-800">{{ $izin }}</p>
            </div>

        </div>
    </div>

    {{-- Tabel Karyawan --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-4 md:px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-sm md:text-base font-semibold text-gray-800">Daftar karyawan</h2>
                <p class="text-2xs md:text-xs text-gray-400 mt-0.5">{{ $karyawan->total() }} karyawan terdaftar</p>
            </div>
            <button onclick="document.getElementById('modal-tambah').classList.remove('hidden')"
                class="flex items-center gap-1 md:gap-2 px-2 md:px-4 py-2 bg-green-600 text-white text-xs md:text-sm font-semibold rounded-xl hover:bg-green-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah karyawan
            </button>
        </div>

        <div class="overflow-x-auto w-full">
    {{-- Mengubah font dasar tabel dari text-3xs ke text-xs di mobile --}}
    <table class="w-full text-xs md:text-sm min-w-max table-auto">
        {{-- Mengubah font header dari text-2xs ke text-xs --}}
        <thead class="bg-gray-50 text-gray-500 text-xs font-semibold uppercase tracking-wider">
            <tr>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">Nama</th>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">Posisi</th>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">Shift</th>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">Email</th>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">No. Telp</th>
                <th class="px-4 md:px-6 py-3 text-left whitespace-nowrap">Domisili</th>
                <th class="px-4 md:px-6 py-3 text-center whitespace-nowrap">Status</th>
                <th class="px-4 md:px-6 py-3 text-center whitespace-nowrap">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($karyawan as $k)
                @php
                    $absen = $k->absensis->first();
                    $badge = match ($absen?->status ?? 'alpha') {
                        'hadir' => ['bg-green-100 text-green-700', 'Masuk'],
                        'telat' => ['bg-yellow-100 text-yellow-700', 'Telat'],
                        'izin' => ['bg-blue-100 text-blue-700', 'Izin'],
                        default => ['bg-red-100 text-red-600', 'Alpha'],
                    };
                @endphp
                <tr class="hover:bg-gray-50/75 transition-colors">
                    {{-- Kolom Nama --}}
                    <td class="px-4 md:px-6 py-3.5 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="{{ $k->foto ? Storage::url($k->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($k->name) . '&background=6366f1&color=fff' }}"
                                class="w-9 h-9 rounded-full flex-shrink-0 object-cover shadow-sm">
                            <div>
                                {{-- Text nama diubah dari text-2xs ke text-xs (mobile) dan text-sm (md) --}}
                                <p class="font-semibold text-gray-800 text-xs md:text-sm">{{ $k->name }}</p>
                                {{-- Text NIP diubah dari text-3xs ke text-2xs (mobile) dan text-xs (md) --}}
                                <p class="text-2xs md:text-xs text-gray-400 mt-0.5">{{ $k->nip ?? '-' }}</p>
                            </div>
                        </div>
                    </td>
                    
                    {{-- Kolom Posisi --}}
                    <td class="px-4 md:px-6 py-3.5 text-gray-600 whitespace-nowrap">
                        {{ $k->posisi ?? '-' }}
                    </td>
                    
                    {{-- Kolom Shift --}}
                    <td class="px-4 md:px-6 py-3.5 whitespace-nowrap">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium
                            {{ ($k->shift ?? 'pagi') === 'malam' ? 'bg-indigo-50 text-indigo-600' : 'bg-amber-50 text-amber-600' }}">
                            @if(($k->shift ?? 'pagi') === 'malam')
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                                </svg>
                                Malam
                            @else
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                                </svg>
                                Pagi
                            @endif
                        </span>
                    </td>
                    
                    {{-- Kolom Email --}}
                    <td class="px-4 md:px-6 py-3.5 text-gray-600 whitespace-nowrap">
                        {{ $k->email }}
                    </td>
                    
                    {{-- Kolom No Telp --}}
                    <td class="px-4 md:px-6 py-3.5 text-gray-600 whitespace-nowrap">
                        {{ $k->no_telp ?? '-' }}
                    </td>
                    
                    {{-- Kolom Domisili --}}
                    <td class="px-4 md:px-6 py-3.5 text-gray-600 whitespace-nowrap">
                        {{ $k->domisili ?? '-' }}
                    </td>
                    
                    {{-- Kolom Status Absen --}}
                    <td class="px-4 md:px-6 py-3.5 text-center whitespace-nowrap">
                        {{-- Badge text diubah ke text-xs konstan agar pas dibaca --}}
                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold {{ $badge[0] }}">
                            {{ $badge[1] }}
                        </span>
                    </td>
                    
                    {{-- Kolom Aksi --}}
                    <td class="px-4 md:px-6 py-3.5 text-center whitespace-nowrap">
                        <div class="flex items-center justify-center gap-2">
                            {{-- Button Edit & Hapus teksnya diubah ke text-xs --}}
                            <a href="{{ route('admin.karyawan.edit', $k) }}"
                                class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold rounded-lg transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.karyawan.destroy', $k) }}"
                                onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-semibold rounded-lg transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-4 md:px-6 py-10 text-center text-gray-400 text-xs md:text-sm">
                        Belum ada data karyawan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
        <div class="px-6 py-4">{{ $karyawan->links() }}</div>
    </div>

    {{-- Modal Tambah Karyawan --}}
    <div id="modal-tambah" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div class="bg-white rounded-2xl w-full max-w-lg mx-4 p-6 shadow-xl overflow-hidden max-h-screen">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-semibold text-gray-800">Tambah karyawan baru</h3>
                <button onclick="document.getElementById('modal-tambah').classList.add('hidden')"
                    class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.karyawan.store') }}" enctype="multipart/form-data"
                class="overflow-hidden">
                @csrf
                <div class="flex flex-col md:grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Nama lengkap</label>
                        <input type="text" name="name" required placeholder="Nama lengkap"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">NIP</label>
                        <input type="text" name="nip" placeholder="Nomor induk pegawai"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Email</label>
                        <input type="email" name="email" required placeholder="email@contoh.com"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password-tambah" required
                                placeholder="Min. 8 karakter"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm focus:outline-none focus:border-green-500">
                            <button type="button" onclick="togglePassword('password-tambah', 'eye-tambah')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eye-tambah" class="w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Posisi/Jabatan</label>
                        <select name="posisi"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 bg-white">
                            <option value="">-- Pilih posisi --</option>
                            @foreach ($listPosisi as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Shift kerja <span
                                class="text-red-400">*</span></label>
                        <select name="shift" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 bg-white">
                            <option value="pagi">Shift Pagi (08:00–14:00)</option>
                            <option value="malam">Shift Malam (14:00–20:00)</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="08xx-xxxx-xxxx"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-xs text-gray-400 mb-1 block">Domisili</label>
                        <input type="text" name="domisili" placeholder="Kota, Provinsi"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-xs text-gray-400 mb-1 block">Foto karyawan</label>
                        <div class="flex items-center gap-4">
                            <div id="preview-tambah"
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <label class="flex-1 cursor-pointer">
                                <div
                                    class="border-2 border-dashed border-gray-200 rounded-xl px-4 py-3 text-center hover:border-green-400 transition">
                                    <p class="text-xs text-gray-400">Klik untuk upload foto</p>
                                    <p class="text-xs text-gray-300 mt-0.5">JPG, JPEG, PNG — maks. 2MB</p>
                                </div>
                                <input type="file" name="foto" accept="image/*" class="hidden"
                                    onchange="previewFoto(this, 'preview-tambah')">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="document.getElementById('modal-tambah').classList.add('hidden')"
                        class="flex-1 py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 py-2.5 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
