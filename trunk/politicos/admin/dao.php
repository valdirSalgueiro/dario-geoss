<?php
include_once("class.agenda.php");
include_once("class.agenda_conteudo.php");
include_once("class.config.php");
include_once("class.downloads.php");
include_once("class.galeria.php");
include_once("class.galeria_interna.php");
include_once("class.historia.php");
include_once("class.noticias.php");
include_once("class.noticiasgeral.php");
include_once("class.noticiaspartido.php");
include_once("class.propostas.php");
include_once("class.recebanoticias.php");include_once("class.database.php");

$db = Database::getConnection(); 

function post($key) {
    if (isset($_REQUEST[$key]))
        return $_REQUEST[$key];
    return false;
}

$type = post('type');
$id = post('id');
$mode= post('mode');

$resp = new stdClass();	
$resp->success = false;

$instance = new $type;

foreach($_POST as $key => $value)
{		
	if(property_exists ( $instance , $key ))
		$instance->$key = $value;

}	
var_dump($_POST);
var_dump($_FILES);
foreach($_FILES as $key => $file)
{
	$instance->$key	= addslashes(file_get_contents($file['tmp_name']));
}

if($id){		
	if($mode){
		$instance->delete($id);
		//apagarVinculos();
	}
	else{
		$instance->update($id);
		//apagarVinculos();
	}
}
else{	
	$instance->insert();
	$id=mysqli_insert_id($db);
	$resp->id = $id;

}

function apagarVinculos(){
	global $id;
	global $instance;
	global $db;
	if($instance instanceof atividade){
		$sql = "DELETE FROM dia_horario_atividade WHERE idx_atividade = $id;";
		$db->query($sql);
	}	
}


$resp->success = true;


echo json_encode($resp);