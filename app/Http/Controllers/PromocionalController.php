<?php

namespace App\Http\Controllers;

use App\Models\Promocional;
use Illuminate\Http\Request;

class PromocionalController extends Controller
{
    public function index()
    {/* $promocional = Promocional::orderBy('id_prom', 'DESC')->get(); */
        $promocional = Promocional::orderBy('id_prom', 'DESC')->paginate(6); 
        return view('promocional.inicio', ['var_prom' => $promocional]);
    }

    public function create()
    {
        return view('promocional.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:3|max:100|unique:promocionales' // (del name del input)
        ]);

        Promocional::create($request->all());

        /* return 'Registro Insertado Correctamente'; */ /* return $request->all(); */
        return redirect()
            ->route('promocional.index')
            ->with('success', 'Agregado correctamente.');
    }

    public function show(Promocional $promocional)
    {
        return view('promocional.ver', ['var_prom' => $promocional]);
    }

    public function edit(Promocional $promocional)
    {
        return view('promocional.editar', ['var_prom' => $promocional]);
    }

    public function update(Request $request, Promocional $promocional)
    {
        $request->validate([
            'descripcion' => 'required|min:3|max:100|unique:promocionales,descripcion,'.$promocional->id_prom.',id_prom' 
        ]);

        $promocional->fill($request->only([
            'descripcion' 
        ]));

        if($promocional->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $promocional->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('promocional.index');
    }

    public function destroy(Promocional $promocional)
    {
        $promocional->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
