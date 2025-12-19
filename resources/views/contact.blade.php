<x-layouts.homepage title="Kontak - SMK TELKOM JAKARTA">

    {{-- =========================================
         1. CSS INLINE (STYLE DESIGN)
         ========================================= --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        /* RESET & GLOBAL */
        body, html {
            margin: 0; padding: 0;
            background-color: #050505;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* BACKGROUND KHUSUS KONTAK */
        body {
            background: 
                /* Overlay Gelap */
                linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                /* Gambar Background (Gedung/Abstrak) */
                url('https://cdn.rri.co.id/berita/Bandung/o/1711873998282-IMG-20240331-WA0015/fsmz70trf8ivytp.jpeg'); 
            
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        /* NAVBAR */
        .navbar-tesla {
            position: fixed; top: 0; width: 100%; z-index: 1000;
            background: rgba(0,0,0,0.8); backdrop-filter: blur(10px);
            padding: 1rem 2rem; border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .navbar-brand { font-weight: 800; letter-spacing: 2px; color: #fff !important; text-transform: uppercase; }
        .nav-link { color: #ccc !important; font-weight: 500; font-size: 0.95rem; margin: 0 10px; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #fff !important; text-shadow: 0 0 10px rgba(255,255,255,0.5); }
        .btn-nav-menu { border: 1px solid #fff; color: #fff; padding: 5px 20px; border-radius: 4px; text-decoration: none; transition: 0.3s; background: transparent; }
        .btn-nav-menu:hover { background: #fff; color: #000; }

        /* CONTAINER WRAPPER */
        .contact-wrapper {
            padding-top: 130px;
            padding-bottom: 80px;
            min-height: 100vh;
        }

        /* TYPOGRAPHY */
        .page-title {
            font-size: 3rem; font-weight: 700; text-align: center;
            letter-spacing: -1px; margin-bottom: 10px;
            background: linear-gradient(to right, #fff, #bbb);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }
        .page-subtitle {
            text-align: center; color: #ccc; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem; margin-bottom: 3rem; font-weight: 600;
        }

        /* GLASS CARD (KOTAK TRANSPARAN) */
        .glass-card {
            background: rgba(0, 0, 0, 0.5); /* Gelap transparan */
            backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2.5rem 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            display: flex; flex-direction: column; justify-content: center; align-items: center;
        }
        
        .glass-card:hover {
            transform: translateY(-8px);
            background: rgba(0, 0, 0, 0.7);
            border-color: rgba(255,255,255,0.4);
            box-shadow: 0 20px 50px rgba(0,0,0,0.6);
        }

        /* ICON & TEXT */
        .contact-icon {
            font-size: 2.5rem; color: #fff; margin-bottom: 1rem; display: inline-block;
            transition: 0.3s;
        }
        .glass-card:hover .contact-icon { transform: scale(1.2); text-shadow: 0 0 15px rgba(255,255,255,0.8); }

        h5.card-label { text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; color: #aaa; margin-bottom: 10px; font-weight: 700; }
        p.card-value, a.card-link { font-size: 1.1rem; color: #fff; font-weight: 500; text-decoration: none; line-height: 1.6; }
        
        a.card-link { border-bottom: 1px solid rgba(255,255,255,0.3); transition: 0.3s; }
        a.card-link:hover { border-color: #fff; color: #fff; }

        /* DARK MAP STYLE */
        .map-box {
            margin-top: 4rem;
            border-radius: 16px; overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
            height: 450px; position: relative;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }
        
        /* Filter Sakti: Peta Jadi Dark Mode */
        iframe { 
            width: 100%; height: 100%; border: 0; 
            filter: grayscale(100%) invert(92%) contrast(83%); 
        }

        .map-overlay-label {
            position: absolute; top: 20px; left: 20px;
            background: rgba(0,0,0,0.8); color: #fff;
            padding: 8px 16px; border-radius: 4px;
            font-size: 0.8rem; letter-spacing: 1px;
            border: 1px solid #555; pointer-events: none;
            z-index: 10;
        }
    </style>

    {{-- =========================================
         2. HTML CONTENT
         ========================================= --}}

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-tesla">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">SMK TELKOM JAKARTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="filter: invert(1);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/biodata">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sejarah">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/contact">Kontak</a></li>
                </ul>
            </div>
            <a href="/login" class="btn-nav-menu">login</a>
        </div>
    </nav>

    {{-- KONTEN UTAMA --}}
    <div class="contact-wrapper">
        <div class="container">
            
            {{-- JUDUL --}}
            <h1 class="page-title">PUSAT INFORMASI</h1>
            <div class="page-subtitle">Hubungi Kami Untuk Informasi Lebih Lanjut</div>

            {{-- GRID KARTU KONTAK --}}
            <div class="row g-4 justify-content-center">

                {{-- Alamat --}}
                <div class="col-md-6 col-lg-3">
                    <div class="glass-card">
                        <i class="bi bi-geo-alt-fill contact-icon"></i>
                        <h5 class="card-label">Alamat</h5>
                        <p class="card-value">
                            Jl. Daan Mogot KM.11 RT.01/RW.04, RT.1/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11710
                        </p>
                    </div>
                </div>

                {{-- Telepon --}}
                <div class="col-md-6 col-lg-3">
                    <div class="glass-card">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        <h5 class="card-label">Telepon</h5>
                        <p class="card-value">08111442600</p>
                    </div>
                </div>

                {{-- Website --}}
                <div class="col-md-6 col-lg-3">
                    <div class="glass-card">
                        <i class="bi bi-globe2 contact-icon"></i>
                        <h5 class="card-label">Website</h5>
                        <p class="card-value">
                            <a href="https://smktelkom-jkt.sch.id/" target="_blank" class="card-link">
                                smktelkom-jkt.sch.id
                            </a>
                        </p>
                    </div>
                </div>

            </div>

            {{-- GOOGLE MAPS (DARK MODE) --}}
            <div class="mt-5">
                <div class="map-box">
                    <div class="map-overlay-label">LOKASI SMK TELKOM JAKARTA</div>
                    {{-- Iframe Google Maps --}}
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.820039876694!2d106.75094028585713!3d-6.154851638699331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7c113c644b5%3A0xa3a809c8c4627262!2sSMK%20Telkom%20Jakarta!5e0!3m2!1sen!2sid!4v1766072984524!5m2!1sen!2sid" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            

        </div>
    </div>

</x-layouts.homepage>