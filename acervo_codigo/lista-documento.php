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

    <title>Lista de Documento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .pagination a {
            text-align: center;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
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
            <img src="ifsul.png" width="170px;">
        </div>

        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>

        <div id="cavg">
            <img src="cavgpel.png" width="100px;">
        </div>

    </div>

    <div class="listadocumento1">

        <h2>Lista de Documentos</h2>

        <div id="busca">
            Procurar documento específico? <br><br><input type="text" id="filtro-nome" placeholder="Digite aqui o que procura..." />
        </div>

        <br><br>

        <div id="painel-pn">
            <a href="painel.php">
                << Voltar ao Painel de Categorias</a><br><br>

                    <a href="cadastro-documento.php">
                        << Voltar ao Cadastro de Documentos</a>
        </div>

        </br></br>

        <div id="tabela">
            <form method="post" action="editar-documento.php" enctype="multipart/form-data">

                <div id="imprimir-pdf">
                    <button type="button" onclick="window.print()">Imprimir PDF</button>
                </div>

                </br>

                <div class="tabela-documento">

                    <table border="1">
                        <col span="7" style="background-color: rgba(43, 165, 104, 0.684);">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Autor</th>
                            <th>Descrição</th>
                            <th>Data da Postagem</th>
                            <th>Imagem</th>
                            <th></th>
                        </tr>
                </div>

                <?php
                $sql = "SELECT * FROM documento";
                $resultado = mysqli_query($conexao, $sql);
                while ($data = mysqli_fetch_array($resultado)) {
                    $id_documento = $data['id_documento'];
                    $nome_documento = $data['nome_documento'];
                    $autor_documento = $data['autor_documento'];
                    $descricao_documento = $data['descricao_documento'];
                    $data_e_ano_documento = $data['data_e_ano_documento'];
                    $imagem_documento = $data['imagem_documento'];

                    echo "<tr><td>" . $id_documento . "</td>";
                    echo "<td>" . $nome_documento . "</td>";
                    echo "<td>" . $autor_documento . "</td>";
                    echo "<td>" . $descricao_documento . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($data_e_ano_documento)) . "</td>";
                    echo "<td><img src='abrir-imagem-documento.php? id=" . $id_documento . "'height='150px'/></td>";
                    echo "<td><button style='height:40px; width:140px; font-size: 17px' name='Delete' value='$id_documento'>EXCLUIR</button></td></tr>";
                }

                mysqli_close($conexao);

                ?>
                </table>
        </div>
        </br></br>
        </form>
    </div>

    <div class="rodape">
        <div id="rdp">
            <footer>
                Desenvolvido por IFSUL – Câmpus Visconde da Graça, Pelotas - RS
            </footer>
        </div>
    </div>

    <script>
        var filtro = document.getElementById('filtro-nome');
        var tabela = document.getElementById('lista');
        filtro.onkeyup = function() {
            var nomeFiltro = filtro.value;
            for (var i = 1; i < tabela.rows.length; i++) {
                var conteudoCelula = tabela.rows[i].cells[1].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela.rows[i].style.display = corresponde ? '' : 'none';
            }
        };
    </script>
</body>

</html>