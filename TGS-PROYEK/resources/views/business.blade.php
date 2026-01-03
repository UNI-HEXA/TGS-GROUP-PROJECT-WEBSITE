@extends('layouts.main')

@section('title', 'business')

@section('content')

{{-- Hero / Header Section --}}
<div class="bg-gray-900 text-white py-10 relative overflow-hidden">
    {{-- Background image overlay placeholder --}}
    <div class="absolute inset-0 opacity-30 bg-[url('/images/tgs-bg.jpg')] bg-cover bg-center"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl font-bold mb-4">For Business</h1>
        <div class="bg-black/60 rounded-lg p-6 inline-block max-w-4xl">
            <p class="text-lg font-semibold text-yellow-400 mb-2">
                Business Days akan diadakan pada 25 dan 26 September.
            </p>
            <p class="mb-4">
                Selama dua hari ini, seminar akan diadakan dan ruang pertemuan bisnis akan tersedia di seluruh area acara.
            </p>
            {{-- Anchor Links --}}
            <div class="flex flex-wrap justify-center gap-4 text-sm text-blue-300">
                <a href="#tgs-forum" class="hover:text-white hover:underline">TGS Forum</a>
                <span>/</span>
                <a href="#meeting-area" class="hover:text-white hover:underline">Business Meeting Area</a>
                <span>/</span>
                <a href="#matching-system" class="hover:text-white hover:underline">TGS Business Matching System</a>
                <span>/</span>
                <a href="#international-party" class="hover:text-white hover:underline">International Party</a>
            </div>
        </div>
    </div>
</div>

