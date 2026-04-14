# Sistema de Gestión de Recetas de Cocina - Evaluación N°1

## I. Identificación
* **Estudiante:** Benjamín Felipe Rivera Araneda
* **Asignatura:** Desarrollo Web con Laravel
* **Institución:** Universidad Adventista de Chile (UnACh)
* **Año:** 2026

---

## II. Instalación y Configuración (Nivel 1)
Este proyecto ha sido desarrollado siguiendo los estándares de Laravel para un entorno local.

1. **Clonar el proyecto:** `git clone <url-de-tu-repositorio>`
2. **Instalar dependencias:** `composer install`
3. **Generar la clave de aplicación:** `php artisan key:generate`
4. **Levantar el servidor:** `php artisan serve`

### Evidencias de Funcionamiento
> [Catalogo Principal](img\evidencia-catalogo.png)
> [Busqueda y Filtro](img\evidencia-filtro.png)
> [Detalle Receta](img\evidencia-detalle.png)
> [Validación de Error](img\evidencia-error.png)
> [Carpetas VS Code](img\evidencia-arbol.png)
---

## III. Tabla de Rutas (Nivel 2)
Se han definido rutas con nombres únicos para una navegación eficiente y profesional dentro de las vistas Blade.

| Método | URI | Nombre | Controlador@método |
| :--- | :--- | :--- | :--- |
| GET | `/recetas` | `recetas.index` | `RecetaController@index` |
| GET | `/recetas/{id}` | `recetas.show` | `RecetaController@show` |
| GET | `/recetas/crear` | `recetas.create` | `RecetaController@create` |
| POST | `/recetas` | `recetas.store` | `RecetaController@store` |
| GET | `/buscar` | `recetas.buscar` | `RecetaController@buscar` |

---

## IV. Desarrollo Técnico por Niveles

### Nivel 2 y 3: Controlador y Lógica de Datos
Un **Controlador** en Laravel es una clase PHP que agrupa la lógica de un recurso específico. En este proyecto, ante la restricción del uso de bases de datos, los datos se gestionan mediante **arrays asociativos** dentro del controlador, simulando una persistencia de datos volátil.

**Fragmento de Búsqueda y Filtrado Combinado:**
```php
// Lógica que combina filtro de texto y tipo de comida usando colecciones de Laravel
$recetas = collect($this->obtenerRecetas())->filter(function($item) use ($q, $tipo) {
    $matchNombre = empty($q) || str_contains(strtolower($item['nombre']), strtolower($q));
    $matchTipo = empty($tipo) || $item['tipo'] == $tipo;
    return $matchNombre && $matchTipo;
});
