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
    <a href="{{ route('karyawan.rekap.absensi') }}"
        class="flex items-center gap-3 px-2 py-2 rounded-lg text-sm mb-1 transition
        {{ request()->routeIs('karyawan.rekap.absensi') ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Rekap Absensi
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

    {{--
    MOBILE HEADER (only visible on mobile, replaces page-title)
    --}}
    <div class="md:hidden flex items-center justify-between mb-4">
        <div>
            <p class="text-xs text-gray-400 font-medium">Selamat datang</p>
            <h1 class="text-lg font-bold text-gray-900 leading-tight">{{ auth()->user()->name }}</h1>
        </div>
    </div>

    {{--
    SECTION 1 — STATUS CARDS
    Desktop : 3 columns (hari ini | status absensi | status cuti)
    Mobile : green hero card on top, then 2 cards side by side
    --}}

    {{-- Desktop: 3 col grid (unchanged from original) --}}
    <div class="hidden md:grid grid-cols-3 gap-4 mb-6">
        <div class="bg-green-600 rounded-2xl p-5 border border-gray-100">
            <div class="flex justify-between align-center">
                <p class="text-xs text-white mb-2">Hari ini</p>
                <div class="flex justify-center items-center p-2 bg-white rounded-xl">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" class="w-4 h-4 text-gray-500">
                        <path
                            d="M7.3125 1.21875C10.6781 1.21875 13.4062 3.94692 13.4062 7.3125C13.4062 10.6781 10.6781 13.4062 7.3125 13.4062C3.94692 13.4062 1.21875 10.6781 1.21875 7.3125C1.21875 3.94692 3.94692 1.21875 7.3125 1.21875Z"
                            stroke="currentColor" stroke-width="0.8125" />
                        <path
                            d="M0.8125 7.3125C0.8125 3.72255 3.72255 0.8125 7.3125 0.8125C10.9024 0.8125 13.8125 3.72255 13.8125 7.3125C13.8125 10.9024 10.9024 13.8125 7.3125 13.8125C3.72255 13.8125 0.8125 10.9024 0.8125 7.3125Z"
                            stroke="currentColor" stroke-width="1.625" stroke-linecap="square" />
                        <path d="M7.3125 3.73755V7.31255L9.2625 9.26255" stroke="currentColor" stroke-width="1.625"
                            stroke-linecap="square" />
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white">{{ $today->locale('id')->isoFormat('dddd') }}</p>
            <p class="text-sm text-white mt-1">{{ $today->format('d/m/Y') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <div class="flex justify-between align-center mb-2">
                <p class="text-xs text-gray-400">Status absensi</p>
                <div class="flex justify-center items-center p-2 bg-gray-100 rounded-lg">
                    <svg width="13" height="10" viewBox="0 0 13 10" fill="none" class="w-4 h-4 text-gray-600">
                        <path
                            d="M6.06667 5.65217C6.52638 5.65217 6.96726 5.8354 7.29232 6.16155C7.61738 6.4877 7.8 6.93006 7.8 7.3913C7.8 8.23043 7.28693 8.89565 6.57713 9.33043C5.86733 9.76348 4.91833 10 3.9 10C2.88167 10 1.93267 9.76348 1.22287 9.33043C0.5122 8.89565 0 8.23043 0 7.3913C0 6.93006 0.182619 6.4877 0.507682 6.16155C0.832745 5.8354 1.27362 5.65217 1.73333 5.65217H6.06667ZM1.73333 6.52174C1.50348 6.52174 1.28304 6.61335 1.12051 6.77643C0.957976 6.9395 0.866667 7.16068 0.866667 7.3913C0.866667 7.83304 1.13013 8.25391 1.6744 8.58696C2.21867 8.92 3.00387 9.13043 3.9 9.13043C4.79613 9.13043 5.58133 8.92 6.1256 8.58696C6.66987 8.25391 6.93333 7.83304 6.93333 7.3913C6.93333 7.16068 6.84202 6.9395 6.67949 6.77643C6.51696 6.61335 6.29652 6.52174 6.06667 6.52174H1.73333ZM11.8317 5.65913C12.152 5.69186 12.4488 5.84266 12.6646 6.08234C12.8804 6.32201 12.9999 6.63351 13 6.95652C13 7.62696 12.5927 8.18174 12.0458 8.54783C11.4946 8.91652 10.7579 9.13043 9.96667 9.13043C9.36087 9.13043 8.788 9.00348 8.30527 8.78C8.44393 8.53043 8.54793 8.25739 8.6086 7.96C8.9752 8.14261 9.44407 8.26087 9.96667 8.26087C10.6106 8.26087 11.1748 8.08522 11.5648 7.82435C11.9574 7.56174 12.1333 7.24609 12.1333 6.95652C12.1334 6.85629 12.0989 6.75913 12.0357 6.68149C11.9725 6.60384 11.8845 6.55048 11.7867 6.53043L11.7 6.52174H8.51587C8.40528 6.20873 8.23614 5.91979 8.01753 5.67043C8.08855 5.65838 8.16044 5.65228 8.23247 5.65217H11.6991L11.8317 5.65913ZM10.1677 0.876522C10.6484 0.926228 11.0936 1.15297 11.4172 1.51291C11.7409 1.87285 11.9201 2.34042 11.9201 2.82522L11.9097 3.02522C11.86 3.50715 11.6341 3.95351 11.2755 4.27807C10.917 4.60264 10.4513 4.78239 9.9684 4.78261L9.76907 4.77217C9.32259 4.72647 8.90549 4.52764 8.58814 4.20923C8.27079 3.89082 8.07262 3.47232 8.02707 3.02435L8.01667 2.82435C8.01644 2.56712 8.06677 2.31237 8.16477 2.07468C8.26277 1.83699 8.40653 1.62102 8.58781 1.43914C8.76909 1.25725 8.98434 1.11302 9.22123 1.01468C9.45813 0.916354 9.71203 0.865858 9.9684 0.866087L10.1677 0.876522ZM3.9 0C4.5321 0 5.13831 0.25194 5.58527 0.700397C6.03223 1.14885 6.28333 1.75709 6.28333 2.3913C6.28333 3.02552 6.03223 3.63376 5.58527 4.08221C5.13831 4.53067 4.5321 4.78261 3.9 4.78261C3.2679 4.78261 2.66169 4.53067 2.21473 4.08221C1.76777 3.63376 1.51667 3.02552 1.51667 2.3913C1.51667 1.75709 1.76777 1.14885 2.21473 0.700397C2.66169 0.25194 3.2679 0 3.9 0.869565C3.49776 0.869565 3.11198 1.02989 2.82755 1.31527C2.54312 1.60065 2.38333 1.98771 2.38333 2.3913C2.38333 2.79489 2.54312 3.18195 2.82755 3.46734C3.11198 3.75272 3.49776 3.91304 3.9 3.91304C4.30225 3.91304 4.68801 3.75272 4.97245 3.46734C5.25688 3.18195 5.41667 2.79489 5.41667 2.3913C5.41667 1.98771 5.25688 1.60065 4.97245 1.31527C4.68801 1.02989 4.30225 0.869565 3.9 0.869565Z"
                            fill="currentColor" />
                    </svg>
                </div>
            </div>
            @if ($absensiHariIni)
                <p class="text-3xl font-bold text-gray-800">Sudah absen</p>
                <p class="text-sm text-green-600 mt-1">Masuk {{ $absensiHariIni->jam_masuk }}</p>
            @else
                <p class="text-3xl font-bold text-gray-800">Belum absen</p>
                <p class="text-sm text-red-500 mt-1">Anda belum melakukan absensi</p>
            @endif
        </div>
        <div class="bg-white rounded-2xl p-5 border border-gray-100">
            <div class="flex justify-between align-center mb-2">
                <p class="text-xs text-gray-400">Status cuti</p>
                <div class="flex justify-center items-center p-2 bg-gray-100 rounded-lg">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" class="w-4 h-4 text-gray-600">
                        <path
                            d="M5.81029 1.82668C5.81029 1.49567 5.94391 1.17822 6.18177 0.944162C6.41963 0.710105 6.74223 0.578613 7.07861 0.578613C7.41499 0.578613 7.7376 0.710105 7.97546 0.944162C8.21331 1.17822 8.34694 1.49567 8.34694 1.82668V4.93479L13.1935 7.43871C13.3097 7.49874 13.4069 7.58887 13.4748 7.69935C13.5427 7.80983 13.5786 7.93647 13.5786 8.06557V8.37086C13.5787 8.43342 13.5647 8.49523 13.5377 8.55186C13.5106 8.6085 13.4712 8.65856 13.4223 8.69848C13.3733 8.7384 13.316 8.7672 13.2544 8.7828C13.1929 8.79841 13.1286 8.80044 13.0661 8.78877L8.34694 7.91045V10.8195C8.34682 10.8966 8.36799 10.9722 8.40818 11.0383C8.44837 11.1045 8.50608 11.1586 8.57513 11.1949L9.91543 11.9004C10.0877 11.9912 10.2316 12.1262 10.332 12.2911C10.4324 12.456 10.4855 12.6446 10.4855 12.8368V13.1534C10.4856 13.2171 10.4711 13.2799 10.4431 13.3373C10.4151 13.3947 10.3744 13.4452 10.324 13.485C10.2736 13.5249 10.2147 13.5531 10.1517 13.5675C10.0887 13.582 10.0232 13.5823 9.96006 13.5685L7.07861 12.9417L4.19716 13.5685C4.13402 13.5823 4.06853 13.582 4.00554 13.5675C3.94255 13.5531 3.88366 13.5249 3.83322 13.485C3.78278 13.4452 3.74208 13.3947 3.71412 13.3373C3.68617 13.2799 3.67166 13.2171 3.67169 13.1534V12.8368C3.67174 12.6446 3.72479 12.456 3.82519 12.2911C3.92559 12.1262 4.06957 11.9912 4.24179 11.9004L5.5821 11.1942C5.65104 11.1579 5.70867 11.1039 5.74886 11.0379C5.78905 10.9719 5.81028 10.8965 5.81029 10.8195V7.91116L1.09113 8.78806C1.02866 8.79974 0.964348 8.7977 0.902776 8.78209C0.841204 8.76649 0.783893 8.7377 0.734935 8.69778C0.685978 8.65785 0.646581 8.60779 0.619559 8.55116C0.592537 8.49452 0.578556 8.43271 0.578613 8.37015V8.06557C0.578523 7.93635 0.614358 7.80956 0.682239 7.69894C0.75012 7.58832 0.847459 7.49809 0.963719 7.438L5.81029 4.93479V1.82668Z"
                            stroke="currentColor" stroke-width="1.15731" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            @if ($cutiAktif)
                <p class="text-3xl font-bold text-gray-800">Sedang cuti</p>
                <p class="text-sm text-green-600 mt-1">Anda sedang mengambil cuti</p>
            @else
                <p class="text-3xl font-bold text-gray-800">Tidak cuti</p>
                <p class="text-sm text-gray-400 mt-1">Anda sedang masuk kerja</p>
            @endif
        </div>
    </div>

    {{-- Mobile: green hero card full width --}}
    <div class="md:hidden bg-green-600 rounded-2xl p-5 mb-3 flex items-center justify-between">
        <div>
            <p class="text-xs text-green-200 mb-1">Hari ini</p>
            <p class="text-2xl font-bold text-white">{{ $today->locale('id')->isoFormat('dddd') }}</p>
            <p class="text-sm text-green-100 mt-0.5">{{ $today->format('d/m/Y') }}</p>
        </div>
        <svg width="22" height="22" viewBox="0 0 168 168" fill="none" class="w-20 h-20">
            <path
                d="M53.9522 35.0426C80.8589 18.5801 116.014 27.0457 132.477 53.9522C148.94 80.8589 140.474 116.015 113.567 132.478C86.6601 148.94 51.5047 140.473 35.0422 113.567C18.5799 86.6602 27.0459 51.5052 53.9522 35.0426Z"
                stroke="white" stroke-opacity="0.7" stroke-width="7.61504" />
            <path
                d="M31.7945 115.554C14.2344 86.8538 23.2649 49.3545 51.9654 31.7945C80.6659 14.2344 118.165 23.2649 135.725 51.9654C153.285 80.6659 144.255 118.165 115.554 135.725C86.8538 153.285 49.3545 144.255 31.7945 115.554Z"
                stroke="white" stroke-opacity="0.7" stroke-width="15.2301" stroke-linecap="square" />
            <path d="M66.2732 55.1783L83.7601 83.7592L108.888 89.8105" stroke="white" stroke-opacity="0.7"
                stroke-width="15.2301" stroke-linecap="square" />
        </svg>
    </div>

    {{-- Mobile: 2 status cards side by side --}}
    <div class="md:hidden grid grid-cols-2 gap-3 mb-3">
        <div class="bg-white rounded-2xl p-4 border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-gray-400">Status absensi</p>
                <div class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg width="13" height="10" viewBox="0 0 8 10" fill="none">
                        <path
                            d="M6.06667 5.65217C6.52638 5.65217 6.96726 5.8354 7.29232 6.16155C7.61738 6.4877 7.8 6.93006 7.8 7.3913C7.8 8.23043 7.28693 8.89565 6.57713 9.33043C5.86733 9.76348 4.91833 10 3.9 10C2.88167 10 1.93267 9.76348 1.22287 9.33043C0.5122 8.89565 0 8.23043 0 7.3913C0 6.93006 0.182619 6.4877 0.507682 6.16155C0.832745 5.8354 1.27362 5.65217 1.73333 5.65217H6.06667ZM3.9 0C4.5321 0 5.13831 0.25194 5.58527 0.700397C6.03223 1.14885 6.28333 1.75709 6.28333 2.3913C6.28333 3.02552 6.03223 3.63376 5.58527 4.08221C5.13831 4.53067 4.5321 4.78261 3.9 4.78261C3.2679 4.78261 2.66169 4.53067 2.21473 4.08221C1.76777 3.63376 1.51667 3.02552 1.51667 2.3913C1.51667 1.75709 1.76777 1.14885 2.21473 0.700397C2.66169 0.25194 3.2679 0 3.9 0Z"
                            fill="#9CA3AF" />
                    </svg>
                </div>
            </div>
            @if ($absensiHariIni)
                <p class="text-base font-bold text-gray-800 leading-tight">Sudah absen</p>
                <p class="text-xs text-green-600 mt-1 font-medium">Masuk
                    {{ \Carbon\Carbon::parse($absensiHariIni->jam_masuk)->format('H:i') }}
                </p>
            @else
                <p class="text-base font-bold text-gray-800 leading-tight">Belum absen</p>
                <p class="text-xs text-red-500 mt-1">Belum absensi</p>
            @endif
        </div>
        <div class="bg-white rounded-2xl p-4 border border-gray-100">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-gray-400">Status cuti</p>
                <div class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg width="13" height="13" viewBox="0 0 15 15" fill="none">
                        <path
                            d="M5.81029 1.82668V4.93479L0.963719 7.438C0.847459 7.49809 0.75012 7.58832 0.682239 7.69894C0.614358 7.80956 0.578523 7.93635 0.578613 8.06557V8.37015C0.578556 8.43271 0.592537 8.49452 0.619559 8.55116C0.646581 8.60779 0.685978 8.65785 0.734935 8.69778C0.783893 8.7377 0.841204 8.76649 0.902776 8.78209C0.964348 8.7977 1.02866 8.79974 1.09113 8.78806L5.81029 7.91116V10.8195C5.81028 10.8965 5.78905 10.9719 5.74886 11.0379C5.70867 11.1039 5.65104 11.1579 5.5821 11.1942L4.24179 11.9004C4.06957 11.9912 3.92559 12.1262 3.82519 12.2911C3.72479 12.456 3.67174 12.6446 3.67169 12.8368V13.1534C3.67166 13.2171 3.68617 13.2799 3.71412 13.3373C3.74208 13.3947 3.78278 13.4452 3.83322 13.485C3.88366 13.5249 3.94255 13.5531 4.00554 13.5675C4.06853 13.582 4.13402 13.5823 4.19716 13.5685L7.07861 12.9417L9.96006 13.5685C10.0232 13.5823 10.0887 13.582 10.1517 13.5675C10.2147 13.5531 10.2736 13.5249 10.324 13.485C10.3744 13.4452 10.4151 13.3947 10.4431 13.3373C10.4711 13.2799 10.4856 13.2171 10.4855 13.1534V12.8368C10.4855 12.6446 10.4324 12.456 10.332 12.2911C10.2316 12.1262 10.0877 11.9912 9.91543 11.9004L8.57513 11.1949C8.50608 11.1586 8.44837 11.1045 8.40818 11.0383C8.36799 10.9722 8.34682 10.8966 8.34694 10.8195V7.91045L13.0661 8.78877C13.1286 8.80044 13.1929 8.79841 13.2544 8.7828C13.316 8.7672 13.3733 8.7384 13.4223 8.69848C13.4712 8.65856 13.5106 8.6085 13.5377 8.55186C13.5647 8.49523 13.5787 8.43342 13.5786 8.37086V8.06557C13.5786 7.93647 13.5427 7.80983 13.4748 7.69935C13.4069 7.58887 13.3097 7.49874 13.1935 7.43871L8.34694 4.93479V1.82668C8.34694 1.49567 8.21331 1.17822 7.97546 0.944162C7.7376 0.710105 7.41499 0.578613 7.07861 0.578613C6.74223 0.578613 6.41963 0.710105 6.18177 0.944162C5.94391 1.17822 5.81029 1.49567 5.81029 1.82668Z"
                            stroke="#9CA3AF" stroke-width="1.15731" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            @if ($cutiAktif)
                <p class="text-base font-bold text-gray-800 leading-tight">Sedang cuti</p>
                <p class="text-xs text-green-600 mt-1 font-medium">Cuti aktif</p>
            @else
                <p class="text-base font-bold text-gray-800 leading-tight">Tidak cuti</p>
                <p class="text-xs text-gray-400 mt-1">Masuk kerja</p>
            @endif
        </div>
    </div>

    {{-- Lakukan Absensi --}}
    <div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Lakukan absensi</p>
        <div class="grid grid-cols-2 gap-3">
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
                                                            : 'bg-green-600 text-white hover:bg-green-700 active:scale-95') }}">
                    {{ $sedangCuti ? 'Sedang Cuti' : 'Absen Masuk' }}
                </button>
            </form>
            <form method="POST" action="{{ route('karyawan.absen.pulang') }}">
                @csrf
                <button type="submit" {{ $sedangCuti || !$sudahAbsenMasuk || $sudahAbsenPulang ? 'disabled' : '' }}
                    class="w-full py-4 rounded-xl font-semibold text-sm transition
                                                    {{ $sedangCuti || !$sudahAbsenMasuk || $sudahAbsenPulang
                                                        ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                                                        : 'bg-gray-700 text-white hover:bg-gray-800 active:scale-95' }}">
                    Absen Pulang
                </button>
            </form>
        </div>

        {{-- Show check-in/out times on mobile if already checked in --}}
        @if ($absensiHariIni)
            <div class="md:hidden mt-4 pt-4 border-t border-gray-50 grid grid-cols-2 gap-3 text-center">
                <div>
                    <p class="text-xs text-gray-400 mb-1">Jam masuk</p>
                    <p class="text-sm font-bold text-green-600">
                        {{ \Carbon\Carbon::parse($absensiHariIni->jam_masuk)->format('H:i') }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 mb-1">Jam pulang</p>
                    <p class="text-sm font-bold text-gray-700">
                        {{ $absensiHariIni->jam_pulang ? \Carbon\Carbon::parse($absensiHariIni->jam_pulang)->format('H:i') : '--:--' }}
                    </p>
                </div>
            </div>
        @endif
    </div>

    {{--
    SECTION 3 — FORM CUTI
    Desktop & Mobile: same card layout, date fields side by side
    --}}
    <div class="bg-white rounded-2xl p-5 border border-gray-100 mb-6">
        <p class="text-sm font-medium text-gray-700 mb-4">Formulir pengajuan cuti</p>
        <form method="POST" action="{{ route('karyawan.cuti.ajukan') }}">
            @csrf
            <div class="flex flex-col md:flex-row md:items-center gap-3 mb-4">
                <div class="flex-1">
                    <label class="text-xs text-gray-400 mb-1 block">Dari:</label>
                    <input type="date" name="dari" value="{{ old('dari') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-green-500">
                    @error('dari')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <span class="hidden md:block text-gray-400 mt-4">—</span>
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
                class="w-full py-3.5 bg-green-600 text-white rounded-xl font-semibold text-sm hover:bg-green-700 active:scale-95 transition">
                Ajukan cuti
            </button>
        </form>
    </div>

    {{--
    SECTION 4 — RIWAYAT
    Desktop : 2 columns side by side
    Mobile : stacked full width, one below the other
    --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Riwayat Absensi --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 flex items-center justify-between">
                <p class="font-semibold text-gray-800 text-sm md:text-base">Riwayat absensi</p>
                <a href="{{ route('karyawan.riwayat.absen') }}"
                    class="md:hidden text-xs text-green-600 font-medium">Lihat
                    semua →</a>
            </div>
            <table class="w-full text-3xs md:text-sm min-w-full">
                <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                    <tr>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Tanggal</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Masuk</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Keluar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($riwayatAbsen as $absen)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-gray-600 hidden md:block">
                                    {{ $absen->tanggal->locale('id')->isoFormat('dddd DD/MM/YYYY') }}
                                </span>
                                <span class="text-gray-600 md:hidden text-2xs md:text-sm">
                                    {{ $absen->tanggal->locale('id')->isoFormat('ddd, DD/MM') }}
                                </span>
                            </td>
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-green-600 font-medium">
                                    {{ $absen->jam_masuk ? \Carbon\Carbon::parse($absen->jam_masuk)->format('H:i') : '-' }}
                                </span>
                            </td>
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-red-500 font-medium">
                                    {{ $absen->jam_pulang ? \Carbon\Carbon::parse($absen->jam_pulang)->format('H:i') : '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-3 md:px-6 py-4 text-center text-gray-400 text-xs md:text-sm">
                                Belum ada riwayat absensi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Riwayat Cuti --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100 flex items-center justify-between">
                <p class="font-semibold text-gray-800 text-sm md:text-base">Riwayat cuti</p>
                <a href="{{ route('karyawan.riwayat.cuti') }}" class="md:hidden text-xs text-green-600 font-medium">Lihat
                    semua →</a>
            </div>
            <table class="w-full text-3xs md:text-sm min-w-full">
                <thead class="bg-gray-50 text-gray-400 text-2xs md:text-xs">
                    <tr>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Tanggal pengajuan</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Dari</th>
                        <th class="px-3 md:px-6 py-2 md:py-3 text-left font-medium">Sampai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($riwayatCuti as $cuti)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-gray-700 font-medium text-2xs md:text-sm">
                                    {{ $cuti->tanggal_pengajuan->format('d F Y') }}
                                </span>
                            </td>
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-gray-500 text-2xs md:text-sm">
                                    {{ $cuti->dari->format('d/m/y') }}
                                </span>
                            </td>
                            <td class="px-3 md:px-6 py-2 md:py-3">
                                <span class="text-gray-500 text-2xs md:text-sm">
                                    {{ $cuti->sampai->format('d/m/y') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-3 md:px-6 py-4 text-center text-gray-400 text-xs md:text-sm">
                                Belum ada riwayat cuti.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
