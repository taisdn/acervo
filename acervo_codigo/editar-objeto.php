<?php
include_once("conectar.php");

if (isset($_POST['Edit'])) {

    $title = 'Editar';
} elseif (isset($_POST['Delete'])) {

    $title = 'Deletar';
} elseif (isset($_POST['Edited'])) {

    $id_objeto = $_POST['Edited'];
    $nome_objeto = $_POST['nome_objeto'];
    $autor_objeto = $_POST['autor_objeto'];
    $descricao_objeto = $_POST['descricao_objeto'];
    $patrimonio_objeto = $resultado['patrimonio_objeto'];
    $data_e_ano_objeto = $_POST['data_e_ano_objeto'];
    $imagem_objeto = $_FILES['imagem_objeto'];
    $sql = "UPDATE objeto SET nome_objeto = '$nome_objeto', autor_objeto = '$autor_objeto', descricao_objeto = '$descricao_objeto', data_e_ano_objeto = '$data_e_ano_objeto',  imagem_objeto = '$imagem_objeto' WHERE id_objeto = '$id_objeto' ";
    mysqli_query($conexao, $sql);
} elseif (isset($_POST['Deleted'])) {

    $id_objetoDEL = $_POST['Deleted'];
    $sql = "DELETE FROM objeto WHERE id_objeto = '$id_objetoDEL'";
    mysqli_query($conexao, $sql);
} else {

    $title = 'Erro!!!';
}
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Objeto</title>
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

        $editid_objeto = $_POST['Edit'];
        $sql = "SELECT * FROM objeto WHERE id_objeto = $editid_objeto";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));
    } elseif (isset($_POST['Delete'])) {

        $deleteid_objeto = $_POST['Delete'];
        $sql = "SELECT * FROM objeto WHERE id_objeto = $deleteid_objeto";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));

        $nome_objeto = $resultado['nome_objeto'];
        echo "<div id='btn-editar-objeto'>";
        echo "<h2>Quer mesmo excluir este objeto:</br></br> $nome_objeto?</h2>";
        echo "<form action='editar-objeto.php' method='post'>";
        echo "</br></br>";
        echo "<button type='submit' name='Deleted' value='$deleteid_objeto'>Sim</button>";
        echo "</br></br>";
        echo "<button onClick='history.go(-1)'>Não</button></form></div>";
    } else {

        header('Location:lista-objeto.php');
    }
    ?>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>