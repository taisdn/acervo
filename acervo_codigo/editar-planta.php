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

        $editid_planta = $_POST['Edit'];
        $sql = "SELECT * FROM planta WHERE id_planta = $editid_planta";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));
    } elseif (isset($_POST['Delete'])) {

        $deleteid_planta = $_POST['Delete'];
        $sql = "SELECT * FROM planta WHERE id_planta = $deleteid_planta";
        $resultado = mysqli_fetch_array(mysqli_query($conexao, $sql));

        $nome_planta = $resultado['nome_planta'];
        echo "<div id='btn-editar-planta'>";
        echo "<h2 style='color: rgb(220,20,60); text-shadow: 0em 2px 2px white'>Quer mesmo excluir esta planta:</br></br></h2>";
        echo "<p style='color: red; font-size: 35px; text-shadow: 0em 2px 2px white'><b> $nome_planta?</b></p>";
        echo "<form action='editar-planta.php' method='post'>";
        echo "</br></br>";
        echo "<button class='inpt-btn' type='submit' name='Deleted' value='$deleteid_planta'>Sim</button>";
        echo "</br></br>";
        echo "<button class='inpt-btn' onClick='history.go(-1)'>Não</button></form></div>";
    } else {

        header('Location:lista-planta.php');
    }
    ?>

</body>

</html>