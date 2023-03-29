@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('calendar.index') }}" title="Inicio" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('calendar.update', $var_dias) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="dia" class="form-label">Dia</label>
                        <input type="text" name="dia" id="dia" class="form-control shadow-none"
                        value="{{ old(('dia'), $var_dias->dia) }}">
                        @error('dia')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="orden" class="form-label">Orden</label>
                        <input type="text" name="orden" id="orden" class="form-control shadow-none"
                        value="{{ old(('orden'), $var_dias->orden) }}">
                        @error('orden')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="aniocarrera" class="form-label">Año</label>
                        <input type="text" name="aniocarrera" id="aniocarrera" class="form-control shadow-none"
                        value="{{ old(('aniocarrera'), $var_dias->aniocarrera) }}">
                        @error('aniocarrera')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection