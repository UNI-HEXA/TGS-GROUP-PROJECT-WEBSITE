@extends('layouts.main')

@section('title', isset($ticket) ? 'Edit Tiket' : 'Tambah Tiket Baru')

@section('content')
<div class="min-h-screen bg-gray-100 flex">

    {{-- === SIDEBAR ADMIN (Kiri) === --}}
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col shadow-2xl">
        <div class="p-6 text-center border-b border-gray-700">
            <h2 class="text-2xl font-extrabold text-yellow-400 tracking-wider">TGS ADMIN</h2>
            <p class="text-xs text-gray-400 mt-1">Control Panel</p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Dashboard
            </a>

            {{-- Merchandise --}}
            <a href="{{ route('admin.merchandise.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition">
                <span class="mr-3"></span> Merchandise
            </a>

            {{-- Tiket (AKTIF) --}}
            <a href="{{ route('admin.tickets.index') }}" class="flex items-center px-4 py-3 bg-yellow-500 text-gray-900 rounded-lg font-bold shadow-md">
                <span class="mr-3"></span> Kelola Tiket
            </a>

        </nav>

        <div class="p-4 border-t border-gray-700">
            <div class="flex items-center mb-4">
                <div class="h-10 w-10 rounded-full bg-yellow-400 flex items-center justify-center font-bold text-gray-800 shadow">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="ml-3">
                    <p class="font-medium text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-green-400">● Online</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg transition font-semibold text-sm">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </button>
            </form>
        </div>
    </aside>

    {{-- === MAIN CONTENT (Kanan) === --}}
    <div class="flex-1 overflow-y-auto bg-gray-50">
        <div class="container mx-auto px-4 py-6">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex flex-wrap items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 transition-colors">Home</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('admin.tickets.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">Kelola Tiket</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700 font-medium">{{ isset($ticket) ? 'Edit Tiket' : 'Tambah Tiket Baru' }}</span>
                    </li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                         {{ isset($ticket) ? 'Edit Tiket' : 'Tambah Tiket Baru' }}
                    </h1>
                    <p class="text-gray-600">Tokyo Game Show 2025</p>
                </div>
                <a href="{{ route('admin.tickets.index') }}" class="inline-flex items-center px-4 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Navigation Tabs -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
                <div class="border-b border-gray-200">
                    <div class="flex overflow-x-auto -mb-px">
                        <button class="px-6 py-4 border-b-2 border-blue-500 text-blue-600 font-semibold text-sm whitespace-nowrap">
                            9.27-28 Public Day
                        </button>
                        <button class="px-6 py-4 border-b-2 border-transparent text-gray-600 hover:text-gray-900 font-medium text-sm whitespace-nowrap hover:border-gray-300 transition-colors">
                            9.25-26 Business Day
                        </button>
                        <button class="px-6 py-4 border-b-2 border-transparent text-gray-600 hover:text-gray-900 font-medium text-sm whitespace-nowrap hover:border-gray-300 transition-colors">
                            Travel Agency
                        </button>
                    </div>
                </div>
            </div>

            <!-- Notice Alert -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-yellow-800">Notices of Ticket Purchase</h3>
                        <div class="mt-1 text-sm text-yellow-700">
                            <p>Public Day and Business Day have different purchase methods. Please check and proceed with your purchase.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <!-- Form Header -->
                        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h2 class="ml-3 text-lg font-semibold text-gray-900">Informasi Tiket</h2>
                            </div>
                        </div>

                        <!-- Form Content -->
                        <form method="POST" action="{{ isset($ticket) ? route('admin.tickets.update', $ticket->id) : route('admin.tickets.store') }}" class="p-6">
                            @csrf
                            @if(isset($ticket))
                                @method('PUT')
                            @endif

                            <!-- Ticket Type -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Ticket types *
                                </label>
                                <select name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-gray-900" required>
                                    <option value="public" {{ (old('type', $ticket->type ?? '') == 'public') ? 'selected' : '' }}>
                                        1-day admission tickets (junior high school students and older only)
                                    </option>
                                    <option value="fast" {{ (old('type', $ticket->type ?? '') == 'fast') ? 'selected' : '' }}>
                                        Fast Tickets
                                    </option>
                                    <option value="special" {{ (old('type', $ticket->type ?? '') == 'special') ? 'selected' : '' }}>
                                        Special Tickets
                                    </option>
                                    <option value="business" {{ (old('type', $ticket->type ?? '') == 'business') ? 'selected' : '' }}>
                                        Business Day Tickets
                                    </option>
                                </select>
                            </div>

                            <!-- Ticket Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Nama Tiket *
                                    </label>
                                    <input type="text" name="name"
                                           value="{{ old('name', $ticket->name ?? '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="Contoh: Fast Ticket Public Day"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Harga (Rp) *
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="price"
                                               min="0" step="0.01"
                                               value="{{ old('price', $ticket->price ?? '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="3000"
                                               required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <span class="text-gray-500 text-sm">per day</span>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">(including tax)</p>
                                </div>
                            </div>

                            <!-- Event Dates -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Tanggal Mulai Event *
                                    </label>
                                    <input type="date" name="start_date"
                                           value="{{ old('start_date', isset($ticket) ? $ticket->start_date->format('Y-m-d') : '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Tanggal Berakhir Event *
                                    </label>
                                    <input type="date" name="end_date"
                                           value="{{ old('end_date', isset($ticket) ? $ticket->end_date->format('Y-m-d') : '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           required>
                                </div>
                            </div>

                            <!-- Sale Period -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Periode Penjualan
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <input type="date" name="sale_start"
                                               value="{{ old('sale_start', isset($ticket) ? ($ticket->sale_start ? $ticket->sale_start->format('Y-m-d') : '') : '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="Start date">
                                    </div>
                                    <div>
                                        <input type="date" name="sale_end"
                                               value="{{ old('sale_end', isset($ticket) ? ($ticket->sale_end ? $ticket->sale_end->format('Y-m-d') : '') : '') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                               placeholder="End date">
                                    </div>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Contoh: July 12 (Sat) 12:00 - July 21 (Mon) 23:59</p>
                            </div>

                            <!-- Quota & Sold -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Kuota *
                                    </label>
                                    <input type="number" name="quota"
                                           min="1"
                                           value="{{ old('quota', $ticket->quota ?? '') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="1000"
                                           required>
                                    <p class="mt-1 text-xs text-gray-500">Sales will end as soon as the planned number of tickets is reached.</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                                        Terjual
                                    </label>
                                    <input type="number" name="sold"
                                           min="0"
                                           value="{{ old('sold', $ticket->sold ?? 0) }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           placeholder="0">
                                </div>
                            </div>

                            <!-- Ticket Codes -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-900 mb-3">
                                    Ticket Codes
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm rounded-l-lg">
                                                P
                                            </span>
                                            <input type="text" name="p_code"
                                                   value="{{ old('p_code', $ticket->p_code ?? '') }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                   placeholder="657-364">
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Ticket PIA</p>
                                    </div>
                                    <div>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm rounded-l-lg">
                                                L
                                            </span>
                                            <input type="text" name="l_code"
                                                   value="{{ old('l_code', $ticket->l_code ?? '') }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                   placeholder="33446">
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Lawson Ticket</p>
                                    </div>
                                    <div>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm rounded-l-lg">
                                                7
                                            </span>
                                            <input type="text" name="t_code"
                                                   value="{{ old('t_code', $ticket->t_code ?? '') }}"
                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                   placeholder="111-943">
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Seven-Eleven</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-900 mb-2">
                                    Description & Features
                                </label>
                                <textarea name="description" rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                          placeholder="Include ticket features, benefits, terms and conditions...">{{ old('description', $ticket->description ?? '') }}</textarea>
                            </div>

                            <!-- Status Settings -->
                            @if(isset($ticket))
                            <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <label class="block text-sm font-semibold text-gray-900 mb-3">
                                    Status Settings
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <div class="relative inline-block w-10 mr-3 align-middle select-none">
                                            <input type="checkbox" id="is_active" name="is_active" value="1"
                                                   {{ old('is_active', $ticket->is_active) ? 'checked' : '' }}
                                                   class="sr-only peer">
                                            <div class="block w-10 h-6 rounded-full bg-gray-300 peer-checked:bg-blue-600 transition-colors"></div>
                                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-4"></div>
                                        </div>
                                        <label for="is_active" class="text-sm font-medium text-gray-900 cursor-pointer">
                                            Tiket Aktif
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="relative inline-block w-10 mr-3 align-middle select-none">
                                            <input type="checkbox" id="is_sold_out" name="is_sold_out" value="1"
                                                   {{ old('is_sold_out', $ticket->is_sold_out) ? 'checked' : '' }}
                                                   class="sr-only peer">
                                            <div class="block w-10 h-6 rounded-full bg-gray-300 peer-checked:bg-blue-600 transition-colors"></div>
                                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-4"></div>
                                        </div>
                                        <label for="is_sold_out" class="text-sm font-medium text-gray-900 cursor-pointer">
                                            Sold Out
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Form Actions -->
                            <div class="pt-8 border-t border-gray-200">
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                                    <a href="{{ route('admin.tickets.index') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 font-medium">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Batal
                                    </a>
                                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 font-medium shadow-sm">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        {{ isset($ticket) ? 'Update Tiket' : 'Simpan Tiket' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Sidebar -->
                <div class="space-y-6">
                    <!-- Overseas Info -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="px-5 py-4 border-b border-gray-200 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-900 flex items-center">
                                <span class="mr-2"></span> For overseas
                            </h3>
                        </div>
                        <div class="p-5">
                            <!-- Digital Ticket -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-2">Digital Ticket</h4>
                                <p class="text-xs text-gray-600 mb-3">
                                    At the time of admission, please display the QR code of your electronic ticket on your smartphone.
                                </p>
                                <div class="space-y-2">
                                    <button type="button" class="w-full px-4 py-2.5 border border-blue-200 text-blue-600 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition-colors text-sm font-medium">
                                        asoview! ›
                                    </button>
                                    <button type="button" class="w-full px-4 py-2.5 border border-blue-200 text-blue-600 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition-colors text-sm font-medium">
                                        Stagecrowd Ticket ›
                                    </button>
                                </div>
                            </div>

                            <!-- Paper Ticket -->
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900 mb-2">Paper Ticket</h4>
                                <p class="text-xs text-gray-600 mb-3">
                                    Physical tickets available through various vendors
                                </p>
                                <div class="space-y-2">
                                    <button type="button" class="w-full px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-colors text-sm font-medium">
                                        Ticket PIA ›
                                    </button>
                                    <button type="button" class="w-full px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-colors text-sm font-medium">
                                        eplus ›
                                    </button>
                                    <button type="button" class="w-full px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-colors text-sm font-medium">
                                        Lawson Ticket ›
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features Info -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="px-5 py-4 border-b border-gray-200 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-900 flex items-center">
                                <span class="mr-2"></span> Fast Ticket Features
                            </h3>
                        </div>
                        <div class="p-5">
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <svg class="flex-shrink-0 w-4 h-4 text-green-500 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-gray-700">Priority Entry at opening time</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="flex-shrink-0 w-4 h-4 text-green-500 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-gray-700">Special Gift: Tote Bag and Sticker</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="flex-shrink-0 w-4 h-4 text-green-500 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-gray-700">Resale available from Sep 1</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="flex-shrink-0 w-4 h-4 text-green-500 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm text-gray-700">Maximum 2 tickets per person per day</span>
                                </li>
                            </ul>
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <p class="text-xs text-gray-500">
                                    * Images are for illustrative purposes only.<br>
                                    * Lottery sales only during initial period.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
