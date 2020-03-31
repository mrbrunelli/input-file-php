<?php

$descricao = $_POST['descricao'] ?? "";

if (empty($descricao)) {
    echo '<script>alert("Preencha o campo descrição");history.back();</script>';
    exit;
}

// print_r($_FILES);
$arquivo = time();

$tipo = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

$arquivo = $arquivo . "." . $tipo;

if ($_FILES['arquivo']['type'] != 'image/jpeg') {
    echo '<script>alert("Não é um arquivo JPG válido");history.back();</script>';
    exit;
} else if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/' . $arquivo)) {
    echo '<script>alert("Erro, não foi possível copiar!");history.back();</script>';
    exit;
}

include "imagem.php";

LoadImg("arquivos/" . $arquivo, $arquivo, "arquivos/");

echo '<script>alert("Arquivo enviado!");history.back();</script>';
exit;
