<?php
require_once '../config/libros.php';
 
$pageTitle = 'Libros';
$libros    = getLibros();
$total     = count($libros);
 
include '../includes/header.php';
?>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
    <h2 class="section-title mb-0">
        <i class="bi bi-journals me-2"></i>Catálogo de Libros
        <span class="badge bg-primary ms-2 fs-6"><?= $total ?></span>
    </h2>
    <div class="search-bar input-group">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input type="text" id="busqueda" class="form-control" placeholder="Buscar libro o autor…">
    </div>
</div>
 
<div id="sin-resultados" class="alert alert-warning" style="display:none;">
    <i class="bi bi-exclamation-triangle me-2"></i>No se encontraron libros con ese criterio.
</div>
 
<?php if ($total > 0): ?>
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Tipo</th>
                        <th>Publicador</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Ventas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $i => $libro): ?>
                    <tr data-busqueda="<?= htmlspecialchars($libro['titulo'] . ' ' . $libro['autor'] . ' ' . $libro['tipo']) ?>">
                        <td class="text-muted small"><?= $i + 1 ?></td>
                        <td class="fw-semibold"><?= htmlspecialchars($libro['titulo']) ?></td>
                        <td><?= htmlspecialchars($libro['autor']) ?></td>
                        <td><span class="badge bg-secondary"><?= htmlspecialchars($libro['tipo']) ?></span></td>
                        <td><?= htmlspecialchars($libro['publicador']) ?></td>
                        <td><?= $libro['anio'] ?? '—' ?></td>
                        <td class="fw-bold text-primary">
                            <?= $libro['precio'] ? '$' . number_format($libro['precio'], 2) : '—' ?>
                        </td>
                        <td><?= $libro['total_ventas'] ?? '—' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php else: ?>
<div class="alert alert-info">
    <i class="bi bi-info-circle me-2"></i>No hay libros registrados.
</div>
<?php endif; ?>
 
<?php include '../includes/footer.php'; ?>