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
            margin-top: 10%;
        }

        div#rdp {
            text-align: center;
        }
    </style>
</head>
<div class="icone">
    <div id="ifsul">
        <img src="ifsul.png" width="100px;">
    </div>
    <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura</h1>
    <div id="cavg">
        <img src="cavgpel.png" width="100px;">
    </div>
</div>
<br><br>
<div id="painel-pn">

    <a href="painel.php">
        << Voltar ao Painel de Categorias</a><br><br>

    <a href="lista-arquivo.php">
        << Ir para Lista da Planilha</a>

</div>




</form>
<div class="rodape">
    <div id="rdp">
        <footer>
            Desenvolvido pela Aluna Tais Nunes, no Curso TDS 429/2022 do IFSUL – Câmpus Visconde da Graça
        </footer>
    </div>
</div>
</body>

</html>