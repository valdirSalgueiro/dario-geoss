<?php
include_once("class.aluno.php");
include_once("class.aluno_atividade_desconto.php");
include_once("class.atividade.php");
include_once("class.atividade_desconto.php");
include_once("class.beneficio.php");
include_once("class.desconto.php");
include_once("class.filho.php");
include_once("class.funcao.php");
include_once("class.funcionario.php");
include_once("class.funcionario_beneficio.php");
include_once("class.funcionario_filho.php");
include_once("class.nivel.php");
include_once("class.telefone.php");
include_once("class.telefone_aluno.php");
include_once("class.usuario.php");

include_once("class.database.php");

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

if($id){		
	if($mode){
		$instance->delete($id);
	}
	else{
		$instance->update($id);
	}
}
else{
	$instance->insert();
}

$resp->success = true;

echo json_encode($resp);

?>