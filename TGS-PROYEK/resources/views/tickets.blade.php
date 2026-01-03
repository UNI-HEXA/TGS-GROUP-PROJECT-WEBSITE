{{-- resources/views/overview.blade.php --}}

@extends('layouts.main')

@section('title', 'Tickets')

@section('content')

<div class="ticket-page-container">

    {{-- 1. Navigasi Tab --}}
    <nav class="ticket-nav-tabs">
        <a href="#" class="nav-tab">9.25-26 Business day</a>
        <a href="#" class="nav-tab active">9.27-28 Public Day</a>
        <a href="#" class="nav-tab">Travel Agency</a>
    </nav>

    {{-- 2. Kotak Pemberitahuan --}}
    <div class="ticket-notice-box">
        <h3>Pemberitahuan Pembelian Tiket</h3>
        <p>Hari Umum dan Hari Bisnis memiliki metode pembelian yang berbeda. Mohon periksa dan lanjutkan pembelian Anda.</p>
        <div class="notice-links">
            <a href="#">Jenis Tiket</a>
            <a href="#">Situs Pembelian Tiket</a>
            <a href="#">Untuk Luar Negeri</a>
            <a href="#">Pemberitahuan</a>
        </div>
    </div>

    {{-- 3. Gambar Banner --}}
     <img src="{{ asset('images/tgs-ticket-banner.jpg') }}" class="w-full h-[500px] object-cover"
          onerror="this.src='https://placehold.co/1200x500/333/FFF?text=Tokyo+Game+Show+2025'">

    {{-- 4. Header "Jenis Tiket" --}}
    <div class="ticket-type-header">
        <h2>Jenis Tiket</h2>
    </div>

    {{-- 5. Grid Daftar Tiket --}}
    <div class="ticket-grid">

        {{-- Tiket 1: Tiket masuk 1 hari --}}
        <div class="ticket-item">
            <h3>Tiket masuk 1 hari (khusus siswa SMP ke atas)</h3>
            <hr>
            <div class="ticket-price">
                <span>3.000 yen</span>
                <small>(termasuk pajak) per hari</small>
            </div>
            <p>Tiket akan mulai dijual dari: 12 Juli (Sabtu) 12:00</p>
            <ul class="ticket-notes">
                <li>※ Masuk gratis untuk siswa SD ke bawah.</li>
                <li>※ Penjualan akan berakhir segera setelah jumlah tiket yang direncanakan habis.</li>
            </ul>
        </div>

        {{-- Tiket 2: Tiket Fast / Prioritas --}}
        <div class="ticket-item">
            <h3>Tiket Fast (Prioritas)</h3>
            <hr>
            <div class="ticket-price">
                <span>6.000 yen</span>
                <small>(termasuk pajak) per hari</small>
            </div>
            <p>Periode Undian: 12 Juli (Sabtu) 12:00 - 21 Juli (Senin) 23:59</p>
            <ul class="ticket-notes">
                <li>※ Hanya penjualan undian.</li>
                <li>※ Setelah periode penjualan awal berakhir, tiket tambahan mungkin tersedia dengan sistem siapa cepat dia dapat bagi pelanggan yang tidak terpilih dalam undian. Silakan cek situs web tiket untuk rincian lebih lanjut.</li>
                <li>※ Termasuk item spesial (desain berbeda pada tanggal 27 dan 28 September).</li>
                <li>※ Reservasi dibatasi 2 tiket per orang untuk setiap hari masuk (satu aplikasi untuk setiap hari, maksimal 2 tiket dapat dipesan untuk setiap hari).</li>
            </ul>
        </div>
    </div>

    {{-- 6. Header Tiket Khusus --}}
    <h2 class="special-tickets-header">Tiket Khusus</h2>
    <div class="ticket-item">
        <h3>Tiket Khusus</h3>
        <hr>
        <div class="ticket-price">
            <span>1.500 yen</span>
            <small>(termasuk pajak)</small>
        </div>
        <p>Tiket akan mulai dijual dari 8 Agt (Jumat) 13:00</p>
        <ul class="ticket-notes">
            <li>※ Tiket hanya tersedia melalui penjualan di muka di Ticket Pia. Tidak ada tiket yang dijual pada hari acara, jadi pastikan untuk membelinya sebelumnya.</li>
            <li>※ Pada hari acara, harap bawa Tiket Khusus yang sudah diterbitkan dan mengantre di Loket Tiket Khusus (di depan Pintu Masuk Pusat).</li>
            <li>※ Pada hari acara, Anda wajib menunjukkan (asli) salah satu sertifikat berikut: Sertifikat Disabilitas, Sertifikat Cedera Perang, atau Sertifikat Kesehatan Korban Bom Atom.</li>
        </ul>
    </div>

