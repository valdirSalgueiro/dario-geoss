<?php

$resp = new stdClass();	
$resp->success = false;

if(isset($_GET['files']) && isset($_GET['id']))
{ 
	$id=$_GET['id'];
	$uploaddir = './uploads/';
	var_dump($_FILES);
	foreach($_FILES as $key => $file)
	{
		$name = $file["name"];
		echo $key;
		if($key==0){
			$name=$id.".foto.".end((explode(".", $name)));
		}		
		if($key==1){
			$name=$id.".carteira.".end((explode(".", $name)));
		}
		if(!move_uploaded_file($file['tmp_name'], $uploaddir .$name))
			$resp->success = false;		
	}
}
echo json_encode($resp);

?>