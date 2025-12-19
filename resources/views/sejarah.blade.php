<x-layouts.homepage title="Sejarah - SMK TELKOM JAKARTA">

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

        /* BACKGROUND KHUSUS SEJARAH (Nuansa Klasik/Emas) */
        body {
            background: 
                /* Overlay Gelap */
                linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                /* Gambar Background */
                url('https://smktelkom-jkt.sch.id/wp-content/uploads/2025/12/9-1.png'); 
            
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

        /* HEADER PAGE */
        .page-header { text-align: center; margin-bottom: 40px; }
        .page-title {
            font-size: 3rem; font-weight: 700;
            letter-spacing: -1px; margin-bottom: 10px;
            background: linear-gradient(to right, #fff, #bbb);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }
        .page-subtitle { color: #ccc; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem; font-weight: 600; }

        /* GLASS CARD */
        .glass-card {
            background: rgba(0, 0, 0, 0.4); 
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            height: 100%;
        }

        /* ICON BACKGROUND */
        .bg-icon {
            position: absolute; bottom: -20px; right: -20px; font-size: 10rem;
            color: rgba(255, 255, 255, 0.03); transform: rotate(-15deg);
            pointer-events: none;
        }

        /* TYPOGRAPHY CONTENT */
        .card-title-tech {
            font-size: 1.8rem; font-weight: 700; color: #fff; margin-bottom: 1.5rem;
            border-left: 4px solid #f1c40f; /* Warna Emas */
            padding-left: 15px; line-height: 1;
        }

        .text-justify-custom {
            text-align: justify; color: #e0e0e0; line-height: 1.8; font-size: 1.05rem; font-weight: 300;
        }

        .highlight { color: #fff; font-weight: 600; border-bottom: 1px solid rgba(255,255,255,0.3); }

        /* LIST CUSTOM */
        .mission-list { list-style: none; padding: 0; margin: 0; }
        .mission-list li {
            position: relative; padding-left: 30px; margin-bottom: 15px; color: #e0e0e0; font-weight: 300;
        }
        .mission-list li::before {
            content: '>';
            position: absolute; left: 0; top: 0; color: #f1c40f; font-weight: bold; font-family: monospace;
        }

        /* ANIMATION */
        .fade-in { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .d-1 { animation-delay: 0.1s; } .d-2 { animation-delay: 0.2s; }
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
                    <li class="nav-item"><a class="nav-link active" href="/sejarah">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Kontak</a></li>
                </ul>
            </div>
            <a href="/login" class="btn-nav-menu">Login</a>
        </div>
    </nav>

    <div class="page-wrapper container">
        
        {{-- HEADER --}}
        <div class="page-header">
            <div class="page-subtitle">Sejarah & Tujuan</div>
            <h1 class="page-title">Profil Sekolah</h1>
        </div>

        {{-- SEJARAH --}}
        <div class="row justify-content-center mb-5 fade-in d-1">
            <div class="col-lg-12">
                <div class="glass-card">
                    <i class="bi bi-clock-history bg-icon"></i>
                    
                    <h2 class="card-title-tech">Sejarah Sekolah</h2>
                    
                    <div class="text-justify-custom">
                        <p>
                            Sekolah Menengah Kejuruan Telkom Jakarta adalah salah satu sekolah yang berada dalam naungan Yayasan Pendidikan Telkom. 
                            Sekolah ini didirikan pada tahun 1992 dengan nama <span class="highlight">Sekolah Teknik Menengah Telkom Sandhy Putra Jakarta</span>, 
                            lalu menjadi <span class="highlight">SMK Telkom Jakarta</span> yang diprakarsai oleh Menteri Pariwisata, Pos, dan Telekomunikasi saat itu, Soesilo Soedarman.


                        <p>
                            Sekolah ini didirikan tahun 1992 untuk menjadi Sekolah Menengah Kejuruan pertama di Indonesia yang menyelenggarakan Pendidikan Kejuruan dalam bidang Teknik Telekomunikasi yang mengkhususkan diri di program keahlian teknik switching.

                        </p>
                        <p>
                           Seiring perkembangan kebutuhan dunia telekomunikasi, dikembangkan beberapa program keahlian lainnya sehingga saat ini terdapat lima program keahlian: 
                           </p>
                           - Teknik Transmisi Telekomunikasi
                           <p>
                            - Teknik Jaringan Akses
                            </p>
                            - Teknik Komputer dan Jaringan
                            <p>
                            - Pengembangan Perangkat Lunak dan Gim
                            </p>
                            - Desain Komunikasi Visual (NEW)
                        </p>
                        <p>
                            <span class="highlight">SMK TELKOM JAKARTA</span> hingga saat ini, yang berlokasi di Jl. Daan Mogot KM.11 RT.01/RW.04, RT.1/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- VISI & MISI --}}
        <div class="row g-4">
            
            {{-- VISI --}}
            <div class="col-lg-6 fade-in d-2">
                <div class="glass-card">
                    <i class="bi bi-eye bg-icon"></i>
                    <h2 class="card-title-tech">Visi Sekolah</h2>
                    
                    <p class="text-justify-custom" style="font-size: 1.2rem; line-height: 1.6;">
                        "Mendidik Murid Kompten di Bidang <span class="highlight" style="color: #f1c40f;">Teknologi Informasi</span> dan  
                        <span class="highlight" style="color: #f1c40f;">Ekonomi Kreatif yang Bertakwa, Mandiri, dan Komunikasif</span> Agar Mampu Berkompetisi di Tingkat Global pada
                        <span class="highlight" style="color: #f1c40f;">Tahun 2030</span> 
                    </p>
                </div>
            </div>

            {{-- MISI --}}
            <div class="col-lg-6 fade-in d-2">
                <div class="glass-card">
                    <i class="bi bi-rocket-takeoff bg-icon"></i>
                    <h2 class="card-title-tech">Misi Sekolah</h2>
                    
                    <ul class="mission-list text-justify-custom">
                        <li>Menyelenggarakan pendidikan dan pelatihan berbasis Teknologi Informasi dan Ekonomi Kreatif yang berstandar industri.</li>
                        <li>Mengembangkan karakter murid yang bertakwa, mandiri, komunikatif, serta berintegritas melalui budaya sekolah yang berlandaskan nilai-nilai, akhlak, moral dan profesional.</li>
                        <li>Meningkatkan kompetensi teknis murid pada bidang teknologi informasi dan ekonomi kreatif sesuai kebutuhan pasar global.</li>
                        <li>Membangun ekosistem pembelajaran kolaboratif antara sekolah, industri, perguruan tinggi, dan komunitas kreatif untuk memperkuat kesiapan karier murid.</li>
                        <li>Mendorong inovasi dan kreativitas murid dalam menghasilkan produk teknologi informasi dan ekonomi krearif yang bernilai, kompetitif, serta relevan terhadap perkembangan jaman.</li>
                        <li>Menyediakan fasilitas, kurikulum, dan pelatihan yang adaptif dan mutakhir untuk memastikan lulusan mampu bersaing pada tingkat nasional maupun global pada tahun 2030.</li>
                        <li>Membentuk lulusan berdaya saing global yang siap bekerja, berwirausaha, atau melanjutkan pendidikan di Teknologi Informasi dan Ekonomi Kreatif.</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</x-layouts.homepage>