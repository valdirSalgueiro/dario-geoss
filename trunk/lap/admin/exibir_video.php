<?php
include "../conn.php";
$consulta = mysql_query("SELECT * FROM videos") or die(mysql_error());

if ($_GET['ativar_codigo_video']) {
	mysql_query("UPDATE videos SET ativado = 0 WHERE codigo_video = '".$_GET['ativar_codigo_video']."'");
	echo "<script> window.location.href = 'exibir_video.php'; </script>";
} 
 
if ($_GET['desativar_codigo_video']) {
	mysql_query("UPDATE videos SET ativado = 1 WHERE codigo_video = '".$_GET['desativar_codigo_video']."'");
	echo "<script> window.location.href = 'exibir_video.php'; </script>"; 
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ativar / Desativar V&iacute;deos</title>
</head>

<body>
</body>
</html>

<table width="200" border="0" cellpadding="2" cellspacing="2" class="boldamarelo">
<form name="ativar_form" method="post">
  <? 	while($mensagens = mysql_fetch_array($consulta)){ ?>
  <tr>
    <td width="56" bgcolor="#DBDAF8">Código Vídeo</td>
    <td width="128" bgcolor="#E2E2E2"><? echo $mensagens['codigo_video']; ?> </td>
  </tr>
  <tr>
    <td bgcolor="#DEDBFF">Título Vídeo</td>
    <td bgcolor="#E7E3E7"><? echo $mensagens['nome_video']; ?></td>
  </tr>
   <tr>
    <td bgcolor="#DEDBFF">Status</td>
    <td bgcolor="#E7E3E7"><? if ($mensagens['ativado']==1) { echo "desativado"; } else { echo "ativado";} ?></td>
  </tr>
  <tr>  
    <input name="codigo_video" id="codigo_video" type="hidden" value="<?=$mensagens['codigo_video']; ?>">
  <td colspan="2">
 <?
if ($mensagens['ativado']==1) {
?>
  <input name="ativar" type="button" class="botao" id="ativar" value="Ativar" onClick="javascript:location.href = 'exibir_video.php?ativar_codigo_video=<?=$mensagens['codigo_video']; ?>'"/>
<?
} elseif ($mensagens['ativado']==0) {
?>
  <input name="desativar" type="button" class="botao" id="desativar" value="Desativar" onClick="javascript:location.href = 'exibir_video.php?desativar_codigo_video=<?=$mensagens['codigo_video']; ?>'"/>
<? } ?>
 </td>
  </tr>
  </form>
<? } ?>
</table>