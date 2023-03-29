@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('profes.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top"
                title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('profes.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control shadow-none" 
                    value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control shadow-none" 
                    value="{{ old('apellido') }}">
                    {{-- @error('nombre')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror --}}
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection