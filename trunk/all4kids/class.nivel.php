
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        nivel
* GENERATION DATE:  02.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.nivel.php
* FOR MYSQL TABLE:  nivel
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

class nivel
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function nivel()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM nivel WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->nome = $row->nome;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM nivel WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO nivel ( nome ) VALUES ( '$this->nome' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE nivel SET  nome = '$this->nome' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
