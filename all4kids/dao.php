<?php
include_once("class.alergia.php");
include_once("class.aluno.php");
include_once("class.aluno_alergia.php");
include_once("class.aluno_atividade.php");
include_once("class.aluno_servico.php");
include_once("class.aluno_telefone.php");
include_once("class.atividade.php");
include_once("class.beneficio.php");
include_once("class.categoria.php");
include_once("class.conta.php");
include_once("class.conta_categoria.php");
include_once("class.dia.php");
include_once("class.filho.php");
include_once("class.fornecedor.php");
include_once("class.funcao.php");
include_once("class.funcionario.php");
include_once("class.funcionario_beneficio.php");
include_once("class.funcionario_filho.php");
include_once("class.horario.php");
include_once("class.intervalo.php");
include_once("class.nivel.php");
include_once("class.nivelescolar.php");
include_once("class.servico.php");
include_once("class.usuario.php");
include_once("class.dia_horario_atividade.php");
include_once("class.dia_horario_servico.php");

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
		apagarVinculos();
	}
	else{
		$instance->update($id);
		apagarVinculos();
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
	if($instance instanceof servico){
		$sql = "DELETE FROM dia_horario_servico WHERE idx_servico = $id;";
		$db->query($sql);
	}	
	if($instance instanceof aluno){
		$sql = "DELETE FROM aluno_telefone WHERE idx_aluno = $id;";
		$db->query($sql);
	}	
}

if($instance instanceof aluno){
	$file0=post('file0');
	if($file0){
		$carteira=$id.".carteira.".end((explode(".", $file0)));
		$instance->carteira=$carteira;
		$instance->update($id);
	}
	
	$telefone=post('telefone');
	if(isset($telefone) && is_array($telefone)){
		foreach( $telefone as $key => $n ) {
			$instance = new aluno_telefone();
			$instance->numero=$telefone[$key];
			$instance->idx_aluno=$id;
			$instance->insert();
		}
	}
}

if($instance instanceof atividade){	
	$dia=post('dia');
	$horario=post('horario');
	if(isset($dia) && is_array($dia)){
		foreach( $dia as $key => $n ) {
			$instance = new dia_horario_atividade();
			$instance->idx_atividade=$id;
			$instance->idx_horario=$horario[$key];
			$instance->idx_dia=$dia[$key];
			$instance->insert();
		}
	}
}

if($instance instanceof servico){	
	$dia=post('dia');
	$horario=post('horario');
	if(isset($dia) && is_array($dia)){
		foreach( $dia as $key => $n ) {
			$instance = new dia_horario_servico();
			$instance->idx_servico=$id;
			$instance->idx_horario=$horario[$key];
			$instance->idx_dia=$dia[$key];
			$instance->insert();
		}
	}
}

$resp->success = true;


echo json_encode($resp);

?>