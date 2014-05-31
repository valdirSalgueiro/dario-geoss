
<?php

$table = 'aluno_atividade_desconto';
 
$primaryKey = 'id';
 
$columns = array(    

	array(
        'db'        => 'id',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.aluno_atividade_desconto.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"aluno_atividade_desconto\",$d)' class='glyphicon glyphicon-remove'></a>";
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
