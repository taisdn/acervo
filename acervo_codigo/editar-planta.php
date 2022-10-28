<?php
include_once("conectar.php");

if (isset($_POST['Edit'])) {

    $title = 'Editar';
} elseif (isset($_POST['Delete'])) {

    $title = 'Deletar';
} elseif (isset($_POST['Edited'])) {

    $id_planta = $_POST['Edited'];
    $nome_planta = $_POST['nome_planta'];
    $autor_planta = $_POST['autor_planta'];
    $tipo_planta = $_POST['tipo_planta'];
    $descricao_planta = $_POST['descricao_planta'];
    $data_e_ano_planta = $_POST['data_e_ano_planta'];
    $imagem_planta = $_FILES['imagem_planta'];
    $sql = "UPDATE planta SET nome_planta = '$nome_planta', autor_planta = '$autor_planta', tipo_planta = '$tipo_planta', descricao_planta = '$descricao_planta', data_e_ano_planta = '$data_e_ano_planta', imagem_planta = '$imagem_planta' WHERE id_planta = '$id_planta' ";
    mysqli_query($conexao, $sql);
} elseif (isset($_POST['Deleted'])) {

    $id_plantaDEL = $_POST['Deleted'];
    $sql = "DELETE FROM planta WHERE id_planta = '$id_plantaDEL'";
    mysqli_query($conexao, $sql);
} else {

    $title = 'Erro!!!';
}
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Planta</title>
    <style>
        footer {
            position: relative;
            bottom: 0;
            margin-top: 5%;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura (CAVG)</h1>
    </header>
    <?php
    if (isset($_POST['Edit'])) {

        $editid_planta = $_POST['Edit'];
        $sql = "SELECT * FROM planta WHERE id_planta = $editid_planta";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));
    } elseif (isset($_POST['Delete'])) {

        $deleteid_planta = $_POST['Delete'];
        $sql = "SELECT * FROM planta WHERE id_planta = $deleteid_planta";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));

        $nome_planta = $resultado['nome_planta'];
        echo "<div id='btn-editar-planta'>";
        echo "<h2>Quer mesmo excluir esta planta:</br></br> $nome_planta?</h2>";
        echo "<form action='editar-planta.php' method='post'>";
        echo "</br></br>";
        echo "<button type='submit' name='Deleted' value='$deleteid_planta'>Sim</button>";
        echo "</br></br>";
        echo "<button onClick='history.go(-1)'>Não</button></form></div>";
    } else {

        header('Location:lista-planta.php');
    }
    ?>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>