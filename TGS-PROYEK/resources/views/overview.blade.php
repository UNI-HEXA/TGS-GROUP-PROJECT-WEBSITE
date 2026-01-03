@extends('layouts.main')

@section('title', 'Overview')

@section('content')

<div class="max-w-7xl mx-auto py-12 px-6">

    {{-- 1. Bagian Tema, Periode, & Apa itu TGS --}}
    <section class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-16">

        <div class="md:col-span-2">
            <p class="text-sm font-semibold text-orange-500">Tema tahun ini</p>
            <h2 class="text-4xl font-extrabold text-gray-800 mt-1 mb-5">
                  Unlimited, Neverending Playground
            </h2>
            <div class="space-y-4 text-gray-700">
                <p>
                    TGS adalah tempat berkumpulnya game, kreator, dan pemain dari seluruh dunia, serta sebuah taman bermain tempat kita dapat menciptakan masa depan game bersama-sama.
                </p>
                <p>
                    Ini adalah dunia di mana orang-orang dari segala usia dan kebangsaan, baik dewasa maupun anak-anak, dapat berkunjung dan menikmati diri mereka sendiri, serta tempat di mana mereka dapat terhubung satu sama lain dan mendapatkan pengalaman yang tak terlupakan.
                </p>
            </div>
        </div>

        {{-- Kolom Kanan: Periode & Apa itu --}}
        <div class="md:col-span-1">
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-700">Periode</h3>
                <p class="text-gray-800 font-medium">
                    25-28 Sep Makuhari Messe<br>
                    Hari Bisnis: 25-26 Sep 10:00-17:00<br>
                    Hari Umum: 27 Sep 09:30-17:00 | 28 Sep 09:30-16:30
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-700">APA ITU TOKYO GAME SHOW?</h3>
                <p class="text-gray-600 text-sm">
                    Tokyo Game Show (TGS), yang pertama kali diadakan pada tahun 1996 dan merayakan hari jadinya yang ke-29 tahun ini, adalah salah satu acara game terbesar di dunia.
                </p>
            </div>
        </div>
    </section>

    {{-- 2. Bagian Pendukung Resmi (Official Supporter) --}}
    <section class="mb-12 bg-orange-500 rounded-2xl shadow-lg p-6 md:p-8 text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

            {{-- Foto Supporter --}}
            <div class="md:col-span-1">
                <img src="{{ asset('images/kanata-hongo.jpg') }}" alt="Kanata Hongo" class="rounded-lg w-full h-auto object-cover shadow-md">
            </div>

            {{-- Info Supporter --}}
            <div class="md:col-span-2">
                <p class="text-sm font-semibold text-orange-100">PENDUKUNG RESMI TGS 2025</p>
                <h3 class="text-3xl font-bold text-white mb-4">Kanata Hongo</h3>

                {{-- Box Profil --}}
                <div>
                    <span class="bg-orange-600 text-white font-semibold px-4 py-2 rounded-t-lg inline-block text-sm">
                        PROFIL
                    </span>
                    <div class="bg-white text-gray-700 p-5 rounded-b-lg rounded-tr-lg shadow-inner">
                        <p class="text-sm">
                            Aktor Kanata Hongo telah terpilih sebagai Pendukung Resmi untuk TGS2025. Hongo telah tampil dalam berbagai karya yang diadaptasi dari game dan anime, serta dikenal sebagai penggemar game yang antusias. Dengan pengetahuan yang mendalam dan hasrat terhadap game, ia menikmati bermain berbagai judul dan genre game.
                        </p>
                        <div class="text-right mt-4">
                            <a href="#" class="inline-block bg-black text-white text-xs font-semibold px-5 py-2 rounded-full hover:bg-gray-800 transition">
                                SELENGKAPNYA &gt;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Bar "Newly Renewed" --}}
    <div class="bg-orange-500 text-white text-center font-semibold py-3 mb-10 rounded-lg">
        TGS telah diperbarui mulai tahun ini!
    </div>

    {{-- 4. Bagian VISUAL --}}
    <section class="mb-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            {{-- Gambar Visual --}}
            <div class="md:col-span-2">
                <img src="{{ asset('images/tgs-visual.jpg') }}" alt="Visual TGS 2025" class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>
            {{-- Teks Visual --}}
            <div class="md:col-span-1">
                <h2 class="text-5xl font-extrabold text-gray-800 mb-4">VISUAL</h2>
                <p class="text-gray-600">
                    Visual utama tahun ini dibuat oleh ilustrator Wataru Watanabe, yang telah menarik perhatian karena pandangan dunianya yang lembut dan unik.
                </p>
                <span class="inline-block bg-black text-white text-xs font-semibold px-3 py-1 rounded-full mt-4">
                    Situs Resmi
                </span>
            </div>
        </div>
    </section>

    {{-- 5. Bagian LOGO --}}
    <section class="mb-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            {{-- Gambar Logo --}}
            <div class="md:col-span-2">
                <img src="{{ asset('images/tgs-logo.jpg') }}" alt="Logo TGS 2025" class="w-full h-auto object-cover rounded-lg shadow-lg bg-gray-900 p-4">
            </div>
            {{-- Teks Logo --}}
            <div class="md:col-span-1">
                <h2 class="text-5xl font-extrabold text-gray-800 mb-4">LOGO</h2>
                <p class="text-gray-600">
                    Logo TGS telah didesain ulang. Desain yang bergaya ini melambangkan era baru TGS, tempat berkumpulnya kancah permainan yang terus berkembang dan hiburan generasi berikutnya.
                </p>
            </div>
        </div>
    </section>

    {{-- 6. Bar "Overview" --}}
    <div class="bg-green-600 text-white text-center font-semibold py-3 mb-10 rounded-lg">
        Gambaran Umum
    </div>

    {{-- 7. Tabel Overview --}}
    <section class="bg-white shadow-lg rounded-xl overflow-hidden mb-12">
        {{-- Kita gunakan <dl> (Definition List) untuk struktur key-value --}}
        <dl class="divide-y divide-gray-200">

            {{-- Row: Nama Acara --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Nama Acara</dt>
                <dd class="text-gray-900 md:col-span-3">TOKYO GAME SHOW 2025</dd>
            </div>

            {{-- Row: Lokasi --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Lokasi</dt>
                <dd class="text-gray-900 md:col-span-3">Makuhari Messe Hall 1-11 + International Conference Hall + Event Hall</dd>
            </div>

            {{-- Row: Periode --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Periode</dt>
                <dd class="text-gray-900 md:col-span-3">
                    <div class="space-y-2">
                        <p>
                            <strong class="text-gray-800">Hari Bisnis:</strong><br>
                            25 Sep (Kamis) 10:00-17:00<br>
                            26 Sep (Jumat) 10:00-17:00
                        </p>
                        <p>
                            <strong class="text-gray-800">Hari Umum:</strong><br>
                            27 Sep (Sabtu) 09:30-17:00<br>
                            28 Sep (Minggu) 09:30-17:00
                        </p>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">
                        *Waktu pembukaan mungkin dimajukan 30 menit tergantung situasi.
                    </p>
                </dd>
            </div>

            {{-- Row: Penyelenggara --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Penyelenggara</dt>
                <dd class="text-gray-900 md:col-span-3">Computer Entertainment Supplier's Association (CESA)</dd>
            </div>

            {{-- Row: Rekan Penyelenggara --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Rekan Penyelenggara</dt>
                <dd class="text-gray-900 md:col-span-3">Nikkei Business Publications, Inc., Sony Music Solutions Inc.</dd>
            </div>

            {{-- Row: Pendukung --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 items-baseline">
                <dt class="font-semibold text-gray-700 md:col-span-1">Pendukung</dt>
                <dd class="text-gray-900 md:col-span-3">Kementerian Ekonomi, Perdagangan, dan Industri / Badan Urusan Kebudayaan</dd>
            </div>

        </dl>
    </section>

</div>

@endsection
