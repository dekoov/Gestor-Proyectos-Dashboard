# Dashboard Modulo - CollabPro
Mi parte de la vista el controlador del modulo de Dashboard del aplicativo web: Gestor de Proyectos hecho en Laravel

No olvidar colocar las rutas en el archivo `routes\web.php`
Y tener ya creado los controladores para
- ProyectoController
- TareaController
- UserController

## web.php

```
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
```
