
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        conta_categoria
* GENERATION DATE:  07.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.conta_categoria.php
* FOR MYSQL TABLE:  conta_categoria
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

class conta_categoria
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $idx_categoria;   // (normal Attribute)
var $idx_conta;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function conta_categoria()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM conta_categoria WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->idx_categoria = $row->idx_categoria;

$this->idx_conta = $row->idx_conta;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM conta_categoria WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO conta_categoria ( idx_categoria,idx_conta ) VALUES ( '$this->idx_categoria','$this->idx_conta' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE conta_categoria SET  idx_categoria = '$this->idx_categoria',idx_conta = '$this->idx_conta' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
