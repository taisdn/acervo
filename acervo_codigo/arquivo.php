<?php

//require ('conectar.php');

//ini_set('max_execution_time', 0);

//$filename = 'C:/acervocsv/teste2.csv'; SOMENTE POSSIVEL COM O ARQUIVO JÁ DECLARADO

//if (file_exists($filename)) {
    
//   mysqli_query($conexao, "LOAD DATA INFILE '$filename' INTO TABLE documento FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n' IGNORE 1 ROWS ");

//   header("Location:lista-documento.php");

//}else{

//    echo "Arquivo não existe!";

//}

$conexao = new mysqli("localhost", "root", "", "acervo");
mysqli_set_charset($conexao, "utf8");

$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];


    $doc = fopen($arquivo, "r");
    while (($dados = fgetcsv($doc, ';')) !== FALSE) {
        
        $nome_documento = utf8_encode($dados[0]);
        $autor_documento = utf8_encode($dados[1]);
        $descricao_documento = utf8_encode($dados[2]);
        $data_e_ano_documento = utf8_encode($dados[3]);

        $csv = $conexao->query("INSERT INTO documento (nome_documento, autor_documento, descricao_documento, data_e_ano_documento) VALUES ('$nome_documento', '$autor_documento', '$descricao_documento', '$data_e_ano_documento')");
    }

    if ($csv) {
        echo "Dados inseridos com sucesso!";
    }else {
        echo "Erro ao inserir os dados. Tente novamente!!!";
    }

    //FEITO COM UMA INPUT DECLARADA NO ARQUIVO CADASTRO-DOCUMENTO 
?>