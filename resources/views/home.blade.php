<x-layouts.homepage title="Beranda - SMK TELKOM JAKARTA">

    {{-- =========================================
         1. CSS INLINE (SINGLE BACKGROUND STYLE)
         ========================================= --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        /* RESET & GLOBAL */
        body, html {
            margin: 0; padding: 0;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* --- SETTING SATU BACKGROUND DISINI --- */
        body {
            background-color: #050505;
            background-image: 
                /* Overlay Gelap (Biar teks kebaca) */
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                /* SATU GAMBAR UTAMA (Ganti URL ini dengan foto sekolahmu) */
                url('https://www.gamelab.id/uploads/modules/NEWS/3588/Banner%20Image%20Artikel%20Gamelab%20-%202024-05-30T094802.689.jpg?1717037345104');
            
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* KUNCI: Gambar diem pas discroll */
            background-repeat: no-repeat;
        }

        /* NAVBAR */
        .navbar-tesla {
            position: fixed; top: 0; width: 100%; z-index: 1000;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .navbar-brand { font-weight: 800; letter-spacing: 2px; color: #fff !important; text-transform: uppercase; }
        .nav-link { color: #ccc !important; font-weight: 500; font-size: 0.95rem; margin: 0 10px; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #fff !important; text-shadow: 0 0 10px rgba(255,255,255,0.5); }
        .btn-nav-menu { 
            background: transparent; border: 1px solid #fff; color: #fff; 
            padding: 6px 20px; border-radius: 4px; text-decoration: none; transition: 0.3s; 
        }
        .btn-nav-menu:hover { background: #fff; color: #000; }

        /* FULL SECTION LAYOUT */
        /* Kita bikin transparan karena background ada di body */
        .full-section {
            position: relative; width: 100%; height: 100vh;
            display: flex; flex-direction: column; justify-content: center;
            padding: 0 5%; 
            /* Border tipis pemisah antar section (Opsional) */
            border-bottom: 1px solid rgba(255,255,255,0.05); 
        }

        /* KOTAK KONTEN (GLASS EFFECT) */
        .content-box {
            max-width: 700px; z-index: 2; padding: 3rem; border-radius: 20px;
            background: rgba(0, 0, 0, 0.4); /* Transparan Gelap */
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            animation: fadeUp 1s ease-out;
        }
        .content-box h2 { 
            font-size: 3.5rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; 
            background: linear-gradient(to right, #fff, #aaa);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .content-box p { font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem; color: #e0e0e0; font-weight: 300; }

        /* TOMBOL */
        .btn-tesla-action {
            display: inline-block; padding: 12px 40px; border: 1px solid #fff; color: #fff;
            text-decoration: none; text-transform: uppercase; font-size: 0.8rem; font-weight: 600; letter-spacing: 2px;
            transition: all 0.3s; background: rgba(255,255,255,0.1);
        }
        .btn-tesla-action:hover { background: #fff; color: #000; box-shadow: 0 0 15px #fff; }
        .btn-tesla-dark { background: rgba(0, 0, 0, 0.5); border-color: rgba(255,255,255,0.3); }

        /* ALIGNMENT HELPER */
        .text-center-custom { align-items: center; text-align: center; }
        .text-left-custom { align-items: flex-start; text-align: left; }
        .text-right-custom { align-items: flex-end; text-align: right; }

        /* FOOTER */
        .simple-footer { background: rgba(0,0,0,0.8); padding: 20px; text-align: center; font-size: 0.8rem; color: #666; border-top: 1px solid rgba(255,255,255,0.1); }

        /* ANIMASI */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 768px) {
            .content-box { padding: 2rem; margin: 0 15px; }
            .content-box h2 { font-size: 2.5rem; }
            .full-section { align-items: center !important; text-align: center !important; }
        }
    </style>

    {{-- =========================================
         2. HTML CONTENT
         ========================================= --}}

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-tesla">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SMK TELKOM JAKARTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="filter: invert(1);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/biodata">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sejarah">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="d-none d-lg-block">
                <a href="/login" class="btn-nav-menu">Login</a>
            </div>
        </div>
    </nav>

    {{-- SECTION 1: HERO (JUDUL UTAMA) --}}
    <section class="full-section text-center-custom">
        {{-- Slider dihapus, diganti langsung konten karena background udah di body --}}
        <div class="content-box">
            <h2>SMK TELKOM JAKARTA</h2>
            <p>Unggul dalam Vokasi, Berkarakter, dan Berdaya Saing Global.<br>Selamat datang di website resmi sekolah kami.</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="/biodata" class="btn-tesla-action">Jelajahi</a>
                <a href="/login" class="btn-tesla-action btn-tesla-dark">Login</a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <div class="simple-footer">
        SMKN TELKOM JAKARTA © 2024. All Rights Reserved.
    </div>

</x-layouts.homepage>