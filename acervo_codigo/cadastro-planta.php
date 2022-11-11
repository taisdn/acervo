<?php
include_once ("conectar.php");
?>

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

?>

<html lang="pt-br">

<head>
    <title>Cadastro de Planta</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div#btn-enviar-limpar{
    text-align: center;
}

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
<div class="icone">
        <div id="ifsul">
            <img src="ifsul.png" width="170px;">
        </div>
        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>
        <div id="cavg">
            <img src="cavgpel.png" width="100px;">
        </div>
    </div>

    <div class="planta1">
        <form method="post" action="cadastro-planta.php" enctype="multipart/form-data">

            <h2> Cadastro de Plantas</h2>

            Nome do Prédio: <input type="text" name="nome_planta" placeholder="Insira o nome do prédio" required/></br></br>
            Autor(a) da Planta: <input type="text" name="autor_planta" placeholder="Insira o nome do(a) autor(a)" required/></br></br>
            Descrição da Planta: </br></br>
            <textarea id="area" cols='45' rows='5' name="descricao_planta" placeholder="Insira uma descrição" required></textarea></br></br>
            Data da Postagem: <input type="date" name="data_e_ano_planta" required/></br></br>
            Imagem: <input type="file" name="imagem_planta" required/></br></br>

            <div id="btn-enviar-limpar">
                <input style='height:40px; width:140px; font-size: 17px' type="submit" name="cad" value="Enviar"></br></br>
                <input style='height:40px; width:140px; font-size: 17px' type="reset" name="limpar" value="Limpar campos"></br></br>
            </div>
        </form>

        <?php
        include_once("conectar.php");
        if (isset($_POST['cad'])) {
            $nome_planta = $_POST['nome_planta'];
            echo "testanto $nome_planta";
            $autor_planta = $_POST['autor_planta'];
            $descricao_planta = $_POST['descricao_planta'];
            $data_e_ano_planta = $_POST['data_e_ano_planta'];
            $imagem_planta = $_FILES['imagem_planta']['tmp_name'];
            $imagem_tamanho = $_FILES['imagem_planta']['size'];

            if ($imagem_planta != 'none') {
                $fp = fopen($imagem_planta, "rb");
                $conteudo = fread($fp, $imagem_tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $sql = "INSERT INTO planta VALUES (NULL, '$nome_planta', '$autor_planta', '$descricao_planta', '$data_e_ano_planta', '$conteudo')";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    header('location: lista-planta.php');
                } else {
                    echo "erro";
                }
            }
        }
        ?>

<a href="painel.php">
            << Voltar para o painel de categorias</a><br><br>

                <a href="lista-planta.php">
                    << Voltar para Lista de Plantas</a>
    </div>

    <div class="rodape">
        <div id="rdp">
        <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça, Pelotas - RS
        </footer>
        </div>
    </div>

</body>

</html>