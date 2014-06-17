
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        despac_mat_retirad
* GENERATION DATE:  17.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.despac_mat_retirad.php
* FOR MYSQL TABLE:  cad_despac_mat_retirad
* FOR MYSQL DB:     geoss
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

class despac_mat_retirad
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $quantidade;   // (normal Attribute)
var $condicao;   // (normal Attribute)
var $idx_material;   // (normal Attribute)
var $idx_despac_retorn;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function despac_mat_retirad()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_despac_mat_retirad WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->quantidade = $row->quantidade;

$this->condicao = $row->condicao;

$this->idx_material = $row->idx_material;

$this->idx_despac_retorn = $row->idx_despac_retorn;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_despac_mat_retirad WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_despac_mat_retirad ( quantidade,condicao,idx_material,idx_despac_retorn ) VALUES ( '$this->quantidade','$this->condicao','$this->idx_material','$this->idx_despac_retorn' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_despac_mat_retirad SET  quantidade = '$this->quantidade',condicao = '$this->condicao',idx_material = '$this->idx_material',idx_despac_retorn = '$this->idx_despac_retorn' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
