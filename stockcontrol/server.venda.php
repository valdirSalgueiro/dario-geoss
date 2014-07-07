
<?php

include_once("class.database.php");
include_once("class.produto.php");
include_once("class.pedido.php");

$db = Database::getDb(); 

$tableAjax=$_REQUEST["tableAjax"];
$table = 'viewvenda';
 
$primaryKey = 'id';
 
$columns = array(    
array(
        'db'        => 'id',
        'dt'        => 0,
        'formatter' => function( $d, $row ){
			$pedido=new pedido();
			$pedido->select($d);
			$produto=new produto();
			$produto->select($pedido->idx_produto);			
			$nome=$produto->codigo."_".$produto->nome;
            return $nome;
        }
    ),

				array( 'db' => 'quantidade', 'dt' => 1 ),
				
				array( 'db' => 'valor', 'dt' => 2 ),
				
				array( 'db' => 'data', 'dt' => 3 ),
				
				array( 'db' => 'cliente', 'dt' => 4 ),
				
	array(
        'db'        => 'id',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return "<a href='cad.venda.php?id=$d' class='glyphicon glyphicon-edit'></a>";
        }
    ),	
	
	array(
        'db'        => 'id',
        'dt'        => 6,
        'formatter' => function( $d, $row ) use( $tableAjax) {
            return "<a href='#' onclick='apagar(\"pedido\",$d,\"$tableAjax\")' class='glyphicon glyphicon-remove'></a>";
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
