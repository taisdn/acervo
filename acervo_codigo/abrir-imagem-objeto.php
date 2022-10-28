<?php

    include_once('conectar.php');

    $id = $_GET['id'];

    $sql = "SELECT imagem_objeto FROM objeto WHERE id_objeto = $id";
    $resultado = mysqli_query($conexao, $sql);
    $result = mysqli_fetch_assoc($resultado);
    $imagem = $result['imagem_objeto'];

    echo $imagem;
?>