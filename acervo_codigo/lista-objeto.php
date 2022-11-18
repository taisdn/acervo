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

    <title>Lista de Objeto</title>
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
            <img src="ifsul.png" width="100px;">
        </div>

        <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>

        <div id="cavg">
            <img src="cavgpel.png" width="100px;">
        </div>

    </div>

    <div class="listaobjeto1">

        <h2>Lista de Objetos</h2>

        <div id="busca">
            Procurar objeto específico? <br><br><input class="inpt-search" type="text" id="filtro-nome" placeholder="Digite aqui o que você procura..." />
        </div>

        <br><br>

        <div id="painel-pn">
            <a href="painel.php">
                << Voltar ao Painel de Categorias</a><br><br>

                    <a href="cadastro-objeto.php">
                        << Voltar ao Cadastro de Objetos</a><br><br>

                            <input type="button" value="Criar PDF" id="btnImprimir" onclick="CriaPDF()" />
        </div>

        <div id="tabela">
            <form method="post" action="editar-objeto.php" enctype="multipart/form-data">

                <h4>OBJETOS</h4>
                </br>

                <div class="tabela-objeto">

                    <table border="1" id="lista">
                        <col span="8" style="background-color: rgba(43, 165, 104, 0.684);">
                        <tr>
                            <th>Id</th>
                            <th>Nome do Objeto</th>
                            <th>Autor</th>
                            <th>Descrição</th>
                            <th>Patrimônio</th>
                            <th>Data da Postagem</th>
                            <th>Imagem do Objeto</th>
                            <th></th>
                        </tr>

                </div>

                <?php
                $sql = "SELECT * FROM objeto";
                $resultado = mysqli_query($conexao, $sql);
                while ($data = mysqli_fetch_array($resultado)) {
                    $id_objeto = $data['id_objeto'];
                    $nome_objeto = $data['nome_objeto'];
                    $autor_objeto = $data['autor_objeto'];
                    $descricao_objeto = $data['descricao_objeto'];
                    $patrimonio_objeto = $data['patrimonio_objeto'];
                    $data_e_ano_objeto = $data['data_e_ano_objeto'];
                    $imagem_objeto = $data['imagem_objeto'];

                    echo "<tr><td>" . $id_objeto . "</td>";
                    echo "<td>" . $nome_objeto . "</td>";
                    echo "<td>" . $autor_objeto . "</td>";
                    echo "<td>" . $descricao_objeto . "</td>";
                    echo "<td>" . $patrimonio_objeto . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($data_e_ano_objeto)) . "</td>";
                    echo "<td><img src='abrir-imagem-objeto.php? id=" . $id_objeto . "' height='100px'/></td>";
                    echo "<td><button class='btn-excluir' name='Delete' value='$id_objeto'>EXCLUIR</button></td></tr>";
                }

                mysqli_close($conexao);

                ?>
                </table>
            </form>
        </div>
    </div>

    <div class="rodape">
        <div id="rdp">
            <footer>
                Desenvolvido pela Aluna Tais Nunes, no Curso TDS 429/2022 do IFSUL – Câmpus Visconde da Graça
            </footer>
        </div>
    </div>

    <script>
        var filtro = document.getElementById('filtro-nome');
        var tabela = document.getElementById('lista');
        filtro.onkeyup = function() {
            var nomeFiltro = filtro.value;
            for (var i = 0; i < tabela.rows.length; i++) {
                var conteudoCelula = tabela.rows[i].cells[1].innerText;
                var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
                tabela.rows[i].style.display = corresponde ? '' : 'none';
            }
        };
    </script>

    <script>
        function CriaPDF() {
            var minhaTabela = document.getElementById('tabela').innerHTML;
            var style = "<style>";
            style = style + "table {width: 100%;font: 20px Arial;}";
            style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;}";
            style = style + "</style>";
            // CRIA UM OBJETO WINDOW
            var win = window.open('', '', 'height=1700,width=1700');
            win.document.write('<html><head>');
            win.document.write('<title>Objetos</title>'); // <title> CABEÇALHO DO PDF.
            win.document.write(style); // INCLUI UM ESTILO NA TAB HEAD
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write(minhaTabela); // O CONTEUDO DA TABELA DENTRO DA TAG BODY
            win.document.write('</body></html>');
            win.document.close(); // FECHA A JANELA
            win.print(); // IMPRIME O CONTEUDO
        }
    </script>
</body>

</html>