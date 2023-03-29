<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        /* $All_Dias = Calendar::all(); */ /* $All_Dias = Dia::orderBy('dia', 'ASC')->get(); */
        $All_Dias = Calendar::orderBy('id_dia', 'ASC')->paginate(10);
        return view('calendar.inicio', ['var_dias' => $All_Dias]);
    }

    public function create()
    {
        return view('calendar.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|min:1|max:11',
            'orden' => 'required|min:1|max:1',
            'aniocarrera' => 'required|min:1|max:11'
        ]);

        Calendar::create($request->all());

        /* return $request->all(); *//* return 'Registro Insertado Correctamente'; */

        return redirect()
            ->route('calendar.index')
            ->with('success', 'Agregado correctamente.'); // variable de sesión
    }

    public function show(Calendar $calendar)
    {
        return view('calendar.ver', ['var_dias' => $calendar]);
    }

    public function edit(Calendar $calendar) // como en el metodo show
    {
        return view('calendar.editar', ['var_dias' => $calendar]);
    }

    public function update(Request $request, Calendar $calendar)
    {
        $request->validate([
            'dia' => 'required|min:1|max:11,dia,'.$calendar->dia.',dia',
            'orden' => 'required|min:1|max:1,orden,'.$calendar->orden.',orden',
            'aniocarrera' => 'required|min:1|max:11,aniocarrera,'.$calendar->aniocarrera.',aniocarrera'
        ]);

        /* return 'validado'; */

        $calendar->fill($request->only([
            'dia', 'orden', 'aniocarrera'
        ]));

        if($calendar->isClean()) { // si no se registró ningún cambio
            return back()->with('warning', 'Debe realizar al menos un cambio.');
        }

        $calendar->update($request->all());

        /* return back()->with('success', 'Actualizado correctamente.'); */
        return redirect()->route('calendar.index');
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return back()->with('danger', 'Eliminado correctamente');
    }
}
