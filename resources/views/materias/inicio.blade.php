@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('successEdit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successEdit') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('materias.create') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" 
                    title="Agregar">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <h1 class="text-center">Materias</h1><br>
                @if(sizeof($variable) > 0)
                <div class="row">
                    {{-- $uno = {{ Auth::user()->id }}
                    (Auth::user()->id == $asign->id_user) --}}
                @foreach($variable as $asign)
                <div class="col-lg-4">
                    <div class="text-center card">{{-- card-box --}}
                        <div class="card-header bg-light">
                            <h3 class="mt-2 text-dark">{{ $asign->nombre }}</h3>
                        </div>
                        <div class="pt-2 pb-2">
                                {{-- {{ $asign->descripcion }} --}}
                            <p>Profesor:</p>{{-- 
                            <div class="font-14 mt-3">
                                <span class="badge badge-light-danger badge-pill">Vue Js</span>
                                <span class="badge badge-light-info badge-pill">PHP</span>
                                <span class="badge badge-light-dark badge-pill">Nodejs</span>
                            </div> --}}
        
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="mt-3">
                                        <h5>{{ $asign->id_dia ? $asign->dia->dia : '' }}</h5>
                                    </div>
                                </div>
                                {{-- <div class="col-6">
                                    <div class="mt-3">
                                        <h5>Miércoles</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3">
                                        <h5>Jueves</h5>
                                    </div>
                                </div> --}}
                            </div> <!-- end row-->
                            <hr>
                            <div class="d-flex justify-content-center gap-2 mt-3 mb-2">
                                <div>
                                    <a href="{{ route('materias.show', $asign) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                        title="Ver">
                                        <i class="fa fa-book fa-fw text-white"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('materias.edit', $asign) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" 
                                    title="Editar">
                                        <i class="fa fa-pencil fa-fw text-white"></i>
                                    </a>
                                </div>
                                <form action="{{ route('materias.destroy', $asign) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none"
                                    data-toggle="tooltip" data-placement="top" title="Eliminar"
                                    onclick="return confirm('Estás seguro de eliminar?')">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </button>
                                </form>
                            </div>
        
                        </div> <!-- end .padding -->
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
                @endforeach
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