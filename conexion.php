<?php

// Conectar a la base de datos usando PDO
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'DWES2324TA_primer_trimestre1';
$db_port = 8889;

try {
    $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_db;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

?>
