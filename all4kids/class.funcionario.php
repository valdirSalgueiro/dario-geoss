
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        funcionario
* GENERATION DATE:  02.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.funcionario.php
* FOR MYSQL TABLE:  funcionario
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

class funcionario
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $cpf;   // (normal Attribute)
var $rg;   // (normal Attribute)
var $titulo;   // (normal Attribute)
var $endereco;   // (normal Attribute)
var $telefone;   // (normal Attribute)
var $remuneracao;   // (normal Attribute)
var $idx_funcao;   // (normal Attribute)

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

$sql =  "SELECT * FROM funcionario WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->nome = $row->nome;

$this->cpf = $row->cpf;

$this->rg = $row->rg;

$this->titulo = $row->titulo;

$this->endereco = $row->endereco;

$this->telefone = $row->telefone;

$this->remuneracao = $row->remuneracao;

$this->idx_funcao = $row->idx_funcao;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM funcionario WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO funcionario ( nome,cpf,rg,titulo,endereco,telefone,remuneracao,idx_funcao ) VALUES ( '$this->nome','$this->cpf','$this->rg','$this->titulo','$this->endereco','$this->telefone','$this->remuneracao','$this->idx_funcao' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE funcionario SET  nome = '$this->nome',cpf = '$this->cpf',rg = '$this->rg',titulo = '$this->titulo',endereco = '$this->endereco',telefone = '$this->telefone',remuneracao = '$this->remuneracao',idx_funcao = '$this->idx_funcao' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
