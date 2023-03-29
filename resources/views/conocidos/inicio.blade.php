@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('conocidos.create') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                    title="Agregar Conocido">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <h1>Conocidos</h1>
                @if(sizeof($var_con) > 0)
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
                            @foreach($var_con as $conozco)
                            <tr>
                                <td class="text-center" width="20%">
                                    <a href="{{ route('conocidos.show', $conozco) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                    title="Ver">
                                        <i class="fa fa-book fa-fw text-white"></i>
                                    </a>
                                    <a href="{{ route('conocidos.edit', $conozco) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                    title="Editar">
                                        <i class="fa fa-pencil fa-fw text-white"></i>
                                    </a>
                                    <form action="{{ route('conocidos.destroy', $conozco) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none"
                                        data-toggle="tooltip" data-placement="top" title="Eliminar"
                                        onclick="return confirm('Estás seguro de eliminar?')">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                                <td scope="row">{{ $conozco->id_con }}</td>
                                <td scope="row">{{ $conozco->descripcion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $var_con->links() !!}
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