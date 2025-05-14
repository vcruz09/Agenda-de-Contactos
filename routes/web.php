<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NotificacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contactos', ContactoController::class);
Route::resource('categorias', CategoriaController::class);

Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
Route::post('/notificaciones', [NotificacionController::class, 'store']);
Route::patch('/notificaciones/{id}', [NotificacionController::class, 'marcarLeida']);
Route::get('/notificaciones/{id}', [NotificacionController::class, 'show'])->name('notificaciones.show');

Route::get('/notificaciones/contador', function () {
    $total = \App\Models\Notificacion::where('leido', false)->count();
    return response()->json(['total' => $total]);
});

Route::get('/notificaciones/contador', function () {
    return response()->json(['total' => \App\Models\Notificacion::where('leido', false)->count()]);
});
