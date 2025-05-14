<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\User;
use App\Notifications\EventoRecordatorio;
use App\Models\Notificacion;

class ContactoController extends Controller
{
    public function index(Request $request)
    {
        $query = Contacto::query()->with('categoria');

        if ($request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%')
                ->orWhere('correo_electronico', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('categoria_id', $request->category);
        }

        $contactos = $query->orderBy('nombre', 'asc')->paginate(10);
        $categorias = Categoria::orderBy('nombre', 'asc')->get();

        return view('contactos.index', compact('contactos', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('contactos.create', compact('categorias'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo_electronico' => 'required|email|unique:contactos',
        'telefono' => 'required|string|max:20',
        'categoria_id' => 'nullable|exists:categorias,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nota' => 'nullable|string'
    ]);

    $data = [
        'nombre' => $request->input('nombre'),
        'correo_electronico' => $request->input('correo_electronico'),
        'telefono' => $request->input('telefono'),
        'categoria_id' => $request->input('categoria_id') ? (int) $request->input('categoria_id') : null,
        'foto' => null,
        'nota' => $request->input('nota'),
    ];

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('fotos', 'public');
    }

    $contacto = Contacto::create($data);

    // 📌 🔔 Guardar notificación en la base de datos
    Notificacion::create([
        'titulo' => 'Nuevo contacto agregado: ' . $contacto->nombre,
        'mensaje' => 'Se ha agregado un nuevo contacto a la agenda.',
        'leido' => false
    ]);

    return redirect()->route('contactos.index')->with('success', 'Contacto guardado correctamente.');
}
    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    public function edit(Contacto $contacto)
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('contactos.edit', compact('contacto', 'categorias'));
    }

    public function update(Request $request, Contacto $contacto)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo_electronico' => 'required|email|unique:contactos,correo_electronico,' . $contacto->id,
        'telefono' => 'required|string|max:20',
        'categoria_id' => 'nullable|exists:categorias,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nota' => 'nullable|string'
    ]);

    $data = [
        'nombre' => $request->input('nombre'),
        'correo_electronico' => $request->input('correo_electronico'),
        'telefono' => $request->input('telefono'),
        'categoria_id' => $request->input('categoria_id') ? (int) $request->input('categoria_id') : null,
        'nota' => $request->input('nota'),
    ];

    if ($request->hasFile('foto')) {
        if ($contacto->foto) {
            Storage::disk('public')->delete($contacto->foto);
        }
        $data['foto'] = $request->file('foto')->store('fotos', 'public');
    }

    $contacto->update($data);

    // 📌 🔔 Guardar notificación de actualización
    Notificacion::create([
        'titulo' => 'Contacto actualizado: ' . $contacto->nombre,
        'mensaje' => 'Se ha actualizado la información de un contacto.',
        'leido' => false
    ]);

    return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
}


public function destroy(Contacto $contacto)
{
    if ($contacto->foto) {
        Storage::disk('public')->delete($contacto->foto);
    }

    $nombre = $contacto->nombre;
    $contacto->delete();

    // 📌 🔔 Guardar notificación de eliminación
    Notificacion::create([
        'titulo' => 'Contacto eliminado: ' . $nombre,
        'mensaje' => 'Se ha eliminado un contacto de la agenda.',
        'leido' => false
    ]);

    return redirect()->route('contactos.index')->with('success', 'Contacto eliminado.');
}

    public function updateNota(Request $request, Contacto $contacto)
    {
        $request->validate(['nota' => 'nullable|string']);
        $contacto->update(['nota' => $request->nota]);

        return response()->json(['success' => true], 200);
    }
}
