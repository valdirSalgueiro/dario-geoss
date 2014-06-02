<?php
include_once("class.semaforo.php");
include_once("class.material.php");
include_once("class.fornecedor.php");

include_once("class.acess_equipam.php");
include_once("class.equipe.php");

include_once("class.uf.php");
include_once("class.cidade.php");
include_once("class.bairro.php");
include_once("class.logradouro.php");

include_once("class.ferramenta.php");
include_once("class.kit_ferramenta.php");

include_once("class.model_veic.php");
include_once("class.tipo_veic.php");
include_once("class.veiculo.php");

include_once("class.funcao_funcion.php");
include_once("class.funcionario.php");

include_once("class.servicos.php");

include_once("class.usuarios.php");

include_once("class.ocorrencia.php");
include_once("class.origem_ocorrenc.php");
include_once("class.reclamante.php");

include_once("class.vistoria.php");

include_once("class.despac_sai.php");
include_once("class.despac_retorn.php");

include_once("class.despac_mat_devolv.php");
include_once("class.despac_mat_retirad.php");
include_once("class.despac_mat_selec.php");

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

function apagarDespachoSaida()(
	if($instance instanceof despac_sai){
		$sql = "DELETE FROM cad_despac_mat_selec WHERE idx_despac_sai = $id;";
		$db->query($sql);
	}
}

function apagarDespachoRetorno()(
	if($instance instanceof despac_retorn){
		$sql = "DELETE FROM cad_despac_mat_retirad WHERE idx_despac_retorn = $id;";
		$db->query($sql);
		$sql = "DELETE FROM cad_despac_mat_devolv WHERE idx_despac_retorn = $id;";
		$db->query($sql);
	}
}

if($id){		
	if($mode){
		$instance->delete($id);
		apagarDespachoSaida();
		apagarDespachoRetorno();
	}	
	else{
		$instance->update($id);
		apagarDespachoSaida();
		apagarDespachoRetorno();		
	}
}
else{
	$instance->insert();
}

if($instance instanceof despac_sai){
	$id=mysqli_insert_id($db);
	
	$material=post('idx_material');
	$quantidade=post('quantidade');
	foreach( $material as $key => $n ) {
		$instance = new despac_mat_selec();
		$instance->idx_material=$material[$key];
		$instance->quantidade=$quantidade[$key];
		$instance->idx_despac_sai=$id;
		$instance->insert();
	}	
}

if($instance instanceof despac_retorn){
	$id=mysqli_insert_id($db);
	
	$material=post('idx_material');
	$quantidade=post('quantidade');
	foreach( $material as $key => $n ) {
		$instance = new despac_mat_retirad();
		$instance->idx_material=$material[$key];
		$instance->quantidade=$quantidade[$key];
		$instance->idx_despac_retorn=$id;
		$instance->insert();
	}

	$material=post('idx_materialDevolvido');
	$quantidade=post('quantidadeDevolvido');
	foreach( $material as $key => $n ) {
		$instance = new despac_mat_devolv();
		$instance->idx_material=$material[$key];
		$instance->quantidade=$quantidade[$key];
		$instance->idx_despac_retorn=$id;
		$instance->insert();
	}	
}

$resp->success = true;

echo json_encode($resp);

?>