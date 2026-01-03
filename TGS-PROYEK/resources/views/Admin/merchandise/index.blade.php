@extends('layouts.main')

@section('title', 'Admin Dashboard - Manage Merchandise')

@section('content')

<div class="min-h-screen bg-gray-100 flex">

    {{-- === SIDEBAR ADMIN (Kiri) === --}}
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shadow-2xl">
        <div class="p-6 text-center border-b border-gray-700">
            <h2 class="text-2xl font-extrabold text-yellow-400 tracking-wider">TGS ADMIN</h2>
            <p class="text-xs text-gray-400 mt-1">Control Panel</p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            {{-- Menu Berita (Sekarang Inaktif) --}}
           <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"> Dashboard</span>
            </a>

            {{-- Menu Merchandise (AKTIF) --}}
            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
                <span class="mr-3"> Merchandise</span>
            </a>

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
                <h1 class="text-3xl font-bold text-gray-800">Manajemen Merchandise</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola stok produk, harga, dan varian item.</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    <p class="font-bold text-gray-700">Admin User</p>
                    <p class="text-xs text-green-600">Online</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-yellow-400 flex items-center justify-center font-bold text-gray-800 shadow">
                    A
                </div>
            </div>
        </div>

        {{-- Kartu Statistik Produk --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Total Produk</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalProducts }}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Stok</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $lowStock }}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-semibold">Terjual Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $monthlySales}}</h3>
                    </div>
                    <span class="text-3xl"></span>
                </div>
            </div>
        </div>

        {{-- === ACTION BAR (Search & Add) === --}}
        <div class="bg-white p-4 rounded-xl shadow-sm mb-6 flex flex-col md:flex-row justify-between items-center gap-4">

            {{-- Form Pencarian --}}
            <form action="{{ route('admin.merchandise.index') }}" method="GET" class="w-full md:w-1/2 relative">
                <input type="text" name="search" placeholder="Cari nama produk / SKU..."
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                       value="{{ $search }}">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    🔍
                </div>
            </form>

            {{-- Tombol Tambah --}}
            <a href="{{ route('admin.merchandise.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition flex items-center">
                <span class="text-xl mr-2">+</span> Tambah Produk
            </a>
        </div>

        {{-- === DATA TABLE MERCHANDISE === --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 font-bold">Gambar</th>
                            <th class="py-3 px-6 font-bold">Nama Produk & SKU</th>
                            <th class="py-3 px-6 font-bold">Kategori</th>
                            <th class="py-3 px-6 font-bold text-right">Harga (IDR)</th>
                            <th class="py-3 px-6 font-bold text-center">Stok</th>
                            <th class="py-3 px-6 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($merchandises as $merch)
                        <tr class="border-b border-gray-200 hover:bg-yellow-50 transition">
                            <td class="py-3 px-6">
                                <div class="w-16 h-16 overflow-hidden rounded-lg shadow-sm bg-gray-100 border border-gray-200">
                                    @if($merch->image)
                                        <img src="{{ asset('storage/' . $merch->image) }}"
                                             class="w-full h-full object-cover"
                                             alt="{{ $merch->name }}">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6">
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-800 text-base">{{ $merch->name }}</span>
                                    <span class="text-xs text-gray-500">SKU: {{ $merch->sku }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6">
                                @php
                                    $categoryColors = [
                                        'Apparel' => 'bg-blue-100 text-blue-800',
                                        'Accessories' => 'bg-gray-100 text-gray-600',
                                        'Toys' => 'bg-pink-100 text-pink-600',
                                        'Stationery' => 'bg-green-100 text-green-800',
                                        'Collectibles' => 'bg-purple-100 text-purple-800'
                                    ];
                                    $colorClass = $categoryColors[$merch->category] ?? 'bg-gray-100 text-gray-600';
                                @endphp
                                <span class="{{ $colorClass }} py-1 px-3 rounded-full text-xs font-bold">
                                    {{ $merch->category }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-right font-bold text-gray-800">
                                Rp {{ number_format($merch->price, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                @if($merch->stock < 10)
                                    <span class="text-red-600 font-bold bg-red-100 px-2 py-1 rounded">
                                        {{ $merch->stock }}
                                    </span>
                                @else
                                    <span class="text-green-600 font-bold">{{ $merch->stock }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-3">
                                    <a href="{{ route('admin.merchandise.edit', $merch->id) }}"
                                       class="w-8 h-8 rounded bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 border border-yellow-200 hover:scale-105 transition-transform"
                                       title="Edit">

                                    </a>
                                    <form action="{{ route('admin.merchandise.destroy', $merch->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $merch->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 border border-red-200 hover:scale-105 transition-transform"
                                                title="Hapus">

                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <span class="text-4xl mb-2"></span>
                                    <p class="text-lg">Tidak ada produk ditemukan.</p>
                                    @if($search)
                                        <p class="text-sm mt-1">Coba dengan kata kunci lain.</p>
                                        <a href="{{ route('admin.merchandise.index') }}"
                                           class="mt-2 text-blue-600 hover:text-blue-800 text-sm">
                                            Reset pencarian
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($merchandises->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
                <span class="text-xs text-gray-500">
                    Menampilkan {{ $merchandises->firstItem() ?? 0 }}-{{ $merchandises->lastItem() ?? 0 }} dari {{ $merchandises->total() }} produk
                </span>
                <div class="flex space-x-1">
                    {{-- Previous Button --}}
                    @if ($merchandises->onFirstPage())
                        <span class="px-3 py-1 rounded bg-gray-100 border border-gray-300 text-gray-400 text-sm cursor-not-allowed">
                            Prev
                        </span>
                    @else
                        <a href="{{ $merchandises->previousPageUrl() }}"
                           class="px-3 py-1 rounded bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 text-sm transition">
                            Prev
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($merchandises->getUrlRange(1, $merchandises->lastPage()) as $page => $url)
                        @if ($page == $merchandises->currentPage())
                            <span class="px-3 py-1 rounded bg-yellow-400 border border-yellow-400 text-white font-bold text-sm shadow">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-1 rounded bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 text-sm transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if ($merchandises->hasMorePages())
                        <a href="{{ $merchandises->nextPageUrl() }}"
                           class="px-3 py-1 rounded bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 text-sm transition">
                            Next
                        </a>
                    @else
                        <span class="px-3 py-1 rounded bg-gray-100 border border-gray-300 text-gray-400 text-sm cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
            @endif
        </div>

    </main>
</div>

@endsection