{{-- Main Content Container --}}
<div class="bg-gray-50 py-10">
    <div class="container mx-auto px-4 max-w-5xl">

        {{-- 1. Business Content Intro --}}
        <div class="bg-white rounded-xl shadow-sm p-8 mb-12 border border-gray-200">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-l-4 border-yellow-500 pl-3">
                Konten Bisnis di TOKYO GAME SHOW
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Item 1 --}}
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 rounded-full h-12 w-12 flex items-center justify-center font-bold text-xl mb-3 text-gray-600">1</div>
                    <h3 class="font-bold mb-2">Area Bisnis Khusus</h3>
                    <p class="text-sm text-gray-600">Area khusus tersedia untuk networking dan pertemuan dengan profesional industri game. Lounge akan disiapkan di International Conference Hall.</p>
                </div>
                {{-- Item 2 --}}
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 rounded-full h-12 w-12 flex items-center justify-center font-bold text-xl mb-3 text-gray-600">2</div>
                    <h3 class="font-bold mb-2">Seminar TGS & Sesi Sponsor</h3>
                    <p class="text-sm text-gray-600">Seminar yang diselenggarakan TGS dan sesi sponsor akan diadakan selama Business Days, berfokus pada B2B.</p>
                </div>
                {{-- Item 3 --}}
                <div class="flex flex-col items-center text-center">
                    <div class="bg-gray-100 rounded-full h-12 w-12 flex items-center justify-center font-bold text-xl mb-3 text-gray-600">3</div>
                    <h3 class="font-bold mb-2">Sistem Business Matching</h3>
                    <p class="text-sm text-gray-600">Layanan pencocokan bisnis disediakan melalui sistem khusus. Atur janji temu sebelumnya dengan profesional global.</p>
                </div>
            </div>
        </div>

        {{-- 2. Ticket Purchase Info --}}
        <div class="mb-12">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-4">Mengenai Pembelian Tiket</h3>
            <p class="text-sm text-gray-600 mb-4">
                Tiket masuk tersedia untuk Business Days (Kamis, 25 Sept & Jumat, 26 Sept) dan Public Days.
            </p>
            <a href="#tickets" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition text-sm font-bold inline-flex items-center">
                Business Day Ticket <span class="ml-2">&rsaquo;</span>
            </a>
        </div>

        {{-- 3. TGS Forum Info --}}
        <div id="tgs-forum" class="mb-12">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-4">TGS Forum</h3>
            <div class="text-sm text-gray-600 space-y-3">
                <p>Pada Business Days, seminar B2B "TGS Forum" akan diadakan di Makuhari Messe International Conference Hall.</p>
                <p class="bg-yellow-50 p-3 rounded border border-yellow-100">
                    <strong>Penting:</strong> Jika ingin menghadiri seminar, harap mendaftar terlebih dahulu (Pre-register) pada sistem registrasi. Anda juga dapat menonton secara online menggunakan kode undangan.
                </p>
            </div>
        </div>

        {{-- 4. Organizer Sessions (Mockup Loop) --}}
        <div class="mb-8">
            <h4 class="font-bold mb-4 text-gray-700 pl-3 border-l-2 border-gray-400">Organizer Sessions</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $organizerSessions = [
                        ['title' => 'The Current State of Middle East Gaming', 'time' => '10:30 a.m.'],
                        ['title' => 'Trailbrazing from Other Industries', 'time' => '13:30 p.m.'],
                        ['title' => 'The Trajectory and Future of Gamification', 'time' => '10:30 a.m.'],
                        ['title' => 'SENSE OF WONDER NIGHT 2025', 'time' => '17:00 p.m.'],
                    ];
                @endphp

                @foreach($organizerSessions as $session)
                <div class="bg-gray-100 p-4 rounded shadow-sm hover:shadow-md transition">
                    <span class="text-xs font-bold bg-gray-800 text-white px-2 py-1 rounded mb-2 inline-block">PROGRAM</span>
                    <h5 class="font-bold text-sm mb-2 h-12 overflow-hidden">{{ $session['title'] }}</h5>
                    <p class="text-xs text-gray-500">{{ $session['time'] }}</p>
                    <div class="mt-3 flex justify-end">
                        <button class="bg-black text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">&rsaquo;</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 5. Sponsorship Sessions (Mockup Loop) --}}
        <div class="mb-12">
            <h4 class="font-bold mb-4 text-gray-700 pl-3 border-l-2 border-gray-400">Sponsorship Sessions</h4>
            <p class="text-xs text-gray-500 mb-4">TGS Forum menawarkan Sesi Sponsor yang diselenggarakan oleh eksibitor.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $sponsorSessions = [
                        ['title' => 'The Future of Smartphone App Payments', 'company' => 'Company A'],
                        ['title' => 'Expanding Revenue through Out-of-App', 'company' => 'Company B'],
                        ['title' => 'Moscow Game Hub', 'company' => 'Moscow Export'],
                        ['title' => 'Keys to Game Growth', 'company' => 'Global Pay'],
                    ];
                @endphp

                @foreach($sponsorSessions as $session)
                <div class="bg-gray-100 p-4 rounded shadow-sm hover:shadow-md transition">
                    <span class="text-xs font-bold bg-yellow-500 text-white px-2 py-1 rounded mb-2 inline-block">SPONSOR</span>
                    <h5 class="font-bold text-sm mb-2 h-12 overflow-hidden">{{ $session['title'] }}</h5>
                    <p class="text-xs text-gray-500">{{ $session['company'] }}</p>
                    <div class="mt-3 flex justify-end">
                        <button class="bg-black text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">&rsaquo;</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 6. Privacy Policy Block --}}
        <div class="mb-12 border-t border-gray-200 pt-6">
            <h3 class="text-sm font-bold mb-2 border-l-4 border-yellow-500 pl-2">Information on attending the TGS Forum Sponsorship Session</h3>
            <p class="text-xs text-gray-500 leading-relaxed text-justify">
                Informasi pribadi yang Anda masukkan akan dikumpulkan oleh EventRegist Co., Ltd. dan akan dibagikan kepada pihak ketiga terkait, CESA, Nikkei Business Publications, dan Sony Music Solutions untuk pengelolaan acara dan pengenalan produk/layanan di masa mendatang. Harap tinjau kebijakan privasi masing-masing perusahaan.
            </p>
            <div class="mt-2 text-xs text-blue-600 space-y-1">
                <a href="#" class="block hover:underline">• CESA's Privacy Policy</a>
                <a href="#" class="block hover:underline">• Nikkei BP's Personal Information Protection Policy</a>
            </div>
        </div>

        {{-- 7. Business Meeting Area --}}
        <div id="meeting-area" class="mb-12">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-4">Business Meeting Area</h3>
            <p class="text-sm text-gray-600 mb-2">
                Area Pertemuan Bisnis menyediakan lingkungan yang tenang dan efisien untuk melakukan negosiasi produktif.
            </p>
            <p class="font-bold text-sm">Venue: Makuhari Messe International Conference Hall 2F / Hall 9-11, 2nd floor</p>
        </div>

        {{-- 8. International Party --}}
        <div id="international-party" class="mb-12">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-4">International Party + Indie Night</h3>
            <p class="text-sm text-gray-600 mb-4">
                Pesta jaringan untuk industri game domestik dan internasional serta media.
            </p>
            <div class="bg-white p-4 rounded border border-gray-200 text-sm">
                <p class="mb-1"><strong>Date & Time:</strong> September 26 (Fri), 18:00–20:00</p>
                <p class="mb-1"><strong>Location:</strong> Makuhari Messe Hall 9-11, 2nd Floor Esplanade</p>
                <p><strong>Entry Qualification:</strong> Exhibitors, Business Day Gold Pass Holders, Influencers, PRESS.</p>
            </div>
        </div>

        {{-- 9. Business Matching System --}}
        <div id="matching-system" class="mb-16">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-4">TGS Business Matching System</h3>

            <div class="bg-gray-200 rounded-xl p-6 flex flex-col md:flex-row gap-6 items-center">
                <div class="w-full md:w-1/3">
                    {{-- Placeholder Image --}}
                    <div class="aspect-video bg-gray-400 rounded-lg flex items-center justify-center text-white">
                        [Image: Meeting Scene]
                    </div>
                </div>
                <div class="w-full md:w-2/3">
                    <h4 class="font-bold text-xl mb-2">Business Matching</h4>
                    <p class="text-sm text-gray-700 mb-4">
                        Sistem khusus tersedia untuk eksibitor dan pemegang tiket Business Day. Menyediakan peluang networking dan negosiasi yang berharga.
                    </p>
                    <div class="mb-4">
                        <span class="block font-bold text-sm mb-1">Business Matching Portal</span>
                        <a href="#" class="bg-black text-white px-6 py-3 rounded-full text-sm font-bold hover:bg-gray-800 inline-flex items-center">
                            For registered exhibitors and participants, please log in here
                            <span class="ml-2 text-xs">🔗</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-sm text-gray-600 space-y-2">
                <p>Dengan membeli Gold Pass atau Tiket Hari Bisnis, Anda akan menerima email undangan untuk sistem ini.</p>
                <p>Sistem ini mencakup fitur rekomendasi untuk menyarankan mitra bisnis potensial yang paling relevan.</p>
            </div>
        </div>

        {{-- 10. Pricing / Registration (Gold Pass & Regular) --}}
        <div id="tickets" class="mb-10">
            <h3 class="text-lg font-bold border-l-4 border-yellow-500 pl-3 mb-6">For Those Not Yet Registered for Business Days</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Gold Pass Card --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden flex flex-col">
                    <div class="bg-yellow-400 p-4">
                        <h4 class="font-bold text-lg">Gold Pass</h4>
                        <p class="text-xs font-semibold mt-1">Meet and network with all exhibitors and fellow participants</p>
                    </div>
                    <div class="p-6 flex-grow">
                        <p class="text-sm text-gray-600 mb-4">
                            Selain akses ke eksibitor, Tiket Gold Pass memungkinkan Anda mengatur pertemuan dengan sesama peserta bisnis. Akses ke lebih dari 400 perusahaan.
                        </p>
                        <ul class="text-sm list-disc list-inside mb-4 text-gray-700 font-semibold">
                            <li>TOKYO GAME SHOW 2025 Gold Pass Ticket</li>
                        </ul>
                    </div>
                    <div class="p-4 bg-gray-100 border-t border-gray-200">
                        <p class="text-sm text-gray-500">Gold Pass Ticket + Registration Fee:</p>
                        <p class="font-bold text-xl">27,500 JPY</p>
                        <p class="text-xs text-gray-500">(Per account / Tax included)</p>
                    </div>
                </div>

                {{-- Regular Business Ticket Card --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden flex flex-col">
                    <div class="bg-green-400 p-4">
                        <h4 class="font-bold text-lg">Business Day Ticket</h4>
                        <p class="text-xs font-semibold mt-1">Meet and network with all exhibiting companies</p>
                    </div>
                    <div class="p-6 flex-grow">
                        <p class="text-sm text-gray-600 mb-4">
                            Memberikan akses ke eksibitor di TOKYO GAME SHOW 2025. Koneksi ke lebih dari 400 perusahaan dari Jepang dan luar negeri.
                        </p>
                        <ul class="text-sm list-disc list-inside mb-4 text-gray-700 font-semibold">
                            <li>TOKYO GAME SHOW 2025 Business Day Ticket</li>
                        </ul>
                    </div>
                    <div class="p-4 bg-gray-100 border-t border-gray-200">
                        <p class="text-sm text-gray-500">Business Day Ticket:</p>
                        <p class="font-bold text-xl">11,000 JPY</p>
                        <p class="text-xs text-gray-500">(Per account / Tax included)</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
