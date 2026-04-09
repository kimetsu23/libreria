<?php
require_once __DIR__ . '/database.php';
 
function getEstadisticas(): array
{
    $pdo = getConexion();
    return [
        'titulos' => $pdo->query('SELECT COUNT(*) FROM titulos')->fetchColumn(),
        'autores' => $pdo->query('SELECT COUNT(*) FROM autores')->fetchColumn(),
        'ventas'  => $pdo->query('SELECT COUNT(*) FROM ventas')->fetchColumn(),
    ];
}
 
function getLibrosRecientes(): array
{
    $pdo = getConexion();
 
    $stmt = $pdo->query(
        'SELECT t.titulo, t.tipo, t.precio,
                CONCAT(a.nombre, " ", a.apellido) AS autor
         FROM titulos t
         INNER JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo
         INNER JOIN autores a       ON ta.id_autor  = a.id_autor
         ORDER BY t.fecha_pub DESC
         LIMIT 4'
    );

    try {
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die('<div style="color: red; font-weight: bold;">
        Error al obtener los libros recientes: ' . $e->getMessage() .
         '<p>Intente nuevamente más tarde.</p></div>');
    }
}