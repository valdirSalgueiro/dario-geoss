
<?php

include_once("class.database.php");

$db = Database::getDb(); 


$table = 'telefone_aluno';
 
$primaryKey = 'id';
 
$columns = array(    

	array(
        'db'        => 'id',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.telefone_aluno.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 1,
        'formatter' => function( $d, $row ) {
            return "<a href='javascript:apagar(\"telefone_aluno\",$d)' class='glyphicon glyphicon-remove'></a>";
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
