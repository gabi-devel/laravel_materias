@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('promocional.create') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                    title="Agregar Promocional">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <h1>Materias Promocionales</h1>
                @if(sizeof($var_prom) > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($var_prom as $prom)
                            <tr>
                                <td class="text-center" width="20%">
                                    <a href="{{ route('promocional.show', $prom) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                    title="Ver Promocional">
                                        <i class="fa fa-book fa-fw text-white"></i>
                                    </a>
                                    <a href="{{ route('promocional.edit', $prom) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                    title="Editar Promocional">
                                        <i class="fa fa-pencil fa-fw text-white"></i>
                                    </a>
                                    <form action="{{ route('promocional.destroy', $prom) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none"
                                        data-toggle="tooltip" data-placement="top" title="Eliminar Promocional"
                                        onclick="return confirm('Estás seguro de eliminar?')">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                                <td scope="row">{{ $prom->id_prom }}</td>
                                <td scope="row">{{ $prom->descripcion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $var_prom->links() !!}
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