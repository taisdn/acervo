<?php

require ('conectar.php');

ini_set('max_execution_time', 0);

$filename = 'C:/acervocsv/teste2.csv';

if (file_exists($filename)) {
    
   mysqli_query($conexao, "LOAD DATA INFILE '$filename' INTO TABLE documento FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n' IGNORE 1 ROWS ");

   header("Location:lista-documento.php");

}else{

    echo "Arquivo não existe!";

}

?>