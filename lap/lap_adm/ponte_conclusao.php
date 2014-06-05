<?php
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];
include "conn.php";
include "caracteres.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

if($_GET['codigo_conc']!=NULL){

$sql2="select * from codigo_conc where id  = ".$_GET['codigo_conc']."";
$result2=mysql_query($sql2);
$row2=mysql_fetch_array($result2);
	
$campo_ex['conclusao'] = $row2['descricao'];
if($_SESSION["codigo_conc"]==''){
$nbsp= "&nbsp;";
$_SESSION["codigo_conc"]= "$nbsp $campo_ex[conclusao]";

} else {

$nbsp= "&nbsp;";
$_SESSION["codigo_conc"]= "$_SESSION[codigo_conc] $nbsp $campo_ex[conclusao]";
}
?>
<script>
alert('Adicionando código.')
window.opener.location = '<?php echo "laudos.php?id=$_GET[id]" ?>';
window.close();
</script>
<?php
}
?>
<body>
</body>
</html>
