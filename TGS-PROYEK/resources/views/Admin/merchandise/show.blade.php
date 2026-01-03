@extends('layouts.main')

@section('title', 'Detail Produk: ' . $merchandise->name)

@section('content')

<div class="min-h-screen bg-gray-100 flex">

    {{-- === SIDEBAR ADMIN (Kiri) === --}}
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shadow-2xl">
        <div class="p-6 text-center border-b border-gray-700">
            <h2 class="text-2xl font-extrabold text-yellow-400 tracking-wider">TGS ADMIN</h2>
            <p class="text-xs text-gray-400 mt-1">Control Panel</p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3">Dashboard</span>
            </a>

            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
                <span class="mr-3"></span> Merchandise
            </a>

            <a href="{{ route('admin.tickets.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Kelola Tiket
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3">⚙️</span> Pengaturan
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

        {{-- Breadcrumb --}}
        <div class="mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.merchandise.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                             Merchandise
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <span class="text-sm font-medium text-gray-500">{{ $merchandise->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Action Buttons --}}
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Detail Produk</h1>
                <p class="text-gray-500 text-sm mt-1">Informasi lengkap produk merchandise</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.merchandise.edit', $merchandise->id) }}"
                   class="px-4 py-2 bg-yellow-500 text-gray-900 rounded-lg hover:bg-yellow-600 transition font-semibold">
                     Edit
                </a>
                <a href="{{ route('admin.merchandise.index') }}"
                   class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold">
                    ← Kembali
                </a>
            </div>
        </div>

        {{-- Product Detail Card --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="md:flex">
                {{-- Image Section --}}
                <div class="md:w-1/3 p-8 bg-gray-50 flex items-center justify-center">
                    @if($merchandise->image)
                        <img src="{{ asset('storage/' . $merchandise->image) }}"
                             class="w-64 h-64 object-cover rounded-lg shadow-lg"
                             alt="{{ $merchandise->name }}">
                    @else
                        <div class="w-64 h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <span class="text-6xl text-gray-400">📦</span>
                        </div>
                    @endif
                </div>

                {{-- Details Section --}}
                <div class="md:w-2/3 p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $merchandise->name }}</h2>
                        <div class="flex items-center mt-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ $merchandise->category }}
                            </span>
                            <span class="ml-3 text-gray-500 text-sm">SKU: {{ $merchandise->sku }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Price --}}
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 mb-1">Harga</h3>
                            <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($merchandise->price, 0, ',', '.') }}</p>
                        </div>

                        {{-- Stock --}}
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 mb-1">Stok Tersedia</h3>
                            @if($merchandise->stock < 10)
                                <p class="text-2xl font-bold text-red-600">{{ $merchandise->stock }} <span class="text-sm font-normal">(Stok Menipis)</span></p>
                            @else
                                <p class="text-2xl font-bold text-green-600">{{ $merchandise->stock }}</p>
                            @endif
                        </div>

                        {{-- Created At --}}
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 mb-1">Ditambahkan Pada</h3>
                            <p class="text-gray-800">{{ $merchandise->created_at->format('d F Y H:i') }}</p>
                        </div>

                        {{-- Last Updated --}}
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 mb-1">Terakhir Diperbarui</h3>
                            <p class="text-gray-800">{{ $merchandise->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($merchandise->description)
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-500 mb-2">Deskripsi Produk</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 whitespace-pre-line">{{ $merchandise->description }}</p>
                        </div>
                    </div>
                    @endif

                    {{-- Status --}}
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <div>
                            <span class="text-sm font-semibold text-gray-500">Status: </span>
                            @if($merchandise->is_active)
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                                    Tidak Aktif
                                </span>
                            @endif
                        </div>

                        {{-- Delete Button --}}
                        <form action="{{ route('admin.merchandise.destroy', $merchandise->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-semibold">
                                 Hapus Produk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.merchandise.edit', $merchandise->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-2xl mr-3">✏️</span>
                    <div>
                        <p class="font-bold">Edit Produk</p>
                        <p class="text-sm opacity-90">Ubah informasi produk</p>
                    </div>
                </div>
                <span>→</span>
            </a>

            <a href="{{ route('admin.merchandise.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-2xl mr-3">📋</span>
                    <div>
                        <p class="font-bold">Lihat Semua Produk</p>
                        <p class="text-sm opacity-90">Kembali ke daftar</p>
                    </div>
                </div>
                <span>→</span>
            </a>

            <a href="{{ route('admin.merchandise.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-2xl mr-3"></span>
                    <div>
                        <p class="font-bold">Tambah Produk Baru</p>
                        <p class="text-sm opacity-90">Tambah merchandise baru</p>
                    </div>
                </div>
                <span>→</span>
            </a>
        </div>

    </main>
</div>

@endsection
