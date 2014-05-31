
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        beneficio
* GENERATION DATE:  01.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.beneficio.php
* FOR MYSQL TABLE:  beneficio
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

class beneficio
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $valor;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function beneficio()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM beneficio WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->nome = $row->nome;

$this->valor = $row->valor;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM beneficio WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO beneficio ( nome,valor ) VALUES ( '$this->nome','$this->valor' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE beneficio SET  nome = '$this->nome',valor = '$this->valor' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
