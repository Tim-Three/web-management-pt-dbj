<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">
<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-72 bg-white border-r border-gray-100 flex flex-col flex-shrink-0">
        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">D</div>
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
            <a href="#" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Pengaturan
            </a>
            <a href="#" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Bantuan
            </a>
            <div class="border-t border-gray-100 mt-2 pt-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-2 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Topbar --}}
        <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-semibold text-gray-800">@yield('page-title')</h1>
                <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=6366f1&color=fff" class="w-9 h-9 rounded-full">
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto p-8">
            {{-- Flash messages --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>