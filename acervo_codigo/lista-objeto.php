<?php
include_once("conectar.php");
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

        footer {
            position: relative;
            bottom: 0;
            margin-top: 25%;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>

</head>

<body>
    <h1> NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura (CAVG)</h1>
    <div id="listaobjeto1">
        <h2>Lista de Objeto</h2>
        <div id="busca">
            Procurar objeto específico? <br><br><input type="text" id="filtro-nome" placeholder="Digite aqui o que procura..." />
        </div>
        <br><br>
        <div id="painel-pn">
            <a href="painel.php">
                << Voltar ao Painel de Categorias</a>
        </div>
        </br></br>
        <div id="tabela">
            <form method="post" action="editar-objeto.php" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Descrição</th>
                        <th>Data e Ano</th>
                        <th>Imagem</th>
                        <th></th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM objeto";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($data = mysqli_fetch_array($resultado)) {
                        $id_objeto = $data['id_objeto'];
                        $nome_objeto = $data['nome_objeto'];
                        $autor_objeto = $data['autor_objeto'];
                        $descricao_objeto = $data['descricao_objeto'];
                        $data_e_ano_objeto = $data['data_e_ano_objeto'];
                        $imagem_objeto = $data['imagem_objeto'];

                        echo "<tr><td>" . $id_objeto . "</td>";
                        echo "<td>" . $nome_objeto . "</td>";
                        echo "<td>" . $autor_objeto . "</td>";
                        echo "<td>" . $descricao_objeto . "</td>";
                        echo "<td>" . $data_e_ano_objeto . "</td>";
                        echo "<td><img src='abrir-imagem-objeto.php? id=" . $id_objeto . "' height='150px'/></td>";
                        echo "<td><button name='Delete' value='$id_objeto'>EXCLUIR</button></td></tr>";
                    }

                    mysqli_close($conexao);

                    ?>
                </table>
            </form>
        </div>

        <footer>
            Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
        </footer>

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