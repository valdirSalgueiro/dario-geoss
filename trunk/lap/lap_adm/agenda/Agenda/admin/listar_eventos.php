<?php require_once('../Connections/conn.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$data = $_GET['data'];
$data = addslashes($data);
$maxRows_rs_evento = 15;
$pageNum_rs_evento = 0;
if (isset($_GET['pageNum_rs_evento'])) {
  $pageNum_rs_evento = $_GET['pageNum_rs_evento'];
}
$startRow_rs_evento = $pageNum_rs_evento * $maxRows_rs_evento;

mysql_select_db($database_conn, $conn);
$query_rs_evento = "SELECT * FROM compromisso ORDER BY `data` DESC";
$query_limit_rs_evento = sprintf("%s LIMIT %d, %d", $query_rs_evento, $startRow_rs_evento, $maxRows_rs_evento);
$rs_evento = mysql_query($query_limit_rs_evento, $conn) or die(mysql_error());
$row_rs_evento = mysql_fetch_assoc($rs_evento);

if (isset($_GET['totalRows_rs_evento'])) {
  $totalRows_rs_evento = $_GET['totalRows_rs_evento'];
} else {
  $all_rs_evento = mysql_query($query_rs_evento);
  $totalRows_rs_evento = mysql_num_rows($all_rs_evento);
}
$totalPages_rs_evento = ceil($totalRows_rs_evento/$maxRows_rs_evento)-1;

$queryString_rs_evento = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs_evento") == false && 
        stristr($param, "totalRows_rs_evento") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs_evento = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs_evento = sprintf("&totalRows_rs_evento=%d%s", $totalRows_rs_evento, $queryString_rs_evento);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listando Eventos</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
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
.style9 {color: #FF0000}
-->
</style></head>

<body>
<table width="452" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" background="../imgs/fundo_top.jpg"><div align="center" class="style1">Listando Eventos </div></td>
  </tr>
  <tr>
    <td height="492" valign="top" background="../imgs/fundo.jpg"><div align="center">[ <a href="add_evento.php" class="style7">Incluir Evento</a>]
        <?php if ($totalRows_rs_evento > 0) { // Show if recordset not empty ?>
          <span class="style8"><br />
          Listando <span class="style9"><?php echo ($startRow_rs_evento + 1) ?></span> at&eacute; <span class="style9"><?php echo min($startRow_rs_evento + $maxRows_rs_evento, $totalRows_rs_evento) ?></span> de <span class="style9"><?php echo $totalRows_rs_evento ?></span>&nbsp; totais</span><br />
          <?php do { ?>
            <table width="92%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="57%" height="20" bgcolor="#f2f2f2"><div align="left"><span class="style7">Evento: </span><span class="style8"><?php echo $row_rs_evento['titulo']; ?> </span></div></td>
                <td width="25%" bgcolor="#f2f2f2"><span class="style7">Data: </span><span class="style8"><?php $dt = explode('-', $row_rs_evento['data']);  echo $dt[2]."/".$dt[1]."/".$dt[0];?></span></td>
                <td width="18%" bgcolor="#f2f2f2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="50%"><div align="center"><a href="edit_evento.php?id=<?php echo $row_rs_evento['id']; ?>"><img src="../imgs/editar.gif" width="16" height="16" border="0" /></a></div></td>
                      <td><div align="center"><a href="del_evento.php?id=<?php echo $row_rs_evento['id']; ?>"><img src="../imgs/exclur.gif" width="16" height="16" border="0" /></a></div></td>
                    </tr>
                      
                      </table></td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              </table>
            <?php } while ($row_rs_evento = mysql_fetch_assoc($rs_evento)); ?>
          <table border="0" width="50%" align="center">
            <tr>
              <td width="23%" align="center"><?php if ($pageNum_rs_evento > 0) {  ?>
                <a href="<?php printf("%s?pageNum_rs_evento=%d%s", $currentPage, 0, $queryString_rs_evento); ?>"><img src="../imgs/First.gif" border=0></a>
                <?php }?>          </td>
              <td width="31%" align="center"><?php if ($pageNum_rs_evento > 0) { ?>
                <a href="<?php printf("%s?pageNum_rs_evento=%d%s", $currentPage, max(0, $pageNum_rs_evento - 1), $queryString_rs_evento); ?>"><img src="../imgs/Previous.gif" border=0></a>
                <?php }?>          </td>
              <td width="23%" align="center"><?php if ($pageNum_rs_evento < $totalPages_rs_evento) { ?>
                <a href="<?php printf("%s?pageNum_rs_evento=%d%s", $currentPage, min($totalPages_rs_evento, $pageNum_rs_evento + 1), $queryString_rs_evento); ?>"><img src="../imgs/Next.gif" border=0></a>
                <?php }?>          </td>
              <td width="23%" align="center"><?php if ($pageNum_rs_evento < $totalPages_rs_evento) { ?>
                <a href="<?php printf("%s?pageNum_rs_evento=%d%s", $currentPage, $totalPages_rs_evento, $queryString_rs_evento); ?>"><img src="../imgs/Last.gif" border=0></a>
                <?php }?>          </td>
            </tr>
          </table>
          <?php } // Show if recordset not empty ?>
    </div></td>
  </tr>
  <tr>
    <td height="1"><img src="../imgs/fundo_button.jpg" width="669" height="9" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_evento);
?>
