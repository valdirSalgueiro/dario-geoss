
<?php

$table = 'funcionario';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),
				
				array( 'db' => 'cpf', 'dt' => 1 ),
				
				array( 'db' => 'rg', 'dt' => 2 ),
				
				array( 'db' => 'titulo', 'dt' => 3 ),
				
				array( 'db' => 'endereco', 'dt' => 4 ),
				
				array( 'db' => 'telefone', 'dt' => 5 ),
				
				array( 'db' => 'remuneracao', 'dt' => 6 ),
				
	array(
        'db'        => 'id',
        'dt'        => 7,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.funcionario.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"funcionario\",$d)' class='glyphicon glyphicon-remove'></a>";
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
