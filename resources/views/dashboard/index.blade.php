@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Proyectos</h5>
                    <p class="card-text fs-2">{{ $totalProyectos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Tareas Totales</h5>
                    <p class="card-text fs-2">{{ $totalTareas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Tareas Completadas</h5>
                    <p class="card-text fs-2">{{ $tareasCompletadas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">Porcentaje Completado</h5>
                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $porcentajeCompletadas }}%;" aria-valuenow="{{ $porcentajeCompletadas }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $porcentajeCompletadas }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>Últimos Proyectos</h3>
    @if(count($proyectos) > 0)
        <ul class="list-group mb-4">
            @foreach(array_slice($proyectos, -5) as $proyecto)
                <li class="list-group-item">{{ $proyecto }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay proyectos registrados.</p>
    @endif

    <h3>Últimas Tareas</h3>
    @if(count($tareas) > 0)
        <ul class="list-group">
            @foreach(array_slice($tareas, -5) as $tarea)
                <li class="list-group-item">
                    <strong>{{ $tarea['titulo'] ?? 'Sin título' }}</strong>
                    <span class="badge bg-secondary">{{ $tarea['estado'] ?? 'Estado desconocido' }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay tareas registradas.</p>
    @endif

    <h2 style="margin-top: 30px;">Miembros recientes</h2>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

