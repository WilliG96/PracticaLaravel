@extends('layouts.app')

@section('content')
    <h1>Editar Contacto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacto.update', $contacto->id) }}" method="POST" style="max-width: 600px; margin: auto;">
        @csrf
        @method('POST') <!-- Método PUT para actualización -->

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $contacto->nombre) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $contacto->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $contacto->telefono) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $contacto->direccion) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" class="form-control" required>{{ old('mensaje', $contacto->mensaje) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Contacto</button>
        <a href="{{ route('cliente.ver') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <style>
        /* Estilos para el formulario */
        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection
