<?php 

include_once("../dist/CSVdb.php");

$objCSV = new CSVdb('../db/teste.csv');


$lista = array (
    array('nome'=>'Paulo', 'sobrenome'=>'Silva', 'idade'=>'25', 'email'=>'paulo@email.com', 'sexo'=>'M'),
    array('nome'=>'Maria', 'sobrenome'=>'Joaquina', 'idade'=>'33', 'email'=>'maria@email.com', 'sexo'=>'F'),
    array('nome'=>'Isabel', 'sobrenome'=>'Silva', 'idade'=>'27', 'email'=>'isabel@email.com', 'sexo'=>'F')
);


// Salva os dados de um array em um arquivo CSV
$objCSV->save($lista);


// Efetua uma consulta retornando todos os dados do array
$dados = $objCSV->select();
echo "Consulta todos os itens";
echo("<pre>"); 
print_r ($dados); 
echo("</pre>"); 


// Efetua uma consulta onde o indice 4 do array é igual 'F'
$dados = $objCSV->selectWhere(4, 'F');
echo "Consulta um item específico";
echo("<pre>"); 
print_r ($dados); 
echo("</pre>"); 
