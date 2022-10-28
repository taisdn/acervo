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
        header("Location: login.php");
    }
}
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        footer {
            position: relative;
            bottom: 0;
            margin-top: 15%;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>NEPEC - Núcleo de Extensão e Pesquisa em Educação, Memória e Cultura (CAVG)</h1>
    </br></br>
    <div id="cadastro">
        <h2>Entrar</h2>
        <form method="post" action="login.php" name="formulario">
            </br>
            Login: <input type="text" name="login" placeholder="Insira seu nome" /></br></br>
            Senha: <input type="password" name="senha" placeholder="Insira sua senha" /></br>
            </br>
            <input type="submit" name="botao" value="Acessar" onclick="validar()"></br></br>
            <input type="reset" name="limpar" value="Limpar campos"></br></br>
        </form>
    </div>

    <script>
        function validar() {
            var login = formulario.login.value;
            var senha = formulario.senha.value;

            if (login == "" && senha == "") {
                alert("Insira os dados corretos!");
                return false;
            }
            if (login !== senha) {
                alert("Insira os dados corretos! 54664363");
                return false;
                
            } else {
                alert("Bem-vindo(a)!!!");
                return true;
            }
        }
    </script>

    <footer>
        Desenvolvido por IFSUL – Câmpus Visconde da Graça (CAVG)
    </footer>

</body>

</html>