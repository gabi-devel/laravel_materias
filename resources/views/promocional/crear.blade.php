@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ route('promocional.index') }}" class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top"
                title="Inicio">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{ route('promocional.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Es Promocional?</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                    value="{{ old('descripcion') }}">
                    @error('descripcion')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection