
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        origem_ocorrenc
* GENERATION DATE:  22.05.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\generator/generated_classes/class.origem_ocorrenc.php
* FOR MYSQL TABLE:  cad_origem_ocorrenc
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

class origem_ocorrenc
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $origem_nome;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function origem_ocorrenc()
{

$this->database = Database::getDb();

}


// **********************
// GETTER METHODS
// **********************


function getid()
{
return $this->id;
}

function getorigem_nome()
{
return $this->origem_nome;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setorigem_nome($val)
{
$this->origem_nome =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_origem_ocorrenc WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->origem_nome = $row->origem_nome;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_origem_ocorrenc WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_origem_ocorrenc ( origem_nome ) VALUES ( '$this->origem_nome' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_origem_ocorrenc SET  origem_nome = '$this->origem_nome' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>