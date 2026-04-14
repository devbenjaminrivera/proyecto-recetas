<div class="col">
    <div class="card h-100 border-0 shadow-sm overflow-hidden recipe-card" style="border-radius: 20px; transition: 0.3s;">
        {{-- Imagen con altura fija y centrado automático --}}
        <div style="height: 220px; overflow: hidden; background-color: #eee;">
            <img src="{{ $receta['imagen_url'] }}" 
                 class="card-img-top w-100 h-100" 
                 alt="{{ $receta['nombre'] }}" 
                 style="object-fit: cover;"
                 onerror="this.src='https://via.placeholder.com/400x300?text=Imagen+No+Disponible'">
        </div>
        
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge rounded-pill bg-light text-dark border text-uppercase px-3" style="font-size: 0.65rem;">
                    {{ $receta['tipo'] }}
                </span>
                <small class="text-muted fw-semibold">⏱ {{ $receta['tiempo'] }}</small>
            </div>
            
            <h4 class="card-title fw-bold mb-3">{{ $receta['nombre'] }}</h4>
            
            <div class="d-flex align-items-center mb-4 text-muted small">
                <span class="me-2">📊 Dificultad:</span>
                <span class="fw-bold text-dark">{{ ucfirst($receta['dificultad']) }}</span>
            </div>
            
            <a href="{{ route('recetas.show', $receta['id']) }}" class="btn btn-outline-dark w-100 fw-bold py-2" style="border-radius: 12px;">
                Ver Preparación
            </a>
        </div>
    </div>
</div>

<style>
    .recipe-card:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; }
</style>