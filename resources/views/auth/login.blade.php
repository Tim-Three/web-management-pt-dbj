<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">

        {{-- Logo & Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-green-600 rounded-xl mb-4">
                <span class="text-white font-bold text-lg">D</span>
            </div>
            <h1 class="text-xl font-semibold text-gray-800">Manajemen P&K PT DBJ</h1>
            <p class="text-sm text-gray-400 mt-1">Masuk ke akun anda untuk melanjutkan</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">

            {{-- Session Error --}}
            @if(session('status'))
                <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="email@perusahaan.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('email') border-red-400 @enderror">
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-green-600 hover:text-green-700">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <input type="password" name="password" id="password" required placeholder="Masukkan password"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition pr-11 @error('password') border-red-400 @enderror">
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center gap-2 mb-6">
                    <input type="checkbox" name="remember" id="remember"
                        class="w-4 h-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                    <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition text-sm">
                    Masuk
                </button>
            </form>
        </div>

        {{-- Footer --}}
        <p class="text-center text-xs text-gray-400 mt-6">
            ©️ {{ date('Y') }} PT Dipuro Berkah Jaya. All rights reserved.
        </p>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>

</body>

</html>