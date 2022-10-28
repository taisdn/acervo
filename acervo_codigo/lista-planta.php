<?php
include_once("conectar.php");
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
    <div id="listaplanta1">
        <h2>Lista de Plantas</h2>
        <div id="busca">
            Procurar planta específica? <br><br><input type="text" id="filtro-nome" placeholder="Digite aqui o que procura..." />
        </div>
        <br><br>
        <div id="painel-pn">
            <a href="painel.php">
                << Voltar ao Painel de Categorias</a>
        </div>
        </br></br>
        <div id="tabela">
            <form method="post" action="editar-planta.php" enctype="multipart/form-data">
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
                        echo "<td>" . $data_e_ano_planta . "</td>";
                        echo "<td><img src='abrir-imagem-planta.php? id=" . $id_planta . "'height='150px'/></td>";
                        echo "<td><button name='Delete' value='$id_planta'>EXCLUIR</button></td></tr>";
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