@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href=" {{ route('tareas.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">
                        Tarea
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><b>{{ $variable->titulo }}</b></h5>
                        <p class="card-text">{{ $variable->descripcion }}{{-- <br><b>Otra cosa</b> --}}</p>
                    </div>
                    <div class="card-footer text-muted text-center">
                        {{ $variable->entrega }}{{-- date('d/m/Y', strtotime()) --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection