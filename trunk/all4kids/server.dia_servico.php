
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'dia_servico';
 
$primaryKey = 'id';
 
$columns = array(    

	array(
        'db'        => 'id',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.dia_servico.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"dia_servico\",$d)' class='glyphicon glyphicon-remove'></a>";
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
