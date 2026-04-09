<?php
require_once __DIR__ . '/database.php';
 
function getAutores(): array
{
    $pdo = getConexion();
 
    $sql = 'SELECT a.id_autor, a.nombre, a.apellido, a.ciudad, a.pais,
                   b.biografia,
                   COUNT(ta.id_titulo) AS total_libros
            FROM autores a
            LEFT JOIN biografias  b  ON a.id_autor = b.id_autor
            LEFT JOIN titulo_autor ta ON a.id_autor = ta.id_autor
            GROUP BY a.id_autor
            ORDER BY a.apellido ASC';

    try {
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die('<div style="color: red; font-weight: bold;">
        Error al obtener los autores: ' . $e->getMessage() .
         '<p>Intente nuevamente más tarde.</p></div>');
    }   
}