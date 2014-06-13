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
//var_dump($_POST);
foreach($_POST as $key => $value)
{		

	if(property_exists ( $instance , $key ))
		$instance->$key = $value;

}	

function alterarConta(){
	global $instance;
	if($instance instanceof conta){
		$instance->repeat_start=strtotime($instance->data_vencimento)-(strtotime($instance->data_vencimento)%86400);
		switch($instance->idx_intervalo){
			case 1:
				$instance->repeat_interval=86400;//dia
				break;
			case 2:
				$instance->repeat_interval=604800;//semana
				break;					
			case 3:
				$instance->repeat_interval=2678400;//mes
				break;					
			case 4:
				$instance->repeat_interval=5356800;//2 mes
				break;					
			case 5:
				$instance->repeat_interval=7776000;//3
				break;					
			case 6:
				$instance->repeat_interval=15721200;//6
				break;					
			case 7:
				$instance->repeat_interval=31536000;//1 ano
				break;		
		}	
	}
}

if($id){		
	if($mode){
		$instance->delete($id);
		apagarVinculos();
	}
	else{
		alterarConta();
		$instance->update($id);
		apagarVinculos();
	}
}
else{
	if(!($instance instanceof aluno_atividade)
		&& !($instance instanceof aluno_servico
		&& !($instance instanceof funcionario_beneficio)
	){								
		alterarConta();
		$instance->insert();
		$id=mysqli_insert_id($db);
		$resp->id = $id;
	}
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
	if($instance instanceof funcionario){
		$sql = "DELETE FROM funcionario_filho WHERE idx_funcionario = $id;";
		$db->query($sql);
	}		
}

if($instance instanceof aluno){
	$file0=post('file0');
	$file1=post('file1');
	if($file0){
		$carteira=$id.".carteira.".end((explode(".", $file0)));
		$instance->carteira=$carteira;
		$instance->update($id);
	}
	if($file1){
		$foto=$id.".foto.".end((explode(".", $file1)));
		$instance->foto=$foto;
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

if($instance instanceof aluno_atividade){
	$aluno=post('aluno');
	$atividade=post('atividade');
	if(isset($aluno) && is_array($aluno)){
		foreach( $aluno as $key => $n ) {			
			$sql = "DELETE FROM aluno_atividade WHERE idx_aluno = $n;";
			$db->query($sql);
			foreach( $atividade as $key2 => $n2 ) {
				$instance = new aluno_atividade();
				$instance->idx_aluno=$n;
				$instance->idx_atividade=$n2;
				$instance->insert();
			}
		}
	}
}

if($instance instanceof funcionario_beneficio){
	$funcionario=post('funcionario');
	$beneficio=post('beneficio');
	if(isset($funcionario) && is_array($beneficio)){
		foreach( $funcionario as $key => $n ) {			
			$sql = "DELETE FROM funcionario_beneficio WHERE idx_funcionario = $n;";
			$db->query($sql);
			foreach( $beneficio as $key2 => $n2 ) {
				$instance = new funcionario_beneficio();
				$instance->idx_funcionario=$n;
				$instance->idx_beneficio=$n2;
				$instance->insert();
			}
		}
	}
}

if($instance instanceof aluno_servico){
	$aluno=post('aluno');
	$servico=post('servico');
	if(isset($aluno) && is_array($aluno)){
		foreach( $aluno as $key => $n ) {			
			$sql = "DELETE FROM aluno_servico WHERE idx_aluno = $n;";
			$db->query($sql);
			foreach( $servico as $key2 => $n2 ) {
				$instance = new aluno_servico();
				$instance->idx_aluno=$n;
				$instance->idx_servico=$n2;
				$instance->insert();
			}
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

if($instance instanceof empresa){	
	$file0=post('file0');
	if($file0){
		$logomarca=$id.".logomarca.".end((explode(".", $file0)));
		$instance->logomarca=$logomarca;
		$instance->update($id);
	}
}

if($instance instanceof funcionario){	
	$file0=post('file0');
	if($file0){
		$foto=$id.".foto.".end((explode(".", $file0)));
		$instance->foto=$foto;
		$instance->update($id);
	}

	$nomefilho=post('nomefilho');
	$nascimento=post('nascimento');
	
	if(isset($nomefilho) && is_array($nomefilho)){
		foreach( $nomefilho as $key => $n ) {
			$instance = new funcionario_filho();
			$instance->idx_funcionario=$id;
			$instance->nome=$nomefilho[$key];
			$instance->data_nasc=$nascimento[$key];
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