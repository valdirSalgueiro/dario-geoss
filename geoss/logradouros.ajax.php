<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );
	include_once("class.database.php");

	
	$db = Database::getConnection(); 

	$cod_logradouros = $_REQUEST['cod_logradouros'];

	$logradouros = array();

	$sql = "SELECT id, lograd_nome
			FROM cad_logradouro
			WHERE idx_bai=$cod_logradouros
			ORDER BY lograd_nome";
	$res = $db->query($sql);
	while ( $row = $res->fetch_assoc() ) {
		$logradouros[] = array(
			'cod_logradouros'	=> $row['id'],
			'nome'			=> utf8_encode($row['lograd_nome']),
		);
	}

	echo( json_encode( $logradouros ) );