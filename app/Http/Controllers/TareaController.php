<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Materia;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $todas_las_tareas = Tarea::orderBy('id_tarea', 'DESC')->paginate(6);
        return view('tareas.inicio', ['variable' => $todas_las_tareas]);
    }

    public function create()
    {
        $materias = Materia::all();
        return view('tareas.crear', ['materias' => $materias]);
    }

    public function store(Request $request)
    {
        /* return $request->id_dia; */ // como está el name creo en create.blade.php
        $request->validate([
            'titulo' => 'required|min:1|max:100'/*  ,
            'descripcion' => 'required|min:1|max:1000',
            'entrega' => 'required'*/, 
            'id_materia' => 'required'
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Registrado correctamente.');
    }

    public function show(Tarea $tarea)
    {
        return view('tareas.ver', ['variable' => $tarea]);
    }

   public function edit(Tarea $tarea)
    {
        $materias = Materia::all();
        return view('tareas.editar', ['variable' => $tarea, 'materias' => $materias]);
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            /* 'titulo' => 'required|min:1|max:100', 
            'descripcion' => 'required|min:1|max:100',
            'entrega' => 'required|date',
            'id_materia' => 'required' */
        ]);

        $tarea->fill($request->only([
            'titulo',  'descripcion', 'entrega', 'id_materia'
        ]));

        if($tarea->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('successEdit', 'Actualizado correctamente.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
