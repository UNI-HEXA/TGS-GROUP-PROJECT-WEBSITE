@extends('layouts.main')

@section('title', 'Event Stage')

@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap');
        body { font-family: 'Noto Sans JP', sans-serif; }

        .tgs-gradient {
            background: linear-gradient(90deg, #6366f1 0%, #a855f7 50%, #06b6d4 100%);
        }
        .hero-bg {
            background-image: linear-gradient(to bottom, rgba(50, 50, 150, 0.8), rgba(50, 150, 200, 0.6)), url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
{{-- <body class="bg-white text-gray-800"> dihapus --}}

    {{-- DATA DUMMY --}}
    @php
        $schedule = [
            '25 September' => [
                [
                    'title' => 'Upacara Pembukaan',
                    'image' => 'https://tgs-system.com/storage/2025/user/17J9F7oIFeIWzm3oWrDkOvKOQWC2jII9i4ycVlG85O.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '25/9 10:00-10:30',
                    'tags' => ['Seremoni']
                ],
                [
                    'title' => 'Pidato Utama: Inovasi Game',
                    'image' => 'https://tgs-system.com/storage/2025/user/17r3hALjIJtqzruy1UoyUWqspg6LuJtkRdlD1Ewkij.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '25/9 11:00-12:00',
                    'tags' => ['Keynote']
                ],
                [
                    'title' => 'AKIBA LOST: Panggung Spesial',
                    'image' => 'https://tgs-system.com/storage/2025/admin/6Lnr5YndwMho8m993mNV9Ms8s2ikoAVrrKrZ37Mfo_resize.png?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '25/9 13:00',
                    'tags' => ['Pertunjukan']
                ],
                [
                    'title' => 'Rilis Baru Annapurna Interactive',
                    'image' => 'https://tgs-system.com/storage/2025/admin/6NbxK2iY598ae8ZOji4vERh9xmMhdW6mN3nRCETTm.JPG?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '25/9 14:30',
                    'tags' => ['Rilis']
                ]
            ],
            '26 September' => [
                 [
                    'title' => 'Red Bull Apex Takeover bersama Yuki Tsunoda',
                    'image' => 'https://tgs-system.com/storage/2025/user/175sU61ZKXkTqCmGjB93yGOPgsJoPpYKEaKYeliGD2c_resize.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '26/9 14:30',
                    'tags' => ['Esports']
                ]
            ],
             '27 September' => [
                 [
                    'title' => 'Akademi Kreator Game Teratas (TGCA)',
                    'image' => 'https://tgs-system.com/storage/2025/user/17R5utVrKJHfQotOP7w9WN1scJOM071MLZ34h7BhBp.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '27/9 11:00',
                    'tags' => ['Edukasi']
                ],
                 [
                    'title' => 'Bincang Produser Judul Anniversary',
                    'image' => 'https://tgs-system.com/storage/2025/user/17uPtR9kTVYSFWvHd5qgyzbc3v13ClXNrZeCDnGqCK.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '27/9 13:15',
                    'tags' => ['Talkshow']
                ],
                 [
                    'title' => 'Red Bull 283 Academy',
                    'image' => 'https://tgs-system.com/storage/2025/user/197RNvxtuMx9L8Z6tXkQthpkf61b6Dzdtt9LzgyjiOA.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
                    'time' => '27/9 14:45',
                    'tags' => ['Akademi']
                ]
            ]
        ];
    @endphp

    {{-- HERO SECTION --}}
    <section class="hero-bg relative h-64 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-white text-4xl font-bold mb-6 drop-shadow-lg">Panggung Acara</h1>
        <div class="bg-black/80 text-white px-8 py-4 rounded-full max-w-2xl shadow-xl backdrop-blur-sm border border-gray-700">
            <p class="text-sm md:text-base font-semibold">
                Panggung acara mencakup pidato utama, upacara Japan Game Awards, sesi sponsor, dan proyek Penyelenggara.
            </p>
        </div>
    </section>

    {{-- MAIN CONTENT CONTAINER --}}
    <main class="container mx-auto px-4 py-12 -mt-8 relative z-10">

        {{-- INFO BOX (Gradient Border) --}}
        <div class="bg-gradient-to-r from-cyan-300 to-blue-500 p-1 rounded-3xl shadow-lg mb-16 mx-auto max-w-5xl">
            <div class="bg-white rounded-[20px] p-6 md:p-8 flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/3">
                    <img src="https://tgs.cesa.or.jp/images/event/fig_overview.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a" alt="Pratinjau Panggung" class="rounded-lg w-full object-cover shadow-md">
                </div>
                <div class="w-full md:w-2/3">
                    <p class="font-bold text-gray-800 mb-2">
                        Kami juga telah menyiapkan berbagai program untuk tahun ini. Mohon nantikan rilis resmi informasi rincinya. Panggung acara akan dapat diakses melalui streaming online.
                    </p>
                    <div class="mt-4 text-right">
                        <button class="bg-black text-white text-xs font-bold py-2 px-6 rounded-full hover:bg-gray-800 transition">
                            Arsip stream 2024 ↗
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- JADWAL PER HARI --}}
        <div class="max-w-6xl mx-auto space-y-12">
            @foreach($schedule as $date => $events)
                <div class="schedule-group">
                    {{-- Judul Tanggal dengan Garis Vertikal Biru --}}
                    <div class="flex items-center mb-6">
                        <div class="w-1 h-6 bg-cyan-500 mr-3"></div>
                        <h2 class="text-xl font-bold text-gray-800">Panggung Acara {{ $date }}</h2>
                    </div>

                    {{-- Grid Kartu Event --}}
                    <div class="relative">
                        {{-- Tombol Navigasi Kiri (Hanya Visual) --}}
                        <button class="absolute -left-12 top-1/2 transform -translate-y-1/2 bg-white border border-gray-300 rounded-full p-2 shadow hover:bg-gray-50 hidden xl:block z-10">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($events as $event)
                                <div class="bg-gray-100 rounded-lg overflow-hidden group hover:shadow-lg transition duration-300 cursor-pointer flex flex-col h-full">
                                    {{-- Gambar Thumbnail --}}
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-40 object-cover transform group-hover:scale-105 transition duration-500">
                                        {{-- Badge Kategori --}}
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-black text-white text-[10px] font-bold px-2 py-1 rounded-sm">{{ $event['tags'][0] }}</span>
                                        </div>
                                    </div>

                                    {{-- Konten Kartu --}}
                                    <div class="p-4 flex flex-col flex-grow justify-between">
                                        <div>
                                            <h3 class="font-bold text-sm text-gray-900 mb-2 line-clamp-3">{{ $event['title'] }}</h3>
                                        </div>
                                        <div class="flex justify-between items-end mt-4">
                                            <span class="text-xs text-gray-500 font-mono">{{ $event['time'] }}</span>
                                            <div class="bg-black text-white rounded-full p-1 group-hover:bg-cyan-600 transition">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Tombol Navigasi Kanan (Hanya Visual) --}}
                        <button class="absolute -right-12 top-1/2 transform -translate-y-1/2 bg-white border border-gray-300 rounded-full p-2 shadow hover:bg-gray-50 hidden xl:block z-10">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-8 mt-20 text-center text-xs">
        <p>&copy; 2025 Event Organizer. Hak cipta dilindungi undang-undang.</p>
    </footer>

@endsection
