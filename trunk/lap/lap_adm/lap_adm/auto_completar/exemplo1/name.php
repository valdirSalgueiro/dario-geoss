<?php
//utiliza classe do framework Zend para utilizar json
require_once 'Zend/Json.php';

//pega variável enviada pelo request
$name = $_GET["name"];

//conecta ao banco
$bdConnection = mysql_connect('localhost', 'root', '');
//seleciona a base
mysql_select_db("fifabr_laboratorio");
//monta string SQL
$sql = "SELECT * FROM material WHERE nome like '" . $name . "%'";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
	# cria uma array com os dados do mysql
	$array_tmp = array($row["id"], $row["nome"]); 
	$array[] = $array_tmp;
	//echo($row["id"]);
}
$json = Zend_Json::encode($array);
echo $json;
?>