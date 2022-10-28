<?php
include_once("conectar.php");
?>

<html lang="pt-br">

<head>
    <title>Cadastro de Planta</title>
    <link rel="stylesheet" href="style.css">
    <style>
        footer {
            position: relative;
            bottom: 0;
            margin-top: 5%;
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
    <div id="planta1">
        <form method="post" action="cadastro-planta.php" enctype="multipart/form-data">

            <h2> Cadastro de Plantas</h2>

            Nome do Prédio: <input type="text" name="nome_planta" placeholder="Insira o nome do prédio"/></br></br>
            Autor(a) da Planta: <input type="text" name="autor_planta" placeholder="Insira o nome do(a) autor(a)"/></br></br>
            Descrição: </br></br>
            <textarea id="area" cols='45' rows='5' name="descricao_planta" placeholder="Insira uma descrição"></textarea></br></br>
            Patrimônio: <input type="text" name="patrimonio_planta" placeholder="Insira o patrimônio"/></br></br>
            Data: <input type="date" name="data_e_ano_planta" /></br></br>
            Imagem: <input type="file" name="imagem_planta" /></br></br>

            <div id="btn-enviar-limpar">
                <input type="submit" name="cad" value="Enviar"></br></br>
                <input type="reset" name="limpar" value="Limpar campos"></br></br>
            </div>

        </form>
        <?php
        include_once("conectar.php");
        if (isset($_POST['cad'])) {
            $nome_planta = $_POST['nome_planta'];
            echo "testanto $nome_planta";
            $autor_planta = $_POST['autor_planta'];
            $descricao_planta = $_POST['descricao_planta'];
            $patrimonio_planta = $_POST['patrimonio_planta'];
            $data_e_ano_planta = $_POST['data_e_ano_planta'];
            $imagem_planta = $_FILES['imagem_planta']['tmp_name'];
            $imagem_tamanho = $_FILES['imagem_planta']['size'];

            if ($imagem_planta != "none") {
                $fp = fopen($imagem_planta, "rb");
                $conteudo = fread($fp, $imagem_tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $sql = "INSERT INTO planta VALUES (NULL, '$nome_planta', '$descricao_planta', '$patrimonio_planta', '$autor_planta', '$data_e_ano_planta', '$conteudo')";
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
            << Voltar para o painel de categorias</a>
    </div>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>