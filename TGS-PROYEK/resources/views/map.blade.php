@extends('layouts.main')

@section('title', 'Venue Map ')

{{-- Library Panzoom --}}
<script src="https://unpkg.com/@panzoom/panzoom@4.5.1/dist/panzoom.min.js"></script>

@section('content')

<style>
    /* ======================
       BANNER SECTION STYLES
       (Menggantikan Tailwind agar kompatibel)
       ====================== */
    .map-banner-wrapper {
        position: relative;
        width: 100%;
        height: 400px; /* Tinggi banner */
        overflow: hidden;
        margin-bottom: 30px;
    }

    .map-banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6); /* Gelapkan gambar agar teks terbaca */
    }

    .map-banner-content {
        position: absolute;
        inset: 0; /* Top, right, bottom, left: 0 */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        z-index: 2;
    }

    .map-banner-content h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }

    .map-banner-content p {
        font-size: 1.2rem;
        margin-top: 10px;
        font-weight: 300;
        text-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }

    /* ======================
       EXISTING STYLES
       ====================== */
    .map-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
        padding: 40px 10px 60px 10px; /* Padding atas bawah disesuaikan */
        border-top: 1px solid #eee; /* Pemisah visual */
        margin-top: 50px;
    }

    .category-card {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: 0.25s ease;
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .full-link { text-decoration: none; color: #333; display: block; }
    .category-card h3 { font-size: 1.2rem; font-weight: 600; margin: 0; }

    .c1 { border-left: 5px solid #ff4444; }
    .c2 { border-left: 5px solid #ff8800; }
    .c3 { border-left: 5px solid #0099ff; }
    .c4 { border-left: 5px solid #2ecc71; }
    .c5 { border-left: 5px solid #9b59b6; }

    /* LAYOUT UTAMA */
    .main-map-wrapper {
        display: flex;
        gap: 25px;
        margin-top: 20px;
        padding: 0 10px;
        align-items: flex-start;
        min-height: 600px; /* Tinggi minimal agar proporsional */
    }

    /* BAGIAN KIRI */
    .exhibitor-left { width: 60%; min-width: 0; }

    .map-content-section { display: none; animation: fadeIn 0.3s ease-in; }
    .map-content-section.active-content { display: block; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #2c3e50;
        border-bottom: 3px solid #eee;
        padding-bottom: 15px;
    }

    /* AREA LIST */
    .area-list {
        list-style: none; padding: 0;
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px; margin-bottom: 30px;
    }
    .area-item {
        background: #fff; padding: 15px; border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        display: flex; align-items: center; gap: 10px;
    }
    .area-icon { font-size: 1.5rem; }
    .area-text h4 { margin: 0; font-size: 1rem; font-weight: 600; }
    .area-text p { margin: 5px 0 0; font-size: 0.85rem; color: #666; }

    /* HORIZONTAL SCROLL CARD */
    .exhibitor-container {
        display: flex; gap: 20px; overflow-x: auto;
        padding: 10px 5px 25px 5px; scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch; width: 100%;
    }
    .exhibitor-container::-webkit-scrollbar { height: 8px; }
    .exhibitor-container::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
    .exhibitor-container::-webkit-scrollbar-thumb { background: #ccc; border-radius: 10px; }
    .exhibitor-container::-webkit-scrollbar-thumb:hover { background: #999; }

    .exhibitor-card {
        background: #fff; border-radius: 18px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        overflow: hidden; transition: 0.25s ease;
        min-width: 260px; flex: 0 0 auto;
    }
    .exhibitor-card:hover { transform: translateY(-6px); box-shadow: 0 8px 24px rgba(0,0,0,0.15); }

    .exhibitor-image img { width: 100%; height: 150px; object-fit: cover; background: #ddd; }
    .exhibitor-body { padding: 15px; }
    .exhibitor-body h3 { margin: 0; font-size: 1rem; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .exhibitor-body .sub { color: #444; margin: 4px 0 10px; font-size: 0.85rem; }
    .ex-info { display: flex; justify-content: space-between; align-items: center; }
    .hall { background: #eee; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; }

    /* BAGIAN KANAN (MAP) */
    .map-right {
        width: 40%; background: #fff; padding: 18px;
        border-radius: 18px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        position: sticky; top: 20px; height: fit-content; z-index: 10;
    }

    .map-viewport {
        width: 100%; height: 500px; overflow: hidden;
        border-radius: 10px; border: 1px solid #eee;
        background: #f9f9f9; position: relative; cursor: grab;
    }
    .map-viewport:active { cursor: grabbing; }

    #venue-map-img { width: 100%; height: 100%; object-fit: contain; transition: opacity 0.2s ease-in-out; }
    .zoom-hint {
        position: absolute; bottom: 10px; right: 10px;
        background: rgba(255,255,255,0.8); padding: 5px 10px;
        border-radius: 20px; font-size: 0.75rem; color: #555; pointer-events: none;
    }

    .map-controls {
        display: flex; gap: 10px; margin-bottom: 15px;
        background: #f4f4f4; padding: 5px; border-radius: 12px;
    }
    .map-btn {
        flex: 1; border: none; padding: 10px 15px; border-radius: 8px;
        font-weight: 600; cursor: pointer; background: transparent;
        color: #666; transition: 0.2s;
    }
    .map-btn:hover { background: rgba(0,0,0,0.05); }
    .map-btn.active { background: #fff; color: #000; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
</style>

<section class="map-banner-wrapper">
    {{-- Gambar Background (Venue Hall) --}}

    <img src="https://expo.nikkeibp.co.jp/tgs/2024/assets/images/top/hero-tgs_mv_en.webp"
         class="map-banner-img"
         alt="Venue Map Banner"
         onerror="this.src='https://placehold.co/1200x400/222/FFF?text=VENUE+MAP'">

    {{-- Konten Teks Tengah --}}
    <div class="map-banner-content">
        <h1>Venue Map & Booths</h1>
        <p>Explore Hall 1-11: Exhibitors, Merchandise, and Event Areas</p>
    </div>
</section>


{{-- ============================
     2. MAIN CONTENT (MAP & LIST)
   ============================ --}}
<div class="main-map-wrapper">

    {{-- KIRI: EXHIBITOR LIST --}}
    <div class="exhibitor-left">

        {{-- HALL 1-8 --}}
        <div id="content-hall-1-8" class="map-content-section active-content">
            <h3 class="section-title">Hall 1-8: General Exhibition</h3>
            <p style="margin-bottom: 20px; color: #666;">
                Area utama yang menampilkan penerbit game raksasa, paviliun internasional, dan game blockbuster terbaru.
            </p>

            <ul class="area-list">
                <li class="area-item c1"><span class="area-icon"></span><div class="area-text"><h4>Console & AAA</h4><p>Hall 3-7</p></div></li>
                <li class="area-item c3"><span class="area-icon"></span><div class="area-text"><h4>Intl. Pavilions</h4><p>Hall 1-2</p></div></li>
                <li class="area-item c2"><span class="area-icon"></span><div class="area-text"><h4>Game Academy</h4><p>Hall 2-3</p></div></li>
            </ul>

            <h4 style="margin: 20px 0 10px; border-left: 4px solid #333; padding-left: 10px;">Featured Exhibitors (Scroll ➜)</h4>

            <div class="exhibitor-container">
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/003791/ffffff?text=PlayStation" alt="Sony"></div>
                    <div class="exhibitor-body"><h3>Sony Interactive Ent.</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 04-S01</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/ffbf00/000000?text=CAPCOM" alt="Capcom"></div>
                    <div class="exhibitor-body"><h3>CAPCOM</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 07-S02</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/ed1c24/ffffff?text=Square+Enix" alt="Square Enix"></div>
                    <div class="exhibitor-body"><h3>SQUARE ENIX</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 03-S02</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/0089cf/ffffff?text=SEGA+%2F+ATLUS" alt="Sega"></div>
                    <div class="exhibitor-body"><h3>SEGA / ATLUS</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 04-N06</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/ff7e00/ffffff?text=Bandai+Namco" alt="Bandai"></div>
                    <div class="exhibitor-body"><h3>Bandai Namco</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 06-N06</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/bf0000/ffffff?text=KONAMI" alt="Konami"></div>
                    <div class="exhibitor-body"><h3>Konami Digital</h3><p class="sub">General</p><div class="ex-info"><span class="hall">📍 05-S01</span></div></div>
                </div>
            </div>
        </div>

        {{-- HALL 9-11 --}}
        <div id="content-hall-9-11" class="map-content-section">
            <h3 class="section-title">Hall 9-11: Indie, VR & Hardware</h3>
            <p style="margin-bottom: 20px; color: #666;">
                Temukan inovasi terbaru dari pengembang Indie, perangkat keras gaming canggih, dan merchandise eksklusif.
            </p>

            <ul class="area-list">
                 <li class="area-item" style="border-left: 5px solid #e84393"><span class="area-icon">👾</span><div class="area-text"><h4>Indie Game</h4><p>Hall 9-11</p></div></li>
                 <li class="area-item c4"><span class="area-icon">⌨️</span><div class="area-text"><h4>Hardware</h4><p>Hall 9</p></div></li>
                 <li class="area-item" style="border-left: 5px solid #00cec9"><span class="area-icon">🪑</span><div class="area-text"><h4>Lifestyle</h4><p>Hall 9</p></div></li>
            </ul>

             <h4 style="margin: 20px 0 10px; border-left: 4px solid #333; padding-left: 10px;">Featured Exhibitors (Scroll ➜)</h4>

             <div class="exhibitor-container">
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/2d3436/ffffff?text=Indie+Live+Expo" alt="Indie"></div>
                    <div class="exhibitor-body"><h3>INDIE LIVE EXPO</h3><p class="sub">Indie Area</p><div class="ex-info"><span class="hall">📍 11-E36</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/00b894/ffffff?text=NITORI+Gaming" alt="Nitori"></div>
                    <div class="exhibitor-body"><h3>NITORI</h3><p class="sub">Lifestyle</p><div class="ex-info"><span class="hall">📍 09-C36</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/6c5ce7/ffffff?text=BenQ+Japan" alt="BenQ"></div>
                    <div class="exhibitor-body"><h3>BenQ Japan</h3><p class="sub">Hardware</p><div class="ex-info"><span class="hall">📍 09-E15</span></div></div>
                </div>
                <div class="exhibitor-card">
                    <div class="exhibitor-image"><img src="https://placehold.co/400x200/fdcb6e/000000?text=Happinet" alt="Happinet"></div>
                    <div class="exhibitor-body"><h3>Happinet</h3><p class="sub">Indie Area</p><div class="ex-info"><span class="hall">📍 10-E13</span></div></div>
                </div>
            </div>
        </div>

    </div>

    {{-- KANAN: MAP ZOOMABLE --}}
    <div class="map-right">
        <h3 style="margin-bottom: 15px; font-weight: 700;">Interactive Map</h3>
        <div class="map-controls">
            <button class="map-btn active" onclick="updateMapView(this, '{{ asset('images/hall_1_8.jpg') }}', 'content-hall-1-8')">Hall 1-8</button>
            <button class="map-btn" onclick="updateMapView(this, '{{ asset('images/hall_9_11.jpg') }}', 'content-hall-9-11')">Hall 9-11</button>
        </div>
        <div class="map-viewport">
            <img id="venue-map-img" src="{{ asset('images/hall_1_8.jpg') }}" alt="Venue Map Layout">
            <div class="zoom-hint">Scroll / Pinch to Zoom</div>
        </div>
    </div>

</div>

{{-- JAVASCRIPT --}}
<script>
    const mapElement = document.getElementById('venue-map-img');
    let panzoomInstance = Panzoom(mapElement, {
        maxScale: 5, minScale: 1, contain: 'outside', startScale: 1, cursor: 'grab'
    });
    mapElement.parentElement.addEventListener('wheel', panzoomInstance.zoomWithWheel);

    function updateMapView(button, imageSource, contentIdToShow) {
        const mapImg = document.getElementById('venue-map-img');
        mapImg.style.opacity = '0.2';
        setTimeout(() => {
            mapImg.src = imageSource;
            panzoomInstance.reset({ animate: false });
            mapImg.style.opacity = '1';
        }, 150);
        document.querySelectorAll('.map-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        document.querySelectorAll('.map-content-section').forEach(section => section.classList.remove('active-content'));
        const targetContent = document.getElementById(contentIdToShow);
        if (targetContent) targetContent.classList.add('active-content');
    }
</script>

@endsection
