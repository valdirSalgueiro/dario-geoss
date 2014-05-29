<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );
	include_once("class.database.php");

	
	$db = Database::getConnection(); 

	$cod_bairros = $_REQUEST['cod_bairros'];

	$bairros = array();

	$sql = "SELECT id, bai_nome
			FROM cad_bairro
			WHERE idx_cid=$cod_bairros
			ORDER BY bai_nome";
	$res = $db->query($sql);
	while ( $row = $res->fetch_assoc() ) {
		$bairros[] = array(
			'cod_bairros'	=> $row['id'],
			'nome'			=> utf8_encode($row['bai_nome']),
		);
	}

	echo( json_encode( $bairros ) );