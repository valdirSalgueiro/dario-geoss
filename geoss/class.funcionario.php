
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        funcionario
* GENERATION DATE:  17.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.funcionario.php
* FOR MYSQL TABLE:  cad_funcionario
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

class funcionario
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $funcionar_nome;   // (normal Attribute)
var $idx_funcao;   // (normal Attribute)
var $foto;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function funcionario()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_funcionario WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->funcionar_nome = $row->funcionar_nome;

$this->idx_funcao = $row->idx_funcao;

$this->foto = $row->foto;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_funcionario WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_funcionario ( funcionar_nome,idx_funcao,foto ) VALUES ( '$this->funcionar_nome','$this->idx_funcao','$this->foto' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_funcionario SET  funcionar_nome = '$this->funcionar_nome',idx_funcao = '$this->idx_funcao',foto = '$this->foto' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
