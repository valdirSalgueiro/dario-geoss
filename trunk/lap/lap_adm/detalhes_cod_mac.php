<?php

session_start();

$id=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($id!=NULL))

{
 include('estiloc.css');
 include('conn.php');
 include('data.php');

 $busca_cod="select * from codigo_mac where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>

<html>
<link href="estilo.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<body>

<form name=form1 method=post>

<h1 class="style1"><font face=verdana><?php echo $campo_cod[codigo]; ?></font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>
<tr><td width="94"><div align="left">Descri&ccedil;&atilde;o:</div></td>
  <td width="475"><?php echo $campo_cod[descricao]; ?> </td>
</tr>
</table>

<br>
<input type=button value=" Voltar " class=botao onClick="history.go(-2);";>
</form>

</body>

</html>

