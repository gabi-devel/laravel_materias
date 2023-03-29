@extends('layouts.app')

@section('content')
<div>
    <!-- <h1 class="container">Ver materia</h1> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href=" {{ route('promocional.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">
                        Promocional
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <b>{{ $var_prom->descripcion }}</b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection