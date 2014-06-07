<?php

$resp = new stdClass();	
$resp->success = false;

if(isset($_GET['files']) && isset($_GET['id']))
{ 
	$id=$_GET['id'];
	$uploaddir = './uploads/';
	foreach($_FILES as $key => $file)
	{
		$name = $file["name"];
		if($key=="carteira_aluno"){
			$name=$id.".carteira.".end((explode(".", $name)));
		}		
		if(!move_uploaded_file($file['tmp_name'], $uploaddir .$name))
			$resp->success = false;		
	}
}
echo json_encode($resp);

?>