@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('tareas.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top"
                title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <h2 class="text-center mb-5">Agregar Tarea</h2>
        <div class="col-md-12">
            <form action="{{ route('tareas.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control shadow-none" 
                        value="{{ old('titulo') }}">
                        @error('titulo')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}"></textarea>
                        {{-- @error('descripcion')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="entrega" class="form-label">Fecha de entrega</label>
                        <input type="date" name="entrega" id="entrega" class="form-control shadow-none" 
                        value="{{ old('entrega') }}">
                        {{-- @error('entrega')
                            <small class="text-danger" role="alert">
                                {{ $message }}
                            </small>
                        @enderror --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="materia" class="form-label">Materia</label>
                        <select id="materia" class="form-select shadow-none" name="id_materia" 
                        value="{{ old('id_materia') }}">
                            <option value="" selected disabled>Seleccionar...</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id_materia }}"
                                    {{ old('id_materia') == $materia->id_materia ? 'selected' : '' }}
                                >
                                {{ $materia->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_materia')
                            <small class="text-danger" role="alert">
                                Seleccione una materia
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection