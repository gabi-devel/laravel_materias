@extends('layouts.app')

@section('content')
<div>
    <h1 class="container">Ver materia</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href=" {{ route('materias.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">
                        Materia
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <b>{{ $variable->nombre }}</b>
                        </h5>
                    {{-- </div>
                    <div class="card-header">
                        Descripción
                    </div>
                    <div class="card-body text-center"> --}}
                        <h5 class="card-title">
                            <b>{{ $variable->descripcion }}</b>
                        </h5>
                    {{-- </div>
                    <div class="card-header">
                        Día
                    </div>
                    <div class="card-body text-center"> --}}
                        <h5 class="card-title">
                            <b>{{ $variable->dia->dia }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection