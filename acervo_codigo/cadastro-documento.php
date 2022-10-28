<?php
include_once("conectar.php");
?>

<html lang="pt-br">

<head>
    <title>Cadastro de Documento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        footer {
            position: relative;
            bottom: 0;
            margin-top: 2%;
            width: 100%;
            color: white;
            text-align: center;
        }
        div#btn-enviar-limpar{
    text-align: center;
}
    </style>
</head>

<body>
    <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura (CAVG)</h1>
    <div id="documento1">
        <form method="post" action="cadastro-documento.php" enctype="multipart/form-data">

            <h2> Cadastro de Documentos</h2>

            Nome do Documento: <input type="text" name="nome_documento" placeholder="Insira o nome do documento"/></br></br>
            Autor(a) do Documento: <input type="text" name="autor_documento" placeholder="Insira o nome do(a) autor(a)"></br></br>
            Descrição: </br></br>
            <textarea id="area" cols='45' rows='5' name="descricao_documento" placeholder="Insira uma descrição"></textarea></br></br>
            Patrimônio: <input type="text" name="patrimonio_documento" placeholder="Insira o patrimônio"/></br></br>
            Data: <input type="date" name="data_e_ano_documento" placeholder=""/></br></br>
            Imagem: <input type="file" name="imagem_documento"/></br></br>

            <div id="btn-enviar-limpar">
                <input type="submit" name="cad" value="Enviar"></br></br>
                <input type="reset" name="limpar" value="Limpar campos"></br></br>
            </div>

        </form>

        <?php
        include_once("conectar.php");
        if (isset($_POST['cad'])) {
            $nome_documento = $_POST['nome_documento'];
            echo "testanto $nome_documento";
            $autor_documento = $_POST['autor_documento'];
            $descricao_documento = $_POST['descricao_documento'];
            $patrimonio_documento = $_POST['patrimonio_documento'];
            $data_e_ano_documento = $_POST['data_e_ano_documento'];
            $imagem_documento = $_FILES['imagem_documento']['tmp_name'];
            $imagem_tamanho = $_FILES['imagem_documento']['size'];

            if ($imagem_documento != "none") {
                $fp = fopen($imagem_documento, "rb");
                $conteudo = fread($fp, $imagem_tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $sql = "INSERT INTO documento VALUES (NULL, '$nome_documento', '$descricao_documento', '$patrimonio_documento', '$autor_documento', '$data_e_ano_documento',  '$conteudo')";
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
            << Voltar para o painel de categorias</a>
    </div>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>