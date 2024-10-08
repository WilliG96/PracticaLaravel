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
        <h1>Listado de Llamadas</h1>
        <a href="{{ route('llamadas.create') }}" class="btn btn-primary">Registrar Nueva Llamada</a>
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
                <th>Cliente</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Acciones</th> <!-- Nueva columna para las acciones -->
            </tr>
        </thead>
        <tbody>
            @if ($llamadas->isEmpty())
                <tr>
                    <td colspan="5">No hay llamadas registradas.</td>
                </tr>
            @else
                @foreach ($llamadas as $llamada)
                    <tr>
                        <td>{{ $llamada->id }}</td>
                        <td>{{ $llamada->cliente }}</td>
                        <td>{{ $llamada->motivo }}</td>
                        <td>{{ $llamada->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <!-- Botón para editar -->
                            <a href="{{ route('llamadas.edit', $llamada->id) }}" class="btn btn-primary">Editar</a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('llamadas.destroy', $llamada->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta llamada?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection


