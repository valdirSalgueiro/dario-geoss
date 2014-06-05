<?php
include "../conn.php";
$consulta = mysql_query("SELECT * FROM denuncia") or die(mysql_error());

if ($_GET['ativar_id_cmt']) {
	mysql_query("UPDATE denuncia SET ativado = 0 WHERE id_cmt = '".$_GET['ativar_id_cmt']."'");
	echo "<script> window.location.href = 'exibir_denuncie.php'; </script>";
} 
 
if ($_GET['desativar_id_cmt']) {
	mysql_query("UPDATE denuncia SET ativado = 1 WHERE id_cmt = '".$_GET['desativar_id_cmt']."'");
	echo "<script> window.location.href = 'exibir_denuncie.php'; </script>"; 
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ativar / Desativar denuncia</title>
</head>

<body>
</body>
</html>

<table width="500" border="0" cellpadding="2" cellspacing="2" class="boldamarelo">
<form name="ativar_form" method="post">
  <?php 	while($mensagens = mysql_fetch_array($consulta)){ ?>
  <tr>
    <td width="56" bgcolor="#DBDAF8">Código Denuncia</td>
    <td width="128" bgcolor="#E2E2E2"><?php echo $mensagens['id_cmt']; ?> </td>
  </tr>
  <tr>
    <td bgcolor="#DEDBFF">Nome</td>
    <td bgcolor="#E7E3E7"><?php echo $mensagens['nome_cmt']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#DEDBFF">Denuncia</td>
    <td bgcolor="#E7E3E7"><b><?php echo $mensagens['texto_cmt']; ?></b></td>
  </tr>
  <tr>
    <td bgcolor="#DEDBFF">Data de Envio</td>
    <td bgcolor="#E7E3E7"><?php echo $mensagens['data_cmt']; ?>-<?php echo $mensagens['hora_cmt']; ?></td>
  </tr>
   <tr>
    <td bgcolor="#DEDBFF">Status</td>
    <td bgcolor="#E7E3E7"><?php if ($mensagens['ativado']==1) { echo "desativado"; } else { echo "ativado";} ?></td>
  </tr>
  <tr>  
    <input name="id_cmt" id="id_cmt" type="hidden" value="<?php=$mensagens['id_cmt']; ?>">
  <td colspan="2">
    <input name="deletar" type="button" class="botao" id="deletar" value="DELETAR" <?php if ($mensagens['tipo'] == 1){ echo "disabled";}?>  onClick="javascript:location.href = 'deletar_denuncie.php?id_cmt=<?php=$mensagens['id_cmt']; ?>'"/> 
 <?php
if ($mensagens['ativado']==1) {
?>
  <input name="ativar" type="button" class="botao" id="ativar" value="Ativar" onClick="javascript:location.href = 'exibir_denuncie.php?ativar_id_cmt=<?php=$mensagens['id_cmt']; ?>'"/>
<?php
} elseif ($mensagens['ativado']==0) {
?>
  <input name="desativar" type="button" class="botao" id="desativar" value="Desativar" onClick="javascript:location.href = 'exibir_denuncie.php?desativar_id_cmt=<?php=$mensagens['id_cmt']; ?>'"/>
<?php } ?>
 </td>
  </tr>
  </form>
<?php } ?>
</table>