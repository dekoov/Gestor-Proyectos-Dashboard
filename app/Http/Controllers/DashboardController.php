<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener proyectos y tareas de la sesión (arreglos)
        $proyectos = session('proyectos', []);
        $tareas = session('tareas', []);

        // Totales
        $totalProyectos = count($proyectos);
        $totalTareas = count($tareas);
        $usuarios = User::all();

        // Contar tareas completadas
        $tareasCompletadas = 0;
        foreach ($tareas as $tarea) {
            // Aquí asumimos que 'estado' puede ser 'completada' o similar
            if (isset($tarea['estado']) && $tarea['estado'] === 'Completada') {
                $tareasCompletadas++;
            }
        }

        // Porcentaje de tareas completadas
        $porcentajeCompletadas = $totalTareas > 0 ? round(($tareasCompletadas / $totalTareas) * 100) : 0;

        // Obtener los 3 proyectos más recientes
        $usuarios = $usuarios->take(3);

        return view('dashboard.index', compact(
            'totalProyectos',
            'totalTareas',
            'tareasCompletadas',
            'porcentajeCompletadas',
            'proyectos',
            'tareas',
            'usuarios',
        ));
    }
}

