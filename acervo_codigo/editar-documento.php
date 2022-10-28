<?php
include_once("conectar.php");

if (isset($_POST['Edit'])) {

    $title = 'Editar';
} elseif (isset($_POST['Delete'])) {

    $title = 'Deletar';
} elseif (isset($_POST['Edited'])) {

    $id_documento = $_POST['Edited'];
    $nome_documento = $_POST['nome_documento'];
    $autor_documento = $_POST['autor_documento'];
    $descricao_documento = $_POST['descricao_documento'];
    $data_e_ano_documento = $_POST['data_e_ano_documento'];
    $imagem_documento = $_FILES['imagem_documento'];
    $sql = "UPDATE documento SET nome_documento = '$nome_documento', autor_documento = '$autor_documento', descricao_documento = '$descricao_documento', data_e_ano_documento = '$data_e_ano_documento',  imagem_documento = '$imagem_documento' WHERE id_documento = '$id_documento' ";
    mysqli_query($conexao, $sql);
} elseif (isset($_POST['Deleted'])) {

    $id_documentoDEL = $_POST['Deleted'];
    $sql = "DELETE FROM documento WHERE id_documento = '$id_documentoDEL'";
    mysqli_query($conexao, $sql);
} else {

    $title = 'Erro!!!';
}
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Documento</title>
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

        $editid_documento = $_POST['Edit'];
        $sql = "SELECT * FROM documento WHERE id_documento = $editid_documento";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));
    } elseif (isset($_POST['Delete'])) {

        $deleteid_documento = $_POST['Delete'];
        $sql = "SELECT * FROM documento WHERE id_documento = $deleteid_documento";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));

        $nome_documento = $resultado['nome_documento'];
        echo "<div id='btn-editar-documento'>";
        echo "<h2>Quer mesmo excluir este documento:</br></br> $nome_documento?</h2>";
        echo "<form action='editar-documento.php' method='post'>";
        echo "</br></br>";
        echo "<button type='submit' name='Deleted' value='$deleteid_documento'>Sim</button>";
        echo "</br></br>";
        echo "<button onClick='history.go(-1)'>Não</button></form></div>";
    } else {

        header('Location:lista-documento.php');
    }
    ?>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>