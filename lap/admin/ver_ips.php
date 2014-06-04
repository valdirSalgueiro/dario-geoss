<?
session_start();
$usuario_autenticado=$_SESSION["usuario_autenticado"];
//include ("../whosonline.php");
//include ('../whosonline2.php');
include ('../conn.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
</head>
<?
$consultape3 = mysql_query("SELECT count(user) as total FROM ooz_whosonline") or die(mysql_error());
$tot2 = mysql_result($consultape3,0,"total");
if($tot2=='0'){ echo "Não há usuários online no Portal Sentinela."; } else { 
$consulta = mysql_query("SELECT * FROM ooz_whosonline GROUP BY ip")  or die(mysql_error());

?>
<body>
<p><strong>ACESSOS AO SITE:  </strong><br />
  <br />
  
</p>
<table width="235" border="0" cellpadding="2" cellspacing="2" class="boldamarelo">
  <? 	while($mensagens = mysql_fetch_array($consulta)){   ?>
  <form name="formUsuarios" action="" method="post" id="formUsuarios">
    <tr>
      <td width="56" bgcolor="#DBDAF8"><span class="style1">TimeStamp</span></td>
      <td width="161" bgcolor="#E2E2E2"><? echo date("d-m-Y-H:h",$mensagens['timestamp']); ?> </td>
    </tr>
    <tr>
      <td bgcolor="#DEDBFF"><span class="style1">Usu&aacute;rio</span></td>
      <td bgcolor="#E7E3E7"><? if($mensagens['user']=='guest123'){ echo "Convidado"; } else { echo $mensagens['user']; } ?></td>
    </tr>
    
    <tr>
      <td bgcolor="#DEDBFF"><span class="style1">IP</span></td>
      <td bgcolor="#E7E3E7"><? echo $mensagens['ip']; ?></td>
    </tr>
    <tr>
      <td bgcolor="#DEDBFF"><span class="style1">Arquivo</span></td>
      <td bgcolor="#E7E3E7"><? echo $mensagens['file']; ?><br><br<br<br></td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center"></div></td></tr>
  </form>
  <tr>
    <td colspan="2"></td>
  </tr>
  <? } } ?>
</table>
</body>
</html>
