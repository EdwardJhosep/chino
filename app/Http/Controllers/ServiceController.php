<?php

namespace App\Http\Controllers;

use App\Models\Servicio; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage

//ssssdfff
class ServiceController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        
        return view('admin.services.index', compact('servicios'));
    }
    
    public function create()
    {
        return view('admin.services.create');
    }

    // Método para almacenar un nuevo servicio
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);
    
        // Guardar la imagen en el sistema de archivos y obtener la ruta en 'public/servicios'
        $fotoPath = $request->file('foto')->store('servicios', 'public');
    
        // Crear el nuevo servicio en la base de datos
        Servicio::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'foto' => $fotoPath,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.services.create')->with('success', 'Servicio creado exitosamente.');
    }

   // Eliminar un servicio
public function destroy($id)
{
    $servicio = Servicio::findOrFail($id);
    
    // Eliminar la imagen del servicio si existe
    if ($servicio->foto) {
        Storage::disk('public')->delete($servicio->foto);
    }

    // Eliminar el servicio de la base de datos
    $servicio->delete();

    return redirect()->route('admin.services.index')->with('success', 'Servicio eliminado exitosamente.');
}
    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $servicio = Servicio::find($id);
    $servicio->nombre = $request->input('nombre');
    $servicio->categoria = $request->input('categoria');
    $servicio->precio = $request->input('precio');

    // Verificar si se ha subido una nueva foto
    if ($request->hasFile('foto')) {
        // Eliminar la foto anterior si es necesario
        Storage::disk('public')->delete($servicio->foto);
        $servicio->foto = $request->file('foto')->store('servicios', 'public');
    }

    $servicio->save();

    return redirect()->route('admin.services.index')->with('success', 'Servicio Actualizado exitosamente.');
}

}
