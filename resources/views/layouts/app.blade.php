<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Gourmet 2026')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; color: #333; }
        h1, .titulo-gourmet { font-family: 'Playfair Display', serif; }
        .navbar { background-color: #ffffff; border-bottom: 1px solid #eee; }
        .btn-crear { background-color: #1a1a1a; color: white; border-radius: 50px; padding: 8px 20px; transition: 0.3s; }
        .btn-crear:hover { background-color: #444; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top mb-4 py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-dark" href="{{ route('recetas.index') }}">
                🍳 Gourmet <span class="text-secondary">2026</span>
            </a>
            <a href="{{ route('recetas.create') }}" class="btn btn-crear btn-sm text-decoration-none shadow-sm">
                + Nueva Receta
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content') 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>