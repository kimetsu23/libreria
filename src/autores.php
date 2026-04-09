<?php
require_once '../config/autores.php';

$pageTitle = 'Autores';
$autores   = getAutores();
$total     = count($autores);

include '../includes/header.php';
?>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
    <h2 class="section-title mb-0">
        <i class="bi bi-people me-2"></i>Autores
        <span class="badge bg-primary ms-2 fs-6"><?= $total ?></span>
    </h2>
    <div class="search-bar input-group">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input type="text" id="busqueda" class="form-control" placeholder="Buscar autor o país…">
    </div>
</div>

<div id="sin-resultados" class="alert alert-warning" style="display:none;">
    <i class="bi bi-exclamation-triangle me-2"></i>No se encontraron autores con ese criterio.
</div>

<?php if ($total > 0): ?>
<div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
    <?php foreach ($autores as $autor): ?>
        <div class="col">
        <div class="card shadow-sm border-0 h-100" data-busqueda="<?= htmlspecialchars($autor['nombre'] . ' ' . $autor['apellido'] . ' ' . $autor['pais']) ?>">
            <div class="card-body text-center d-flex flex-column">
                
                <div class="autor-avatar">
                    <?= mb_strtoupper(mb_substr($autor['nombre'], 0, 1)) ?>
                </div>

                <h5 class="fw-bold mb-1">
                    <?= htmlspecialchars($autor['nombre'] . ' ' . $autor['apellido']) ?>
                </h5>

                <p class="text-muted small mb-2">
                    <i class="bi bi-geo-alt me-1"></i>
                    <?= htmlspecialchars($autor['ciudad'] . ', ' . $autor['pais']) ?>
                </p>

                <div class="mt-auto"> <span class="badge bg-primary mb-3">
                        <i class="bi bi-journals me-1"></i>
                        <?= $autor['total_libros'] ?> libro<?= $autor['total_libros'] != 1 ? 's' : '' ?>
                    </span>

                    <?php if ($autor['biografia']): ?>
                    <p class="text-muted small mb-0 biografia-text">
                        <?= htmlspecialchars($autor['biografia']) ?>
                    </p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<div class="alert alert-info">
    <i class="bi bi-info-circle me-2"></i>No hay autores registrados.
</div>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>