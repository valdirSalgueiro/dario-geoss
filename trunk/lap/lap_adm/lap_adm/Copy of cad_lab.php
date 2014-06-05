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
</html>
<html>
<link href="estilo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
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
.style7 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana>Cadastrar Laborat&oacute;rio:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>


<tr>
  <td width="174"><span class="style7">Nome do Laborat&oacute;rio  :</span></td>
  <td width="318"><input name=nome type=text class=botao id="nome" size=50 maxlength=50></td></tr>
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
$nome=$_POST['nome'];
$data=mktime();
$por=$_SESSION["usuario_autenticado"];


if($nome!=NULL)

{

 $busca_conv="select * from lab where nome = '".$nome."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

  $cad_conv="insert into lab values ('','".$nome."','".$data."','".$por."');";

  $ok=mysql_query($cad_conv,$conn);

  if($ok==1)

  {

   $busca_conv2="select * from lab where nome = '".$nome."';";

   $res_busca_conv2=mysql_query($busca_conv2,$conn);

   $campo_conv2=mysql_fetch_array($res_busca_conv2);

   echo "<script>alert('Laboratório Cadastrado.');window.location='cad_lab.php?id=$campo_conv2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Laboratório: $nome já está cadastrado.');</script>";

 }

}

?>
  <br>
</p>
<table border=0 class=fonte>
  <tr>
    <td width="494" colspan="2" bgcolor="#333333"><div align="center" class="style4">Laborat&oacute;rios Cadastrados </div>
        <div align="center"></div>
    <div align="center"></div></td>
    <?php
	$sql = "SELECT * FROM lab order by id ASC";
	$result = mysql_query($sql);
	  while($row = mysql_fetch_array($result)) { ?>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><?php print $row['nome']; ?></div></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="2" bgcolor="#333333">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>


