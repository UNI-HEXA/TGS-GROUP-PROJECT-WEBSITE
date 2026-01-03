@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

{{-- Banner Section --}}
<section class="relative w-full">
    <img src="{{ asset('images/tgs-hero.jpg') }}" class="w-full h-[500px] object-cover"
         onerror="this.src='https://placehold.co/1200x500/333/FFF?text=Tokyo+Game+Show+2025'">

    <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-white text-4xl md:text-6xl font-extrabold drop-shadow-lg">
                TOKYO GAME SHOW 2025
            </h1>
            <p class="text-white text-xl mt-3">Unlimited, Neverending Playgrounds</p>
        </div>
    </div>
</section>

{{-- Info Cards --}}
<section class="max-w-7xl mx-auto py-10 px-6 grid grid-cols-1 md:grid-cols-4 gap-6">

    <a href="{{ route('tickets') }}" class="block bg-white shadow-lg rounded-xl p-6 hover:scale-105 hover:shadow-xl transition border-4 border-transparent hover:border-yellow-400">
        <h3 class="text-xl font-semibold mb-2">🎟️ Beli Tiket</h3>
        <p class="text-gray-600">Lihat semua jenis tiket & amankan tempat Anda!</p>
    </a>
    {{-- ---------------------------------------------- --}}

    <a href="#" class="block bg-white shadow-lg rounded-xl p-6 hover:scale-105 hover:shadow-xl transition">
        <h3 class="text-xl font-semibold mb-2">📅 Jadwal Event</h3>
        <p class="text-gray-600">Lihat jadwal lengkap konferensi & sesi game.</p>
    </a>

    <a href="#" class="block bg-white shadow-lg rounded-xl p-6 hover:scale-105 hover:shadow-xl transition">
        <h3 class="text-xl font-semibold mb-2">🏢 Exhibitor</h3>
        <p class="text-gray-600">Temukan developer & publisher dari seluruh dunia.</p>
    </a>

    <a href="#" class="block bg-white shadow-lg rounded-xl p-6 hover:scale-105 hover:shadow-xl transition">
        <h3 class="text-xl font-semibold mb-2">🗺️ Peta Booth</h3>
        <p class="text-gray-600">Lihat posisi booth & lokasi acara.</p>
    </a>

</section>


<div class="max-w-7xl mx-auto px-6 pb-16">

    <h2 class="text-2xl font-bold mb-4">Pick Up</h2>
<div class="flex space-x-4 overflow-x-auto pb-4">

    {{-- Card 1: STEAM --}}
    <a href="https://store.steampowered.com/news/group/40369749/view/535485791717032623"
       class="flex-shrink-0 w-64 h-24 bg-cover bg-center rounded-lg shadow-md p-3 flex items-end justify-center text-center transition hover:opacity-90"
       style="background-image: url('https://service.tgs.cesa.or.jp/images/96/c96/431c0c1e772aeee3358d1d8c2f8a3.png');">
        <span class="text-white text-lg font-bold"></span>
    </a>

    {{-- Card 2: Featured Exhibit --}}
    <a href="https://x.com/tokyo_game_show"
       class="flex-shrink-0 w-64 h-24 bg-cover bg-center rounded-lg shadow-md p-3 flex items-end justify-center text-center transition hover:opacity-90"
       style="background-image: url('https://service.tgs.cesa.or.jp/images/96/f57/6325bb059cd902aa763cfd4b70570.jpg');">
        <span class="text-white text-lg font-bold"></span>
    </a>

    {{-- Card 3: Japan Game Award --}}
    <a href="https://awards.cesa.or.jp/"
       class="flex-shrink-0 w-64 h-24 bg-cover bg-center rounded-lg shadow-md p-3 flex items-end justify-center text-center transition hover:opacity-90"
       style="background-image: url('https://service.tgs.cesa.or.jp/images/96/55c/f12554146d7f89c7578dae2da7b80.png');">
        <span class="text-white text-lg font-bold"></span>
    </a>

    {{-- Card 4: 30th Anniversary --}}
    <a href="https://30thmascot.cesa.or.jp/"
       class="flex-shrink-0 w-64 h-24 bg-cover bg-center rounded-lg shadow-md p-3 flex items-end justify-center text-center transition hover:opacity-90"
       style="background-image: url('https://service.tgs.cesa.or.jp/images/96/b2f/8d7b028ad8136c8f11a90d512155a.png');">
        <span class="text-black text-lg font-bold"></span>
    </a>

    {{-- Card 5: Official Movie --}}
    <a href="https://www.youtube.com/watch?v=sEOyxyA7Ic8"
       class="flex-shrink-0 w-64 h-24 bg-cover bg-center rounded-lg shadow-md p-3 flex items-end justify-center text-center transition hover:opacity-90"
       style="background-image: url('https://service.tgs.cesa.or.jp/images/96/e86/666acfb05593cca25a662147876fd.png');">
        <span class="text-white text-lg font-bold"></span>
    </a>

