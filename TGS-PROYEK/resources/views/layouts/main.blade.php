<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TGS 2025')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <header class="w-full bg-white shadow-sm">

        {{-- BAGIAN 1: Header Atas --}}
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">

                {{-- Kiri: Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/tgs-logo.png') }}" class="h-10 md:h-12 object-contain" alt="TGS Logo">
                    <div>
                        <p class="text-sm font-semibold">2025.09.25 THU - 09.28 SUN</p>
                        <p class="text-xs text-gray-600 -mt-1">MAKUHARI MESSE</p>
                    </div>
                </a>

                {{-- Kanan: Link Atas & Bahasa --}}
                <div class="flex items-center gap-4">
                    <nav class="flex items-center gap-2 text-xs font-medium text-gray-700">
                        <a href="{{ route('social') }}" class="hover:text-blue-600 {{ request()->routeIs('social') ? 'text-blue-600 font-bold' : '' }}">Official Social Media</a> /
                        <a href="{{ route('news') }}" class="hover:text-blue-600 {{ request()->routeIs('news') ? 'text-blue-600 font-bold' : '' }}">News</a> /
                        <a href="{{ route('business') }}" class="hover:text-blue-600 {{ request()->routeIs('business') ? 'text-blue-600 font-bold' : '' }}">Business</a> /

                        {{-- Auth Section --}}
                        <div class="flex items-center gap-3 ml-1">
                            @guest
                                <a href="{{ route('login') }}" class="hover:text-blue-600 font-bold {{ request()->routeIs('login') ? 'text-blue-600' : 'text-gray-700' }}">Login</a>
                            @endguest

                            @auth
                                <span class="text-orange-600 font-bold truncate max-w-[100px]" title="{{ Auth::user()->name }}">
                                    Hi, {{ Auth::user()->name }}
                                </span>
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold ml-1 border-l border-gray-300 pl-2">Logout</button>
                                </form>
                            @endauth
                        </div>
                    </nav>

                    <select class="border-gray-300 rounded-full text-sm p-1 pl-2 pr-6 focus:ring-blue-500 focus:border-blue-500 hidden sm:block">
                        <option>🌐 English</option>
                        <option>🎌 Japanese</option>
                    </select>
                </div>
            </div>
        </div>

                     {{-- BAGIAN 2: Navigasi Utama (Overview, Tickets, dll) --}}
        <div class="w-full bg-gray-50 border-t border-b border-gray-200">
            <nav class="max-w-7xl mx-auto px-6 flex justify-end gap-6 py-3 text-sm font-medium text-gray-700">

                {{-- Link Overview --}}
                <a href="{{ route('overview') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('overview') ? 'text-blue-600 font-bold' : '' }}">
                    Overview
                </a>

                {{-- Link Tickets --}}
                <a href="{{ route('tickets') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('tickets') ? 'text-blue-600 font-bold' : '' }}">
                    Tickets
                </a>

                {{-- Link Event Stage --}}
                <a href="{{ route('event') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('event') ? 'text-blue-600 font-bold' : '' }}">
                    Event Stage
                </a>

                {{-- Link Map --}}

                <a href="{{ route('map') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('map') ? 'text-blue-600 font-bold' : '' }}">
                    Map
                </a>

                <a href="{{ route('exhibitors') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('exhibitors') ? 'text-blue-600 font-bold' : '' }}">
                    Exhibitors
                </a>

                <a href="{{ route('merchandise') }}"
                   class="hover:text-blue-600 {{ request()->routeIs('merchandise.') ? 'text-blue-600 font-bold' : '' }}">
                    Merchandise
                </a>
            </nav>
        </div>

        {{-- BAGIAN 3: Breadcrumb --}}
        @if (!request()->is('/'))
            <section class="w-full bg-gradient-to-r from-green-50 via-blue-50 to-orange-50 shadow-sm">
                <div class="max-w-7xl mx-auto px-6 py-3">
                    <nav class="text-sm font-medium" aria-label="Breadcrumb">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900">Home</a>
                        <span class="mx-2 text-gray-500">&gt;</span>
                        <span class="text-gray-900 font-semibold">@yield('title')</span>
                    </nav>
                </div>
            </section>
        @endif
    </header>

    {{-- KONTEN UTAMA --}}
    <main class="flex-grow">

        @if (session('success'))
            <div class="max-w-7xl mx-auto px-6 mt-6" x-data="{ show: true }" x-show="show" x-transition>
                <div class="bg-green-50 border-l-4 border-green-500 p-4 shadow-sm relative rounded-r">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                        {{-- Tombol Close --}}
                        <button @click="show = false" class="text-green-500 hover:text-green-700">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
             <div class="max-w-7xl mx-auto px-6 mt-6">
                <div class="bg-red-50 border-l-4 border-red-500 p-4 shadow-sm relative rounded-r">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200 py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 text-center text-xs text-gray-500">
            &copy; 2025 Tokyo Game Show Official.
        </div>
    </footer>

</body>
</html>
