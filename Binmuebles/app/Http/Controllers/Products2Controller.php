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
            'precio' => 'required',
            'ubicacion' => 'required|url',
            'demostracion' => 'required|image', // Validación para asegurarse de que sea una imagen
        ]);

        $imagePath = $request->file('demostracion')->store('public/images');
        $imageName = basename($imagePath);
        
        $product = new Products([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'precio' => $validatedData['precio'],
            'ubicacion' => $validatedData['ubicacion'],
            'demostracion' => $imageName,
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
            'precio' => 'required',
            'ubicacion' => 'required|url',
        ]);

        $product = Products::find($id);

        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->ubicacion = $request->ubicacion;

        // Si se proporciona una nueva imagen, procesa la carga y actualiza el campo demostracion
        if ($request->hasFile('demostracion')) {
            $imageName = $request->file('demostracion')->store('storage/app/public/images');
            $product->demostracion = $imageName;
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
