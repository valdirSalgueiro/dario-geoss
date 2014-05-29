<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );
	include_once("class.database.php");

	
	$db = Database::getConnection(); 

	$cod_estados = $_REQUEST['cod_estados'];

	$cidades = array();

	$sql = "SELECT id, cid_nome
			FROM cad_cidade
			WHERE idx_uf=$cod_estados
			ORDER BY cid_nome";
	$res = $db->query($sql);
	while ( $row = $res->fetch_assoc() ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['id'],
			'nome'			=> utf8_encode($row['cid_nome']),
		);
	}

	echo( json_encode( $cidades ) );