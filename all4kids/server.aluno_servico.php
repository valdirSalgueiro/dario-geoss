
<?php

include_once("class.database.php");
include_once("class.aluno.php");
include_once("class.servico.php");

$db = Database::getDb(); 


$table = 'aluno_servico';
 
$primaryKey = 'id';
 
$columns = array(    

	array(
        'db'        => 'idx_servico',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
			$servico=new servico;
			$servico->select($d);
            return $servico->nome;
        }
    ),	

		array(
        'db'        => 'idx_aluno',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
			$aluno=new aluno;
			$aluno->select($d);
            return $aluno->nome;
        }
    ),	

	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.aluno_servico.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"aluno_servico\",$d)' class='glyphicon glyphicon-remove'></a>";
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
