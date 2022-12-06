<?php

    include_once('conectar.php');

    $id = $_GET['id'];

    $sql = "SELECT imagem_documento FROM documento WHERE id_documento = $id";
    $resultado = mysqli_query($conexao, $sql);
    $result = mysqli_fetch_assoc($resultado);
    $imagem = $result['imagem_documento'];

    echo $imagem;
?>