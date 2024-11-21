<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $datos['productos'] = Producto::paginate(5);

        return view('producto.index', $datos);
    }
    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|string',
            'ubicacion' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        Producto::create($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Producto $producto)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

   
    public function update(Request $request, $id)
    {

    $request->validate([
        'producto' => 'required|string',
        'ubicacion' => 'required|string',
        'cantidad' => 'required|string',
        'precio' => 'required|string',
    ]);

    $datosProducto = $request->except(['_token', '_method']);
    Producto::where('id', $id)->update($datosProducto);

    // Redirigir con un mensaje de éxito
    return redirect()->route('producto.index')->with('mensaje', 'Producto modificado');
    
    }

    
    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect('producto')->with('mensaje', 'Producto borrado');
    }
}