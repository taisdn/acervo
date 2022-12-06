<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title>Planilha</title>
   <link rel="stylesheet" href="style.css">
   <style>
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
   </br></br>
   <div id="painel-pn">

      <a href="painel.php">
         << Voltar ao Painel de Categorias</a>

   </div>

   <div id="arquivo">

      <h2>Arquivo Importado</h2>

      <?php

      include_once("conectar.php");

      if (!empty($_FILES['arquivo']['tmp_name'])) {

         $arquivo = new DOMDocument();
         $arquivo->load($_FILES['arquivo']['tmp_name']);

         $linhas = $arquivo->getElementsByTagName("Row");

         foreach ($linhas as $linha) {

            $id_arquivo = $linha->getElementsByTagName("Data")->item(0)->nodeValue;

            echo "ID: $id_arquivo <br>";

            $nome_arquivo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;

            echo "Nome do arquivo: $nome_arquivo <br>";

            $autor_arquivo = $linha->getElementsByTagName("Data")->item(2)->nodeValue;

            echo "Autor do arquivo: $autor_arquivo <br>";

            $descricao_arquivo = $linha->getElementsByTagName("Data")->item(3)->nodeValue;

            echo "Descrição do arquivo: $descricao_arquivo <br>";

            $data_e_ano_arquivo = $linha->getElementsByTagName("Data")->item(4)->nodeValue;

            echo "Data do arquivo: $data_e_ano_arquivo <br>";

            echo "<hr>";

            $sql = "INSERT INTO arquivo (nome_arquivo, autor_arquivo, descricao_arquivo, data_e_ano_arquivo) VALUE ('$nome_arquivo', '$autor_arquivo', '$descricao_arquivo', '$data_e_ano_arquivo')";
            $resultado = mysqli_query($conexao, $sql);
         }
      }
      ?>
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