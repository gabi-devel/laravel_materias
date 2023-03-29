@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('materias.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('materias.update', $variable) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Materia</label>
                        <input type="text" name="nombre" id="nombre" class="form-control shadow-none"
                        value="{{ old(('nombre'), $variable->nombre) }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none"
                        value="{{ old(('descripcion'), $variable->descripcion) }}">
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="dia" class="form-label">Día</label>
                        <select id="dia" class="form-select shadow-none" name="id_dia" 
                        value="{{ old('id_dia') }}">
                            <option value="" selected disabled>Seleccionar...</option>
                            @foreach ($dias as $dia)
                                <option value="{{ $dia->id_dia }}"
                                    {{ $variable->id_dia == $dia->id_dia ? 'selected' : '' }}
                                >
                                {{ $dia->dia }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_dia')
                            <small class="text-danger" role="alert">
                                Seleccione un día
                            </small>
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