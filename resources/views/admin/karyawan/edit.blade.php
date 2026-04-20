@extends('layouts.app')
@section('page-title', 'Edit Karyawan')
@section('page-subtitle', 'Anda sedang mengedit data karyawan PT DBJ.')

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
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-600 md:bg-green-50 text-white md:text-green-700 font-medium text-sm mb-1">
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
        Penggajian
    </a>
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <div class="flex items-center gap-4 mb-6">
                <img src="{{ $karyawan->foto ? Storage::url($karyawan->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($karyawan->name) . '&background=6366f1&color=fff&size=64' }}"
                    class="w-16 h-16 rounded-full object-cover" id="preview-edit">
                <div>
                    <h2 class="font-semibold text-gray-800 text-lg">{{ $karyawan->name }}</h2>
                    <p class="text-sm text-gray-400">{{ $karyawan->email }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.karyawan.update', $karyawan) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Nama lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $karyawan->name) }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip', $karyawan->nip) }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Email</label>
                        <input type="email" name="email" value="{{ old('email', $karyawan->email) }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Password Karyawan <span
                                class="text-green-600">(Tidak bisa diubah)</span></label>
                        <div class="relative">
                            <input type="password" id="password-edit" readonly
                                class="w-full border border-gray-100 bg-gray-50 text-gray-400 rounded-xl px-4 py-2.5 pr-10 text-sm cursor-not-allowed focus:border-green-500">
                        </div>
                        <p class="text-[10px] text-gray-400 mt-1">
                            *Admin tidak diizinkan mengubah password karyawan.
                        </p>
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
                        <label class="text-xs text-gray-400 mb-1 block">No. Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $karyawan->no_telp) }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-xs text-gray-400 mb-1 block">Domisili</label>
                        <input type="text" name="domisili" value="{{ old('domisili', $karyawan->domisili) }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-xs text-gray-400 mb-1 block">Foto karyawan</label>
                        <div class="flex items-center gap-4">
                            <label class="flex-1 cursor-pointer">
                                <div
                                    class="border-2 border-dashed border-gray-200 rounded-xl px-4 py-3 text-center hover:border-green-400 transition">
                                    <p class="text-xs text-gray-400">Klik untuk ganti foto</p>
                                    <p class="text-xs text-gray-300 mt-0.5">JPG, JPEG, PNG — maks. 2MB</p>
                                </div>
                                <input type="file" name="foto" accept="image/*" class="hidden"
                                    onchange="previewFoto(this, 'preview-edit')">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.karyawan.index') }}"
                        class="flex-1 py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 py-2.5 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                        Simpan perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection