@extends('layouts.app') {{-- Hereda el diseño profesional  --}}

@section('titulo', 'Nueva Receta | Gourmet 2026')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('recetas.index') }}" class="text-dark">Inicio</a></li>
                <li class="breadcrumb-item active">Nueva Receta</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
            <div class="card-body">
                <h2 class="fw-bold mb-4 titulo-gourmet">Agregar Nueva Receta</h2>
                <p class="text-muted small mb-4">Completa los campos para simular el ingreso de una nueva delicia al sistema.</p>

                <form action="{{ route('recetas.store') }}" method="POST">
                    @csrf {{-- Token de seguridad obligatorio --}}

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre de la Receta</label>
                        <input type="text" name="nombre" 
                               class="form-control form-control-lg bg-light border-0 @error('nombre') is-invalid @enderror" 
                               placeholder="Ej: Pastel de Jaiba" 
                               [cite_start]value="{{ old('nombre') }}"> {{-- Conserva el dato si hay error  --}}
                        @error('nombre') {{-- Muestra error de validación  --}}
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tipo de Comida</label>
                            <select name="tipo" class="form-select form-select-lg bg-light border-0">
                                <option value="entrada" {{ old('tipo') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="plato principal" {{ old('tipo') == 'plato principal' ? 'selected' : '' }}>Plato Principal</option>
                                <option value="postre" {{ old('tipo') == 'postre' ? 'selected' : '' }}>Postre</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Dificultad</label>
                            <select name="dificultad" class="form-select form-select-lg bg-light border-0">
                                <option value="fácil">Fácil</option>
                                <option value="media">Media</option>
                                <option value="difícil">Difícil</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tiempo Estimado</label>
                        <input type="text" name="tiempo" 
                               class="form-control form-control-lg bg-light border-0" 
                               placeholder="Ej: 45 min" 
                               value="{{ old('tiempo') }}">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-lg fw-bold py-3" style="border-radius: 15px;">
                            Simular Guardado
                        </button>
                        <a href="{{ route('recetas.index') }}" class="btn btn-link text-dark text-decoration-none text-center">
                            Cancelar y volver
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection