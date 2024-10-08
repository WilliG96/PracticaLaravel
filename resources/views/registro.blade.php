@extends('layouts.app')

@section('content')
    <h1 class="mt-5">Registro de Llamadas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('llamadas.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="cliente">Nombre del Cliente:</label>
            <input type="text" id="cliente" name="cliente" class="form-control" value="{{ old('cliente') }}" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo de la Llamada:</label>
            <textarea id="motivo" name="motivo" class="form-control" required>{{ old('motivo') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Llamada</button>
    </form>
@endsection
