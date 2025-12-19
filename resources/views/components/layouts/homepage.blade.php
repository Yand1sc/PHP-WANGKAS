<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SMKN 43 Jakarta' }}</title>

    {{-- 1. Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- 2. Bootstrap Icons (Penting untuk ikon di halaman Kontak/Biodata) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- 3. Google Fonts (Montserrat) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Style Tambahan Global (Opsional) --}}
    <style>
        /* Memastikan font default selalu Montserrat */
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>

    {{-- 
        SLOT UTAMA:
        Ini adalah tempat di mana konten halaman (Home, Biodata, Kontak) 
        akan dimasukkan. Karena halaman-halaman tersebut sudah punya 
        desain full-screen sendiri, layout ini cukup jadi wadah saja.
    --}}
    
    {{ $slot }}

    {{-- Script Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>