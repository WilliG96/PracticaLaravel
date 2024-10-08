@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para las tarjetas y la página de bienvenida */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 100%;
            height: 450px; /* Ajuste fijo para las imágenes */
            object-fit: cover; /* Mantener proporción de la imagen dentro del contenedor */
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
        }

        .welcome-message {
            margin-bottom: 30px;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .mt-5 {
            margin-top: 3rem;
        }
    </style>

    <div class="welcome-message text-center">
        <h1>Bienvenido</h1>
        <h2>Selecciona una de las siguientes opciones para comenzar</h2>
    </div>

    <div class="row text-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <a href="{{ route('cliente.ver') }}">
                    <img src="{{ asset('images/clientes.png') }}" class="card-img-top" alt="Registro de Clientes">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Contactos</h5>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <a href="{{ route('llamadas.index') }}">
                    <img src="{{ asset('images/llamadas.png') }}" class="card-img-top" alt="Registro de Llamadas">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Llamadas</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection


