<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );
	include_once("class.database.php");

	
	$db = Database::getConnection(); 

	$cod_semaforos = $_REQUEST['cod_semaforos'];

	$semaforos = array();

	$sql = "SELECT id, num_semaforo, lograd_transver
			FROM cad_semaforo
			WHERE lograd_transver like '%$cod_semaforos%'
			ORDER BY lograd_transver";
	$res = $db->query($sql);
	while ( $row = $res->fetch_assoc() ) {
		$semaforos[] = array(
			'cod_semaforos'	=> $row['id'],
			'nome'			=> utf8_encode("[".$row['num_semaforo']."] ".$row['lograd_transver']),
		);
	}

	echo( json_encode( $semaforos ) );