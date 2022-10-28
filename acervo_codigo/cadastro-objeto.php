<?php
include_once("conectar.php");
?>

<html lang="pt-br">

<head>
    <title>Cadastro de Objeto</title>
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
    <div id="objeto1">
        <form method="post" action="cadastro-objeto.php" enctype="multipart/form-data">

            <h2> Cadastro de Objetos</h2>

            Nome do Objeto: <input type="text" name="nome_objeto" placeholder="Insira o nome do objeto"/></br></br>
            Autor(a) do Objeto: <input type="text" name="autor_objeto" placeholder="Insira o nome do(a) autor(a)"/></br></br>
            Descrição: </br></br>
            <textarea id="area" cols='45' rows='5' name="descricao_objeto" placeholder="Insira uma descrição"></textarea></br></br>
            Patrimônio: <input type="text" name="patrimonio_objeto" placeholder="Insira o patrimônio"/></br></br>
            Data: <input type="date" name="data_e_ano_objeto" /></br></br>
            Imagem: <input type="file" name="imagem_objeto"/></br></br>

            <div id="btn-enviar-limpar">
                <input type="submit" name="cad" value="Enviar"></br></br>
                <input type="reset" name="limpar" value="Limpar campos"></br></br>
            </div>

        </form>
        <?php
        include_once("conectar.php");
        if (isset($_POST['cad'])) {
            $nome_objeto = $_POST['nome_objeto'];
            echo "testanto $nome_objeto";
            $autor_objeto = $_POST['autor_objeto'];
            $descricao_objeto = $_POST['descricao_objeto'];
            $patrimonio_objeto = $_POST['patrimonio_objeto'];
            $data_e_ano_objeto = $_POST['data_e_ano_objeto'];
            $imagem_objeto = $_FILES['imagem_objeto']['tmp_name'];
            $imagem_tamanho = $_FILES['imagem_objeto']['size'];

            if ($imagem_objeto != 'none') {
                $fp = fopen($imagem_objeto, "rb");
                $conteudo = fread($fp, $imagem_tamanho);
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $sql = "INSERT INTO objeto VALUES (NULL, '$nome_objeto', '$descricao_objeto', '$patrimonio_objeto', '$autor_objeto', '$data_e_ano_objeto', '$conteudo')";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    header('location: lista-objeto.php');
                } else {
                    echo "erro";
                }
            }
        }
        ?>
        <a href="painel.php">
            << Voltar para o painel de categorias</a>
    </div>
    <div class="rodape">
        <footer>
            Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
        </footer>
    </div>
</body>

</html>