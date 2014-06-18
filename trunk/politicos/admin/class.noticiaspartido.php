
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        noticiaspartido
* GENERATION DATE:  15.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.noticiaspartido.php
* FOR MYSQL TABLE:  noticiaspartido
* FOR MYSQL DB:     politicos
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

class noticiaspartido
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $data;   // (normal Attribute)
var $titulo;   // (normal Attribute)
var $imagem;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function noticiaspartido()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM noticiaspartido WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->data = $row->data;

$this->titulo = $row->titulo;

$this->imagem = $row->imagem;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM noticiaspartido WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO noticiaspartido ( data,titulo,imagem ) VALUES ( '$this->data','$this->titulo','$this->imagem' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE noticiaspartido SET  data = '$this->data',titulo = '$this->titulo',imagem = '$this->imagem' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
