@extends('layouts.app')

@section('titulo', $receta['nombre'])

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('recetas.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active">{{ $receta['nombre'] }}</li>
            </ol>
        </nav>

        <img src="{{ $receta['imagen_url'] }}" class="img-fluid rounded-4 shadow-sm mb-4 w-100" style="max-height: 450px; object-fit: cover;">
        
        <h1 class="display-4 fw-bold mb-3">{{ $receta['nombre'] }}</h1>
        
        <div class="d-flex gap-3 mb-5 py-3 border-top border-bottom">
            <div><strong>Categoría:</strong> <span class="text-muted">{{ $receta['tipo'] }}</span></div>
            <div><strong>Tiempo:</strong> <span class="text-muted">{{ $receta['tiempo'] }}</span></div>
            <div><strong>Dificultad:</strong> <span class="text-muted">{{ $receta['dificultad'] }}</span></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4 class="fw-bold mb-3">Ingredientes</h4>
                <ul class="list-group list-group-flush mb-4">
                    @foreach($receta['ingredientes'] as $ingrediente)
                        <li class="list-group-item bg-transparent">🔹 {{ $ingrediente }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <h4 class="fw-bold mb-3">Preparación</h4>
                {{-- REQUISITO: Uso de $loop->iteration [cite: 593] --}}
                @foreach($receta['pasos'] as $paso)
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <span class="badge bg-dark rounded-circle" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                {{ $loop->iteration }}
                            </span>
                        </div>
                        <p class="mb-0">{{ $paso }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection