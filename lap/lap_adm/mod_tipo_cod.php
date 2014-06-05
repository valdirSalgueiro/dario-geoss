<?php

session_start();

include('../estilo.css');


$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

 include('data.php');

 
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<style type="text/css">
<!--
.style1 {color: #000033}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style1"><font face=verdana>Modificar Tipo de C&oacute;digo:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td colspan="2">Clicando em modificar voce torna padr&atilde;o todos os exames no tipo GERAL. </td>
  </tr>


<tr><td width="147"></td><td width="405">&nbsp;</td></tr>

<tr><td></td><td><input type=submit name="modificar" value=' Modificar ' class=botao>
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td></tr>
</table>

</form>

<?php
$modificar=$_POST['modificar'];
$nome="g";


if($modificar!=NULL)

{

 
 

  $mod_noticia = "update exame set tipo_cod = '".$nome."'";
  
  $ok=mysql_query($mod_noticia,$conn);

 

   echo "<script>alert('Todos os exames tiveram o padrão GERAL definido.');

   window.location='index.php';</script>";

 
 }

 

?>

</body>

</html>


