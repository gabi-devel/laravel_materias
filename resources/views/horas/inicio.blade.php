@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('hora.create') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                    title="Agregar Horario">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mx-auto">
                <h1>Horario</h1>
                @if(sizeof($var_horas) > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-center" scope="col">Dia</th>
                                <th class="text-center" scope="col">Hora</th>
                                <th class="text-center" scope="col">Año de carrera</th>
                                <th class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($var_horas as $tal_dia)
                            <tr>
                                <td class="text-center" scope="row">
                                    {{ $tal_dia->hora }}
                                     {{-- @if($tal_dia->hora == 5) Viernes @else otro día @endif --}}
                                </td>
                                <td class="text-center" scope="row">{{ $tal_dia->orden }}</td>
                                <td class="text-center" scope="row">{{ $tal_dia->aniocarrera }}</td>
                                <td class="text-center" width="20%">
                                    <a href="{{ route('hora.show', $tal_dia) }}" title="Ver" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top">
                                        <i class="fa fa-book fa-fw text-white"></i>
                                    </a>
                                    <a href="{{ route('hora.edit', $tal_dia) }}" title="Editar" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top">
                                        <i class="fa fa-pencil fa-fw text-white"></i>
                                    </a>
                                    <form action="{{ route('hora.destroy', $tal_dia) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                        title="Eliminar" onclick="return confirm('Estás seguro de eliminar?')">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $var_horas->links() !!}
                    </div>
                </div>
                @else
                    <div class="alert alert-secondary">
                        No se encontraron registros.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection