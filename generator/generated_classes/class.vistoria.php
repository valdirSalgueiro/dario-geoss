
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        vistoria
* GENERATION DATE:  22.05.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\generator/generated_classes/class.vistoria.php
* FOR MYSQL TABLE:  cad_vistoria
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

class vistoria
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $idx_semaforo;   // (normal Attribute)
var $idx_cad_os;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function vistoria()
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

function getidx_semaforo()
{
return $this->idx_semaforo;
}

function getidx_cad_os()
{
return $this->idx_cad_os;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setidx_semaforo($val)
{
$this->idx_semaforo =  $val;
}

function setidx_cad_os($val)
{
$this->idx_cad_os =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_vistoria WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->idx_semaforo = $row->idx_semaforo;

$this->idx_cad_os = $row->idx_cad_os;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_vistoria WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_vistoria ( idx_semaforo,idx_cad_os ) VALUES ( '$this->idx_semaforo','$this->idx_cad_os' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_vistoria SET  idx_semaforo = '$this->idx_semaforo',idx_cad_os = '$this->idx_cad_os' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>