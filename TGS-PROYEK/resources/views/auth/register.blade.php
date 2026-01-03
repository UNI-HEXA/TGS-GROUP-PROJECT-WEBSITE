@extends('layouts.main')

@section('title', 'Register')

@section('content')

{{-- WRAPPER UTAMA --}}
<div class="flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8 min-h-[calc(100vh-64px)]">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">

        {{-- Header Kotak Register (Gradient TGS) --}}
        <div class="bg-gradient-to-r from-[#FFAD47] via-[#FFD946] to-[#75D959] py-4 rounded-t-xl text-center shadow-sm">
            <h2 class="text-xl font-bold text-gray-900 tracking-wide">
                {{ __('Create Account') }}
            </h2>
        </div>

        {{-- CARD BODY --}}
        <div class="bg-white py-8 px-4 shadow-lg rounded-b-xl sm:px-10 border border-gray-200">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- 1. NAME INPUT --}}
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700">
                        {{ __('Name') }}
                    </label>
                    <div class="mt-1">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('name') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 2. USERNAME INPUT -- BARU DITAMBAHKAN --}}
                <div>
                    <label for="username" class="block text-sm font-bold text-gray-700">
                        {{ __('Username') }}
                    </label>
                    <div class="mt-1">
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('username') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('username')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 3. EMAIL INPUT --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700">
                        {{ __('Email Address') }}
                    </label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('email') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 4. PASSWORD INPUT --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700">
                        {{ __('Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                            @error('password') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 5. CONFIRM PASSWORD INPUT --}}
                <div>
                    <label for="password-confirm" class="block text-sm font-bold text-gray-700">
                        {{ __('Confirm Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    </div>
                </div>

                {{-- SUBMIT BUTTON --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition duration-150">
                        {{ __('Register') }}
                    </button>
                </div>

                {{-- LINK KE LOGIN (Opsional, untuk navigasi yang lebih baik) --}}
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold text-orange-600 hover:text-orange-500">
                            Login here
                        </a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
