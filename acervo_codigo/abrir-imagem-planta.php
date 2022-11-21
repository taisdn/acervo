<?php

    include_once('conectar.php');

    $id = $_GET['id'];

    $sql = "SELECT imagem_planta FROM planta WHERE id_planta = $id";
    $resultado = mysqli_query($conexao, $sql);
    $result = mysqli_fetch_assoc($resultado);
    $imagem = $result['imagem_planta'];

    echo $imagem;
?>