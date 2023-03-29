<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::orderBy('id_profesor', 'DESC')->paginate(6); 
        return view('profesores.inicio', ['var_prof' => $profesores]);
    }

    public function create()
    {
        return view('profesores.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100', 
            'apellido' => 'required|min:3|max:100'
        ]);

        Profesor::create($request->all());

        /* return 'Registro Insertado Correctamente'; */ /* return $request->all(); */
        return redirect()
            ->route('profesores.index')
            ->with('success', 'Agregado correctamente.');
    }

    public function show(Profesor $profesor)
    {
        return view('profesores.ver', ['var_prof' => $profesor]);
    }

    public function edit(Profesor $profesor)
    {
        return view('profesores.editar', ['var_prof' => $profesor]);
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100,nombre,'.$profesor->id_profesor.',id_profesor' 
        ]);

        $profesor->fill($request->only([
            'nombre', 'apellido' 
        ]));

        if($profesor->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $profesor->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('profesores.index');
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
