<x-layouts.homepage title="Biodata - SMK TELKOM JAKARTA">

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

        /* BACKGROUND KHUSUS BIODATA (Nuansa Teknologi/Abstrak) */
        body {
            background: 
                /* Overlay Gelap */
                linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                /* Gambar Background */
                url('https://scontent.fcgk18-1.fna.fbcdn.net/v/t39.30808-6/485324856_1215253307270486_1480025856977381883_n.jpg?stp=dst-jpg_s960x960_tt6&_nc_cat=108&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=wQK3g7R3zHMQ7kNvwH_qGqn&_nc_oc=Adlk47fAHibBsKC0AtZAuoKwYZbi6IIJcyfP2-mQekVNXOTD94M8_sAPRWzilC6e_SOJ4U79_-ilw-Y-sZx-2b6x&_nc_zt=23&_nc_ht=scontent.fcgk18-1.fna&_nc_gid=jUOUyJcBsKK1qYpnAqVf7w&oh=00_AfnIfxdbvuz2lI3EhFgy7UHk8AbQ1yvezXuGv9OjfKMbzQ&oe=6949FDC5');
            
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
        .page-wrapper {
            padding-top: 130px;
            padding-bottom: 80px;
            min-height: 100vh;
        }

        /* PAGE HEADER */
        .page-header { text-align: center; margin-bottom: 40px; }
        .page-title {
            font-size: 3.5rem; font-weight: 800;
            letter-spacing: -2px; margin-bottom: 10px;
            background: linear-gradient(to right, #ffffff, #a0a0a0);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }
        .page-subtitle { color: #ccc; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem; font-weight: 600; }

        /* GLASS CARD DESIGN */
        .glass-card {
            background: rgba(0, 0, 0, 0.4); 
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            height: 100%;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex; flex-direction: column; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .glass-card:hover {
            transform: translateY(-8px) scale(1.01);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            background: rgba(0, 0, 0, 0.6);
        }

        /* TYPOGRAPHY CARD */
        .label-tech { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; color: #aaa; margin-bottom: 0.5rem; font-weight: 600; position: relative; z-index: 2; }
        .value-tech { font-size: 1.5rem; font-weight: 600; color: #fff; line-height: 1.3; position: relative; z-index: 2; }
        .value-huge { font-size: 5rem; font-weight: 800; background: linear-gradient(to bottom right, #fff, #888); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1; }

        /* ICON WATERMARK */
        .bg-icon {
            position: absolute; bottom: -20px; right: -20px; font-size: 8rem;
            color: rgba(255, 255, 255, 0.05); transform: rotate(-15deg);
            transition: 0.4s; pointer-events: none;
        }
        .glass-card:hover .bg-icon {
            color: rgba(255, 255, 255, 0.1); transform: rotate(0deg) scale(1.1);
            bottom: -10px; right: -10px;
        }

        /* ANIMATION */
        .fade-in { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .d-1 { animation-delay: 0.1s; } .d-2 { animation-delay: 0.2s; } .d-3 { animation-delay: 0.3s; }
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
                    <li class="nav-item"><a class="nav-link active" href="/biodata">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sejarah">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Kontak</a></li>
                </ul>
            </div>
            <a href="/login" class="btn-nav-menu">Login</a>
        </div>
    </nav>

    <div class="page-wrapper container">
        
        {{-- HEADER --}}
        <div class="page-header">
            <div class="page-subtitle">Profil Lengkap</div>
            <h1 class="page-title">BIODATA SEKOLAH</h1>
        </div>

        {{-- GRID CONTENT --}}
        <div class="row g-4">

            {{-- 1. NAMA SEKOLAH --}}
            <div class="col-lg-8 fade-in d-1">
                <div class="glass-card">
                    <i class="bi bi-bank bg-icon"></i> 
                    <span class="label-tech">Identitas Institusi</span>
                    <div class="value-tech" style="font-size: 2.2rem;">SMK TELKOM JAKARTA</div>
                    <div class="mt-2 text-muted" style="color: #ccc !important;">Sekolah Menengah Kejuruan Pusat Keunggulan</div>
                </div>
            </div>

            {{-- 2. AKREDITASI --}}
            <div class="col-lg-4 fade-in d-2">
                <div class="glass-card" style="align-items: center; text-align: center;">
                    <i class="bi bi-star-fill bg-icon" style="font-size: 6rem; top: 10px; right: 10px;"></i>
                    <span class="label-tech">Akreditasi</span>
                    <div class="value-huge">A</div>
                    <div class="small mt-2" style="color: #ccc;">Sangat Baik (Unggul)</div>
                </div>
            </div>

            {{-- 3. KEPALA SEKOLAH --}}
            <div class="col-md-6 col-lg-4 fade-in d-3">
                <div class="glass-card">
                    <i class="bi bi-person-badge bg-icon"></i>
                    <span class="label-tech">Kepala Sekolah</span>
                    <div class="value-tech">ROSYANTO</div>
                    <div class="text-muted" style="color: #ccc !important;">Pimpinan Sekolah</div>
                </div>
            </div>

            {{-- 4. ALAMAT --}}
            <div class="col-md-6 col-lg-8 fade-in d-3">
                <div class="glass-card">
                    <i class="bi bi-map bg-icon"></i>
                    <span class="label-tech">Lokasi Sekolah</span>
                    <div class="value-tech">Jl. Daan Mogot KM.11</div>
                    <div class="text-muted mt-1" style="color: #ccc !important;">
                RT.01/RW.04, RT.1/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11710
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-layouts.homepage>