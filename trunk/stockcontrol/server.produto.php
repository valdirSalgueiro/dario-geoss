
<?php

include_once("class.database.php");

$db = Database::getDb(); 

$tableAjax=$_REQUEST["tableAjax"];
$table = 'produto';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'codigo', 'dt' => 0 ),
				
				array( 'db' => 'nome', 'dt' => 1 ),
				
				array( 'db' => 'quantidade', 'dt' => 2 ),
				
				array( 'db' => 'valor', 'dt' => 3 ),
				
	array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function( $d, $row ) use( $tableAjax){
            return "<a href='cad.produto.php?id=$d' class='glyphicon glyphicon-edit'></a>";
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
