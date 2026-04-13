@extends('layouts.app')
@section('page-title', 'Penggajian')

@section('sidebar-menu')
    <a href="{{ route('admin.beranda') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
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
    <a href="{{ route('admin.penggajian.index') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Penggajian
    </a>
@endsection

@section('content')

{{-- Summary Cards --}}
<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-2">Total gaji bulan ini</p>
        <p class="text-xl font-bold text-gray-800">Rp{{ number_format($totalGaji, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-2">Sudah dibayar</p>
        <p class="text-xl font-bold text-green-600">Rp{{ number_format($totalSudahDibayar, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-2">Belum dibayar</p>
        <p class="text-xl font-bold text-red-500">Rp{{ number_format($totalBelumDibayar, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white rounded-2xl p-5 border border-gray-100">
        <p class="text-xs text-gray-400 mb-2">Karyawan belum digaji</p>
        <p class="text-xl font-bold text-yellow-500">{{ $jumlahBelumDibayar }} orang</p>
    </div>
</div>

<div class="grid grid-cols-2 gap-6">

    {{-- Tabel Penggajian --}}
    <div class="col-span-2 bg-white rounded-2xl border border-gray-100 overflow-x-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-gray-800">Data penggajian</h2>
                <p class="text-xs text-gray-400 mt-0.5">Bulan: {{ \Carbon\Carbon::parse($bulanIni)->locale('id')->isoFormat('MMMM YYYY') }}</p>
            </div>
            {{-- Filter Bulan --}}
            <form method="GET" action="{{ route('admin.penggajian.index') }}">
                <input type="month" name="bulan" value="{{ $bulanIni }}"
                    onchange="this.form.submit()"
                    class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-green-500">
            </form>
        </div>

        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-400 text-xs">
                <tr>
                    <th class="px-5 py-3 text-left">Karyawan</th>
                    <th class="px-5 py-3 text-right">Gaji pokok</th>
                    <th class="px-5 py-3 text-right">Tunjangan</th>
                    <th class="px-5 py-3 text-right">Potongan</th>
                    <th class="px-5 py-3 text-right">Total</th>
                    <th class="px-5 py-3 text-center">Status</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($penggajian as $gaji)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name={{ $gaji->user->name }}&background=6366f1&color=fff"
                                class="w-8 h-8 rounded-full flex-shrink-0">
                            <div>
                                <p class="font-medium text-gray-800">{{ $gaji->user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $gaji->user->posisi ?? '-' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-right text-gray-600">{{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-5 py-4 text-right text-green-600">+{{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                    <td class="px-5 py-4 text-right text-red-500">-{{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                    <td class="px-5 py-4 text-right font-semibold text-gray-800">{{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                    <td class="px-5 py-4 text-center">
                        @if($gaji->status === 'sudah_dibayar')
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Sudah dibayar</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Belum dibayar</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($gaji->status === 'belum_dibayar')
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
                    <td colspan="7" class="px-6 py-10 text-center text-gray-400">
                        Belum ada data penggajian untuk bulan ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">{{ $penggajian->links() }}</div>
    </div>

    {{-- Form Input Gaji --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6 h-fit">
        <h3 class="font-semibold text-gray-800 mb-1">Input gaji karyawan</h3>
        <p class="text-xs text-gray-400 mb-5">Tambah atau update data gaji</p>

        <form method="POST" action="{{ route('admin.penggajian.store') }}" id="form-gaji">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Karyawan</label>
                    <select name="user_id" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500 bg-white">
                        <option value="">Pilih karyawan</option>
                        @foreach($karyawan as $k)
                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Bulan</label>
                    <input type="month" name="bulan" value="{{ $bulanIni }}" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Gaji pokok (Rp)</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" placeholder="0" required
                        oninput="hitungTotal()"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Tunjangan (Rp)</label>
                    <input type="number" name="tunjangan" id="tunjangan" placeholder="0"
                        oninput="hitungTotal()"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">Potongan (Rp)</label>
                    <input type="number" name="potongan" id="potongan" placeholder="0"
                        oninput="hitungTotal()"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                </div>

                {{-- Total otomatis --}}
                <div class="bg-gray-50 rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-400 mb-1">Total gaji</p>
                    <p class="text-lg font-bold text-gray-800" id="total-display">Rp 0</p>
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
    document.getElementById('total-display').textContent = 'Rp ' + total.toLocaleString('id-ID');
}
</script>

@endsection