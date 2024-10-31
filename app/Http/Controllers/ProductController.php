<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // Recuperar todos los productos
        $productos = Producto::all();
        return view('admin.products.index', compact('productos'));
    }
    // Mostrar la vista para agregar un nuevo producto
    public function create()
    {
        return view('admin.products.create');
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:1', // Validación para stock
        ]);
    
        // Guardar la imagen y obtener la ruta
        $fotoPath = $request->file('foto')->store('productos', 'public');
    
        // Crear el nuevo producto en la base de datos
        Producto::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'foto' => $fotoPath,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock, // Almacenar stock
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.products.create')->with('success', 'Producto creado exitosamente.');
    }
    
    // Mostrar la vista para editar un producto existente
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.products.edit', compact('producto'));
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input('nombre');
        $producto->categoria = $request->input('categoria');
        $producto->precio = $request->input('precio');

        // Verificar si se ha subido una nueva foto
        if ($request->hasFile('foto')) {
            // Eliminar la foto anterior si existe
            Storage::disk('public')->delete($producto->foto);
            // Almacenar la nueva foto
            $producto->foto = $request->file('foto')->store('productos', 'public');
        }

        // Guardar los cambios en la base de datos
        $producto->save();

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Eliminar la imagen del producto si existe
        if ($producto->foto) {
            Storage::disk('public')->delete($producto->foto);
        }

        // Eliminar el producto de la base de datos
        $producto->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado exitosamente.');
    }
   
}
