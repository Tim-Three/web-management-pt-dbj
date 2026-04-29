@extends('layouts.app')
@section('page-title', 'Bantuan')

@section('sidebar-menu')
    @if (auth()->user()->role === 'admin')
        <a href="{{ route('admin.beranda') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.beranda') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Beranda
        </a>
        <a href="{{ route('admin.karyawan.index') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.karyawan.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Data Karyawan
        </a>
        <a href="{{ route('admin.absensi.index') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.absensi.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Rekap Absensi
        </a>
        <a href="{{ route('admin.cuti.index') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.cuti.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Riwayat Pengajuan Cuti
        </a>
        <a href="{{ route('admin.keuangan.index') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.keuangan.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Analisis Keuangan
        </a>
        <a href="{{ route('admin.penggajian.index') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('admin.penggajian.*') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Kelola Gaji Karyawan
        </a>
    @else
        <a href="{{ route('karyawan.beranda') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('karyawan.beranda') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Beranda
        </a>
        <a href="{{ route('karyawan.riwayat.absen') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('karyawan.riwayat.absen') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Riwayat Absen
        </a>
        <a href="{{ route('karyawan.rekap.absensi') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('karyawan.rekap.absensi') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Rekap Absensi
        </a>
        <a href="{{ route('karyawan.riwayat.cuti') }}"
            class="flex items-center gap-3 px-2 py-2 rounded-lg {{ request()->routeIs('karyawan.riwayat.cuti') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }} text-sm mb-1 transition">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Riwayat Cuti
        </a>
    @endif
@endsection

