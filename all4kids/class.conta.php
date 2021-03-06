
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        conta
* GENERATION DATE:  27.07.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.conta.php
* FOR MYSQL TABLE:  conta
* FOR MYSQL DB:     all4kids
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.voegeli.li >> (download for free!)
* -------------------------------------------------------
*
*/

include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class conta
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $valor;   // (normal Attribute)
var $data_vencimento;   // (normal Attribute)
var $faturado;   // (normal Attribute)
var $pagar;   // (normal Attribute)
var $repetir;   // (normal Attribute)
var $juros;   // (normal Attribute)
var $descontos;   // (normal Attribute)
var $valor_repetir;   // (normal Attribute)
var $idx_categoria;   // (normal Attribute)
var $idx_intervalo;   // (normal Attribute)
var $repeat_start;   // (normal Attribute)
var $repeat_interval;   // (normal Attribute)
var $idx_fornecedor;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function conta()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM conta WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->nome = $row->nome;

$this->valor = $row->valor;

$this->data_vencimento = $row->data_vencimento;

$this->faturado = $row->faturado;

$this->pagar = $row->pagar;

$this->repetir = $row->repetir;

$this->juros = $row->juros;

$this->descontos = $row->descontos;

$this->valor_repetir = $row->valor_repetir;

$this->idx_categoria = $row->idx_categoria;

$this->idx_intervalo = $row->idx_intervalo;

$this->repeat_start = $row->repeat_start;

$this->repeat_interval = $row->repeat_interval;

$this->idx_fornecedor = $row->idx_fornecedor;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM conta WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO conta ( nome,valor,data_vencimento,faturado,pagar,repetir,juros,descontos,valor_repetir,idx_categoria,idx_intervalo,repeat_start,repeat_interval,idx_fornecedor ) VALUES ( '$this->nome','$this->valor','$this->data_vencimento','$this->faturado','$this->pagar','$this->repetir','$this->juros','$this->descontos','$this->valor_repetir','$this->idx_categoria','$this->idx_intervalo','$this->repeat_start','$this->repeat_interval','$this->idx_fornecedor' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE conta SET  nome = '$this->nome',valor = '$this->valor',data_vencimento = '$this->data_vencimento',faturado = '$this->faturado',pagar = '$this->pagar',repetir = '$this->repetir',juros = '$this->juros',descontos = '$this->descontos',valor_repetir = '$this->valor_repetir',idx_categoria = '$this->idx_categoria',idx_intervalo = '$this->idx_intervalo',repeat_start = '$this->repeat_start',repeat_interval = '$this->repeat_interval',idx_fornecedor = '$this->idx_fornecedor' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
