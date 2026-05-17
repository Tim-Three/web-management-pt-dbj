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

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                        placeholder="email@perusahaan.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('email') border-red-400 @enderror">
                    
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password Baru</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('password') border-red-400 @enderror">
                    
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                        placeholder="••••••••"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition @error('password_confirmation') border-red-400 @enderror">
                    
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="space-y-4">
                    <button type="submit"
                        class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition text-sm">
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

</body>

</html>