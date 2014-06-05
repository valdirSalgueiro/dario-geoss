<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');
 include('estilo.css');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
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
.style6 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/cadastro_tipo_tabela.gif" width="48" height="48"> Cadastrar Tabelas:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>
<tr>
  <td width="174"><span class="style6">Tipo :</span></td>
  <td width="318"><input name=tipo type=text class=botao id="tipo" size=50 maxlength=50></td></tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><div align="center">
  <input type=submit value=' Cadastrar ' class=por>
  <span class="atributos_titulo">
   <input name="button" type=button class="por" onClick="history.go(-1);" value="Voltar">
  </span></div></td></tr>
</table>
</form>

<p>
  <?php
$tipo=$_POST['tipo'];
$data=mktime();
$por=$_SESSION["usuario_autenticado"];


if($tipo!=NULL)

{

 $busca_conv="select * from tabelas where nome = '".$tipo."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

  $cad_conv="insert into tabelas values ('','".$tipo."','".$data."','".$por."');";

  $ok=mysql_query($cad_conv,$conn);

  if($ok==1)

  {

   $busca_conv2="select * from tabelas where nome = '".$tipo."';";

   $res_busca_conv2=mysql_query($busca_conv2,$conn);

   $campo_conv2=mysql_fetch_array($res_busca_conv2);

   echo "<script>alert('Tipo de Tabela Cadastrado.');window.location='cad_tabelas.php?id=$campo_conv2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Tipo de  Tabela: $tipo já está cadastrado.');</script>";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

