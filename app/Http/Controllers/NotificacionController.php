<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    // Obtener todas las notificaciones no leídas
    public function index()
{
    try {
        $notificaciones = Notificacion::where('leido', false)
            ->latest()
            ->take(5)
            ->get();

        return response()->json($notificaciones);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al cargar notificaciones', 'detalle' => $e->getMessage()], 500);
    }
}


    // Marcar una notificación como leída
    public function marcarLeida($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->update(['leido' => true]);

        return response()->json(['success' => true]);
    }

    // Método para agregar una nueva notificación manualmente
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required|string'
        ]);

        Notificacion::create([
            'titulo' => $request->titulo,
            'mensaje' => $request->mensaje
        ]);

        return response()->json(['success' => true]);
    }

    public function storeEvento(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'mensaje' => 'required|string',
        'fecha' => 'required|date'
    ]);

    Notificacion::create([
        'titulo' => 'Recordatorio: Cita con cliente',
        'mensaje' => 'Tienes una reunión programada con el cliente a las 10 AM.',
        'fecha' => now()->addDays(2)->toDateString(),
        'leido' => false
    ]);
    

    return response()->json(['success' => true]);
}

public function show($id)
{
    $notificacion = Notificacion::findOrFail($id);

    // Marcar como leída si aún no lo está
    if (!$notificacion->leido) {
        $notificacion->update(['leido' => true]);
    }

    return view('notificaciones.show', compact('notificacion'));
}


}
