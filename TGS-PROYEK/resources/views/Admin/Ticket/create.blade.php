@extends('layouts.main')

@section('title', 'Tambah Tiket Baru')

@section('content')

<div class="min-h-screen bg-gray-100 flex">

    {{-- === SIDEBAR ADMIN (Kiri) === --}}
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shadow-2xl">
        <div class="p-6 text-center border-b border-gray-700">
            <h2 class="text-2xl font-extrabold text-yellow-400 tracking-wider">TGS ADMIN</h2>
            <p class="text-xs text-gray-400 mt-1">Control Panel</p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            {{-- Menu Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Dashboard
            </a>

            {{-- Menu Merchandise --}}
            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Merchandise
            </a>

            {{-- Menu Kelola Tiket (AKTIF) --}}
            <a href="{{ route('admin.tickets.index') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
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
    <main class="flex-1 p-6 md:p-8">

        {{-- Breadcrumb & Header --}}
        <div class="mb-8">
            <nav class="flex mb-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-700 hover:text-blue-600">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <a href="{{ route('admin.tickets.index') }}" class="text-gray-700 hover:text-blue-600">Kelola Tiket</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                            <span class="text-gray-500 font-medium">Tambah Tiket Baru</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                        <span class="mr-3"></span> Tambah Tiket Baru
                    </h1>
                    <p class="text-gray-600 mt-1">Kelola tiket Tokyo Game Show 2025</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('admin.tickets.index') }}" class="inline-flex items-center px-4 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>

        {{-- Navigation Tabs --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
            <div class="flex flex-wrap">
                <button class="flex-1 min-w-[200px] px-6 py-4 text-left font-semibold text-blue-600 border-b-2 border-blue-600">
                    9.27-28 Public Day
                </button>
                <button class="flex-1 min-w-[200px] px-6 py-4 text-left font-semibold text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                    9.25-26 Business Day
                </button>
                <button class="flex-1 min-w-[200px] px-6 py-4 text-left font-semibold text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                    Travel Agency
                </button>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            {{-- Form Header --}}
            <div class="px-6 md:px-8 py-6 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-ticket-alt text-blue-600 mr-3"></i>Form Tambah Tiket
                </h2>
                <p class="text-gray-600 mt-1">Isi detail tiket untuk Tokyo Game Show 2025</p>
            </div>

            {{-- Form Body --}}
            <form method="POST" action="{{ route('admin.tickets.store') }}" class="p-6 md:p-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                    {{-- Left Column --}}
                    <div class="space-y-6">
                        {{-- Nama Tiket --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Nama Tiket <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-heading text-gray-400"></i>
                                </div>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                    placeholder="Contoh: Fast Ticket Public Day" required>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Berikan nama yang jelas dan deskriptif</p>
                        </div>

                        {{-- Tipe Tiket --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Tipe Tiket <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <select name="type" required
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 appearance-none bg-white">
                                    <option value="public" {{ old('type') == 'public' ? 'selected' : '' }}>Public Day (9.27-28)</option>
                                    <option value="business" {{ old('type') == 'business' ? 'selected' : '' }}>Business Day (9.25-26)</option>
                                    <option value="fast" {{ old('type') == 'fast' ? 'selected' : '' }}>Fast Ticket</option>
                                    <option value="special" {{ old('type') == 'special' ? 'selected' : '' }}>Tiket Khusus</option>
                                    <option value="student" {{ old('type') == 'student' ? 'selected' : '' }}>Tiket Siswa</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Harga <span class="text-red-500">*</span>
                            </label>
                            <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4">
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 font-bold">Rp</span>
                                    </div>
                                    <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="3000" required>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Harga dalam IND</p>
                        </div>

                        {{-- Event Dates --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Tanggal Mulai Event <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="far fa-calendar-alt text-gray-400"></i>
                                    </div>
                                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Tanggal Berakhir Event <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="far fa-calendar-check text-gray-400"></i>
                                    </div>
                                    <input type="date" name="end_date" value="{{ old('end_date') }}"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="space-y-6">
                        {{-- Sale Dates --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Tanggal Mulai Penjualan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-shopping-cart text-gray-400"></i>
                                </div>
                                <input type="date" name="sale_start" value="{{ old('sale_start') }}"
                                    class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Opsional</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">
                                Tanggal Berakhir Penjualan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-stop-circle text-gray-400"></i>
                                </div>
                                <input type="date" name="sale_end" value="{{ old('sale_end') }}"
                                    class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Opsional</p>
                        </div>

                        {{-- Quota & Sold --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Kuota Tiket <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-users text-gray-400"></i>
                                    </div>
                                    <input type="number" name="quota" value="{{ old('quota', 1000) }}" min="1"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="1000" required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">tiket</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Jumlah Terjual
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-ticket-alt text-gray-400"></i>
                                    </div>
                                    <input type="number" name="sold" value="{{ old('sold', 0) }}" min="0"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">tiket</span>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Isi jika ada penjualan sebelumnya</p>
                            </div>
                        </div>

                        {{-- Ticket Codes --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">T Code</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="font-bold text-gray-500">T</span>
                                    </div>
                                    <input type="text" name="p_code" value="{{ old('p_code') }}"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="657-364">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Ticket PIA</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">G Code</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="font-bold text-gray-500">G</span>
                                    </div>
                                    <input type="text" name="l_code" value="{{ old('l_code') }}"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="33446">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Lawson Ticket</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">S Code</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="font-bold text-gray-500">S</span>
                                    </div>
                                    <input type="text" name="t_code" value="{{ old('t_code') }}"
                                        class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        placeholder="111-943">
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Seven-Eleven</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mt-8">
                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                        Deskripsi & Fitur
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3">
                            <i class="fas fa-file-alt text-gray-400"></i>
                        </div>
                        <textarea name="description" rows="4"
                                class="pl-10 w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                placeholder="Deskripsi lengkap tiket, termasuk fitur khusus, benefit, dan syarat ketentuan...">{{ old('description') }}</textarea>
                    </div>
                    <div class="flex items-center mt-2 text-amber-600">
                        <i class="fas fa-lightbulb mr-2"></i>
                        <span class="text-sm">Gunakan bullet points (•) untuk fitur khusus</span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('admin.tickets.index') }}"
                    class="px-6 sm:px-8 py-3.5 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 text-center">
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                    <button type="submit"
                            class="px-6 sm:px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-700 text-black font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-200 shadow-md hover:shadow-lg text-center">
                        <i class="fas fa-save mr-2"></i>Simpan Tiket
                    </button>
                </div>
            </form>
        </div>

        {{-- Tips Card --}}
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-start">
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Tips Pengisian</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700 text-sm">Pastikan tanggal penjualan tidak melebihi tanggal event</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700 text-sm">Fast Ticket biasanya memiliki harga lebih tinggi dengan benefit khusus</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700 text-sm">Ticket codes diperlukan untuk sistem booking partner</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- Custom select styling --}}
<style>
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
</style>

@endsection
