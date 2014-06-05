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
//Tamanho das fotos
 $busca_config="SELECT * FROM configuracoes WHERE id = '1'";
 $res_busca_config=mysql_query($busca_config,$conn);
 $num_config=mysql_num_rows($res_busca_config);
 $campo_config=mysql_fetch_array($res_busca_config);
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

<h1 class="style3"><font face=verdana><img src="images/cadastro_tipo_tabela.gif" width="48" height="48"> Cadastrar tamanho das fotos:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>
<tr>
  <td width="174"><span class="style6">Largura :</span></td>
  <td width="318"><input name=width value=<?php=$campo_config[width]?> type=text class=botao id="width" size=50 maxlength=50></td></tr>
<tr>
<tr>
  <td width="174"><span class="style6">Altura :</span></td>
  <td width="318"><input name=height value=<?php=$campo_config[height]?> type=text class=botao id="height" size=50 maxlength=50></td></tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><div align="center">
  <input type=submit name=cadastrar id=cadastrar value=' Cadastrar ' class=por>
  <span class="atributos_titulo">
   <input name="button" type=button class="por" onClick="history.go(-1);" value="Voltar">
  </span></div></td></tr>
</table>
</form>

<p>
  <?php
$tipo=$_POST['cadastrar'];
$data=mktime();
$por=$_SESSION["usuario_autenticado"];


if($tipo!=NULL)

{

 $busca_conv="select * from tabelas where nome = '".$tipo."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

 

  $mod_noticia = "update configuracoes set width = '".$_POST['width']."',height = '".$_POST['height']."' where id = '1';";
  
  $ok=mysql_query($mod_noticia,$conn);

  if($ok==1)

  {

  
   echo "<script>alert('Tamanho das fotos definido com suceso.');window.location='tamanho.php';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }


}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

