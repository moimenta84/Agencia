<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/views/administrador/destinos/lista.php">Agencia Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/views/administrador/destinos/lista.php">Destinos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/views/administrador/guias/lista.php">Guías</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/views/administrador/reservas/lista.php">Reservas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/views/administrador/usuarios/lista.php">Usuarios</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="navbar-text text-white me-3">
                        Administrador
                    </span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="/authentification/logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
