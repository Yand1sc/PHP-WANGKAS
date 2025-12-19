<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Login' }}</title>

    <link rel="stylesheet" href="/static/css/main.css"> 
    {{-- sesuaikan, pakai css mazer bawaan kamu --}}
</head>

<body class="bg-light">

    <div class="container mt-5">
        {{ $slot }}
    </div>

    <script src="/static/js/main.js"></script>
</body>
</html>
