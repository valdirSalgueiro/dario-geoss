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

if($_GET['codigo_mic']!=NULL){

$sql2="select * from codigo where id  = ".$_GET['codigo_mic']."";
$result2=mysql_query($sql2);
$row2=mysql_fetch_array($result2);
	
$campo_ex['microscopia'] = $row2['descricao'];
if($_SESSION["microscopia"]==''){
$nbsp= "&nbsp;";
$_SESSION["microscopia"]= "$nbsp $campo_ex[microscopia]";

} else {

$nbsp= "&nbsp;";
$_SESSION["microscopia"]= "$_SESSION[microscopia] $nbsp $campo_ex[microscopia]";
}
?>
<script>
alert('Adicionando c�digo.')
window.opener.location = '<?php echo "laudos.php?id=$_GET[id]" ?>';
window.close();
</script>
<?php
}
?>
<body>
</body>
</html>
