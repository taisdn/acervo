<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .rodape {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            margin-top: 4%;
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

    <h2>Categorias</h2>

    <div class="todos">
        <div id="painel1">

            <h3>Objetos</h3>

            </br></br></br></br>

            <a href="cadastro-objeto.php">Cadastrar Objetos</a>
            </br></br>
            <a href="lista-objeto.php">Lista de Objetos</a>

        </div>
        </br></br>
        <div id="painel2">

            <h3>Plantas</h3>

            </br></br></br></br>

            <a href="cadastro-planta.php">Cadastrar Plantas</a>
            </br></br>
            <a href="lista-planta.php">Lista de Plantas</a>

        </div>
        </br></br>
        <div id="painel3">

            <h3>Documentos</h3>

            </br>

            <a href="cadastro-documento.php">Cadastrar Documentos</a>
            </br></br>
            <a href="lista-documento.php">Lista de Documentos</a>
            <br><br>
            <a href="lista-arquivo.php">Lista Planilha</a>
            <br><br>
            <div class="">
                <div id="">
                    <form method="post" action="lista-arquivo.php" enctype="multipart/form-data"></br>
                        Importar somente arquivo XML: <br><br><input class="inpt-arquivo" type="file" name="arquivo" required /><br><br>
                        <button class="btn-todos" name="enviar" type="submit">Importar</button>
                </div>
            </div>
        </div>

    </div>

    </br>

    <div class="end">
        <a href='logout.php'> Sair </a>
    </div>

    <div class="rodape">
        <div id="rdp">
            <footer>
                Desenvolvido pela Aluna Tais Nunes, no Curso TDS 429/2022 do IFSUL – Câmpus Visconde da Graça
            </footer>
        </div>
    </div>
</body>

</html>