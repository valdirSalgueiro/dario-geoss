
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        aluno_atividade
* GENERATION DATE:  31.05.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.aluno_atividade.php
* FOR MYSQL TABLE:  aluno_atividade
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

class aluno_atividade
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $idx_atividade_desconto;   // (normal Attribute)
var $idx_aluno;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function aluno_atividade()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM aluno_atividade WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->idx_atividade_desconto = $row->idx_atividade_desconto;

$this->idx_aluno = $row->idx_aluno;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM aluno_atividade WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO aluno_atividade ( idx_atividade_desconto,idx_aluno ) VALUES ( '$this->idx_atividade_desconto','$this->idx_aluno' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE aluno_atividade SET  idx_atividade_desconto = '$this->idx_atividade_desconto',idx_aluno = '$this->idx_aluno' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
