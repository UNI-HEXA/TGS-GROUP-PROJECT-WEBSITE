@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')

<div class="min-h-screen bg-gray-100 flex">

    {{-- === SIDEBAR ADMIN (Kiri) === --}}
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shadow-2xl">
        <div class="p-6 text-center border-b border-gray-700">
            <h2 class="text-2xl font-extrabold text-yellow-400 tracking-wider">TGS ADMIN</h2>
            <p class="text-xs text-gray-400 mt-1">Control Panel</p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            {{-- Dashboard AKTIF --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
                <span class="mr-3"></span> Dashboard
            </a>

            {{-- Merchandise --}}
            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Merchandise
            </a>

            {{-- ✅ TIKET (DIPERBAIKI) --}}
            <a href="{{ route('admin.tickets.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Kelola Tiket
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg transition font-semibold text-sm">
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    {{-- === MAIN CONTENT (Kanan) === --}}
    <main class="flex-1 p-6 md:p-10">

        {{-- Header Dashboard --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-500 text-sm mt-1">Dashboard kontrol panel Tokyo Game Show 2025</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    <p class="font-bold text-gray-700">Admin User</p>
                    <p class="text-xs text-green-600">Online</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-yellow-400 flex items-center justify-center font-bold text-gray-800 shadow">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>

        {{-- Kartu Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            {{-- Total Produk --}}
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500 hover:shadow-lg transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Total Produk</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalProducts ?? 0 }}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
                <a href="{{ route('admin.merchandise.index') }}" class="text-purple-600 text-sm font-medium mt-4 block hover:text-purple-800">
                    Lihat detail →
                </a>
            </div>

            {{-- Stok Menipis --}}
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500 hover:shadow-lg transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Stok Menipis</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $lowStock ?? 0 }}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
                <a href="{{ route('admin.merchandise.index') }}?filter=low-stock" class="text-red-600 text-sm font-medium mt-4 block hover:text-red-800">
                    Periksa stok →
                </a>
            </div>

            {{-- Terjual Bulan Ini --}}
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 hover:shadow-lg transition">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Terjual Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ number_format($monthlySales ?? 0, 0, ',', '.') }}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
                <a href="{{ route('admin.merchandise.index') }}" class="text-green-600 text-sm font-medium mt-4 block hover:text-green-800">
                    Laporan penjualan →
                </a>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('admin.merchandise.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-2xl mr-3">➕</span>
                        <div>
                            <p class="font-bold">Tambah Produk</p>
                            <p class="text-sm opacity-90">Tambah merchandise baru</p>
                        </div>
                    </div>
                    <span>→</span>
                </a>

                <a href="{{ route('admin.merchandise.index') }}"
                   class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-2xl mr-3">📋</span>
                        <div>
                            <p class="font-bold">Kelola Produk</p>
                            <p class="text-sm opacity-90">Lihat semua merchandise</p>
                        </div>
                    </div>
                    <span>→</span>
                </a>

                <a href="#"
                   class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-2xl mr-3">📊</span>
                        <div>
                            <p class="font-bold">Laporan</p>
                            <p class="text-sm opacity-90">Statistik penjualan</p>
                        </div>
                    </div>
                    <span>→</span>
                </a>
            </div>
        </div>

        {{-- Welcome Message --}}
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl shadow-lg p-8 text-center text-gray-900">
            <h2 class="text-2xl font-bold mb-4">🎉 Selamat Datang di Panel Admin TGS 2025!</h2>
            <p class="mb-6">Mulai kelola merchandise, pantau stok, dan lihat statistik penjualan dari sini.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('admin.merchandise.create') }}" class="bg-gray-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-black transition">
                    🛍️ Tambah Produk
                </a>
                <a href="{{ route('admin.merchandise.index') }}" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    📦 Lihat Semua Produk
                </a>
            </div>
        </div>

    </main>
</div>

@endsection
