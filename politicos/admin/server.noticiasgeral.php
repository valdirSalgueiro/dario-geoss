
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'noticiasgeral';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'titulo', 'dt' => 0 ),
				
				array( 'db' => 'chamada', 'dt' => 1 ),
				
				
			array(
        'db'        => 'imagem',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
			$imagem=base64_encode( $d );
            return "<img src='data:image/jpeg;base64,$imagem' width='100' height='100'> ";
        }
    ),	
 
		
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.noticiasgeral.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return "<a href='#' onclick='apagar(\"noticiasgeral\",$d)' class='glyphicon glyphicon-remove'></a>";
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
