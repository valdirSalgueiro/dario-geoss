
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'contareceber';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),				
				array( 'db' => 'valor', 'dt' => 1 ),				
				array( 'db' => 'data_vencimento', 'dt' => 2 ),				
	array(
        'db'        => 'faturado',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {		
			$check=($d?"<span class='glyphicon glyphicon-ok'></span>":"<span class='glyphicon glyphicon-thumbs-down'></span>");
            return $check;
        }
    ),				
//				array( 'db' => 'repetir', 'dt' => 4 ),				
//				array( 'db' => 'juros', 'dt' => 5 ),				
//				array( 'db' => 'descontos', 'dt' => 6 ),				
//				array( 'db' => 'valor_repetir', 'dt' => 7 ),
				
	array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return "<a href='edit.contareceber.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"conta\",$d)' class='glyphicon glyphicon-remove'></a>";
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