</div>
    {{-- End Pick Up Section --}}

    {{-- EXHIBITION Section --}}
    <div class="bg-yellow-50/50 p-8 rounded-2xl my-8 shadow-xl relative overflow-hidden">
        {{-- Background effect (simulasi warna hijau) --}}
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-100/50 to-orange-100/50 -z-10"></div>

        <h2 class="text-3xl font-extrabold mb-2 text-gray-800">EXHIBITION</h2>
        <p class="text-sm font-semibold text-gray-600 mb-6">Booth / Area</p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- List of exhibitors Card --}}
            <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col md:flex-row items-center space-x-4">
                <img src="https://tgs.cesa.or.jp/images/home/fig_exhibition.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a" class="w-full md:w-1/3 h-auto rounded-lg object-cover" alt="Exhibitors List">
                <div class="flex-1 mt-4 md:mt-0">
                    <h3 class="text-xl font-bold mb-2">List of exhibitors</h3>
                    <p class="text-gray-600 text-sm mb-4">Game-related exhibition events galore, including hands-on experiences with new games.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Lihat Selengkapnya &rarr;</a>
                </div>
            </div>

            {{-- Area Tags/Buttons --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                <a href="#" class="bg-green-500/90 text-white font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-green-600 transition">General Exhibition Area</a>
                <a href="#" class="bg-orange-500/90 text-white font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-orange-600 transition">Cognitive's projects</a>
                <a href="#" class="bg-yellow-500/90 text-gray-800 font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-yellow-600 transition">Sponsor Online Area</a>
                <a href="#" class="bg-pink-500/90 text-white font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-pink-600 transition">Gaming Hardware Area</a>
                <a href="#" class="bg-purple-500/90 text-white font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-purple-600 transition">Mobile/SNS Game Area</a>
                <a href="#" class="bg-blue-500/90 text-white font-semibold py-3 px-4 rounded-full text-center text-sm shadow-md hover:bg-blue-600 transition">AR/VR Area</a>
            </div>
        </div>

    {{-- EVENT STAGE / OFFICIAL PROGRAM Section --}}
    <div class="bg-gradient-to-r from-green-500/70 to-lime-500/70 p-8 rounded-2xl shadow-xl relative overflow-hidden">
        <h2 class="text-3xl font-extrabold mb-2 text-white drop-shadow">EVENT STAGE / OFFICIAL PROGRAM</h2>
        <p class="text-sm font-semibold text-white/90 mb-6">Live & Streaming</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Event Stage Card --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="h-40 bg-gray-600 flex items-center justify-center text-white font-bold text-xl">Event Stage</div>
                <div class="p-4">
                    <h4 class="text-lg font-bold mb-1">Event Stage</h4>
                    <p class="text-gray-600 text-sm">Jadwal lengkap pertunjukan game, presentasi, dan konser.</p>
                </div>
            </div>

            {{-- Official Program Card --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="h-40 bg-gray-900 flex items-center justify-center">
                    <h4 class="text-white text-3xl font-extrabold leading-none text-center">TGS<br><span class="text-lg font-normal">STREAMING PROGRAM</span></h4>
                </div>
                <div class="p-4">
                    <h4 class="text-lg font-bold mb-1">Official Program</h4>
                    <p class="text-gray-600 text-sm">Semua siaran langsung dan VOD dari TGS.</p>
                </div>
            </div>

            {{-- SENSE OF WONDER NIGHT 2025 --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="h-40 bg-yellow-400 flex items-center justify-center text-gray-800 font-bold text-lg">SENSE OF WONDER NIGHT 2025</div>
                <div class="p-4">
                    <h4 class="text-lg font-bold mb-1">SENSE OF WONDER NIGHT 2025</h4>
                    <p class="text-gray-600 text-sm">Ajang presentasi game-game inovatif dan unik.</p>
                </div>
            </div>
        </div>
    </div>



{{-- Latest News --}}
<section class="max-w-7xl mx-auto px-6 pb-16">
    <h2 class="text-3xl font-bold mb-6">Berita Terbaru</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition block">
            <div class="h-40 bg-gray-300"></div>
            <div class="p-5">
                <h4 class="text-lg font-semibold mb-2">Pengumuman Pembukaan TGS 2025</h4>
                <p class="text-gray-600 text-sm">Tokyo Game Show akan resmi dibuka pada 25 September...</p>
            </div>
        </a>

        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition block">
            <div class="h-40 bg-gray-300"></div>
            <div class="p-5">
                <h4 class="text-lg font-semibold mb-2">Game Baru Akan Dirilis</h4>
                <p class="text-gray-600 text-sm">Berbagai developer besar siap memperkenalkan game terbaru...</p>
            </div>
        </a>

        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition block">
            <div class="h-40 bg-gray-300"></div>
            <div class="p-5">
                <h4 class="text-lg font-semibold mb-2">Lokasi Booth Telah Diumumkan</h4>
                <p class="text-gray-600 text-sm">Peta booth interaktif kini tersedia untuk pengunjung...</p>
            </div>
        </a>

    </div>

    {{-- Special Article / News Footer --}}
    <h2 class="text-2xl font-bold mt-16 mb-4">Special Article</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-blue-500 block">
            <img src="https://service.tgs.cesa.or.jp/images/96/ffa/bbad2474a6fe9defea4f359aede6a.png" class="w-full h-40 object-cover" alt="Article 1">
            <div class="p-4">
                <h4 class="font-bold text-base mb-1">SENSE OF WONDER NIGHT 2025</h4>
                <p class="text-xs text-gray-500">2025.09.25</p>
            </div>
        </a>
        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-red-500 block">
            <img src="https://service.tgs.cesa.or.jp/images/96/346/cd441fc2ccb84dec80b14b5b4914b.jpg" class="w-full h-40 object-cover" alt="Article 2">
            <div class="p-4">
                <h4 class="font-bold text-base mb-1">Notice of the "GAME with YOU" Booth Game Show 2025</h4>
                <p class="text-xs text-gray-500">2025.09.25</p>
            </div>
        </a>
        <a href="#" class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-yellow-500 block">
            <img src="https://service.tgs.cesa.or.jp/images/96/adc/62b3888c66014f2c9bf74ae2c3a7c.jpg" class="w-full h-40 object-cover" alt="Article 3">
            <div class="p-4">
                <h4 class="font-bold text-base mb-1">Red Bull Gives You Wings at the Game Show 2025</h4>
                <p class="text-xs text-gray-500">2025.09.25</p>
            </div>
        </a>
    </div>

</section>

@endsection
