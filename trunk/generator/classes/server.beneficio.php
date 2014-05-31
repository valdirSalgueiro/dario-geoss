
<?php

$table = 'beneficio';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),
				
				array( 'db' => 'valor', 'dt' => 1 ),
				
	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.beneficio.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"beneficio\",$d)' class='glyphicon glyphicon-remove'></a>";
        }
    ),
	
);
 
$sql_details = array(
    'user' => 'root',
	'pass' => '',
    'db'   => 'all4kids',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>
