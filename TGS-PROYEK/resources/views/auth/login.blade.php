{{-- 1. UBAH DARI layouts.app KE layouts.main --}}
@extends('layouts.main')

@section('title', 'Login')

@section('content')

{{-- 2. WRAPPER UTAMA (PENGGANTI CONTAINER BOOTSTRAP) --}}
{{-- Menggunakan Flexbox Tailwind agar selalu di tengah layar --}}
<div class="flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8 min-h-[calc(100vh-64px)]">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        {{-- Header Kotak Login (Gradient TGS) --}}
        <div class="bg-gradient-to-r from-[#FFAD47] via-[#FFD946] to-[#75D959] py-4 rounded-t-xl text-center shadow-sm">
            <h2 class="text-xl font-bold text-gray-900 tracking-wide">
                {{ __('Login Account') }}
            </h2>
        </div>

        {{-- 3. CARD BODY (PENGGANTI CARD BOOTSTRAP) --}}
        <div class="bg-white py-8 px-4 shadow-lg rounded-b-xl sm:px-10 border border-gray-200">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- EMAIL INPUT --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700">
                        {{ __('Email Address') }}
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('email') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD INPUT --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700">
                        {{ __('Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('password') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- REMEMBER ME & FORGOT PASSWORD --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-orange-600 hover:text-orange-500">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                {{-- SUBMIT BUTTON --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition duration-150">
                        {{ __('Login') }}
                    </button>
                </div>

                {{-- LINK KE LOGIN (Opsional, untuk navigasi yang lebih baik) --}}
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold text-orange-600 hover:text-orange-500">
                            Registrasi disini
                        </a>
                    </p>
            </form>

        </div>
    </div>
</div>
@endsection
