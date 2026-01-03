@extends('layouts.main')

@section('title', 'Edit Produk Merchandise')

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
                <span class="mr-3"> Dashboard</span>
            </a>

            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
                <span class="mr-3"></span> Merchandise
            </a>

            <a href="{{ route('admin.tickets.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Kelola Tiket
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Pengaturan
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

        {{-- Success/Error Messages --}}
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Breadcrumb --}}
        <div class="mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.merchandise.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                             Merchandise
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <span class="text-sm font-medium text-gray-500">{{ $merchandise->name }}</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <span class="text-sm font-medium text-gray-500">Edit</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Produk: {{ $merchandise->name }}</h1>
            <p class="text-gray-500 text-sm mt-1">Perbarui informasi produk merchandise.</p>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <form action="{{ route('admin.merchandise.update', $merchandise->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nama Produk --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                               value="{{ old('name', $merchandise->name) }}"
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SKU --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            SKU (Kode Produk) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="sku"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                               value="{{ old('sku', $merchandise->sku) }}"
                               required>
                        @error('sku')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                                required>
                            <option value="">Pilih Kategori</option>
                            <option value="Apparel" {{ old('category', $merchandise->category) == 'Apparel' ? 'selected' : '' }}>Apparel (Pakaian)</option>
                            <option value="Accessories" {{ old('category', $merchandise->category) == 'Accessories' ? 'selected' : '' }}>Accessories (Aksesoris)</option>
                            <option value="Toys" {{ old('category', $merchandise->category) == 'Toys' ? 'selected' : '' }}>Toys (Mainan)</option>
                            <option value="Stationery" {{ old('category', $merchandise->category) == 'Stationery' ? 'selected' : '' }}>Stationery (Alat Tulis)</option>
                            <option value="Collectibles" {{ old('category', $merchandise->category) == 'Collectibles' ? 'selected' : '' }}>Collectibles (Koleksi)</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Harga (IDR) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                            <input type="number" name="price" min="0" step="1000"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                                   value="{{ old('price', $merchandise->price) }}"
                                   required>
                        </div>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="stock" min="0"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                               value="{{ old('stock', $merchandise->stock) }}"
                               required>
                        @error('stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Gambar Produk
                        </label>

                        {{-- Gambar Saat Ini --}}
                        @if($merchandise->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $merchandise->image) }}"
                                 class="w-32 h-32 object-cover rounded-lg shadow border"
                                 alt="{{ $merchandise->name }}">
                            <p class="text-xs text-gray-500 mt-1">{{ basename($merchandise->image) }}</p>
                        </div>
                        @endif

                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-yellow-400 transition cursor-pointer"
                             onclick="document.getElementById('imageInput').click()">
                            <input type="file" name="image"
                                   class="hidden"
                                   id="imageInput"
                                   accept="image/*"
                                   onchange="previewImage(event)">
                            <div class="flex flex-col items-center">
                                <span class="text-4xl mb-2">📷</span>
                                <p class="text-gray-600">Klik untuk upload gambar baru</p>
                                <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti gambar</p>
                                <p class="text-xs text-gray-400">Format: JPG, PNG, GIF, WEBP (Max: 5MB)</p>
                            </div>
                        </div>
                        <div id="imagePreview" class="mt-3 hidden">
                            <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                            <img id="preview" class="w-32 h-32 object-cover rounded-lg shadow border">
                        </div>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Deskripsi Produk
                        </label>
                        <textarea name="description" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                                  placeholder="Deskripsi detail tentang produk...">{{ old('description', $merchandise->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-col-reverse md:flex-row justify-between items-center">
                    <div>
                        <a href="{{ route('admin.merchandise.index') }}"
                           class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold">
                            ← Kembali ke Daftar
                        </a>
                    </div>

                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="{{ route('admin.merchandise.index') }}"
                           class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-blue-500 text-gray-900 rounded-lg hover:bg-blue-400 transition font-semibold shadow-md hover:shadow-lg">
                            <span class="flex items-center justify-center">
                                <span class="mr-2">💾</span> Update Produk
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </main>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }

            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    }
</script>

@endsection
