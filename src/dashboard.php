<?php
require_once '../config/dashboard.php';

$pageTitle  = 'Inicio';
$stats      = getEstadisticas();
$recientes  = getLibrosRecientes();

include '../includes/header.php';
?>

<div class="hero text-center">
    <h1><i class="bi bi-book-half me-2"></i>Librería Online</h1>
    <p class="lead mb-4">Tu catálogo digital de libros y autores</p>
    <a href="libros.php"  class="btn btn-light btn-lg me-2">
        <i class="bi bi-journals me-1"></i>Ver libros
    </a>
    <a href="autores.php" class="btn btn-outline-light btn-lg">
        <i class="bi bi-people me-1"></i>Ver autores
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-4">
        <div class="card text-center border-0 shadow-sm h-100">
            <div class="card-body py-4">
                <i class="bi bi-journals text-primary fs-1"></i>
                <h2 class="fw-bold mt-2 mb-0"><?= $stats['titulos'] ?></h2>
                <p class="text-muted mb-0">Libros en catálogo</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-center border-0 shadow-sm h-100">
            <div class="card-body py-4">
                <i class="bi bi-people text-success fs-1"></i>
                <h2 class="fw-bold mt-2 mb-0"><?= $stats['autores'] ?></h2>
                <p class="text-muted mb-0">Autores registrados</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-center border-0 shadow-sm h-100">
            <div class="card-body py-4">
                <i class="bi bi-cart-check text-warning fs-1"></i>
                <h2 class="fw-bold mt-2 mb-0"><?= $stats['ventas'] ?></h2>
                <p class="text-muted mb-0">Ventas realizadas</p>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">Últimas incorporaciones</h2>
<div class="row g-3 mb-2">
    <?php foreach ($recientes as $libro): ?>
    <div class="col-sm-6 col-lg-3">
        <div class="card card-libro h-100">
            <div class="card-body">
                <span class="badge bg-secondary mb-2"><?= htmlspecialchars($libro['tipo']) ?></span>
                <h6 class="fw-semibold"><?= htmlspecialchars($libro['titulo']) ?></h6>
                <p class="text-muted small mb-1">
                    <i class="bi bi-person me-1"></i><?= htmlspecialchars($libro['autor']) ?>
                </p>
                <p class="fw-bold text-primary mb-0">
                    <?= $libro['precio'] ? '$' . number_format($libro['precio'], 2) : '—' ?>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="text-end mt-2">
    <a href="libros.php" class="btn btn-outline-primary btn-sm">
        Ver todos los libros <i class="bi bi-arrow-right ms-1"></i>
    </a>
</div>

<?php include '../includes/footer.php'; ?>