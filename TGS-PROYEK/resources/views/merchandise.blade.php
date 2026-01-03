@extends('layouts.main')

@section('title', 'Merchandise')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGS Official Merchandise Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-[1100px] mx-auto px-4">
            <div class="flex justify-between h-16">

                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-green-400 rounded flex items-center justify-center text-white font-bold text-xs">
                            TGS
                        </div>
                        <span class="font-bold text-lg md:text-xl tracking-tight text-gray-900">
                            TOKYO GAME SHOW 2025
                        </span>
                    </a>
                </div>

                <div class="md:hidden flex items-center">
                    <button class="text-gray-500 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{--
        DATA DUMMY (Nama produk dipertahankan karena merupakan nama dagang)
    --}}
    @php
        $products = [
            [
                'name' => 'Main Visual T-Shirt Black',
                'price' => 4800,
                'image' => 'https://tgs.cesa.or.jp/images/goods/111_KV_Tee_blk.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Main Visual T-Shirt White',
                'price' => 4800,
                'image' => 'https://tgs.cesa.or.jp/images/goods/112_KV_Tee_wht.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Acrylic Keychain <KV>',
                'price' => 800,
                'image' => 'https://tgs.cesa.or.jp/images/goods/131_KV_Key.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Can Badge <KV>',
                'price' => 500,
                'image' => 'https://tgs.cesa.or.jp/images/goods/132_KV_Badge.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'A5 Stiker',
                'price' => 500,
                'image' => 'https://tgs.cesa.or.jp/images/goods/433_CW_A5sticker.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Clear File <Color Shift>',
                'price' => 600,
                'image' => 'https://tgs.cesa.or.jp/images/goods/432_CW_File.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Ema Wooden Plaque <いざ、冒険だ。>',
                'price' => 2600,
                'image' => 'https://tgs.cesa.or.jp/images/goods/441_CW_ema.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
            [
                'name' => 'Tenugui (Hand Towel) <KV>',
                'price' => 1200,
                'image' => 'https://tgs.cesa.or.jp/images/goods/149_KV_tenugui.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a',
            ],
        ];
    @endphp

    {{-- KONTEN UTAMA --}}
    <div class="max-w-[1100px] mx-auto px-4 py-10">

        <h1 class="text-3xl font-bold text-center mb-8">Toko Cendera Mata Resmi TGS</h1>

        <div class="bg-gray-100 rounded-[20px] p-8 mb-12 shadow-sm border border-gray-200">
            <div class="text-sm text-gray-700 space-y-2 leading-relaxed">
                <p>
                    <span class="font-bold text-gray-900">Hari Bisnis:</span>
                    Central Mall 2F &lt;depan Hall 5&gt;, Esplanade 2F &lt;depan Hall 9&gt;
                </p>
                <p>
                    <span class="font-bold text-gray-900">Hari Publik:</span>
                    Central Mall 2F &lt;depan Hall 5&gt;, Exhibition Hall 10 &lt;dekat Area Merchandise&gt;
                </p>
                <p class="text-xs text-gray-500 pt-2">
                    ※Selain uang tunai, barang resmi dapat dibeli dengan berbagai kartu kredit, uang elektronik (iD, QUICPay), dan pembayaran QR (PayPay, d-barai, au PAY, Merpay, WeChat Pay, Alipay+). Barang resmi dijual di "TGS Official Goods Shop" yang berlokasi di area-area di atas.
                </p>
            </div>

            <div class="flex flex-col md:flex-row justify-center items-center gap-3 md:gap-8 mt-8 font-bold text-gray-800 text-sm">
                <a href="#" class="flex items-center gap-1 hover:opacity-70 transition">
                    Cendera Mata Resmi TGS
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <span class="text-gray-300 hidden md:inline">/</span>
                <a href="#" class="flex items-center gap-1 hover:opacity-70 transition">
                    Cendera Mata Kolaborasi GameTGS
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-gradient-to-r from-[#FFAD47] via-[#FFD946] to-[#75D959] rounded-lg py-3 px-4 mb-8 text-center shadow-sm">
            <h2 class="text-xl md:text-2xl font-bold text-black/90 tracking-wide">Cendera Mata Resmi TGS</h2>
        </div>

        <div class="mb-12 text-sm text-gray-800 leading-7 space-y-5">
            <div>
                <p class="font-bold">Barang Resmi Tokyo Game Show 2025 Tersedia Eksklusif di Lokasi Acara!</p>
                <p>~ Menampilkan desain oleh ilustrator populer Zashikiwarashi dan lainnya, dengan total lebih dari 60 item ~</p>
            </div>

            <p>
                Barang resmi Tokyo Game Show 2025 sekali lagi akan tersedia secara eksklusif di lokasi acara tahun ini.
                Kami akan menawarkan lebih dari 60 item, termasuk produk yang menampilkan visual utama yang diilustrasikan oleh ilustrator populer **Zashikiwarashi**, serta desain orisinal yang diproduksi oleh kolektif seniman **ANIMAREAL**.
            </p>
            <p>
                Selain berbagai macam item seperti kaus, handuk, gantungan kunci, *acrylic stand*, dan tas eko, jajaran produk tahun ini juga mencakup produk baru bertema "gaya Jepang." Barang-barang ini tidak hanya sempurna sebagai suvenir tetapi juga sangat praktis untuk penggunaan sehari-hari.
            </p>
            <p>
                Selama pameran, pastikan untuk mengambil dan memeriksa barang-barang ini, yang hanya bisa didapatkan di lokasi acara.
            </p>

            <div class="text-xs text-gray-400 space-y-1 pt-2">
                <p>※Harga sudah termasuk pajak.</p>
                <p>※Desain dan spesifikasi produk aktual mungkin sedikit berbeda dari yang ditampilkan.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
            @foreach($products as $product)
            <div class="flex flex-col group cursor-pointer">
                <div class="border border-gray-200 rounded-3xl overflow-hidden bg-white hover:shadow-xl transition-all duration-300 ease-in-out mb-4 relative">
                    <div class="aspect-[4/3] md:aspect-square p-6 flex items-center justify-center">
                        <img src="{{ $product['image'] }}"
                             alt="{{ $product['name'] }}"
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>

                <div class="px-1">
                    <h3 class="font-bold text-gray-900 text-[15px] leading-tight mb-1">
                        {{ $product['name'] }}
                    </h3>
                    <p class="text-gray-500 text-sm font-medium">
                        ¥{{ number_format($product['price']) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</body>
</html>
@endsection
