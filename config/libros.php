<?php

require_once __DIR__ . '/database.php';

function getLibros(): array
{
        $pdo = getConexion();

    $sql = 'SELECT t.id_titulo, t.titulo, t.tipo, t.precio,
                   YEAR(t.fecha_pub) AS anio, t.total_ventas, t.contrato,
                   CONCAT(a.nombre, " ", a.apellido) AS autor,
                   p.nombre_pub AS publicador
            FROM titulos t
            INNER JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo
            INNER JOIN autores a       ON ta.id_autor  = a.id_autor
            INNER JOIN publicadores p  ON t.id_pub     = p.id_pub
            ORDER BY t.titulo ASC';

    try {
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die('<div style="color: red; font-weight: bold;">
        Error al obtener los libros: ' . $e->getMessage() . '<p>Intente nuevamente más tarde.</p></div>');
    }
  
}