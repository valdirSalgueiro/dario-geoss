
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        status_os
* GENERATION DATE:  22.05.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\generator/generated_classes/class.status_os.php
* FOR MYSQL TABLE:  cad_status_os
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

class status_os
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $idx_os;   // (normal Attribute)
var $idx_equipe;   // (normal Attribute)
var $data_hora_status;   // (normal Attribute)
var $status_os;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function status_os()
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

function getidx_os()
{
return $this->idx_os;
}

function getidx_equipe()
{
return $this->idx_equipe;
}

function getdata_hora_status()
{
return $this->data_hora_status;
}

function getstatus_os()
{
return $this->status_os;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setidx_os($val)
{
$this->idx_os =  $val;
}

function setidx_equipe($val)
{
$this->idx_equipe =  $val;
}

function setdata_hora_status($val)
{
$this->data_hora_status =  $val;
}

function setstatus_os($val)
{
$this->status_os =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_status_os WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->idx_os = $row->idx_os;

$this->idx_equipe = $row->idx_equipe;

$this->data_hora_status = $row->data_hora_status;

$this->status_os = $row->status_os;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_status_os WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_status_os ( idx_os,idx_equipe,data_hora_status,status_os ) VALUES ( '$this->idx_os','$this->idx_equipe','$this->data_hora_status','$this->status_os' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_status_os SET  idx_os = '$this->idx_os',idx_equipe = '$this->idx_equipe',data_hora_status = '$this->data_hora_status',status_os = '$this->status_os' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>