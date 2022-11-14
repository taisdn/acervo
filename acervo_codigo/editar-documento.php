<?php
include_once ("conectar.php");
?>

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

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
    .rodape {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            margin-top: 50px;
        }

        div#rdp{
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
    <div class="icone">
        <div id="ifsul">
            <img src="ifsul.png" width="100px;">
        </div>
        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>
        <div id="cavg">
            <img src="cavgpel.png" width="100px;">
        </div>
    </div>
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
        echo "<div id='editar-documento'>";
        echo "<h2>Quer mesmo excluir este documento:</br></br></h2>";
        echo "<p><b> $nome_documento?</b></p>";
        echo "<form action='editar-documento.php' method='post'>";
        echo "</br></br>";
        echo "<button class='btn-editar-sim' type='submit' name='Deleted' value='$deleteid_documento'><b>Sim</b></button>";
        echo "</br></br>";
        echo "<button class='btn-editar-nao' onClick='history.go(-1)'><b>Não</b></button></form></div>";
    } else {

        header('Location:lista-documento.php');
    }
    ?>

</body>

</html>