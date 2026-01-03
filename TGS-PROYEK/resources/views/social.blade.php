@extends('layouts.main')

{{-- Judul Halaman --}}
@section('title', 'Official Social Media')

@section('content')

    {{-- 1. HERO SECTION --}}
    <div class="relative w-full h-72 flex items-center justify-center text-center overflow-hidden mb-12 bg-gray-900">
        {{-- Background Pattern (Abstract) --}}
        <div class="absolute inset-0 bg-cover bg-center opacity-40"
             style="background-image: url('https://via.placeholder.com/1920x400/222244/ffffff?text=Pola+Abstrak');">
        </div>
        {{-- Overlay Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/60 to-black/80"></div>

        {{-- Teks di tengah Hero --}}
        <div class="relative z-10 max-w-2xl mx-auto bg-black/80 backdrop-blur-sm px-8 py-5 rounded-full shadow-lg border border-gray-700">
            <p class="text-white text-base md:text-lg font-semibold leading-relaxed">
                Berbagai peserta pameran akan memberikan informasi tentang program resmi TGS selama empat hari, mulai dari Hari Bisnis hingga Hari Publik.
            </p>
        </div>
    </div>

    {{-- CONTAINER UTAMA --}}
    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- 2. Streaming Information Section --}}
        <section class="mb-16">
            {{-- Header dengan garis biru --}}
            <div class="flex items-center mb-6">
                <div class="w-1.5 h-6 bg-blue-600 mr-3 rounded-full"></div>
                <h2 class="text-xl font-bold text-gray-800">Informasi Streaming</h2>
            </div>

            {{-- Kotak Informasi Streaming (Gradient Border) --}}
            <div class="bg-gradient-to-r from-blue-400 to-purple-600 p-1 rounded-2xl shadow-lg">
                <div class="bg-white rounded-[10px] p-6 md:p-8 flex flex-col lg:flex-row items-center gap-8">
                    {{-- Gambar Thumbnail --}}
                    <div class="w-full lg:w-1/3">
                        <img src="{{ asset('images/streaming-logo.jpg') }}" alt="Program Streaming TGS" class="rounded-lg w-full h-auto object-cover shadow-md">
                    </div>

                    {{-- Teks Informasi --}}
                    <div class="w-full lg:w-2/3">
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-3">Program streaming selama empat hari!</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Acara ini akan disiarkan di delapan platform, termasuk media sosial dan layanan streaming video.
                        </p>
                        <p class="text-sm text-gray-500 mt-4 font-mono">
                            YouTube / X (Twitter) / Niconico / Twitch / TikTok / Douyu / Bilibili / Douyin
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. Streaming List Section --}}
        <section>
            {{-- Header dengan garis biru --}}
            <div class="flex items-center mb-6">
                <div class="w-1.5 h-6 bg-blue-600 mr-3 rounded-full"></div>
                <h2 class="text-xl font-bold text-gray-800">Daftar Streaming</h2>
            </div>

            {{-- Daftar Tombol Platform Streaming --}}
            <div class="bg-gradient-to-r from-blue-400 to-purple-600 p-1 rounded-2xl shadow-lg">
                <div class="bg-white rounded-[10px] p-6 md:p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @php
                        $streamingPlatforms = [
                            ['name' => 'YouTube', 'url' => 'https://www.youtube.com/channel/UClFyIegrk4g6CFqGYCwTViA'],
                            ['name' => 'X (Twitter)', 'url' => 'https://x.com/tokyo_game_show'],
                            ['name' => 'Twitch', 'url' => 'https://www.twitch.tv/tokyogameshow1'],
                            ['name' => 'TikTok', 'url' => 'https://www.tiktok.com/@tokyogameshow.official'],
                            ['name' => 'Facebook', 'url' => 'https://www.facebook.com/tokyogameshow/'],
                        ];
                    @endphp

                    @foreach($streamingPlatforms as $platform)
                        <a href="{{ $platform['url'] }}" target="_blank" class="flex items-center justify-between bg-gray-100 px-5 py-3 rounded-lg text-gray-800 font-semibold text-lg hover:bg-gray-200 transition shadow-sm group">
                            <span>{{ $platform['name'] }}</span>
                            {{-- Icon Panah External --}}
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

@endsection