</div>


<style>
    .ticket-page-container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
    }

    /* 1. Tombol Navigasi Atas */
    .ticket-nav-tabs {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }
    .ticket-nav-tabs .nav-tab {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.9rem;
        border: 1px solid #333;
        text-decoration: none;
    }
    .ticket-nav-tabs .nav-tab.active {
        background-color: #fff;
        color: #000;
        border-color: #000;
    }
    .ticket-nav-tabs .nav-tab:hover {
        opacity: 0.8;
        color: #fff;
    }
    .ticket-nav-tabs .nav-tab.active:hover {
        opacity: 1.0;
        color: #000;
    }

    /* 2. Kotak Pemberitahuan */
    .ticket-notice-box {
        background-color: #f5f5f5;
        border-radius: 8px;
        padding: 25px;
        text-align: center;
        margin-bottom: 30px;
    }
    .ticket-notice-box h3 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #000;
        margin-top: 0;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .ticket-notice-box h3::before {
        content: '';
        display: block;
        width: 4px;
        height: 1.2em;
        background-color: #555;
    }
    .ticket-notice-box p {
        color: #333;
        margin-bottom: 20px;
    }
    .notice-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        flex-wrap: wrap;
    }
    .notice-links a {
        color: #000;
        text-decoration: underline;
    }

    /* 3. Gambar Tiket Besar */
    .large-ticket-image {
        width: 100%;
        max-width: 800px;
        display: block;
        margin: 40px auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* 4. Header "Jenis Tiket" */
    .ticket-type-header {
        background: linear-gradient(to right, #f7971e, #ffd200);
        border-radius: 6px;
        padding: 15px 25px;
        margin-bottom: 30px;
    }
    .ticket-type-header h2 {
        color: #000;
        font-size: 1.5rem;
        margin: 0;
        text-align: center;
        font-weight: 800;
    }

    /* 5. Grid Jenis Tiket */
    .ticket-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 50px;
    }
    .ticket-item {
        background-color: #fff;
    }
    .ticket-item h3 {
        font-size: 1.25rem;
        font-weight: bold;
        color: #000;
        border-left: 5px solid #f7c600;
        padding-left: 12px;
        line-height: 1.4;
    }
    .ticket-item hr {
        border: 0;
        border-top: 2px solid #eee;
        margin: 20px 0;
    }
    .ticket-price {
        margin-bottom: 15px;
    }
    .ticket-price span {
        font-size: 2rem;
        font-weight: 800;
        color: #000;
        margin-right: 10px;
    }
    .ticket-price small {
        font-size: 0.9rem;
        color: #333;
    }
    .ticket-item p {
        font-size: 0.95rem;
        color: #333;
        margin-bottom: 20px;
    }
    .ticket-notes {
        list-style-type: none;
        padding-left: 0;
        font-size: 0.85rem;
        color: #555;
        line-height: 1.7;
    }
    .ticket-notes li {
        text-indent: -1.4em;
        padding-left: 1.4em;
    }

    /* 6. Header Tiket Khusus */
    .special-tickets-header {
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
        margin-top: 50px;
        margin-bottom: 20px;
        border-left: 5px solid #f7c600;
        padding-left: 12px;
    }

    /* -- Media Query untuk Mobile -- */
    @media (max-width: 768px) {
        .ticket-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        .ticket-page-container {
            padding: 15px;
        }
        .ticket-notice-box {
            padding: 20px;
        }
    }
</style>

@endsection
