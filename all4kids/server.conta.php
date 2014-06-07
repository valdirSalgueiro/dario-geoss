
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'conta';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),
				
				array( 'db' => 'valor', 'dt' => 1 ),
				
				array( 'db' => 'data_vencimento', 'dt' => 2 ),
				
				array( 'db' => 'faturado', 'dt' => 3 ),
				
				array( 'db' => 'pagar', 'dt' => 4 ),
				
				array( 'db' => 'repetir', 'dt' => 5 ),
				
				array( 'db' => 'juros', 'dt' => 6 ),
				
				array( 'db' => 'descontos', 'dt' => 7 ),
				
				array( 'db' => 'valor_repetir', 'dt' => 8 ),
				
	array(
        'db'        => 'id',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.conta.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 10,
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
