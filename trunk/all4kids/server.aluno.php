
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'aluno';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),
				
				array( 'db' => 'email', 'dt' => 1 ),
				
				array( 'db' => 'nome_mae', 'dt' => 2 ),
				
				array( 'db' => 'nome_pai', 'dt' => 3 ),
				
				array( 'db' => 'responsavel_nome', 'dt' => 4 ),
				
				array( 'db' => 'responsavel_cpf', 'dt' => 5 ),
				
				array( 'db' => 'responsavel_rg', 'dt' => 6 ),
				
				array( 'db' => 'endereco', 'dt' => 7 ),
				
				array( 'db' => 'plano_saude', 'dt' => 8 ),
				
				array( 'db' => 'emergencia', 'dt' => 9 ),
				
				array( 'db' => 'responsavel_emergencia', 'dt' => 10 ),
				
				array( 'db' => 'carteira', 'dt' => 11 ),
				
				array( 'db' => 'entregou_carteira', 'dt' => 12 ),
				
				array( 'db' => 'ativo', 'dt' => 13 ),
				
				array( 'db' => 'idade', 'dt' => 14 ),
				
				array( 'db' => 'data_nasc', 'dt' => 15 ),
				
	array(
        'db'        => 'id',
        'dt'        => 16,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.aluno.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 17,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"aluno\",$d)' class='glyphicon glyphicon-remove'></a>";
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
