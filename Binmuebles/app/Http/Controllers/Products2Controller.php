<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
// ------------------------------------------------------------
 
// ---------------------------------------------------------
class Products2controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('vista_terre.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vista_terre/create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image', // Cambiado a 'imagen'
            'tipo' => 'required', // Agregado el campo 'tipo'
            'estado' => 'required', // Agregado el campo 'estado'
            'ubicacion_general' => 'required|url',
            'disponibilidad' => 'required',
            'precio_venta' => 'required', // Cambiado a 'numeric'
            'precio_alquiler' => 'required', // Cambiado a 'numeric'
        ]);

        $imagePath = $request->file('imagen')->store('public/images');
        $imageName = basename($imagePath);
        
        $product = new Products([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'imagen' => $imageName,
            'tipo' => $validatedData['tipo'],
            'estado' => $validatedData['estado'],
            'ubicacion_general' => $validatedData['ubicacion_general'],
            'disponibilidad' => $validatedData['disponibilidad'],
            'precio_venta' => $validatedData['precio_venta'],
            'precio_alquiler' => $validatedData['precio_alquiler'],
        ]);

        $product->save();

        return redirect()->route('ter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        return view('vista_terre.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|nullable', // Cambiado a 'imagen'
            'tipo' => 'required', // Agregado el campo 'tipo'
            'estado' => 'required', // Agregado el campo 'estado'
            'ubicacion_general' => 'required|url',
            'disponibilidad' => 'required',
            'precio_venta' => 'required', // Cambiado a 'numeric'
            'precio_alquiler' => 'required', // Cambiado a 'numeric'
        ]);

        $product = Products::find($id);

        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->tipo = $request->tipo;
        $product->estado = $request->estado;
        $product->ubicacion_general = $request->ubicacion_general;
        $product->disponibilidad = $request->disponibilidad;
        $product->precio_venta = $request->precio_venta;
        $product->precio_alquiler = $request->precio_alquiler;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('public/images');
            $imageName = basename($imagePath);
            $product->imagen = $imageName;
        }

        $product->save();

        return redirect()->route('ter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::destroy($id);
        return redirect()->route('ter.index');
    }
 // --------------------------------------------------------------------
    
}
