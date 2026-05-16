<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password — Manajemen P&K PT DBJ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">

        {{-- Logo & Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-green-600 rounded-xl mb-4">
                <span class="text-white font-bold text-lg">D</span>
            </div>
            <h1 class="text-xl font-semibold text-gray-800">Atur Ulang Password</h1>
            <p class="text-sm text-gray-400 mt-1 px-6">
                Masukkan email Anda dan kami akan mengirimkan link untuk membuat password baru.
            </p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">

            {{-- Session Status --}}
            @if(session('status'))
                <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email Address --}}
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="email@perusahaan.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('email') border-red-400 @enderror">
                    
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="space-y-4">
                    <button type="submit"
                        class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition text-sm">
                        Kirim Link Reset Password
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

</body>

</html>