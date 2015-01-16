<?php
include_once("class.alergia.php");
include_once("class.aluno.php");
include_once("class.aluno_medicamento.php");
include_once("class.aluno_responsavel.php");
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
include_once("class.aluno_retirada.php");

include_once("class.conta_aluno.php");



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

	if(property_exists ( $instance , $key )){
		if (is_array($value)){
			$allValue="";
			for($i=0;$i<count($value);$i++)
				$allValue .= $value[$i].",";
			$instance->$key = $allValue;
		}else{			
			$instance->$key = $value;
		}
	}

}	





if($id){		
	if($mode){
		$instance->delete($id);
		apagarVinculos();		
	}
	else{
		$instance->update($id);
		$resp->id = $id;
		apagarVinculos();
	}
	$resp->id = $id;	
}
else{
	if($instance instanceof usuario)
		$instance->senha=md5($instance->senha);


	if(!($instance instanceof aluno_atividade)
		&& !($instance instanceof aluno_servico)
	){	
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
		$sql = "DELETE FROM conta WHERE id IN (SELECT idx_conta from conta_aluno where idx_aluno=$id)";
		$db->query($sql);
		
		$sql = "DELETE FROM conta_aluno WHERE idx_aluno = $id;";
		$db->query($sql);
	}	
	
	if($instance instanceof conta){
		$sql = "DELETE FROM conta_aluno WHERE idx_conta = $id;";
		$db->query($sql);
	}
	
	if($instance instanceof funcionario){
		$sql = "DELETE FROM funcionario_filho WHERE idx_funcionario = $id;";
		$db->query($sql);
	}		
}

if(!$mode){
	if($instance instanceof aluno){
		$uploaddir = './uploads/';
		foreach($_FILES as $key => $file)
		{
			$name = $file["name"];
			if($key=="foto"){
				$name=$id.".foto.img";
			}		
			if($key=="carteira"){
				$name=$id.".carteira.img";
			}
			if(!move_uploaded_file($file['tmp_name'], $uploaddir .$name))
				$resp->success = false;		
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
		
		// for($i=0;$i<12;$i++){
			// $conta=new conta();		
			// $aluno=new aluno();
			// $aluno->select($id);
			// $conta->nome=$aluno->nome."_".date("Y-m-d", strtotime("+$i month", time()));
			// $conta->valor=100;
			// $conta->data_vencimento=date("Y-m-d", strtotime("+$i month", time()));
			// $conta->insert();
			// $id_conta=mysqli_insert_id($db);
			
			// $conta_aluno=new conta_aluno();
			// $conta_aluno->idx_aluno=$id;
			// $conta_aluno->idx_conta=$id_conta;
			// $conta_aluno->insert();
		// }
	}

	if($instance instanceof aluno_retirada){
		$uploaddir = './uploads/';
		foreach($_FILES as $key => $file)
		{
			$name = $file["name"];	
			if($key=="foto"){
				$name=$id.".retirada.img";
			}
			if(!move_uploaded_file($file['tmp_name'], $uploaddir .$name))
				$resp->success = false;		
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
		$dia_id=array();
		$horario_id=array();
		
		$dia = array_key_exists('dia', $_POST)? $_POST['dia'] : $_POST['formdata']['dia'];    
		foreach($dia as $key => $value) {
			if(preg_match('/([0-9]*)-?(a|d)?$/', $key, $keyparts) === 1) {
				if(isset($keyparts[2])) {
					switch($keyparts[2]) {
						case 'a':
							$dia_id[]=$keyparts[1];
							break;

					}
				}
			}
		}
		
		$horario = array_key_exists('horario', $_POST)? $_POST['horario'] : $_POST['formdata']['horario'];    
		foreach($horario as $key => $value) {
			if(preg_match('/([0-9]*)-?(a|d)?$/', $key, $keyparts) === 1) {
				if(isset($keyparts[2])) {
					switch($keyparts[2]) {
						case 'a':
							$horario_id[]=$keyparts[1];
							break;
						case 'd':
							$result['deleted'][] = $keyparts[1] . ' ("' . $value . '")';
							break;
					}
				}
				else {
					$result['new'][] = $key . ' ("' . $value . '")';
					$instance = new horario();
					$instance->horario=$value;
					$instance->insert();
					$horario_id[]=mysqli_insert_id($db);
				}
			}
		}
		
		
		if(isset($dia_id) && is_array($dia_id)){
			foreach( $dia_id as $key => $n ) {
				$instance = new dia_horario_atividade();
				$instance->idx_atividade=$id;
				$instance->idx_horario=$horario_id[$key];
				$instance->idx_dia=$dia_id[$key];
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
		$uploaddir = './uploads/';		
		foreach($_FILES as $key => $file)
		{
			$name = $file["name"];
			if($key=="foto"){
				$name=$id.".func.foto.img";
			}		
			if($key=="carteira"){
				$name=$id.".func.carteira.img";
			}
			if(!move_uploaded_file($file['tmp_name'], $uploaddir .$name))
				$resp->success = false;		
		}

		$nome=post('nomefilho');
		$nascimento=post('nascimento');
		
		if(isset($nome) && is_array($nome)){
			foreach( $nome as $key => $n ) {
				$instance = new funcionario_filho();
				$instance->idx_funcionario=$id;
				$instance->nome=$nome[$key];
				$instance->nascimento=$nascimento[$key];
				$instance->insert();
			}
		}
	}

	if($instance instanceof servico){	
	$dia_id=array();
		$horario_id=array();
		
		$dia = array_key_exists('dia', $_POST)? $_POST['dia'] : $_POST['formdata']['dia'];    
		foreach($dia as $key => $value) {
			if(preg_match('/([0-9]*)-?(a|d)?$/', $key, $keyparts) === 1) {
				if(isset($keyparts[2])) {
					switch($keyparts[2]) {
						case 'a':
							$dia_id[]=$keyparts[1];
							break;

					}
				}
			}
		}
		
		$horario = array_key_exists('horario', $_POST)? $_POST['horario'] : $_POST['formdata']['horario'];    
		foreach($horario as $key => $value) {
			if(preg_match('/([0-9]*)-?(a|d)?$/', $key, $keyparts) === 1) {
				if(isset($keyparts[2])) {
					switch($keyparts[2]) {
						case 'a':
							$horario_id[]=$keyparts[1];
							break;
						case 'd':
							$result['deleted'][] = $keyparts[1] . ' ("' . $value . '")';
							break;
					}
				}
				else {
					$result['new'][] = $key . ' ("' . $value . '")';
					$instance = new horario();
					$instance->horario=$value;
					$instance->insert();
					$horario_id[]=mysqli_insert_id($db);
				}
			}
		}
		
		
		if(isset($dia_id) && is_array($dia_id)){
			foreach( $dia_id as $key => $n ) {
				$instance = new dia_horario_atividade();
				$instance->idx_atividade=$id;
				$instance->idx_horario=$horario_id[$key];
				$instance->idx_dia=$dia_id[$key];
				$instance->insert();
			}
		}
		
		if(isset($dia_id) && is_array($dia_id)){
			foreach( $dia_id as $key => $n ) {
				$instance = new dia_horario_servico();
				$instance->idx_servico=$id;
				$instance->idx_horario=$horario_id[$key];
				$instance->idx_dia=$dia_id[$key];
				$instance->insert();
			}
		}
	}
}


$resp->id = $id;
$resp->success = true;


echo json_encode($resp);

?>