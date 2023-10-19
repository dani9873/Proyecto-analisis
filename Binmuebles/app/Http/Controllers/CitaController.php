<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        $data['citas'] = $citas;
        return view('citas', $data);
    }

    public function store(Request $request)
    {
        $cita = new Cita();
        $cita->nombre = $request->nombre;
        $cita->instrucciones = $request->instrucciones;
        $cita->fecha = $request->fecha;
        $cita->save();
    
        return redirect()->back()->with('success', 'Cita agendada con éxito.');
    }
    
}
