<?php

namespace App\Http\Controllers;
use App\Models\Llamada;

use Illuminate\Http\Request;

class LlamadaController extends Controller
{
    public function paginaInicio()
    {
        return view('home');
    }

    public function acercaDe()
    {
        return view('about');
    }

    public function mostrarFormulario()
    {
        return view('registro');
    }

    public function registrarLlamada(Request $request)
    {

        $request->validate([
            'cliente' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
        ]);


        $llamada = new Llamada();
        $llamada->cliente = $request->input('cliente');
        $llamada->motivo = $request->input('motivo');


        $llamada->save();


        return redirect()->route('llamadas.index')->with('success', 'Llamada registrada exitosamente.');
    }

public function listarLlamadas()
{
    $llamadas = Llamada::all();
    return view('llamadas', ['llamadas' => $llamadas]);
}

public function eliminarLlamada($id)
{
    $llamada = Llamada::findOrFail($id);
    $llamada->delete();

    return redirect()->route('llamadas.index')->with('success', 'Llamada eliminada exitosamente.'); // Redirige con mensaje de éxito
}

public function edit($id)
{
    $llamada = Llamada::findOrFail($id);
    return view('edit', compact('llamada'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'cliente' => 'required|string|max:255',
        'motivo' => 'required|string',
    ]);

    $llamada = Llamada::findOrFail($id);
    $llamada->cliente = $request->input('cliente');
    $llamada->motivo = $request->input('motivo');
    $llamada->save();

    return redirect()->route('llamadas.index')->with('success', 'Llamada actualizada correctamente.');
}


}
