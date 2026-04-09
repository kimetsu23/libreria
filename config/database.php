<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'dblibreria');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'latin1');


function getConexion(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_NAME,
            DB_CHARSET
        );
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $opciones);
        } catch (PDOException $e) {
            
            die('<div style="color: red; font-weight: bold;">
            Error de conexión a la base de datos: ' . $e->getMessage() . '<p>No se puede conectar a la base de datos. Verifique la configuración.</p></div>');
        }
    }

    return $pdo;

}
