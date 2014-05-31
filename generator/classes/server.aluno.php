
<?php

$table = 'aluno';
 
$primaryKey = 'id';
 
$columns = array(    

				array( 'db' => 'nome', 'dt' => 0 ),
				
				array( 'db' => 'nome_mae', 'dt' => 1 ),
				
				array( 'db' => 'nome_pai', 'dt' => 2 ),
				
				array( 'db' => 'responsavel_nome', 'dt' => 3 ),
				
				array( 'db' => 'responsavel_cpf', 'dt' => 4 ),
				
				array( 'db' => 'responsavel_rg', 'dt' => 5 ),
				
				array( 'db' => 'endereco', 'dt' => 6 ),
				
				array( 'db' => 'idade', 'dt' => 7 ),
				
				array( 'db' => 'data_nasc', 'dt' => 8 ),
				
	array(
        'db'        => 'id',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.aluno.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 10,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"aluno\",$d)' class='glyphicon glyphicon-remove'></a>";
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