@section('content')

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800">Pusat Bantuan</h2>
        <p class="text-sm text-gray-400 mt-1">Panduan penggunaan sistem Manajemen P&K PT Dipuro Berkah Jaya</p>
    </div>

    {{-- Tab Role --}}
    @if (auth()->user()->role === 'admin')
        {{-- ===================== KONTEN ADMIN ===================== --}}
        <div class="space-y-4">

            {{-- Cara Mengelola Karyawan --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-1')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara mengelola data karyawan</span>
                    </div>
                    <svg id="icon-acc-1" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-1" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Menambah karyawan baru:</span> Buka halaman Data
                            Karyawan, lalu klik tombol <span
                                class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">+ Tambah
                                karyawan</span> di pojok kanan atas. Isi semua data yang diperlukan seperti nama, email,
                            password, NIP, posisi, nomor telepon, dan domisili, lalu klik Simpan.</p>
                        <p><span class="font-semibold text-gray-800">Mengedit data karyawan:</span> Klik ikon titik tiga
                            (⋮) di baris karyawan yang ingin diedit, lalu pilih Edit Karyawan. Ubah data yang perlu
                            diperbarui. Kolom password bisa dikosongkan jika tidak ingin mengubah password.</p>
                        <p><span class="font-semibold text-gray-800">Menghapus karyawan:</span> Klik ikon titik tiga (⋮)
                            lalu pilih Hapus. Akan muncul konfirmasi sebelum data benar-benar dihapus. Perhatikan bahwa
                            menghapus karyawan akan menghapus seluruh data absensi dan cuti terkait.</p>
                        <p><span class="font-semibold text-gray-800">Status kehadiran:</span> Badge warna di sebelah nama
                            karyawan menunjukkan status kehadiran hari ini. Hijau = Masuk, Kuning = Telat, Biru = Izin,
                            Merah = Alpha.</p>
                    </div>
                </div>
            </div>

            {{-- Cara Mengelola Cuti --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-2')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-yellow-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara mengelola pengajuan cuti</span>
                    </div>
                    <svg id="icon-acc-2" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-2" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Melihat pengajuan cuti:</span> Buka halaman Riwayat
                            Pengajuan Cuti. Bagian atas menampilkan pengajuan yang masih berstatus Pending dan menunggu
                            keputusan admin.</p>
                        <p><span class="font-semibold text-gray-800">Menyetujui cuti:</span> Klik tombol <span
                                class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">Setujui</span> pada
                            baris pengajuan yang ingin disetujui. Status akan otomatis berubah menjadi Disetujui.</p>
                        <p><span class="font-semibold text-gray-800">Menolak cuti:</span> Klik tombol <span
                                class="bg-red-100 text-red-600 px-2 py-0.5 rounded font-medium">Tolak</span> pada baris
                            pengajuan yang ingin ditolak. Status akan otomatis berubah menjadi Ditolak.</p>
                        <p><span class="font-semibold text-gray-800">Riwayat semua cuti:</span> Bagian bawah halaman
                            menampilkan seluruh riwayat pengajuan cuti dari semua karyawan beserta statusnya.</p>
                    </div>
                </div>
            </div>

            {{-- Cara Mengelola Penggajian --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-3')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara mengelola penggajian</span>
                    </div>
                    <svg id="icon-acc-3" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-3" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Menginput gaji karyawan:</span> Buka halaman
                            Penggajian, lalu isi form di sebelah kanan. Pilih karyawan, pilih bulan, masukkan gaji pokok,
                            tunjangan, dan potongan. Total gaji akan terhitung otomatis. Klik Simpan data gaji.</p>
                        <p><span class="font-semibold text-gray-800">Menandai gaji sudah dibayar:</span> Setelah melakukan
                            pembayaran gaji di luar sistem (transfer bank atau tunai), klik tombol <span
                                class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">Tandai dibayar</span>
                            di tabel untuk mengubah status menjadi Sudah Dibayar.</p>
                        <p><span class="font-semibold text-gray-800">Filter berdasarkan bulan:</span> Gunakan input bulan
                            di pojok kanan atas tabel untuk melihat data penggajian bulan tertentu.</p>
                        <p><span class="font-semibold text-gray-800">Update data gaji:</span> Jika ingin mengubah nominal
                            gaji karyawan di bulan yang sama, cukup input ulang melalui form dengan memilih karyawan dan
                            bulan yang sama. Data akan otomatis diperbarui.</p>
                    </div>
                </div>
            </div>

            {{-- Cara Mengelola Keuangan --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-4')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara menggunakan analisis keuangan</span>
                    </div>
                    <svg id="icon-acc-4" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-4" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Melihat ringkasan keuangan:</span> Bagian atas halaman
                            Analisis Keuangan menampilkan total gaji, total pendapatan, total pengeluaran, dan keuntungan
                            bulan ini secara otomatis.</p>
                        <p><span class="font-semibold text-gray-800">Menginput data keuangan bulanan:</span> Isi form di
                            bagian bawah dengan memilih bulan, memasukkan total pendapatan dan total pengeluaran perusahaan
                            bulan tersebut. Keuntungan akan dihitung otomatis (Pendapatan - Pengeluaran - Total Gaji).</p>
                        <p><span class="font-semibold text-gray-800">Grafik tren:</span> Dua grafik di halaman ini
                            menampilkan tren pendapatan dan pengeluaran selama 6 bulan terakhir untuk memudahkan analisis
                            perkembangan keuangan perusahaan.</p>
                    </div>
                </div>
            </div>

        </div>
    @else
        {{-- ===================== KONTEN KARYAWAN ===================== --}}
        <div class="space-y-4">

            {{-- Cara Absensi --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-k1')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara melakukan absensi</span>
                    </div>
                    <svg id="icon-acc-k1" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-k1" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Absen masuk:</span> Buka halaman Beranda, lalu klik
                            tombol <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">Absen
                                masuk</span>. Absen masuk hanya bisa dilakukan sekali per hari. Jika dilakukan setelah pukul
                            08.00, status akan otomatis tercatat sebagai Telat.</p>
                        <p><span class="font-semibold text-gray-800">Absen pulang:</span> Setelah melakukan absen masuk,
                            tombol <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded font-medium">Absen
                                pulang</span> akan aktif. Klik tombol tersebut saat hendak pulang kerja.</p>
                        <p><span class="font-semibold text-gray-800">Status absensi:</span> Kartu Status Absensi di bagian
                            atas beranda akan menampilkan apakah kamu sudah absen hari ini beserta jam masuknya.</p>
                        <p><span class="font-semibold text-gray-800">Riwayat absensi:</span> Buka halaman Riwayat Absen
                            untuk melihat seluruh rekap kehadiran kamu lengkap dengan jam masuk, jam pulang, dan status per
                            hari.</p>
                    </div>
                </div>
            </div>

            {{-- Cara Pengajuan Cuti --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-k2')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Cara mengajukan cuti</span>
                    </div>
                    <svg id="icon-acc-k2" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-k2" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-3 text-sm text-gray-600 leading-relaxed">
                        <p><span class="font-semibold text-gray-800">Mengajukan cuti:</span> Di halaman Beranda, isi
                            Formulir Pengajuan Cuti dengan memilih tanggal mulai, tanggal selesai, dan alasan cuti yang
                            jelas. Klik tombol <span
                                class="bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">Ajukan cuti</span>.</p>
                        <p><span class="font-semibold text-gray-800">Status pengajuan:</span> Setelah diajukan, status cuti
                            akan menjadi Pending sampai admin memutuskan. Kamu akan bisa melihat statusnya berubah menjadi
                            Disetujui atau Ditolak.</p>
                        <p><span class="font-semibold text-gray-800">Riwayat cuti:</span> Buka halaman Riwayat Cuti untuk
                            melihat seluruh histori pengajuan cuti beserta status masing-masing.</p>
                        <p><span class="font-semibold text-gray-800">Status cuti aktif:</span> Jika pengajuan cuti
                            disetujui dan tanggal cuti sedang berjalan, kartu Status Cuti di beranda akan menampilkan
                            keterangan Sedang Cuti.</p>
                    </div>
                </div>
            </div>

            {{-- FAQ --}}
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <button onclick="toggleAccordion('acc-k3')"
                    class="w-full px-6 py-4 flex items-center justify-between text-left hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-800 text-sm">Pertanyaan umum (FAQ)</span>
                    </div>
                    <svg id="icon-acc-k3" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="acc-k3" class="hidden px-6 pb-5 border-t border-gray-50">
                    <div class="pt-4 space-y-4 text-sm text-gray-600 leading-relaxed">
                        <div>
                            <p class="font-semibold text-gray-800 mb-1">Apakah absen bisa dilakukan lebih dari sekali dalam
                                sehari?</p>
                            <p>Tidak. Absen masuk dan absen pulang masing-masing hanya bisa dilakukan satu kali per hari.
                            </p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 mb-1">Jam berapa batas absen masuk tepat waktu?</p>
                            <p>Batas absen masuk tepat waktu adalah pukul 08.00. Lewat dari jam tersebut akan otomatis
                                tercatat sebagai Telat.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 mb-1">Bagaimana jika lupa absen masuk?</p>
                            <p>Hubungi admin perusahaan untuk melakukan koreksi data absensi secara manual.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 mb-1">Berapa lama proses persetujuan cuti?</p>
                            <p>Proses persetujuan cuti tergantung pada admin. Pantau status pengajuan kamu di halaman
                                Riwayat Cuti.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif

    {{-- Kontak --}}
    <div class="mt-6 bg-green-50 border border-green-100 rounded-2xl p-5 flex items-start gap-4">
        <div class="w-9 h-9 bg-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-green-800 mb-1">Masih butuh bantuan?</p>
            <p class="text-sm text-green-700">Hubungi admin perusahaan atau kirim email ke <span
                    class="font-medium">ptdbj@gmail.com</span> untuk mendapatkan bantuan lebih lanjut.</p>
        </div>
    </div>

    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById('icon-' + id);
            const isHidden = content.classList.contains('hidden');

            // Tutup semua accordion
            document.querySelectorAll('[id^="acc-"]').forEach(el => {
                if (!el.id.startsWith('icon-')) el.classList.add('hidden');
            });
            document.querySelectorAll('[id^="icon-acc-"]').forEach(el => {
                el.style.transform = 'rotate(0deg)';
            });

            // Buka yang diklik jika sebelumnya tertutup
            if (isHidden) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>

@endsection
