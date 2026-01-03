@extends('layouts.main')

@section('title', 'Kelola Tiket')

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
    <div class="flex-1 overflow-y-auto">
        <div class="container-fluid px-4 py-6">
            {{-- Header --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Kelola Tiket</h1>
                    <p class="text-gray-600 mt-1">Tokyo Game Show 2025</p>
                </div>
                <a href="{{ route('admin.tickets.create') }}"
                   class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Tiket Baru
                </a>
            </div>

            {{-- Navigation Tabs --}}
            <div class="mb-6 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="flex overflow-x-auto">
                    <a href="#" class="px-6 py-3 border-b-2 border-blue-500 font-medium text-blue-600 whitespace-nowrap">
                        9.27-28 Public Day
                    </a>
                    <a href="#" class="px-6 py-3 font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                        9.25-26 Business Day
                    </a>
                    <a href="#" class="px-6 py-3 font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                        Travel Agency
                    </a>
                </div>
            </div>

            {{-- Notice --}}
            <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-yellow-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Notices of Ticket Purchase</h3>
                        <p class="text-sm text-yellow-700 mt-1">
                            Public Day and Business Day have different purchase methods. Please check and proceed with your purchase.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Tickets Table --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Tiket
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipe
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Periode
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kuota/Terjual
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tickets as $ticket)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $ticket->name }}</div>
                                    @if($ticket->p_code)
                                    <div class="text-xs text-gray-500 mt-1">
                                        P Code: <span class="font-mono">{{ $ticket->p_code }}</span>
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($ticket->type == 'business')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-briefcase mr-1"></i> Business Day
                                        </span>
                                    @elseif($ticket->type == 'public')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-users mr-1"></i> Public Day
                                        </span>
                                    @elseif($ticket->type == 'fast')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            <i class="fas fa-bolt mr-1"></i> Fast Ticket
                                        </span>
                                    @elseif($ticket->type == 'special')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-star mr-1"></i> Special Ticket
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <i class="fas fa-graduation-cap mr-1"></i> Siswa
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="font-bold">¥{{ number_format($ticket->price) }}</div>
                                    <div class="text-xs text-gray-500">per day</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $ticket->start_date->format('M d') }} - {{ $ticket->end_date->format('M d') }}
                                    </div>
                                    @if($ticket->sale_start && $ticket->sale_end)
                                    <div class="text-xs text-gray-500 mt-1">
                                        Sale: {{ $ticket->sale_start->format('M d') }} - {{ $ticket->sale_end->format('M d') }}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ number_format($ticket->sold) }} / {{ number_format($ticket->quota) }}
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                        @php
                                            $percentage = $ticket->quota > 0 ? min(100, ($ticket->sold / $ticket->quota) * 100) : 0;
                                        @endphp
                                        <div class="bg-green-600 h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col space-y-1">
                                        @if($ticket->is_active)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-1"></i> Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <i class="fas fa-times-circle mr-1"></i> Nonaktif
                                            </span>
                                        @endif

                                        @if($ticket->is_sold_out)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <i class="fas fa-tag mr-1"></i> Sold Out
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.tickets.edit', $ticket->id) }}"
                                           class="inline-flex items-center px-3 py-1.5 border border-yellow-300 text-yellow-700 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors">
                                            <i class="fas fa-edit mr-1 text-xs"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus tiket ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 border border-red-300 text-red-700 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                                <i class="fas fa-trash mr-1 text-xs"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Empty State --}}
            @if($tickets->isEmpty())
            <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <i class="fas fa-ticket-alt text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada tiket</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan tiket baru untuk Tokyo Game Show</p>
                <a href="{{ route('admin.tickets.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Tiket Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Custom scrollbar for table */
    .overflow-x-auto {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e0 #f7fafc;
    }

    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f7fafc;
        border-radius: 4px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background-color: #cbd5e0;
        border-radius: 4px;
    }
</style>
@endpush
@endsection
