<?php
session_start();
include "conectar.php";

if (isset($_POST['botao'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE login_usuario = '$login' AND senha_usuario = '$senha'";

    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $registro = mysqli_fetch_array($resultado);

        $_SESSION['nome'] = $registro['login_usuario'];
        $_SESSION['login'] = $login;

        header("Location: painel.php");
    } else {

        echo "<div id='msg-erro'> Login e senha incorretos. Tente novamente!!!</div>";
    }
}
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div#msg-erro {
            text-align: center;
            font-size: 18px;
            padding: 5px;
            bottom: 20%;
            color: white;
            border-radius: 7px;
            text-shadow: 0em 3px 2px black;
            background-color: rgb(244, 93, 93);
        }

        .rodape {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            margin-top: 45px;
        }

        div#rdp{
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
    <div id="cadastro">
        <h2>Entrar</h2>
        <form method="post" action="login.php" name="formulario">
            </br>
            Login: <input type="text" name="login" placeholder="Insira seu nome" required /></br></br>
            Senha: <input type="password" name="senha" placeholder="Insira sua senha" required /></br>
            </br>
            <input style='height:40px; width:140px; font-size: 17px' type="submit" name="botao" value="Acessar"></br></br>
            <input style='height:40px; width:150px; font-size: 17px' type="reset" name="limpar" value="Limpar campos"></br></br>

            <?php
            if (isset($deuerro)) {
                echo "<div id='msg-erro'> Login e senha incorretos. Tente novamente!!!</div>";
            }
            ?>

        </form>
    </div>

    <div class="rodape">
        <div id="rdp">
            <footer>
                Desenvolvido por IFSUL – Câmpus Visconde da Graça, Pelotas - RS
            </footer>
        </div>
    </div>

</body>

</html>