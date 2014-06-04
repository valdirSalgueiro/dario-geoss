<?php require_once('Connections/conn.php'); ?>
<?php
$data = $_GET['data'];
$data = addslashes($data);
mysql_select_db($database_conn, $conn);
$query_rs_evento = "SELECT * FROM compromisso WHERE compromisso.`data` = '".$data."'";
$rs_evento = mysql_query($query_rs_evento, $conn) or die(mysql_error());
$row_rs_evento = mysql_fetch_assoc($rs_evento);
$totalRows_rs_evento = mysql_num_rows($rs_evento);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Evento do dia <?php $dt = explode('-', $row_rs_evento['data']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></title>
<link href="admin/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style7 {font-size: 10px; font-family: verdana, sans-serif; font-weight: bold; }
.style8 {font-family: verdana, sans-serif; font-size: 10px;}
-->
</style></head>

<body>
<table width="452" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" background="imgs/fundo_top.jpg"><div align="center" class="style1">Evento do dia: <?php $dt = explode('-', $row_rs_evento['data']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></div></td>
  </tr>
  <tr>
    <td height="492" valign="top" background="imgs/fundo.jpg"><table width="92%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" colspan="2"><span class="style7">Evento:</span><span class="style8"> <?php echo $row_rs_evento['titulo']; ?></span></td>
        </tr>
      <tr>
        <td height="20" colspan="2"><span class="style7">Horario: </span><span class="style8"><?php echo $row_rs_evento['hora']; ?></span></td>
        </tr>
      <tr>
        <td width="18%" height="20" class="style7">Descri&ccedil;&atilde;o:</td>
        <td width="82%" height="20" valign="top" class="style7">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" colspan="2" class="style8"><?php echo $row_rs_evento['compromisso']; ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1"><img src="imgs/fundo_button.jpg" width="669" height="9" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_evento);
?>
