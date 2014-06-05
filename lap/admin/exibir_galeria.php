<?php
include "../conn.php";
$consulta = mysql_query("SELECT * FROM galerias") or die(mysql_error());

if ($_GET['ativar_codigo_galeria']) {
	mysql_query("UPDATE galerias SET ativado = 0 WHERE codigo_galeria = '".$_GET['ativar_codigo_galeria']."'");
	echo "<script> window.location.href = 'exibir_galeria.php'; </script>";
} 
 
if ($_GET['desativar_codigo_galeria']) {
	mysql_query("UPDATE galerias SET ativado = 1 WHERE codigo_galeria = '".$_GET['desativar_codigo_galeria']."'");
	echo "<script> window.location.href = 'exibir_galeria.php'; </script>"; 
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ativar / Desativar Galeria de Fotos</title>
</head>

<body>
</body>
</html>

<table width="200" border="0" cellpadding="2" cellspacing="2" class="boldamarelo">
<form name="ativar_form" method="post">
  <?php 	while($mensagens = mysql_fetch_array($consulta)){ ?>
  <tr>
    <td width="56" bgcolor="#DBDAF8">Código Galeria</td>
    <td width="128" bgcolor="#E2E2E2"><?php echo $mensagens['codigo_galeria']; ?> </td>
  </tr>
  <tr>
    <td bgcolor="#DEDBFF">Título Galeria</td>
    <td bgcolor="#E7E3E7"><?php echo $mensagens['nome_galeria']; ?></td>
  </tr>
   <tr>
    <td bgcolor="#DEDBFF">Status</td>
    <td bgcolor="#E7E3E7"><?php if ($mensagens['ativado']==1) { echo "desativado"; } else { echo "ativado";} ?></td>
  </tr>
  <tr>  
    <input name="codigo_galeria" id="codigo_galeria" type="hidden" value="<?php=$mensagens['codigo_galeria']; ?>">
  <td colspan="2">
 <?php
if ($mensagens['ativado']==1) {
?>
  <input name="ativar" type="button" class="botao" id="ativar" value="Ativar" onClick="javascript:location.href = 'exibir_galeria.php?ativar_codigo_galeria=<?php=$mensagens['codigo_galeria']; ?>'"/>
<?php
} elseif ($mensagens['ativado']==0) {
?>
  <input name="desativar" type="button" class="botao" id="desativar" value="Desativar" onClick="javascript:location.href = 'exibir_galeria.php?desativar_codigo_galeria=<?php=$mensagens['codigo_galeria']; ?>'"/>
<?php } ?>
 </td>
  </tr>
  </form>
<?php } ?>
</table>