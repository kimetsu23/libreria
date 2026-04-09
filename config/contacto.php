<?php
require_once __DIR__ . '/database.php';
 
function postContacto(string $nombre, string $correo, string $asunto, string $comentario): bool
{
    $pdo = getConexion();
 
    $stmt = $pdo->prepare(
        'INSERT INTO contacto (fecha, correo, nombre, asunto, comentario)
         VALUES (NOW(), :correo, :nombre, :asunto, :comentario)'
    );
    try {
        $stmt->execute([
            ':correo' => $correo,
            ':nombre' => $nombre,
            ':asunto' => $asunto,
            ':comentario' => $comentario
        ]);
        return true;
    } catch (PDOException $e) {
        die('<div style="color: red; font-weight: bold;">
        Error al enviar el mensaje: ' . $e->getMessage() .
         '<p>Intente nuevamente más tarde.</p></div>');
    }
}