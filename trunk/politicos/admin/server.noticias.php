
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'noticias';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'titulo', 'dt' => 0 ),
				
				array( 'db' => 'data', 'dt' => 1 ),
				
				array( 'db' => 'imagem', 'dt' => 2 ),
				
				array( 'db' => 'texto', 'dt' => 3 ),
				
	array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.noticias.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"noticias\",$d)' class='glyphicon glyphicon-remove'></a>";
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
