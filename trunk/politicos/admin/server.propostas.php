
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'propostas';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'titulo', 'dt' => 0 ),
				
				array( 'db' => 'conteudo', 'dt' => 1 ),
				
	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.propostas.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"propostas\",$d)' class='glyphicon glyphicon-remove'></a>";
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
