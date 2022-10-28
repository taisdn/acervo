<?php
      $servername = "localhost";
      $database = "acervo";
      $username = "root";
      $password = "";

      // Conexão com o banco de dados
      $conexao = mysqli_connect($servername, $username, $password, $database);

      // Verifica a conexão com banco de dados
      if (!$conexao) {
      die("Falhou! Tente novamente. " . mysqli_connect_error());
}
