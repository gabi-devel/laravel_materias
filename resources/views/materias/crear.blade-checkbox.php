@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('materias.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top"
                title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <h1 class="text-center">Agregar Materia</h1>
        <h4 class="text-center">Por favor, cree una materia por día</h4>
        <div class="col-md-12">
            <form action="{{ route('materias.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="nombre" class="form-label">Materia</label>
                        <input type="text" name="nombre" id="nombre" class="form-control shadow-none" 
                        value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
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
                {{-- <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="hora" class="form-label">Hora</label><br>
                        @if (sizeof($horas) > 0)
                            @foreach ($horas as $id_hora => $hora)
                                <input type="checkbox" value="{{ $id_hora }}"
                                        name="horas[]"
                                        {{ is_array(old('horas')) && 
                                        in_array($id_hora, (old('horas'))) ? 'checked' : '' }}>
                                    {{ $hora }}
                            @endforeach
                            @error('horas')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        @else
                            <div class="alert alert-secondary">No se encontraron resultados</div>
                            @error('horas')
                                <small class="text-danger" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        @endif
                    </div>
                </div> --}}
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection