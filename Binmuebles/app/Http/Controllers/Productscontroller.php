<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
// ------------------------------------------------------------
 
// ---------------------------------------------------------
class Productscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $products = Products::all();
        return view('vistareg', ['products' => $products]);
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

        return redirect()->route('products.index');
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
        $products = Products::find($id);
        $data['products'] = $products;
        return view('editreg',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produ = products::find($id);

        $produ->nombre = $request->nombre;
        $produ->descripcion = $request->descripcion;
        $produ->precio = $request->precio;
        $produ->ubicacion = $request->ubicacion;
        $produ->demostracion = $request->demostracion;

        $produ->update();  

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::destroy($id);
        return redirect()->route('products.index');
    }
 // --------------------------------------------------------------------
    
}
