@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('hora.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">Dia</div>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <b>{{ $var_horas->hora }}</b>
                        </h5>
                    </div>
                </div>
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">Orden</div>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <b>{{ $var_horas->orden }}</b>
                        </h5>
                        </h5>
                    </div>
                </div>
                <div class="card mx-auto" style="width: 50%;">
                    <div class="card-header">Año</div>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <b>{{ $var_horas->aniocarrera }}</b>
                        </h5>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection