<?php
include_once("class.pedido.php");
include_once("class.produto.php");
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

foreach($_FILES as $key => $file)
{
	$instance->$key	= addslashes(file_get_contents($file['tmp_name']));
}

if($id){		
	if($mode){
		$instance->delete($id);
		if($instance instanceof pedido){
			$produto=new produto();
			$produto->select($instance->idx_produto);
			$qtd=$instance->quantidade;
			if($instance->tipo){//pedido			
				$produto->quantidade-=$qtd;
			}
			else{//venda
				$produto->quantidade+=$qtd;
			}
			$produto->update($produto->id);
		}
	}
	else{
		$instance->update($id);
		/*
		if($instance instanceof pedido){
			$produto=new produto();
			$produto->select($instance->idx_produto);
			$qtd=$instance->quantidade;
			if($instance->tipo){//pedido			
				$produto->quantidade+=$produto->quantidade-$qtd;
			}
			else{//venda
				$produto->quantidade-=$produto->quantidade-$qtd;
			}
			$produto->update($produto->id);
		}
		*/
	}
}
else{	
	$instance->insert();
	$id=mysqli_insert_id($db);
	$resp->id = $id;
	if($instance instanceof pedido){
		$produto=new produto();
		$produto->select($instance->idx_produto);
		$qtd=$instance->quantidade;
		if($instance->tipo){//pedido			
			$produto->quantidade+=$qtd;
		}
		else{//venda
			$produto->quantidade-=$qtd;
		}
		$produto->update($produto->id);
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
}


$resp->success = true;


echo json_encode($resp);