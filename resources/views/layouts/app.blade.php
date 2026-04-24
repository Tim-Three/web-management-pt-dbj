<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<script>
    function previewFoto(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                // Kalau preview adalah div (modal tambah), ganti isinya dengan img
                if (preview.tagName === 'DIV') {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                } else {
                    // Kalau preview adalah img langsung (halaman edit)
                    preview.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';

        // Ganti icon: mata terbuka ↔ mata dicoret
        icon.innerHTML = isPassword ?
            `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>` :
            `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
    }
</script>

<body class="bg-gray-50 font-sans">
    <div x-data="{ open: false }" class="flex h-screen overflow-hidden">
        {{-- Mobile Sidebar --}}
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed z-30 inset-y-0 left-0 w-72 bg-white border-r border-gray-100 flex flex-col flex-shrink-0 transform transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 lg:hidden">
            {{-- Logo --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div
                        class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                        D</div>
                    <span class="font-semibold text-gray-800 text-sm">Manajemen P&K PT DBJ</span>
                </div>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 px-4 py-6">
                <p class="text-xs text-gray-400 font-medium mb-3 px-2">Menu</p>
                @yield('sidebar-menu')
            </nav>

            {{-- Bottom menu --}}
            <div class="px-4 pb-6 border-t border-gray-100 pt-4">
                <a href="#"
                    class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Pengaturan
                </a>
                <a href="{{ route('bantuan') }}"
                    class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Bantuan
                </a>
                <div class="border-t border-gray-100 mt-2 pt-2">

                    {{-- Tombol Keluar — sekarang trigger modal, bukan langsung submit --}}
                    <button onclick="document.getElementById('modal-logout').classList.remove('hidden')"
                        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>

                    {{-- Form logout tetap ada tapi tersembunyi --}}
                    <form id="form-logout" method="POST" action="{{ route('logout') }}" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </aside>

        <!-- Overlay (mobile only) -->
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black opacity-50 z-20 lg:hidden">
        </div>


        {{-- Sidebar --}}
        <aside class="w-72 bg-white border-r border-gray-100 flex-col flex-shrink-0 hidden lg:flex">

            {{-- Logo --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div
                        class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                        D</div>
                    <span class="font-semibold text-gray-800 text-sm">Manajemen P&K PT DBJ</span>
                </div>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 px-4 py-6">
                <p class="text-xs text-gray-400 font-medium mb-3 px-2">Menu</p>
                @yield('sidebar-menu')
            </nav>

            {{-- Bottom menu --}}
            <div class="px-4 pb-6 border-t border-gray-100 pt-4">
                <a href="#"
                    class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Pengaturan
                </a>
                <a href="{{ route('bantuan') }}"
                    class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Bantuan
                </a>
                <div class="border-t border-gray-100 mt-2 pt-2">

                    {{-- Tombol Keluar — sekarang trigger modal, bukan langsung submit --}}
                    <button onclick="document.getElementById('modal-logout').classList.remove('hidden')"
                        class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>

                    {{-- Form logout tetap ada tapi tersembunyi --}}
                    <form id="form-logout" method="POST" action="{{ route('logout') }}" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>

        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between flex-shrink-0">
                <button @click="open = true" class="lg:hidden text-3xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="lg:block hidden">
                    <h1 class="text-base font-semibold text-gray-800">@yield('page-title')</h1>
                    <p class="text-sm text-gray-400">
                        @yield('page-subtitle', 'Selamat datang di sistem manajemen PT DBJ.')</p>
                </div>
                <div class="flex items-center gap-3">
                    <img src="{{ auth()->user()->foto ? Storage::url(auth()->user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff' }}"
                        class="w-9 h-9 rounded-lg object-cover">
                    <div class="md:block hidden">
                        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-8">
                {{-- Flash messages --}}
                @if (session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Modal Konfirmasi Logout (Global) --}}
    <div id="modal-logout" class="hidden fixed inset-0 z-50 flex items-center justify-center">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
            onclick="document.getElementById('modal-logout').classList.add('hidden')"></div>

        {{-- Modal Box --}}
        <div class="relative bg-white rounded-2xl shadow-xl p-6 w-80 flex flex-col items-center gap-4">
            {{-- Icon --}}
            <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center">
                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>

            {{-- Text --}}
            <div class="text-center">
                <h3 class="text-gray-800 font-semibold text-base">Yakin ingin keluar?</h3>
                <p class="text-gray-400 text-sm mt-1">Sesi kamu akan diakhiri dan kamu perlu login kembali.</p>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 w-full">
                <button onclick="document.getElementById('modal-logout').classList.add('hidden')"
                    class="flex-1 px-4 py-2 rounded-xl border border-gray-200 text-gray-600 text-sm hover:bg-gray-50">
                    Batal
                </button>
                <button onclick="document.getElementById('form-logout').submit()"
                    class="flex-1 px-4 py-2 rounded-xl bg-red-500 text-white text-sm hover:bg-red-600">
                    Ya, Keluar
                </button>

            </div>
        </div>
    </div>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Waduh!',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Mantap!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
</body>

</html>
