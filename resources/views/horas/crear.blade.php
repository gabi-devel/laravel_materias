@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('hora.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top"
                title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('hora.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="hora" class="form-label">Dia</label>
                    <input type="text" name="hora" id="hora" class="form-control shadow-none" 
                    value="{{ old('hora') }}">
                    <label for="orden" class="form-label">Hora</label>
                    <input type="text" name="orden" id="orden" class="form-control shadow-none" 
                    value="{{ old('orden') }}">
                    <label for="aniocarrera" class="form-label">Año Carrera</label>
                    <input type="text" name="aniocarrera" id="aniocarrera" class="form-control shadow-none" 
                    value="{{ old('anio') }}">
                    {{-- @error('nameorden')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                    @error('nameanio')
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