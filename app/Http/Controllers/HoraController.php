<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use Illuminate\Http\Request;

class HoraController extends Controller
{
    public function index()
    {
        /* $All_horas = Hora::all(); */ /* $All_horas = hora::orderBy('hora', 'ASC')->get(); */
        $All_horas = Hora::orderBy('id_hora', 'ASC')->paginate(10);
        return view('hora.inicio', ['var_horas' => $All_horas]);
    }

    public function create()
    {
        return view('hora.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hora' => 'required|min:1|max:11'
        ]);

        Hora::create($request->all());

        /* return $request->all(); *//* return 'Registro Insertado Correctamente'; */

        return redirect()
            ->route('hora.index')
            ->with('success', 'Agregado correctamente.'); // variable de sesión
    }

    public function show(Hora $hora)
    {
        return view('hora.ver', ['var_horas' => $hora]);
    }

    public function edit(Hora $hora) // como en el metodo show
    {
        return view('hora.editar', ['var_horas' => $hora]);
    }

    public function update(Request $request, Hora $hora)
    {
        $request->validate([
            'hora' => 'required|min:1|max:11,hora,'.$hora->hora.',hora',
            'orden' => 'required|min:1|max:1,orden,'.$hora->orden.',orden',
            'aniocarrera' => 'required|min:1|max:11,aniocarrera,'.$hora->aniocarrera.',aniocarrera'
        ]);

        /* return 'validado'; */

        $hora->fill($request->only([
            'hora', 'orden', 'aniocarrera'
        ]));

        if($hora->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $hora->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('hora.index');
    }

    public function destroy(Hora $hora)
    {
        $hora->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
