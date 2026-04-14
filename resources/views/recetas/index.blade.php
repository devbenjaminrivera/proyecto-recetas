@extends('layouts.app') {{-- Heredamos del layout base  --}}

@section('content')
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 fw-bold mb-4">Explora nuestras Recetas</h1>
            
            <div class="card shadow-sm border-0 p-3 bg-white">
                <form action="{{ route('recetas.buscar') }}" method="GET" class="row g-2">
                    <div class="col-md-7">
                        <input type="text" name="buscar" class="form-control form-control-lg border-0 bg-light" 
                               placeholder="¿Qué quieres cocinar hoy?..." value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="tipo" class="form-select form-select-lg border-0 bg-light">
                            <option value="">Todos los tipos</option>
                            <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>Entradas</option>
                            <option value="plato principal" {{ request('tipo') == 'plato principal' ? 'selected' : '' }}>Platos Principales</option>
                            <option value="postre" {{ request('tipo') == 'postre' ? 'selected' : '' }}>Postres</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark btn-lg w-100 h-100">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($recetas as $receta)
            @include('partials.tarjeta', ['receta' => $receta]) {{-- Reutilizamos el parcial --}}
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-4">No encontramos recetas con esos criterios.</p>
                <a href="{{ route('recetas.index') }}" class="btn btn-link">Ver todas las recetas</a>
            </div>
        @endforelse
    </div>
@endsection