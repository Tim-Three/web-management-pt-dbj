<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Dark mode styles --}}
    <style>
        /* ── Dark mode variables ── */
        html.dark body { background-color: #0f172a; color: #e2e8f0; }
        html.dark .bg-white { background-color: #1e293b !important; }
        html.dark .bg-gray-50 { background-color: #0f172a !important; }
        html.dark .border-gray-100 { border-color: #334155 !important; }
        html.dark .border-gray-200 { border-color: #334155 !important; }
        html.dark .text-gray-800 { color: #f1f5f9 !important; }
        html.dark .text-gray-700 { color: #cbd5e1 !important; }
        html.dark .text-gray-600 { color: #94a3b8 !important; }
        html.dark .text-gray-500 { color: #64748b !important; }
        html.dark .text-gray-400 { color: #475569 !important; }
        html.dark .hover\:bg-gray-50:hover { background-color: #334155 !important; }
        html.dark .hover\:bg-gray-100:hover { background-color: #334155 !important; }
        html.dark .bg-gray-100 { background-color: #334155 !important; }
        html.dark .divide-gray-50 > * { border-color: #334155 !important; }
        html.dark input, html.dark select, html.dark textarea {
            background-color: #0f172a !important;
            border-color: #334155 !important;
            color: #f1f5f9 !important;
        }
        html.dark input::placeholder { color: #475569 !important; }
        html.dark .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0,0,0,0.6) !important; }

        /* Smooth transition */
        body, aside, header, main, input, select, .bg-white, .bg-gray-50 {
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }
    </style>

    {{-- Prevent flash of wrong theme --}}
    <script>
        (function() {
            const saved = localStorage.getItem('theme') || 'light';
            document.documentElement.className = saved;
        })();
    </script>
</head>

<script>
    function previewFoto(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                if (preview.tagName === 'DIV') {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                } else {
                    preview.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.innerHTML = isPassword
            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
    }
</script>

<body class="bg-gray-50 font-sans">
    <div x-data="{ open: false }" class="flex h-screen overflow-hidden">

        {{-- ── Mobile Sidebar ── --}}
        <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
            class="fixed z-30 inset-y-0 left-0 w-72 bg-white border-r border-gray-100 flex flex-col flex-shrink-0 transform transition-transform duration-300 lg:hidden">
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">D</div>
                    <span class="font-semibold text-gray-800 text-sm">Manajemen P&K PT DBJ</span>
                </div>
            </div>
            <nav class="flex-1 px-4 py-6">
                <p class="text-xs text-gray-400 font-medium mb-3 px-2">Menu</p>
                @yield('sidebar-menu')
            </nav>
            <div class="px-4 pb-6 border-t border-gray-100 pt-4">
                <button onclick="togglePanel()" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </button>
                <a href="{{ route('bantuan') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Bantuan
                </a>
                <div class="border-t border-gray-100 mt-2 pt-2">
                    <button onclick="document.getElementById('modal-logout').classList.remove('hidden')" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                    <form id="form-logout-mobile" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
                </div>
            </div>
        </aside>

        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black opacity-50 z-20 lg:hidden"></div>

        {{-- ── Desktop Sidebar ── --}}
        <aside class="w-72 bg-white border-r border-gray-100 flex-col flex-shrink-0 hidden lg:flex">
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">D</div>
                    <span class="font-semibold text-gray-800 text-sm">Manajemen P&K PT DBJ</span>
                </div>
            </div>
            <nav class="flex-1 px-4 py-6">
                <p class="text-xs text-gray-400 font-medium mb-3 px-2">Menu</p>
                @yield('sidebar-menu')
            </nav>
            <div class="px-4 pb-6 border-t border-gray-100 pt-4">
                <button onclick="togglePanel()" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </button>
                <a href="{{ route('bantuan') }}" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Bantuan
                </a>
                <div class="border-t border-gray-100 mt-2 pt-2">
                    <button onclick="document.getElementById('modal-logout').classList.remove('hidden')" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                    <form id="form-logout" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
                </div>
            </div>
        </aside>

        {{-- ── Main Content ── --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between flex-shrink-0">
                <button @click="open = true" class="lg:hidden">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="lg:block hidden">
                    <h1 class="text-base font-semibold text-gray-800">@yield('page-title')</h1>
                    <p class="text-sm text-gray-400">@yield('page-subtitle', 'Selamat datang di sistem manajemen PT DBJ.')</p>
                </div>
                <div class="flex items-center gap-3">
                    <img src="{{ auth()->user()->foto ? Storage::url(auth()->user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff' }}"
                        class="w-9 h-9 rounded-lg object-cover" id="topbar-avatar">
                    <div class="md:block hidden">
                        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                @if(session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    {{-- ── Modal Logout ── --}}
    <div id="modal-logout" class="hidden fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="document.getElementById('modal-logout').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-2xl shadow-xl p-6 w-80 flex flex-col items-center gap-4">
            <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center">
                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            </div>
            <div class="text-center">
                <h3 class="text-gray-800 font-semibold text-base">Yakin ingin keluar?</h3>
                <p class="text-gray-400 text-sm mt-1">Sesi kamu akan diakhiri dan kamu perlu login kembali.</p>
            </div>
            <div class="flex gap-3 w-full">
                <button onclick="document.getElementById('modal-logout').classList.add('hidden')" class="flex-1 px-4 py-2 rounded-xl border border-gray-200 text-gray-600 text-sm hover:bg-gray-50">Batal</button>
                <button onclick="document.getElementById('form-logout').submit()" class="flex-1 px-4 py-2 rounded-xl bg-red-500 text-white text-sm hover:bg-red-600">Ya, Keluar</button>
            </div>
        </div>
    </div>

    {{-- ── SweetAlert ── --}}
    @if(session('error'))
    <script>
        Swal.fire({ icon: 'error', title: 'Waduh!', text: "{{ session('error') }}", timer: 3000, showConfirmButton: false });
    </script>
    @endif
    @if(session('success'))
    <script>
        Swal.fire({ icon: 'success', title: 'Mantap!', text: "{{ session('success') }}", timer: 3000, showConfirmButton: false });
    </script>
    @endif

    {{-- ── Settings Overlay ── --}}
    <div id="settings-overlay" onclick="togglePanel()" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-40"></div>

    {{-- ── Settings Panel ── --}}
    <div id="settings-panel" class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between flex-shrink-0">
            <div>
                <h2 class="font-semibold text-gray-800">Pengaturan</h2>
                <p class="text-xs text-gray-400 mt-0.5">Kelola profil dan tampilan</p>
            </div>
            <button onclick="togglePanel()" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Scrollable Content --}}
        <div class="flex-1 overflow-y-auto px-6 py-5 space-y-6">

            {{-- ── Profile Info + Upload Foto ── --}}
            <div>
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl">
                    {{-- Avatar dengan tombol ganti --}}
                    <div class="relative flex-shrink-0">
                        <img src="{{ auth()->user()->foto ? Storage::url(auth()->user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=6366f1&color=fff&size=64' }}"
                            class="w-14 h-14 rounded-full object-cover" id="panel-avatar">
                        <label for="foto-upload"
                            class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-600 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-700 transition">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </label>
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-gray-800 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                        <span class="inline-block mt-1 px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full font-medium">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>
                    </div>
                </div>
                <p class="text-xs text-gray-400 text-center mt-2">Klik ikon kamera untuk ganti foto profil</p>
            </div>

            <div class="border-t border-gray-100"></div>

            {{-- ── Appearance: Light / Dark ── --}}
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Tampilan</p>
                <div class="grid grid-cols-2 gap-2">

                    {{-- Light --}}
                    <button onclick="setTheme('light')" id="btn-light"
                        class="flex flex-col items-center gap-2 p-3 rounded-xl border-2 transition theme-btn" data-theme="light">
                        <div class="w-full h-10 rounded-lg bg-gray-100 border border-gray-200 flex items-center px-2 gap-1.5">
                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            <div class="flex-1 space-y-1">
                                <div class="h-1 bg-gray-300 rounded w-full"></div>
                                <div class="h-1 bg-gray-200 rounded w-3/4"></div>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-gray-700">☀️ Light</span>
                    </button>

                    {{-- Dark --}}
                    <button onclick="setTheme('dark')" id="btn-dark"
                        class="flex flex-col items-center gap-2 p-3 rounded-xl border-2 transition theme-btn" data-theme="dark">
                        <div class="w-full h-10 rounded-lg bg-slate-800 border border-slate-700 flex items-center px-2 gap-1.5">
                            <div class="w-2 h-2 rounded-full bg-green-400"></div>
                            <div class="flex-1 space-y-1">
                                <div class="h-1 bg-slate-600 rounded w-full"></div>
                                <div class="h-1 bg-slate-700 rounded w-3/4"></div>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-gray-700">🌙 Dark</span>
                    </button>

                </div>
            </div>

            <div class="border-t border-gray-100"></div>

            {{-- ── Profile Settings Form ── --}}
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Profil Saya</p>
                <form method="POST"
                    action="{{ auth()->user()->role === 'admin' ? route('admin.profil.update') : route('karyawan.profil.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Hidden foto input --}}
                    <input type="file" id="foto-upload" name="foto" accept="image/*" class="hidden"
                        onchange="previewPanelFoto(this)">

                    <div class="space-y-3">
                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" required
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-green-500">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="text-xs text-gray-400 mb-1 block">No. Telepon</label>
                            <input type="text" name="no_telp" value="{{ auth()->user()->no_telp }}"
                                placeholder="08xx-xxxx-xxxx"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-green-500">
                        </div>

                        <div class="border-t border-gray-100 pt-3">
                            <p class="text-xs text-gray-400 mb-2">Ganti Password <span class="text-gray-300">(kosongkan jika tidak diubah)</span></p>
                            <div class="space-y-2">
                                <div class="relative">
                                    <input type="password" name="password" id="pw-baru" placeholder="Password baru"
                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 pr-9 text-sm focus:outline-none focus:border-green-500">
                                    <button type="button" onclick="togglePassword('pw-baru', 'eye-baru')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                        <svg id="eye-baru" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="pw-konfirm" placeholder="Konfirmasi password"
                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 pr-9 text-sm focus:outline-none focus:border-green-500">
                                    <button type="button" onclick="togglePassword('pw-konfirm', 'eye-konfirm')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                        <svg id="eye-konfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')<p class="text-red-500 text-xs">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-2.5 bg-green-600 text-white rounded-xl text-sm font-semibold hover:bg-green-700 transition">
                            Simpan perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Scripts ── --}}
    <script>
        // ── Panel toggle ──────────────────────
        function togglePanel() {
            const panel   = document.getElementById('settings-panel');
            const overlay = document.getElementById('settings-overlay');
            const isOpen  = !panel.classList.contains('translate-x-full');
            panel.classList.toggle('translate-x-full', isOpen);
            overlay.classList.toggle('hidden', isOpen);
        }

        // ── Preview foto di panel sebelum submit ──
        function previewPanelFoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    // Update avatar di panel
                    document.getElementById('panel-avatar').src = e.target.result;
                    // Update avatar di topbar sekaligus
                    const topbar = document.getElementById('topbar-avatar');
                    if (topbar) topbar.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // ── Theme: Light / Dark ──────────────
        function setTheme(name) {
            localStorage.setItem('theme', name);
            applyTheme(name);
        }

        function applyTheme(name) {
            const html = document.documentElement;
            html.className = name; // 'light' atau 'dark'

            // Update button active state
            document.querySelectorAll('.theme-btn').forEach(btn => {
                const isActive = btn.dataset.theme === name;
                btn.classList.toggle('border-green-500', isActive);
                btn.classList.toggle('border-gray-200', !isActive);
                btn.classList.toggle('bg-green-50', isActive);
                btn.classList.toggle('bg-white', !isActive);
            });
        }

        // Apply theme on load — SEBELUM render untuk cegah flash
        applyTheme(localStorage.getItem('theme') || 'light');

        // Auto buka panel kalau ada session success dari profil update
        @if(session('profil_updated'))
            document.addEventListener('DOMContentLoaded', () => togglePanel());
        @endif
    </script>
</body>
</html>