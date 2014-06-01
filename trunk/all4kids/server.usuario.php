
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'usuario';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'email', 'dt' => 0 ),
				
				array( 'db' => 'senha', 'dt' => 1 ),
				
	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.usuario.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"usuario\",$d)' class='glyphicon glyphicon-remove'></a>";
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
