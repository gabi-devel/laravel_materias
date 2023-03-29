<?php

namespace App\Http\Controllers;

use App\Models\Conocido;
use Illuminate\Http\Request;

class ConocidoController extends Controller
{
    public function index()
    {/* $conocido = Conocido::orderBy('id_prom', 'DESC')->get(); */
        $conocidos = Conocido::orderBy('id_con', 'DESC')->paginate(6); 
        return view('conocidos.inicio', ['var_con' => $conocidos]);
    }

    public function create()
    {
        return view('conocidos.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:3|max:100|unique:conocido' // (del name del input), unique: nombre de la tabla
        ]);

        Conocido::create($request->all());

        /* return 'Registro Insertado Correctamente'; */ /* return $request->all(); */
        return redirect()
            ->route('conocidos.index')
            ->with('success', 'Agregado correctamente.');
    }

    public function show(Conocido $conocido)
    {
        return view('conocidos.ver', ['var_con' => $conocido]);
    }

    public function edit(Conocido $conocido)
    {
        return view('conocidos.editar', ['var_con' => $conocido]);
    }

    public function update(Request $request, Conocido $conocido)
    {
        $request->validate([
            'descripcion' => 'required|min:3|max:100|unique:conocido,descripcion,'.$conocido->id_con.',id_con' 
        ]);

        $conocido->fill($request->only([
            'descripcion' 
        ]));

        if($conocido->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $conocido->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('conocidos.index');
    }

    public function destroy(Conocido $conocido)
    {
        $conocido->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
