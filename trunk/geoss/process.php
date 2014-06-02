<?php

// DB table to use
$table = 'cad_vistoria';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'idx_semaforo', 'dt' => 0 ),
    array( 'db' => 'idx_cad_os',  'dt' => 1 ),
	array(
        'db'        => 'id',
        'dt'        => 2,
        'formatter' => function( $d, $row ) {
            return "<a href=\"cadvistoria.php?id=$d\" class=\"glyphicon glyphicon-edit\"></a>";
        }
    ),	
	array(
        'db'        => 'id',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return "<a href=\"javascript:apagar(\"vistoria\",$d)\" class=\"glyphicon glyphicon-remove\"></a>";
        }
    ),	
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    //'pass' => 'dariojmc',
	'pass' => '',
    'db'   => 'geoss',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);