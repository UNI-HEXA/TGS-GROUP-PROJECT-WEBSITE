<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard TGS' }}</title>

    <style>
        /* == Pengaturan Dasar == */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            background-color: #f4f7f6;
            color: #333;
        }
        a { text-decoration: none; color: #111; transition: color 0.2s; }
        a:hover { color: #555; }

        /* == Struktur Header (Navbar) == */
        .header {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-container {
            display: flex;
            align-items: center;
            border: 2px solid #007bff;
            padding: 8px 12px;
        }
        .logo-text { font-size: 2.5rem; font-weight: bold; color: #000; margin-right: 15px; line-height: 1; }
        .logo-details { font-size: 0.8rem; line-height: 1.4; color: #555; border-left: 1px solid #ccc; padding-left: 15px; }
        .navigation { display: flex; align-items: center; gap: 20px; }
        .main-nav { display: flex; gap: 25px; font-weight: 500; }
        .main-nav a { display: flex; align-items: center; gap: 6px; }
        .meta-nav { display: flex; align-items: center; gap: 15px; font-size: 0.85rem; color: #666; border-left: 1px solid #e0e0e0; padding-left: 20px; }
        .language-select { border: 1px solid #ccc; border-radius: 4px; padding: 4px 8px; font-size: 0.85rem; }
        .mobile-menu-button { background-color: #111; color: white; border: none; border-radius: 8px; width: 44px; height: 44px; font-size: 24px; cursor: pointer; display: flex; align-items: center; justify-content: center; margin-left: 10px; }

        /* == Pengaturan Responsif (Sembunyikan nav di mobile) == */
        @media (max-width: 1024px) {
            .main-nav, .meta-nav { display: none; }
        }
        @media (min-width: 1025px) {
            .mobile-menu-button { display: none; }
        }

        /* == Styling untuk Konten Utama (akan ada di halaman anak) == */
        .dashboard-main { padding: 24px; }
        .dashboard-main h1 { font-size: 2rem; font-weight: 600; margin-bottom: 20px; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .card { background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); }
        .card h3 { margin-top: 0; font-size: 1.2rem; color: #000; }
        .card p { font-size: 0.95rem; line-height: 1.5; }
        .card .stat { font-size: 2.2rem; font-weight: 600; margin-top: 10px; }
    </style>

    </head>
<body>

    <header class="header">
        <div class="logo-container">
            <div class="logo-text">TGS</div>
            <div class="logo-details">
                2025.09.25 THU <br>
                2025.09.28 SUN <br>
                MAKUHARI MESSE
            </div>
        </div>
        <div class="navigation">
            <nav class="main-nav">
                <a href="#">🏠 Overview</a>
                <a href="#">🎟️ Tickets</a>
                <a href="#">🏟️ Event Stage</a>
                <a href="#">🗺️ Map</a>
                <a href="#">🛍️ Merchandise</a>
            </nav>
            <div class="meta-nav">
                <a href="#">For Business</a>
                <a href="#">For Overseas</a>
                <a href="#">Press</a>
                <select name="lang" class="language-select">
                    <option value="en">English</option>
                    <option value="jp">日本語</option>
                </select>
            </div>
            <button class="mobile-menu-button" aria-label="Menu">&#9776;</button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
