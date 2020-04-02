<?php

include 'conexao.php';

// Null coalesce, caso não exista a primeira condição, a variável recebera vázio.
$descricao = $_POST['descricao'] ?? "";

if (empty($descricao)) {
    echo '<script>alert("Preencha o campo descrição");history.back();</script>';
    exit;
}

// print_r($_FILES);
$arquivo = time();

//$tipo = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

//$arquivo = $arquivo . "." . $tipo;

if ($_FILES['arquivo']['type'] != 'image/jpeg') {
    echo '<script>alert("Não é um arquivo JPG válido");history.back();</script>';
    exit;
} else if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/' . $_FILES['arquivo']['name'])) {
    echo '<script>alert("Erro, não foi possível copiar!");history.back();</script>';
    exit;
}

include "imagem.php";

LoadImg("arquivos/" . $_FILES['arquivo']['name'], $arquivo, "arquivos/");

$sql = "insert into arquivos (descricao, arquivo) values (?, ?)";

$consulta = $pdo->prepare($sql);

$consulta->bindParam(1, $descricao);

$consulta->bindParam(2, $arquivo);

if (!$consulta->execute()) {
    echo '<script>alert("Não foi possível gravar!");history.back();</script>';
    exit;
}

echo '<script>alert("Arquivo enviado!");history.back();</script>';
exit;
