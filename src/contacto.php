<?php
require_once '../config/contacto.php';

$pageTitle = 'Contacto';
$mensaje   = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['nombre']     ?? '');
    $correo     = trim($_POST['correo']     ?? '');
    $asunto     = trim($_POST['asunto']     ?? '');
    $comentario = trim($_POST['comentario'] ?? '');

    if (empty($nombre) || empty($correo) || empty($asunto) || empty($comentario)) {
        $mensaje = ['tipo' => 'danger', 'texto' => 'Todos los campos son obligatorios.'];
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = ['tipo' => 'danger', 'texto' => 'El correo electrónico no es válido.'];
    } else {
        $ok = postContacto($nombre, $correo, $asunto, $comentario);
        if ($ok) {
            $mensaje = ['tipo' => 'success', 'texto' => '¡Mensaje enviado correctamente!'];
            $nombre = $correo = $asunto = $comentario = '';
        } else {
            $mensaje = ['tipo' => 'danger', 'texto' => 'Ocurrió un error. Inténtalo de nuevo.'];
        }
    }
}

include '../includes/header.php';
?>

<h2 class="section-title">
    <i class="bi bi-envelope me-2"></i>Contacto
</h2>

<div class="row justify-content-center">
    <div class="col-lg-7">

        <?php if ($mensaje): ?>
        <div class="alert alert-<?= $mensaje['tipo'] ?> alert-dismissible alert-auto fade show">
            <?= $mensaje['texto'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <div class="form-contacto">
            <form id="formContacto" method="POST" action="contacto.php" novalidate>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                           value="<?= htmlspecialchars($nombre ?? '') ?>" required maxlength="150">
                    <div class="invalid-feedback">Ingresa tu nombre.</div>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="correo" name="correo"
                           value="<?= htmlspecialchars($correo ?? '') ?>" required maxlength="150">
                    <div class="invalid-feedback">Ingresa un correo válido.</div>
                </div>

                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="asunto" name="asunto"
                           value="<?= htmlspecialchars($asunto ?? '') ?>" required maxlength="200">
                    <div class="invalid-feedback">Ingresa el asunto.</div>
                </div>

                <div class="mb-4">
                    <label for="comentario" class="form-label">Comentario <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="comentario" name="comentario"
                              rows="5" required maxlength="2000"><?= htmlspecialchars($comentario ?? '') ?></textarea>
                    <div class="invalid-feedback">Escribe tu comentario.</div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-send me-2"></i>Enviar mensaje
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>