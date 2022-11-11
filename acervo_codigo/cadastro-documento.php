<?php
include_once("conectar.php");
?>

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

?>

<html lang="pt-br">

<head>
    <title>Cadastro de Documento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div#btn-enviar-limpar {
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

    <div class="documento1">
        <form method="post" action="cadastro-documento.php" enctype="multipart/form-data">

            <h2> Cadastro de Documentos</h2>

            Nome do Documento: <input type="text" name="nome_documento" placeholder="Insira o nome do documento" required /></br></br>
            Autor(a) do Documento: <input type="text" name="autor_documento" placeholder="Insira o nome do(a) autor(a)" required /></br></br>
            Descrição do Documento: </br></br>
            <textarea id="area" cols='45' rows='5' name="descricao_documento" placeholder="Insira uma descrição" required></textarea></br></br>
            Data da Postagem: <input type="date" name="data_e_ano_documento" placeholder="" required /></br></br>
            Imagem: <input type="file" name="imagem_documento" required /></br></br>

            <div id="btn-enviar-limpar">
                <input style='height:40px; width:140px; font-size: 17px' type="submit" name="cad" value="Enviar"></br></br>
                <input style='height:40px; width:140px; font-size: 17px' type="reset" name="limpar" value="Limpar campos"></br></br>
            </div>
        </form>

        <?php
        include_once("conectar.php");
        if (isset($_POST['cad'])) {
            $nome_documento = $_POST['nome_documento'];
            echo "testanto $nome_documento";
            $autor_documento = $_POST['autor_documento'];
            $descricao_documento = $_POST['descricao_documento'];
            $data_e_ano_documento = $_POST['data_e_ano_documento'];
            $imagem_documento = $_FILES['imagem_documento']['tmp_name'];
            $imagem_tamanho = $_FILES['imagem_documento']['size'];

            if ($imagem_documento != 'none') {
                $fp = fopen($imagem_documento, "rb");
                $conteudo = fread($fp, $imagem_tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $sql = "INSERT INTO documento VALUES (NULL, '$nome_documento', '$autor_documento', '$descricao_documento', '$data_e_ano_documento', '$conteudo')";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    header('location: lista-documento.php');
                } else {
                    echo "erro";
                }
            }
        }
        ?>

        <a href="painel.php">
            << Voltar para o painel de categorias</a><br><br>

                <a href="lista-documento.php">
                    << Voltar para Lista de Documentos</a>
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