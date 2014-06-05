<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 include('caracteres.php');
 include('conn.php');
 include('estilo.css');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}
$desc=$row['codigo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
	<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style4 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style9 {font-size: 12px}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/itens de exame.gif" width="48" height="48"> C&oacute;digos Conclusão:</font></h1>
<hr color=black size=2>
<br>
<script language="javascript">
function submitar(){
document.form1.submit();
}

</script>
Palavra-Chave : 
<input name="chave" type="text" id="chave">
<input name="buscar" type="submit" id="buscar" value="Buscar">
</form>

<p>
 </p>

<table border=0 class=fonte>
  <tr>
    <td width="647" colspan="2" bgcolor="#000033"><div align="center" class="style4">C&oacute;digos <?php echo $_POST['tipo']; ?></div>
        <div align="center"></div>
    <div align="center"></div></td>
    <?php
	if($_POST['buscar']==NULL){
	$sql = "SELECT * FROM codigo_conc  order by id ASC";
	$result = mysql_query($sql);
	} else {
	$sql = "SELECT * FROM codigo_conc WHERE codigo like '%".$_POST['chave']."%'  order by id ASC";
	$result = mysql_query($sql);
	}
	   ?>
  </tr>
  <tr>
    <td colspan="2"><table width="649" border="1">
      <tr>
        <td width="53" class="style10">C&oacute;digo</td>
        <td width="89" class="style10">Palavra-Chave</td>
        <td width="403" class="style10">Descri&ccedil;&atilde;o</td>
        <td width="76" class="style10"><div align="center">Adicionar ? </div></td>
      </tr><?php  while($row = mysql_fetch_array($result)) { ?>
      <tr>
        <td class="atributos_titulo style9"><?php print $row['id']; ?></td>
        <td class="atributos_titulo style9"><?php print $row['codigo']; ?></td>
        <td class="atributos_titulo style9"><?php print $row['descricao']; ?></td>
        <td class="atributos_titulo style9"><div align="center"><a href="ponte_conclusao.php?id=<?php echo $_GET['id'];?>&&codigo_conc=<?php echo $row['id']; ?>"><img src="images/chk_on.gif" width="19" height="20" border="0"></a></div></td>  <?php } ?>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>
<?php
if($_POST['sim']){
?>
<script>
window.opener.location = '<?php echo "laudos.php?codigo_noticia=$_GET[id]" ?>';
window.close();
</script>
<?php
}
?>
