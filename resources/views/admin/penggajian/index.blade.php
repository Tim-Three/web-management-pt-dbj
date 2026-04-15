@extends('layouts.app')
@section('page-title', 'Penggajian')
@section('page-subtitle', 'Kelola dan proses penggajian karyawan bulan ini.')

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
        class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Kelola Gaji Karyawan
    </a>
@endsection

@section('content')

    {{-- Summary Cards: 4 kolom sesuai UI --}}
    <div class="grid grid-cols-4 gap-4 mb-6">

        {{-- Card 1: Total gaji sudah dibayar --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-xs text-gray-400 mb-3">Total gaji yang sudah dibayar</p>
                <p class="text-xl font-bold text-green-600">Rp{{ number_format($totalSudahDibayar, 0, ',', '.') }}</p>
            </div>
            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        {{-- Card 2: Total gaji belum dibayar --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-xs text-gray-400 mb-3">Total gaji yang belum dibayar</p>
                <p class="text-xl font-bold text-red-500">{{ number_format($totalBelumDibayar, 0, ',', '.') }}</p>
            </div>
            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        {{-- Card 3: Jumlah karyawan sudah dibayar --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-xs text-gray-400 mb-3">Jumlah karyawan sudah dibayar</p>
                <p class="text-xl font-bold text-green-600">{{ $jumlahSudahDibayar }} Orang</p>
            </div>
            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        {{-- Card 4: Jumlah karyawan belum dibayar --}}
        <div class="bg-white rounded-2xl p-5 border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-xs text-gray-400 mb-3">Jumlah karyawan belum dibayar</p>
                <p class="text-xl font-bold text-red-500">{{ $jumlahBelumDibayar }} Orang</p>
            </div>
            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Layout 2 kolom: Tabel kiri, Form kanan --}}
    <div class="grid grid-cols-3 gap-6">

        {{-- Tabel Penggajian (2/3 lebar) --}}
        <div class="col-span-2 bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <p class="font-semibold text-gray-800">Data penggajian</p>
                {{-- Filter Bulan dengan icon kalender --}}
                <div class="flex items-center gap-2 border border-gray-200 rounded-xl px-3 py-2">
                    <span class="text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($bulanIni)->locale('id')->isoFormat('MMMM YYYY') }}
                    </span>
                    <form method="GET" action="{{ route('admin.penggajian.index') }}" class="flex items-center">
                        <input type="month" name="bulan" value="{{ $bulanIni }}" onchange="this.form.submit()"
                            class="opacity-0 absolute w-8 h-8 cursor-pointer">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-400 text-xs">
                        <tr>
                            <th class="px-5 py-3 text-left font-medium">Nama</th>
                            <th class="px-5 py-3 text-left font-medium">Posisi</th>
                            <th class="px-5 py-3 text-right font-medium">Gaji pokok</th>
                            <th class="px-5 py-3 text-right font-medium">Tunjangan</th>
                            <th class="px-5 py-3 text-right font-medium">Potongan</th>
                            <th class="px-5 py-3 text-right font-medium">Total</th>
                            <th class="px-5 py-3 text-center font-medium">Status</th>
                            <th class="px-5 py-3 text-center font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($penggajian as $gaji)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $gaji->user->foto ? Storage::url($gaji->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($gaji->user->name) . '&background=6366f1&color=fff' }}"
                                            class="w-8 h-8 rounded-full flex-shrink-0 object-cover">
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $gaji->user->name }}</p>
                                            <p class="text-xs text-gray-400">{{ $gaji->user->nip ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-gray-500 text-xs">{{ $gaji->user->posisi ?? '-' }}</td>
                                <td class="px-5 py-3 text-right text-gray-600 text-xs">
                                    Rp{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-right text-green-600 text-xs">
                                    Rp{{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-right text-red-500 text-xs">
                                    Rp{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-right font-semibold text-gray-800 text-xs">
                                    Rp{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-center">
                                    @if ($gaji->status === 'sudah_dibayar')
                                        <span
                                            class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Sudah
                                            dibayar</span>
                                    @else
                                        <span
                                            class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Belum
                                            dibayar</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 text-center">
                                    @if ($gaji->status === 'belum_dibayar')
                                        <form method="POST" action="{{ route('admin.penggajian.bayar', $gaji) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1.5 bg-green-600 text-white text-xs font-semibold rounded-lg hover:bg-green-700 transition">
                                                Tandai dibayar
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-300">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-10 text-center text-gray-400 text-sm">
                                    Belum ada data penggajian untuk bulan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-50">{{ $penggajian->links() }}</div>
        </div>

        {{-- Form Input Gaji (1/3 lebar) --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6 h-fit">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="font-semibold text-gray-800">Input gaji karyawan</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Tambah atau update data gaji</p>
                </div>
                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.penggajian.store') }}">
                @csrf
                <div class="space-y-4">

                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Karyawan</label>
                        <div class="relative">
                            <select name="user_id" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 bg-white appearance-none">
                                <option value="">Pilih karyawan</option>
                                @foreach ($karyawan as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Bulan</label>
                        <div class="relative">
                            <input type="month" name="bulan" value="{{ $bulanIni }}" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Gaji pokok (Rp)</label>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" value="0" required
                            oninput="hitungTotal()"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Tunjangan (Rp)</label>
                        <input type="number" name="tunjangan" id="tunjangan" value="0" oninput="hitungTotal()"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>

                    <div>
                        <label class="text-xs text-gray-400 mb-1 block">Potongan (Rp)</label>
                        <input type="number" name="potongan" id="potongan" value="0" oninput="hitungTotal()"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    </div>

                    {{-- Total otomatis --}}
                    <div class="pt-1">
                        <p class="text-xs font-medium text-gray-500 mb-1">Total Gaji</p>
                        <p class="text-2xl font-bold text-gray-800" id="total-display">Rp0</p>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                        Simpan data gaji
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        function hitungTotal() {
            const pokok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
            const tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
            const potongan = parseFloat(document.getElementById('potongan').value) || 0;
            const total = pokok + tunjangan - potongan;
            document.getElementById('total-display').textContent = 'Rp' + total.toLocaleString('id-ID');
        }
    </script>

@endsection
