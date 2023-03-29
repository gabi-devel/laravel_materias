<?php

namespace App\Http\Controllers;

use App\Models\Profe;
use Illuminate\Http\Request;

class ProfeController extends Controller
{
    public function index()
    { 
        $profes = Profe::orderBy('id_profesor', 'DESC')->paginate(6); 
        return view('profes.inicio', ['var_p' => $profes]);
    }

    public function create()
    {
        return view('profes.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'apellido' => 'required|min:3|max:100'
        ]);

        Profe::create($request->all());

        /* return 'Registro Insertado Correctamente'; */ /* return $request->all(); */
        return redirect()
            ->route('profes.index')
            ->with('success', 'Agregado correctamente.');
    }

    public function show(Profe $profe)
    {
        return view('profes.ver', ['var_p' => $profe]);
    }

    public function edit(Profe $profe)
    {
        return view('profes.editar', ['var_p' => $profe]);
    }

    public function update(Request $request, Profe $profe)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100,nombre,'.$profe->id_profesor.',id_profesor', 
            'apellido' => 'required|min:3|max:100,apellido,'.$profe->id_profesor.',id_profesor'
        ]);

        $profe->fill($request->only([
            'nombre' 
        ]));

        if($profe->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $profe->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('profes.index');
    }

    public function destroy(Profe $profe)
    {
        $profe->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
