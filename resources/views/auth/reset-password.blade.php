<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password — Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">

        {{-- Logo & Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-green-600 rounded-xl mb-4">
                <span class="text-white font-bold text-lg">D</span>
            </div>
            <h1 class="text-xl font-semibold text-gray-800">Atur Ulang Password Baru</h1>
            <p class="text-sm text-gray-400 mt-1 px-6">
                Silahkan masukkan email Anda dan buat password baru untuk akun Anda.
            </p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                        placeholder="email@perusahaan.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('email') border-red-400 @enderror">
                    
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password Baru</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full border border-gray-200 rounded-xl pl-4 pr-12 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('password') border-red-400 @enderror">
                        
                        <button type="button" onclick="togglePassword('password', 'eye-icon-1')" 
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition focus:outline-none">
                            <svg id="eye-icon-1" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path class="eye-closed" stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                <path class="eye-open hidden" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path class="eye-open hidden" stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full border border-gray-200 rounded-xl pl-4 pr-12 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('password_confirmation') border-red-400 @enderror">
                        
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-2')" 
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition focus:outline-none">
                            <svg id="eye-icon-2" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path class="eye-closed" stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                <path class="eye-open hidden" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path class="eye-open hidden" stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="space-y-4">
                    <button type="submit"
                        class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition text-sm shadow-sm shadow-green-600/10 active:scale-[0.99] duration-150">
                        Reset Password
                    </button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-green-600 transition">
                            Kembali ke Login
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            ©️ {{ date('Y') }} PT Dipuro Berkah Jaya. All rights reserved.
        </p>

    </div>

    {{-- JavaScript Logic --}}
    <script>
        function togglePassword(inputId, svgId) {
            const passwordInput = document.getElementById(inputId);
            const svgIcon = document.getElementById(svgId);
            
            const closedPaths = svgIcon.querySelectorAll('.eye-closed');
            const openPaths = svgIcon.querySelectorAll('.eye-open');

            if (passwordInput.type === 'password') {
                // Ubah jadi text (tampilkan password)
                passwordInput.type = 'text';
                
                // Sembunyikan icon mata dicoret, tampilkan mata terbuka
                closedPaths.forEach(p => p.classList.add('hidden'));
                openPaths.forEach(p => p.classList.remove('hidden'));
            } else {
                // Kembalikan ke password (sembunyikan password)
                passwordInput.type = 'password';
                
                // Tampilkan icon mata dicoret, sembunyikan mata terbuka
                closedPaths.forEach(p => p.classList.remove('hidden'));
                openPaths.forEach(p => p.classList.add('hidden'));
            }
        }
    </script>

</body>

</html>