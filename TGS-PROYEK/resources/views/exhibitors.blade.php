@extends('layouts.main')

@section('title', 'Exhibitors')

@section('content')

{{-- STYLE SECTION --}}
<style>
    /* Wrapper utama */
    .page-container {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        min-height: 100vh;
        padding-bottom: 50px;
    }

    /* --- HERO BANNER STYLES (NEW) --- */
    .hero-section {
        position: relative;
        width: 100%;
        height: 500px;
        overflow: hidden;
    }

    .hero-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4); /* Efek gelap transparan */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0 20px;
    }

    .hero-title {
        color: white;
        font-size: 3.5rem; /* Setara text-6xl */
        font-weight: 800;
        text-shadow: 0 4px 10px rgba(0,0,0,0.5);
        margin: 0;
        line-height: 1.2;
    }

    .hero-subtitle {
        color: white;
        font-size: 1.25rem; /* Setara text-xl */
        margin-top: 15px;
        font-weight: 500;
        text-shadow: 0 2px 5px rgba(0,0,0,0.5);
    }

    /* Responsif untuk Mobile */
    @media (max-width: 768px) {
        .hero-section { height: 300px; }
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 1rem; }
    }

    /* Title section (Updated margin) */
    .title-box {
        background: linear-gradient(to right, #defcc9, #f7e6ff);
        padding: 40px 0;
        text-align: center;
        font-size: 32px;
        font-weight: bold;
        border-bottom-left-radius: 40px;
        border-bottom-right-radius: 40px;
        margin-bottom: 30px;
        /* Tambahan agar menyatu dengan banner jika diinginkan, atau beri jarak */
        margin-top: 0;
    }

    /* Category Cards */
    .category-wrapper {
        display: flex;
        justify-content: center;
        gap: 25px;
        padding: 0 20px 40px 20px;
        flex-wrap: wrap;
    }

    .category-card {
        width: 260px;
        height: 150px;
        border-radius: 25px;
        padding: 20px;
        color: white;
        font-size: 17px;
        font-weight: bold;
        position: relative;
        display: flex;
        align-items: flex-start;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-card span {
        background: black;
        padding: 6px 12px;
        border-radius: 12px;
    }

    /* Gradient colors */
    .c1 { background: linear-gradient(135deg, #1fc4aa, #89ffd4); }
    .c2 { background: linear-gradient(135deg, #3aa6ff, #ffa34d); }
    .c3 { background: linear-gradient(135deg, #ffe766, #ffa45e); }
    .c4 { background: linear-gradient(135deg, #78ff56, #a3cf00); }
    .c5 { background: linear-gradient(135deg, #9e7bff, #ffb0d5); }
    .c6 { background: linear-gradient(135deg, #ff7c33, #ffb86c); }

    /* Arrow button */
    .arrow-btn {
        position: absolute;
        right: 15px;
        top: 15px;
        background: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        color: black;
        cursor: pointer;
    }

    /* Filter buttons */
    .filter-wrapper {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
        flex-wrap: wrap;
        padding: 0 10px;
    }

    .filter-btn {
        background: black;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border: 2px solid transparent;
    }

    .filter-btn:hover {
        opacity: 0.8;
    }

    /* --- EXHIBITOR CARD STYLES --- */
    .exhibitor-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    .exhibitor-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
        border: 1px solid #eee;
        display: flex;
        flex-direction: column;
    }

    .exhibitor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .exhibitor-image {
        width: 100%;
        height: 160px;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .exhibitor-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .exhibitor-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .exhibitor-body h3 {
        margin: 0 0 5px 0;
        font-size: 18px;
        font-weight: 700;
        color: #222;
        line-height: 1.4;
    }

    .exhibitor-body .sub {
        font-size: 13px;
        color: #666;
        margin: 0 0 15px 0;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .ex-info {
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .hall {
        background: #e3ffcf;
        color: #333;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    /* PDF Button */
    .pdf-btn {
        margin: 40px auto 20px auto;
        display: flex;
        justify-content: center;
    }

    .pdf-btn button {
        padding: 15px 35px;
        font-size: 18px;
        border-radius: 30px;
        border: none;
        cursor: pointer;
        background: black;
        color: white;
        transition: 0.3s;
    }

    .pdf-btn button:hover {
        background: #333;
    }
</style>

<div class="page-container">

    {{-- 1. BANNER SECTION (NEW) --}}
    <section class="hero-section">
        {{-- Image --}}
        <img src="{{ asset('images/hero-main.jpg') }}"
             class="hero-img"
             onerror="this.src='https://placehold.co/1200x500/333/FFF?text=Tokyo+Game+Show+2025'"
             alt="TGS Banner">

        {{-- Overlay & Text --}}
        <div class="hero-overlay">
            <h1 class="hero-title">
                EXHIBITORS PREVIEW
            </h1>
            <p class="hero-subtitle">Explore Hall Exhibitors</p>
        </div>
    </section>

    {{-- 2. TITLE BOX --}}
    <div class="title-box">
        Exhibitor List
    </div>

    {{-- 3. CATEGORY CARDS --}}
    <div class="category-wrapper">
        <div class="category-card c1"><span>Area Pameran Umum</span><div class="arrow-btn">◀</div></div>
        <div class="category-card c2"><span>Proyek Penyelenggara</span></div>
        <div class="category-card c3"><span>Area Game Ponsel Pintar</span></div>
        <div class="category-card c4"><span>Area Perangkat Keras Gaming</span></div>
        <div class="category-card c5"><span>Area Gaya Hidup Gaming</span><div class="arrow-btn">▶</div></div>
        <div class="category-card c6"><span>Area AR / VR</span></div>
    </div>

    {{-- 4. FILTERS --}}
    <div class="filter-wrapper">
        <div class="filter-btn" onclick="filterData('A', this)">あ/A</div>
        <div class="filter-btn" onclick="filterData('Ka', this)">か/Ka</div>
        <div class="filter-btn" onclick="filterData('Sa', this)">さ/Sa</div>
        <div class="filter-btn" onclick="filterData('Ta', this)">た/Ta</div>
        <div class="filter-btn" onclick="filterData('Na', this)">な/Na</div>
        <div class="filter-btn" onclick="filterData('Ha', this)">は/Ha</div>
        <div class="filter-btn" onclick="filterData('Ma', this)">ま/Ma</div>
        <div class="filter-btn" onclick="filterData('Ya', this)">や/Ya</div>
        <div class="filter-btn" onclick="filterData('Ra', this)">ら/Ra</div>
        <div class="filter-btn" onclick="filterData('Wa', this)">わ/Wa</div>
        <div class="filter-btn active" style="background: white; color: black; border: 2px solid black;" onclick="filterData('All', this)">ALL</div>
    </div>

    {{-- 5. EXHIBITOR LIST CONTAINER --}}
    <div style="padding: 20px 5%; min-height: 400px;">
        <div id="exhibitor-list" class="exhibitor-container">
            {{-- Data akan dirender oleh Javascript --}}
        </div>

        {{-- PAGINATION --}}
        <div id="pagination-controls" style="display: flex; justify-content: center; gap: 8px; margin-top: 50px;">
        </div>
    </div>

    <div class="pdf-btn">
        <button>Download PDF</button>
    </div>

</div>

{{-- JAVASCRIPT LOGIC --}}
<script>
    // 1. DATA EXHIBITORS
    const exhibitorsDB = [
        {
            name: "Sony Interactive Ent.",
            booth: "04-S01",
            area: "General Exhibition Area",
            image: "https://i.pinimg.com/736x/ff/e1/8b/ffe18bc07f4987eed129481171683dad.jpg"
        },
        {
            name: "HakkoAI",
            booth: "03-N09",
            area: "General Exhibition Area",
            image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13958.jpg"
        },
        {
            name: "Games From Indonesia",
            booth: "10-E22",
            area: "Indie Game Area",
            image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14174.jpg"
        },
        {
            name: "Arts college Yokohama",
            booth: "01-N40",
            area: "Game Academy Area",
            image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14404.jpg"
        },
        {
            name: "HYPER REAL",
            booth: "11-E19",
            area: "Indie Game Area",
            image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13932.jpg"
        },
        {
            name: "Capcom",
            booth: "05-S01",
            area: "General Exhibition Area",
            image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13792.jpg?3f9e6eea-0d0a-46cb-90d2-73aad41e345a"
        },
        { name: "Morbid Metal", booth: "General Exhibition Area", area: "Hall2", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14492.jpg" },
        { name: "AORUS", booth: "07-N09", area: "Hardware", image: "https://i.ytimg.com/vi/y18Y2yhm8jQ/maxresdefault.jpg" },
        { name: "Of Peaks and Tides", booth: "01-C11", area: "General Exhibition Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13969.jpg" },
        { name: "Frontier Works", booth: "08-S01", area: "Mobile", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14295.jpg" },
        { name: "VANTAN GAME ACADEMY", booth: "01-C04", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14367.jpg" },
        { name: "Sword of Justice", booth: "08-C02", area: "General Exhibition Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14140.jpg" },
        { name: "BlasTrain", booth: "09-W36", area: "Business Solution Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13889.jpg" },
        { name: "Mie Translation Services", booth: "09-W31", area: "Business Solution Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14181.jpg" },
        { name: "RICOH PFU COMPUTING", booth: "09-W66", area: "Business Solution Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13940.jpg" },
        { name: "Shinwork Technology", booth: "09-W68", area: "Business Solution Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14179.jpg" },
        { name: "MSFactory", booth: "09-W118", area: "Merchandise Sales Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13806.jpg" },
        { name: "IWASAKI GAKUEN", booth: "01-N28", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13837.jpg" },
        { name: "IT College Okinawa", booth: "01-N31", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14856.jpg" },
        { name: "Kinki Computer & Electronics College", booth: "01-N61", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/13822.jpg" },
        { name: "Osaka Designer Academy", booth: "01-N60", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14809.jpg" },
        { name: "Aso Pop Culture College", booth: "01-N51", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14361.jpg" },
        { name: "Hannan University", booth: "01-N07", area: "Game Academy Area", image: "https://service.tgs.cesa.or.jp/files/96/tgs2025/images/exhibition/14418.jpg" },
        { name: "Mihoyo (Hoyoverse)", booth: "01-N08", area: "Game Academy Area", image: "https://webstatic.hoyoverse.com/upload/op-public/2023/08/23/061ffa4f7881d8a6c527d6eb9ea08506_60499452296434830.jpg" },
        { name: "Nintendo", booth: "Online", area: "General", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Nintendo_Switch_logo.svg/2048px-Nintendo_Switch_logo.svg.png" },
        { name: "Riot Games", booth: "05-S02", area: "eSports", image: "https://www.riotgames.com/darkroom/800/87521fcaeca5867538ae7f46ac152740:2f8144e17957078916e41d2410c111c3/002-rg-2021-full-lockup-offwhite.jpg" },
        { name: "Ubisoft", booth: "Online", area: "General", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSUa5HYevU1VFTyvL-Ony_h82XHdzg5faxVg&s" },
        { name: "Valve", booth: "02-C01", area: "PC Gaming", image: "https://i.ytimg.com/vi/Xwqw7O0IU-0/sddefault.jpg" },
        { name: "Xbox", booth: "Online", area: "General", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYpKryaUGKVCB_ZDjKoeIX9JFpIeVVUNrNTQ&s" },
        { name: "ZETA DIVISION", booth: "04-C01", area: "Lifestyle", image: "https://pbs.twimg.com/media/FKqeeN9VcAARcFt.jpg" }
    ];

    // Variables for State
    let currentPage = 1;
    let itemsPerPage = 12;
    let filteredData = [];

    // 2. LOGIC FILTER GROUP
    const filterGroups = {
        'A':  ['A', 'I', 'U', 'E', 'O'],
        'Ka': ['K', 'G', 'C', 'Q'],
        'Sa': ['S', 'Z', 'J', 'X'],
        'Ta': ['T', 'D'],
        'Na': ['N'],
        'Ha': ['H', 'B', 'P', 'F', 'V'],
        'Ma': ['M'],
        'Ya': ['Y'],
        'Ra': ['R', 'L'],
        'Wa': ['W', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9']
    };

    // 3. FILTER LOGIC
    function filterData(groupKey, element) {
        currentPage = 1;

        const btns = document.querySelectorAll('.filter-btn');
        btns.forEach(b => {
            b.style.background = 'black';
            b.style.color = 'white';
            b.style.border = '2px solid transparent';
            b.classList.remove('active');
        });

        if(element) {
            element.classList.add('active');
            element.style.background = 'white';
            element.style.color = 'black';
            element.style.border = '2px solid black';
        }

        if (groupKey === 'All') {
            filteredData = exhibitorsDB;
        } else {
            const allowedChars = filterGroups[groupKey];
            filteredData = exhibitorsDB.filter(item => {
                const firstChar = item.name.charAt(0).toUpperCase();
                return allowedChars.includes(firstChar);
            });
        }

        renderGrid();
        renderPagination();
    }

    // 4. RENDER GRID
    function renderGrid() {
        const listContainer = document.getElementById('exhibitor-list');
        listContainer.innerHTML = "";

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const paginatedItems = filteredData.slice(startIndex, endIndex);

        if (paginatedItems.length === 0) {
            listContainer.innerHTML = "<div style='grid-column: 1/-1; text-align:center; padding:40px; font-size:18px; color:#777;'>Exhibitor tidak ditemukan pada kategori ini.</div>";
            return;
        }

        paginatedItems.forEach(item => {
            const cardHTML = `
                <div class="exhibitor-card">
                    <div class="exhibitor-image">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="exhibitor-body">
                        <h3>${item.name}</h3>
                        <p class="sub">${item.area}</p>
                        <div class="ex-info">
                            <span class="hall">📍 ${item.booth}</span>
                        </div>
                    </div>
                </div>
            `;
            listContainer.innerHTML += cardHTML;
        });
    }

    // 5. RENDER PAGINATION
    function renderPagination() {
        const paginationContainer = document.getElementById('pagination-controls');
        paginationContainer.innerHTML = "";

        const totalPages = Math.ceil(filteredData.length / itemsPerPage);

        if (totalPages <= 1) return;

        const btnStyle = "width: 40px; height: 40px; border-radius: 50%; border: none; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: 0.2s;";

        // Prev Button
        const prevBtn = document.createElement('button');
        prevBtn.innerText = "‹";
        prevBtn.style.cssText = btnStyle + (currentPage === 1 ? "background:#eee; color:#ccc;" : "background:#333; color:white;");
        prevBtn.disabled = currentPage === 1;
        prevBtn.onclick = () => changePage(currentPage - 1, totalPages);
        paginationContainer.appendChild(prevBtn);

        // Page Numbers
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.innerText = i;
            pageBtn.style.cssText = btnStyle + (currentPage === i ? "background:black; color:white;" : "background:#ddd; color:#333;");
            pageBtn.onclick = () => changePage(i, totalPages);
            paginationContainer.appendChild(pageBtn);
        }

        // Next Button
        const nextBtn = document.createElement('button');
        nextBtn.innerText = "›";
        nextBtn.style.cssText = btnStyle + (currentPage === totalPages ? "background:#eee; color:#ccc;" : "background:#333; color:white;");
        nextBtn.disabled = currentPage === totalPages;
        nextBtn.onclick = () => changePage(currentPage + 1, totalPages);
        paginationContainer.appendChild(nextBtn);
    }

    // 6. CHANGE PAGE EVENT
    function changePage(newPage, totalPages) {
        if (newPage < 1 || newPage > totalPages) return;
        currentPage = newPage;
        renderGrid();
        renderPagination();
        document.querySelector('.filter-wrapper').scrollIntoView({behavior: 'smooth'});
    }

    // INITIALIZE
    document.addEventListener('DOMContentLoaded', () => {
        const allBtn = document.querySelector('.filter-btn.active');
        if(allBtn) {
             filterData('All', allBtn);
        }
    });

</script>
@endsection
