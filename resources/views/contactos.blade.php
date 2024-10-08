@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para la tabla */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
            text-align: left;
        }

        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilos para los botones */
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Espaciado entre los botones de la tabla */
        td form, td a {
            display: inline-block;
            margin-right: 5px;
        }

        /* Mensaje de éxito */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        /* Estilos para el contenedor del título y el botón */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>

    <div class="header">
        <h1>Listado de Contactos</h1>
        <a href="{{ route('cliente.agregar') }}" class="btn btn-primary">Agregar Nuevo Contacto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Mensaje</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
        </thead>
        <tbody>
            @if ($contactos->isEmpty())
                <tr>
                    <td colspan="7">No hay contactos registrados.</td>
                </tr>
            @else
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->direccion }}</td>
                        <td>{{ $contacto->mensaje }}</td>
                        <td>
                            <!-- Botón para editar -->
                            <a href="{{ route('contacto.edit', $contacto->id) }}" class="btn btn-primary">Editar</a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('contacto.eliminar', $contacto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
