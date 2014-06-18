
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'historia';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'texto', 'dt' => 0 ),
				
	array(
        'db'        => 'imagem',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
			$imagem=base64_encode( $d );
			$imagem="<img src='data:image/jpeg;base64,$imagem' width='100' height='100'>";
            return $imagem;
        }
    ),	
				
	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.historia.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"historia\",$d)' class='glyphicon glyphicon-remove'></a>";
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
