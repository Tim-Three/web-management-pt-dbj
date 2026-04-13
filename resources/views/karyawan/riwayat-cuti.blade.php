@extends('layouts.app')
@section('page-title', 'Riwayat Cuti')
@section('sidebar-menu')
    <a href="{{ route('karyawan.beranda') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
        Beranda
    </a>
    <a href="{{ route('karyawan.riwayat.absen') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Riwayat Absen
    </a>
    <a href="{{ route('karyawan.riwayat.cuti') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg bg-green-50 text-green-700 font-medium text-sm mb-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Riwayat Cuti
    </a>
@endsection
@section('content')
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="font-semibold text-gray-800">Riwayat Cuti</h2>
    </div>
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-xs">
            <tr>
                <th class="px-6 py-3 text-left">Tanggal Pengajuan</th>
                <th class="px-6 py-3 text-center">Dari</th>
                <th class="px-6 py-3 text-center">Sampai</th>
                <th class="px-6 py-3 text-left">Alasan</th>
                <th class="px-6 py-3 text-center">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($riwayat as $cuti)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3 text-gray-700">{{ $cuti->tanggal_pengajuan->format('d M Y') }}</td>
                <td class="px-6 py-3 text-center text-gray-600">{{ $cuti->dari->format('d/m/Y') }}</td>
                <td class="px-6 py-3 text-center text-gray-600">{{ $cuti->sampai->format('d/m/Y') }}</td>
                <td class="px-6 py-3 text-gray-500 max-w-xs truncate">{{ $cuti->alasan }}</td>
                <td class="px-6 py-3 text-center">
                    @php
                        $statusColor = match($cuti->status) {
                            'disetujui' => 'bg-green-100 text-green-700',
                            'ditolak'   => 'bg-red-100 text-red-700',
                            default     => 'bg-yellow-100 text-yellow-700'
                        };
                        $statusLabel = match($cuti->status) {
                            'disetujui' => 'Disetujui',
                            'ditolak'   => 'Ditolak',
                            default     => 'Pending'
                        };
                    @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $statusColor }}">{{ $statusLabel }}</span>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada riwayat cuti.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">{{ $riwayat->links() }}</div>
</div>
@endsection