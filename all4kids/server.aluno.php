<?php

include_once("class.database.php");
include_once("class.atividade.php");
include_once("class.servico.php");

$db = Database::getDb(); 


$table = 'aluno';
 
$primaryKey = 'id';
$connection = Database::getConnection();


$columns = array(    
				array( 'db' => 'nome', 'dt' => 0 ),				
				array( 'db' => 'idade', 'dt' => 1 ),	

	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) use ($connection){
			$sql = "SELECT * FROM aluno_atividade where idx_aluno=$d LIMIT 0,1"; 
			$res = $connection->query( $sql );
			$row = $res->fetch_assoc();
			$id = $row['idx_atividade'];		
			$nome="";
			if(isset($id)){
				$atividade=new atividade();
				$atividade->select($id);
				$nome=$atividade->nome;
			}
            return $nome;
        }
    ),
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) use ($connection){
			$sql = "SELECT * FROM aluno_atividade where idx_aluno=$d LIMIT 1,1"; 
			$res = $connection->query( $sql );
			$row = $res->fetch_assoc();
			$id = $row['idx_atividade'];		
			$nome="";
			if(isset($id)){
				$atividade=new atividade();
				$atividade->select($id);
				$nome=$atividade->nome;
			}
            return $nome;
        }
    ),
				
	array(
        'db'        => 'id',
        'dt'        => 4,	
        'formatter' => function( $d, $row ) use ($connection){
			$sql = "SELECT * FROM aluno_servico where idx_aluno=$d LIMIT 0,1"; 
			$res = $connection->query( $sql );
			$row = $res->fetch_assoc();
			$id = $row['idx_servico'];		
			$nome="";
			if(isset($id)){
				$servico=new servico();
				$servico->select($id);
				$nome=$servico->nome;
			}
            return $nome;
        }
    ),
	
	array(
        'db'        => 'id',
        'dt'        => 5,
        'formatter' => function( $d, $row ) use ($connection){
			$sql = "SELECT * FROM aluno_servico where idx_aluno=$d LIMIT 1,1"; 
			$res = $connection->query( $sql );
			$row = $res->fetch_assoc();
			$id = $row['idx_servico'];		
			$nome="";
			if(isset($id)){
				$servico=new servico();
				$servico->select($id);
				$nome=$servico->nome;
			}
            return $nome;
        }
    ),	
				
	array(
        'db'        => 'id',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.aluno.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"aluno\",$d)' class='glyphicon glyphicon-remove'></a>";
        }
    ),
	
	array(
        'db'        => 'id',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
            return "<a href='view.aluno.php?id=$d' class='glyphicon glyphicon-eye-open'></a>";
        }
    ),	
	
);
  
 
$sql_details = array(
    'user' => $db->user,
	'pass' => $db->password,
    'db'   => $db->database,
    'host' => $db->host
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>
