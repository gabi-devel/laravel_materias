<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Calendar;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    public function index()
    {
        $dias = Calendar::all();
        $todas_las_materias = Materia::orderBy('id_materia', 'DESC')->paginate(6);
        return view('materias.inicio', ['variable' => $todas_las_materias, 'dias' => $dias]);
    }

    public function create()
    {
        $dias = Calendar::all();/* $dias = Calendar::all(); */
        $profesores = Profesor::pluck('nombre', 'id_profesor');
        /* return [$dias, $profesores]; */

        return view('materias.crear', ['dias' => $dias, 'profesores' => $profesores]);
    }

    public function store(Request $request)
    {
        /* return $request->id_dia; */ // como está el name creo en create.blade.php
        $request->validate([
            'nombre' => 'required|min:1|max:100',/*
            'descripcion' => 'required|min:1|max:100',
            'id_dia' => 'required' */ // porque si no se ingresa y queda nulo, php me tira error en la página
            'id_dia' => 'required'/* ,
            'horas' => 'required' */
        ]);

        /* return $request->all(); */

        Materia::create($request->all());

        /* $materia->dias()->sync($request->dias); */

        return redirect()->route('materias.index')->with('success', 'Registrado correctamente.');
    }

    public function show(Materia $materia)
    {
        return view('materias.ver', ['variable' => $materia]);
    }

   public function edit(Materia $materia)
    {
        $dias = Calendar::all();
        return view('materias.editar', ['variable' => $materia, 'dias' => $dias]);
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|min:1|max:100,nombre,'.$materia->id_materia.',id_materia', /* 
            'descripcion' => 'required|min:1|max:100,apellido,'.$materia->id_materia.',id_materia' */
            'id_dia' => 'required'
        ]);

        $materia->fill($request->only([
            'nombre',  'descripcion', 'id_dia'
        ]));

        if($materia->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('successEdit', 'Actualizado correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
