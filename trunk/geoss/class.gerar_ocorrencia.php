
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        gerar_ocorrencia
* GENERATION DATE:  17.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.gerar_ocorrencia.php
* FOR MYSQL TABLE:  cad_gerar_ocorrencia
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

class gerar_ocorrencia
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $data_hora_ocorr;   // (normal Attribute)
var $protocolo;   // (normal Attribute)
var $idx_semaforo;   // (normal Attribute)
var $idx_origem_ocorr;   // (normal Attribute)
var $idx_reclamante;   // (normal Attribute)
var $status;   // (normal Attribute)
var $obs;   // (normal Attribute)
var $idx_tipo_equipe;   // (normal Attribute)
var $idx_tipo_ocorr;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function gerar_ocorrencia()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_gerar_ocorrencia WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->data_hora_ocorr = $row->data_hora_ocorr;

$this->protocolo = $row->protocolo;

$this->idx_semaforo = $row->idx_semaforo;

$this->idx_origem_ocorr = $row->idx_origem_ocorr;

$this->idx_reclamante = $row->idx_reclamante;

$this->status = $row->status;

$this->obs = $row->obs;

$this->idx_tipo_equipe = $row->idx_tipo_equipe;

$this->idx_tipo_ocorr = $row->idx_tipo_ocorr;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_gerar_ocorrencia WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_gerar_ocorrencia ( data_hora_ocorr,protocolo,idx_semaforo,idx_origem_ocorr,idx_reclamante,status,obs,idx_tipo_equipe,idx_tipo_ocorr ) VALUES ( '$this->data_hora_ocorr','$this->protocolo','$this->idx_semaforo','$this->idx_origem_ocorr','$this->idx_reclamante','$this->status','$this->obs','$this->idx_tipo_equipe','$this->idx_tipo_ocorr' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_gerar_ocorrencia SET  data_hora_ocorr = '$this->data_hora_ocorr',protocolo = '$this->protocolo',idx_semaforo = '$this->idx_semaforo',idx_origem_ocorr = '$this->idx_origem_ocorr',idx_reclamante = '$this->idx_reclamante',status = '$this->status',obs = '$this->obs',idx_tipo_equipe = '$this->idx_tipo_equipe',idx_tipo_ocorr = '$this->idx_tipo_ocorr' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
