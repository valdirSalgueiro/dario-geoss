
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        os
* GENERATION DATE:  17.06.2014
* CLASS FILE:       C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\data\localweb\generator/classes/class.os.php
* FOR MYSQL TABLE:  cad_os
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

class os
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $status;   // (normal Attribute)
var $idx_semaforo;   // (normal Attribute)
var $idx_tipo_servico;   // (normal Attribute)
var $data_hora_os;   // (normal Attribute)
var $laudo_tecnico;   // (normal Attribute)
var $idx_mater_usado;   // (normal Attribute)
var $idx_problema_local;   // (normal Attribute)
var $idx_gerar_ocorrencia;   // (normal Attribute)
var $data_os_fecha;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function os()
{

$this->database = Database::getDb();

}


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM cad_os WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = $result->fetch_object();


$this->id = $row->id;

$this->status = $row->status;

$this->idx_semaforo = $row->idx_semaforo;

$this->idx_tipo_servico = $row->idx_tipo_servico;

$this->data_hora_os = $row->data_hora_os;

$this->laudo_tecnico = $row->laudo_tecnico;

$this->idx_mater_usado = $row->idx_mater_usado;

$this->idx_problema_local = $row->idx_problema_local;

$this->idx_gerar_ocorrencia = $row->idx_gerar_ocorrencia;

$this->data_os_fecha = $row->data_os_fecha;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM cad_os WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO cad_os ( status,idx_semaforo,idx_tipo_servico,data_hora_os,laudo_tecnico,idx_mater_usado,idx_problema_local,idx_gerar_ocorrencia,data_os_fecha ) VALUES ( '$this->status','$this->idx_semaforo','$this->idx_tipo_servico','$this->data_hora_os','$this->laudo_tecnico','$this->idx_mater_usado','$this->idx_problema_local','$this->idx_gerar_ocorrencia','$this->data_os_fecha' )";
$result = $this->database->query($sql);


}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE cad_os SET  status = '$this->status',idx_semaforo = '$this->idx_semaforo',idx_tipo_servico = '$this->idx_tipo_servico',data_hora_os = '$this->data_hora_os',laudo_tecnico = '$this->laudo_tecnico',idx_mater_usado = '$this->idx_mater_usado',idx_problema_local = '$this->idx_problema_local',idx_gerar_ocorrencia = '$this->idx_gerar_ocorrencia',data_os_fecha = '$this->data_os_fecha' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
