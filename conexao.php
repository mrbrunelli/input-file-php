<?php

$servidor = 'localhost';
$banco = 'upload';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
} catch (PDOException $e) {
    echo 'Erro de conexão ' . $e->getMessage();
    exit;
}
