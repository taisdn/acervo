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
    <title>Cadastro de Objeto</title>
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

        div#rdp {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="icone">
        <div id="ifsul">
            <img src="ifsul.png" width="100px;">
        </div>
        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>
        <div id="cavg">
            <img src="cavgpel.png" width="100px;">
        </div>
    </div>

    <div class="objeto1">
        <div id="obj1">
            <form method="post" action="cadastro-objeto.php" enctype="multipart/form-data">

                <h2> Cadastro de Objetos</h2>

                Nome do Objeto: <input class="inpt-objeto" style="width:50%;" type="text" name="nome_objeto" placeholder="Insira o nome do objeto" required /></br></br>
                Autor(a) do Objeto: <input class="inpt-objeto" style="width:46%;" type="text" name="autor_objeto" placeholder="Insira o nome do(a) autor(a)" required /></br></br>
                Descrição do Objeto: </br></br>
                <textarea id="area" cols='47' rows='10' name="descricao_objeto" placeholder="Insira uma descrição" required></textarea></br></br>
                Patrimônio: <input class="inpt-objeto" style="width:61%;" type="text" name="patrimonio_objeto" placeholder="Insira o patrimônio" required /></br></br>
                Data da Postagem: <input class="inpt-data" style="width:47%;" type="date" name="data_e_ano_objeto" required /></br></br>
                Imagem do Objeto: <input class="inpt-arquivo" type="file" name="imagem_objeto" required /></br></br>
                </br></br>
                <div id="btn-enviar-limpar">
                    <button class="btn-todos" name="cad" type="submit">Cadastrar</button></br></br>
                    <button class="btn-todos" name="limpar" type="reset">Limpar campos</button></br></br>
                </div>

                </br></br>

                <div id="links">
                    <a href="painel.php">
                        << Voltar para o painel de categorias</a><br><br>

                            <a href="lista-objeto.php">
                                Ir para Lista de Objetos >> </a>
                </div>

            </form>
        </div>
    </div>

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

            $sql = "INSERT INTO objeto VALUES (NULL, '$nome_objeto', '$autor_objeto', '$descricao_objeto', '$patrimonio_objeto', '$data_e_ano_objeto', '$conteudo')";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                header('location: lista-objeto.php');
            } else {
                echo "erro";
            }
        }
    }
    ?>

    <div class="rodape">
        <div id="rdp">
            <footer>
                Desenvolvido pela Aluna Tais Nunes, no Curso TDS 429/2022 do IFSUL – Câmpus Visconde da Graça
            </footer>
        </div>
    </div>
</body>

</html>