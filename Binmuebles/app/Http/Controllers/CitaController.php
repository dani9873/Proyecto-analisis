<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'instrucciones' => 'nullable',
            'fecha' => 'required|date',
        ]);

        Cita::create($data);

        return redirect()->route('citas.index')->with('success', 'Cita agendada con éxito.');
    }
}
