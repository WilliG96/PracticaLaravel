@extends('layouts.app')

@section('content')
    <style>
        .info-card {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .info-card h2 {
            color: #333;
        }

        .info-card p {
            font-size: 1rem;
            line-height: 1.5;
            color: #555;
        }

        .info-list {
            list-style: none;
            padding: 0;
        }

        .info-list li {
            margin-bottom: 10px;
        }

        .info-list li strong {
            color: #007bff;
        }
        h1{
            color: #000000;
            text-align: center;
        }
    </style>

    <div class="info-card">
        <h1>Información de la Aplicación</h1>
        <br>

        <ul class="info-list">
            <li><strong>Nombre de la Aplicación:</strong> Gestión de Llamadas y Contactos</li>
            <li><strong>Versión:</strong> 1.0.0</li>
            <li><strong>Desarrollador:</strong> Willi Garcia</li>
            <li><strong>Fecha de Lanzamiento:</strong> 7 de Octubre, 2024</li>
            <li><strong>Tecnologías Utilizadas:</strong> Laravel, PHP, MySQL, Bootstrap</li>
            <li><strong>Descripción:</strong> Esta aplicación permite gestionar llamadas y contactos, facilitando la administración de registros.</li>
        </ul>

