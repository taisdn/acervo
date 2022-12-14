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

    <title>Lista de Planta</title>
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

    <div class="listaplanta1">

        <h2>Lista de Plantas</h2>

        <div id="busca">
            Procurar planta específica? <br><br><input class="inpt-search" type="text" id="filtro-nome" placeholder="Digite aqui o que você procura..." />
        </div>

        <br><br>

        <div id="painel-pn">
            
            <a href="painel.php">
                << Voltar ao Painel de Categorias</a><br><br>

                    <a href="cadastro-planta.php">
                        << Voltar ao Cadastro de Plantas</a><br><br>

                            <input type="button" value="Criar PDF" id="btnImprimir" onclick="CriaPDF()" />
        </div>

        <div id="tabela">
            <form method="post" action="editar-planta.php" enctype="multipart/form-data">

                </br>

                <div class="tabela-planta">

                    <table border="1" id="lista">
                        <col span="7" style="background-color: rgba(43, 165, 104, 0.684);">
                        <tr>
                            <th>Id</th>
                            <th>Nome do Prédio</th>
                            <th>Autor</th>
                            <th>Descrição</th>
                            <th>Data da Postagem</th>
                            <th>Imagem da Planta</th>
                            <th></th>
                        </tr>
                </div>

                <?php
                $sql = "SELECT * FROM planta";
                $resultado = mysqli_query($conexao, $sql);
                while ($data = mysqli_fetch_array($resultado)) {
                    $id_planta = $data['id_planta'];
                    $nome_planta = $data['nome_planta'];
                    $autor_planta = $data['autor_planta'];
                    $descricao_planta = $data['descricao_planta'];
                    $data_e_ano_planta = $data['data_e_ano_planta'];
                    $imagem_planta = $data['imagem_planta'];

                    echo "<tr><td>" . $id_planta . "</td>";
                    echo "<td>" . $nome_planta . "</td>";
                    echo "<td>" . $autor_planta . "</td>";
                    echo "<td>" . $descricao_planta . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($data_e_ano_planta)) . "</td>";
                    echo "<td><img src='abrir-imagem-planta.php? id=" . $id_planta . "'height='100px'/></td>";
                    echo "<td><button class='btn-excluir' name='Delete' value='$id_planta'>EXCLUIR</button></td></tr>";
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
            
            var win = window.open('', '', 'height=1700,width=1700');
            win.document.write('<html><head>');
            win.document.write('<title>Plantas</title>');
            win.document.write(style);
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write("<h4 style='font-family: Arial; text-align: center;'>LISTA DE PLANTAS</h4>");
            win.document.write(minhaTabela); 
            win.document.write('</body></html>');
            win.document.close();
            win.print();
        }
    </script>
</body>

</html>