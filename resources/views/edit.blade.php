@extends('layouts.app')

@section('content')
    <h1>Editar Llamada</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('llamadas.update', $llamada->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="cliente">Nombre del Cliente:</label>
            <input type="text" id="cliente" name="cliente" value="{{ old('cliente', $llamada->cliente) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo de la Llamada:</label>
            <textarea id="motivo" name="motivo" class="form-control" required>{{ old('motivo', $llamada->motivo) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Llamada</button>
        <a href="{{ route('llamadas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
