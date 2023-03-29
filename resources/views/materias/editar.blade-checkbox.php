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
                    <div class="col-md-6 mx-auto">
                        <label for="dia" class="form-label">Día</label><br>
                        @if (sizeof($dias) > 0)
                            @foreach ($dias as $id_dia => $dia)
                                <input type="checkbox" value="{{ $id_dia }}"
                                        name="dias[]"
                                        {{ is_array(old('dias')) && 
                                        in_array($id_dia, (old('dias'))) ? 'checked' : '' }}>
                                    {{ $dia }}
                                <br>
                            @endforeach
                            @error('dias')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        @else
                            <div class="alert alert-secondary">No se encontraron resultados</div>
                            @error('dias')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        @endif
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