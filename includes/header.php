<?php

$pageTitle = $pageTitle ?? 'Librería Online';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | Librería Online</title>
 
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
 
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <link href="<?= $baseUrl ?? '' ?>../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
 
        <a class="navbar-brand fw-bold fs-4" href="<?= $baseUrl ?? '' ?>dashboard.php">
            <i class="bi bi-book-half me-2"></i>Librería Online
        </a>
 
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false"
                aria-label="Menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
 
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
 
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'dashboard.php'    ? 'active' : '' ?>"
                       href="<?= $baseUrl ?? '' ?>dashboard.php">
                        <i class="bi bi-house-door me-1"></i>Inicio
                    </a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'libros.php'   ? 'active' : '' ?>"
                       href="<?= $baseUrl ?? '' ?>libros.php">
                        <i class="bi bi-journals me-1"></i>Libros
                    </a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'autores.php'  ? 'active' : '' ?>"
                       href="<?= $baseUrl ?? '' ?>autores.php">
                        <i class="bi bi-people me-1"></i>Autores
                    </a>
                </li>
 
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'contacto.php' ? 'active' : '' ?>"
                       href="<?= $baseUrl ?? '' ?>contacto.php">
                        <i class="bi bi-envelope me-1"></i>Contacto
                    </a>
                </li>
 
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">