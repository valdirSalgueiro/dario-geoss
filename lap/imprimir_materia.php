<?php
include "conn.php";
	$id = $_GET['id'];
	$consulta = mysql_query("SELECT * FROM noticias WHERE codigo_noticia = '".$id."'") or die(mysql_error());
	$materias = mysql_fetch_array($consulta);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<link href="responsa.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
background-color:#FFFFFF;
}
</style>
</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td style="border:2px #CCCCCC dashed; padding:0px;" class="email_materia" align="center">
	<img src="arquivos/2.jpg" width="543" height="92" border="0" />	</td>
  </tr>
  <tr>
    <td width="506" style="border:2px #EAEAEA dotted; padding-top:20px;"><img src="images/ico_meus_documentos.gif" width="36" height="36" align="left" /> <span class="titulo">
      <?php=$materias['nome_noticia'] ?>
      </span><br />
      <?php=$materias['data_cadastro'] ?>
      &nbsp;&nbsp;<img src="images/ico_relogio.gif" align="absbottom" />
      <?php=$materias['hora_cadastro'] ?>
      <br />    </td>
  </tr>
  <?php if ($materias['fotografo_materia'] != "") {?>
  <tr>
    <td valign="top" class="legenda_foto" align="center" style="padding-top:15px; padding:5px; border:2px #EAEAEA dotted;"><table width="100" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right">Foto:
          <?php=$materias['fotografo_materia'] ?>        </td>
      </tr>
      <tr>
        <td align="center"><span class="legenda_foto" style="padding-top:15px;"><img src="images/materias/<?php=$materias['foto_materia'] ?>" border="2" /></span></td>
      </tr>
      <tr>
        <td align="center"><?php=$materias['legenda_foto_materia'] ?></td>
      </tr>
    </table>
        </div></td>
  </tr>
  <?php } ?>
  <tr>
    <td valign="top" style="padding-top:15px; padding:5px; border:2px #EAEAEA dotted;" class="materia"><div align="justify">
      <?php=$materias['descricao_noticia'] ?>
    </div></td>
  </tr>
  <tr>
    <td height="25" background="images/site_divisao_materia.gif" style="padding-left:5px; padding-right:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="21%" class="por">por
          <?php=$materias['por']?></td>
        <td width="79%" align="right"><strong>|</strong> <a href="http://www.portalsentinela.com" target="_blank" class="l_menu_materia">www.portalsentinela.com</a><a href="http://www.portalsentinela.com" class="l_menu_materia"></a> <strong>|</strong> </td>
      </tr>
    </table></td>
  </tr>
</table>
<div align="center">
  <script>
window.print();
</script>
</div>
</body>
</html>
