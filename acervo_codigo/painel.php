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
        footer {
            position: relative;
            bottom: 0;
            margin-top: 8%;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura (CAVG)</h1>
    </br>
    <h2>Categorias</h2>
    </br>
    <div class="todos">
        <div id="painel1">

            <h3><u>Objetos</u></h3>

            <a href="cadastro-objeto.php">Cadastrar Objetos</a>
            </br></br>
            <a href="lista-objeto.php">Lista de Objetos</a>

        </div>
        </br></br>
        <div id="painel2">

            <h3><u>Plantas</u></h3>

            <a href="cadastro-planta.php">Cadastrar Plantas</a>
            </br></br>
            <a href="lista-planta.php">Lista de Plantas</a>

        </div>
        </br></br>
        <div id="painel3">

            <h3><u>Documentos</u></h3>

            <a href="cadastro-documento.php">Cadastrar Documentos</a>
            </br></br>
            <a href="lista-documento.php">Lista de Documentos</a>
            </br></br>

        </div>
    </div>
    </br>
    <div class="end">
        <a href='logout.php'> Sair </a>
    </div>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>