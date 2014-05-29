
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        despac_mat_selec
* GENERATION DATE:  22.05.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\generator/generated_classes/class.despac_mat_selec.php
* FOR MYSQL TABLE:  cad_despac_mat_selec
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

class despac_mat_selec
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $quantidade;   // (normal Attribute)
var $idx_material;   // (normal Attribute)
var $idx_despac_sai;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function despac_mat_selec()
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

function getquantidade()
{
return $this->quantidade;
}

function getidx_material()
{
return $this->idx_material;
}

function getidx_despac_sai()
{
return $this->idx_despac_sai;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setquantidade($val)
{
$this->quantidade =  $val;
}

function setidx_material($val)
{
$this->idx_material =  $val;
}

function setidx_despac_sai($val)
{
$this->idx_despac_sai =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_despac_mat_selec WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->quantidade = $row->quantidade;

$this->idx_material = $row->idx_material;

$this->idx_despac_sai = $row->idx_despac_sai;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_despac_mat_selec WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_despac_mat_selec ( quantidade,idx_material,idx_despac_sai ) VALUES ( '$this->quantidade','$this->idx_material','$this->idx_despac_sai' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_despac_mat_selec SET  quantidade = '$this->quantidade',idx_material = '$this->idx_material',idx_despac_sai = '$this->idx_despac_sai' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
