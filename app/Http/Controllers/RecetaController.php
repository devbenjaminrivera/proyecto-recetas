<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    // Función privada para obtener los datos (Simula la DB)
    private function obtenerRecetas() {
        return [
            [
                'id' => 1, 
                'nombre' => 'Pastel de Choclo', 
                'tipo' => 'plato principal', 
                'dificultad' => 'media', 
                'tiempo' => '90 min', 
                'ingredientes' => ['Choclo fresco', 'Pino de carne', 'Pollo', 'Huevo duro', 'Aceitunas'], 
                'pasos' => ['Preparar el pino de carne con cebolla', 'Moler el choclo con albahaca', 'Armar en fuentes de greda', 'Hornear hasta dorar'], 
                'imagen_url' => 'https://comedera.com/wp-content/uploads/sites/9/2022/12/Pastel-de-choclo-chileno.jpg'
            ],
            [
                'id' => 2, 
                'nombre' => 'Ensalada César', 
                'tipo' => 'entrada', 
                'dificultad' => 'fácil', 
                'tiempo' => '15 min', 
                'ingredientes' => ['Lechuga costina', 'Pechuga de pollo', 'Crutones', 'Salsa César', 'Queso parmesano'], 
                'pasos' => ['Lavar y picar la lechuga', 'Cocer el pollo a la plancha', 'Mezclar con los crutones y salsa', 'Espolvorear queso encima'], 
                'imagen_url' => 'https://newmansown.com/wp-content/uploads/2022/03/Caesar-salad-with-croutons.jpg'
            ],
            [
                'id' => 3, 
                'nombre' => 'Mousse de Chocolate', 
                'tipo' => 'postre', 
                'dificultad' => 'fácil', 
                'tiempo' => '30 min', 
                'ingredientes' => ['Chocolate 70% cacao', 'Crema de leche', 'Azúcar flor', 'Esencia de vainilla'], 
                'pasos' => ['Derretir el chocolate a baño maría', 'Batir la crema a punto de nieve', 'Mezclar con movimientos envolventes', 'Refrigerar por 2 horas'], 
                'imagen_url' => 'https://d1uz88p17r663j.cloudfront.net/original/405e0bb344ede9f3e2384ac9cf8e41ee_mousse-classica-chocolate-receitas-nestle.jpg'
            ],
            [
                'id' => 4, 
                'nombre' => 'Ceviche de Reineta', 
                'tipo' => 'entrada', 
                'dificultad' => 'media', 
                'tiempo' => '25 min', 
                'ingredientes' => ['Filete de reineta', 'Limón sutil', 'Cebolla morada', 'Cilantro', 'Ají verde'], 
                'pasos' => ['Cortar el pescado en cubos', 'Marinar con jugo de limón por 10 min', 'Añadir la cebolla en pluma y aliños', 'Servir inmediatamente frío'], 
                'imagen_url' => 'https://images.aws.nestle.recipes/original/56700de435c12f170c16127eba270c4f_ceviche.jpg'
            ],
            [
                'id' => 5, 
                'nombre' => 'Lasaña de Carne', 
                'tipo' => 'plato principal', 
                'dificultad' => 'difícil', 
                'tiempo' => '60 min', 
                'ingredientes' => ['Láminas de pasta', 'Carne molida', 'Salsa de tomate', 'Salsa blanca', 'Queso mozzarella'], 
                'pasos' => ['Preparar salsa boloñesa con la carne', 'Armar capas de pasta, carne y salsa blanca', 'Cubrir con abundante queso', 'Gratinar en el horno a 200°C'], 
                'imagen_url' => 'https://www.recetasdesbieta.com/wp-content/uploads/2018/10/lasagna-original..jpg'
            ],
            [
                'id' => 6, 
                'nombre' => 'Suspiro Limeño', 
                'tipo' => 'postre', 
                'dificultad' => 'media', 
                'tiempo' => '45 min', 
                'ingredientes' => ['Leche condensada', 'Leche evaporada', 'Yemas de huevo', 'Oporto', 'Claras'], 
                'pasos' => ['Cocer las leches hasta que espese', 'Añadir las yemas con cuidado', 'Preparar un merengue con el oporto', 'Montar en copas individuales'], 
                'imagen_url' => 'https://lh6.googleusercontent.com/proxy/FkdJKi657T_b3nAVRuRvyUDEPp608gtbAC0cTDDH92ZpyL-v7Ta8ISD_qY8KtkUFtHWIpiZMOwXjHtd2Lp4fdsQyDyeClxvL3oThamig164qRflaTx4OBbPBPSQx2k3MjGbzpmY'
            ],
            [
                'id' => 7, 
                'nombre' => 'Sopaipillas Pasadas', 
                'tipo' => 'postre', 
                'dificultad' => 'fácil', 
                'tiempo' => '40 min', 
                'ingredientes' => ['Zapallo cocido', 'Harina', 'Chancaca', 'Naranja', 'Canela'], 
                'pasos' => ['Formar masa con zapallo y harina', 'Cortar círculos y freír', 'Preparar almíbar con chancaca y especias', 'Sumergir las sopaipillas en el almíbar caliente'], 
                'imagen_url' => 'https://www.marcachile.cl/wp-content/uploads/2021/07/recetas-chilenas-sopaipillas-pasadas-1-1200x900.jpg'
            ],
            [
                'id' => 8, 
                'nombre' => 'Humitas Chilenas', 
                'tipo' => 'plato principal', 
                'dificultad' => 'difícil', 
                'tiempo' => '120 min', 
                'ingredientes' => ['Choclo tierno', 'Albahaca', 'Cebolla', 'Manteca', 'Hojas de choclo'], 
                'pasos' => ['Rallar o moler el choclo', 'Mezclar con sofrito de cebolla y albahaca', 'Envolver la mezcla en las hojas', 'Cocer en agua hirviendo por 40 min'], 
                'imagen_url' => 'https://gourmet.iprospect.cl/wp-content/uploads/2012/01/Humitas-e1325692985982.jpg'
            ],
        ];
    }

    public function index(Request $request) {
        $q = $request->input('buscar');
        $tipo = $request->input('tipo');

        // Usamos collect() para filtrar el array fácilmente
        $recetas = collect($this->obtenerRecetas())->filter(function($item) use ($q, $tipo) {
            $matchNombre = empty($q) || str_contains(strtolower($item['nombre']), strtolower($q));
            $matchTipo = empty($tipo) || $item['tipo'] == $tipo;
            return $matchNombre && $matchTipo;
        });

        return view('recetas.index', compact('recetas'));
    }

    public function show($id) {
        $receta = collect($this->obtenerRecetas())->firstWhere('id', $id);

        if (!$receta) {
            // Redirigir si el ID no existe
            return redirect()->route('recetas.index')->with('error', '¡Receta no encontrada!');
        }

        return view('recetas.show', compact('receta'));
    }
    public function buscar(Request $request) {
        $q = $request->input('buscar');
        $tipo = $request->input('tipo');

        $recetas = collect($this->obtenerRecetas())->filter(function($item) use ($q, $tipo) {
            $matchNombre = empty($q) || str_contains(strtolower($item['nombre']), strtolower($q));
            $matchTipo = empty($tipo) || $item['tipo'] == $tipo;
            return $matchNombre && $matchTipo;
        });

        return view('recetas.index', compact('recetas'));
    }

    // Mostrar el formulario de creación 
    public function create() {
        return view('recetas.create');
    }

    // Recibir datos y simular guardado con validación 
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|min:3',
            'tipo' => 'required',
            'tiempo' => 'required'
        ]);

        // Como no hay BD, solo redirigimos con éxito 
        return redirect()->route('recetas.index')->with('success', '¡Receta creada con éxito!');
    }
}