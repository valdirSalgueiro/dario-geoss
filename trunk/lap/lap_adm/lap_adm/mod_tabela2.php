<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_noticia=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_noticia!=NULL))

{

 include('conn.php');

 include('data.php');

 $busca_noticia="select * from tabela where id = '".$codigo_noticia."';";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $campo_noticia=mysql_fetch_array($res_busca_noticia);

 echo mysql_error($conn);

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

<input type=hidden name=nome_antigo value="<?phpecho $campo_noticia[codigo_procedimento];?>">

<h1 class="style1"><font face=verdana>Modificar Tipo de Tabela:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td width="147">Tipo:</td><td width="405"><input name=tipo type=text class=botao id="tipo" value="<?phpecho $campo_noticia[tipo];?>" size=50 maxlength=100></td></tr>

<tr>
  <td>C&oacute;digo Procedimento  : </td>
  <td><input name=codigo_procedimento type=text class=botao id="codigo_procedimento" value="<?phpecho $campo_noticia[codigo_procedimento];?>" size=50 maxlength=100></td>
</tr>

<tr>
  <td>Descri&ccedil;&atilde;o : </td>
  <td><textarea name="descricao" cols="47" rows="4" class="botao" id="descricao"><?phpecho $campo_noticia[descricao];?>
</textarea></td>
</tr>
<tr>
  <td>Valor:</td><td><input name=valor type=text class=botao id="valor" value="<?phpecho $campo_noticia[valor];?>" size=50 maxlength=100></td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao>
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td></tr>
</table>

</form>

<?php
$tipo=$_POST['tipo'];
$nome_antigo=$_POST['codigo_procedimento'];
$codigo_procedimento=$_POST['codigo_procedimento'];
$descricao=$_POST['descricao'];
$valor=$_POST['valor'];

if(($nome_antigo!=NULL)or($tipo!=NULL)or($codigo_procedimento!=NULL)or($descricao!=NULL)or($valor!=NULL))

{

 if($codigo_procedimento!=$nome_antigo)

 {

  $busca_noticia="select * from tabela where codigo_procedimento = '".$codigo_procedimento."';";

  $res_busca_noticia=mysql_query($busca_noticia,$conn);

  $num_noticia=mysql_num_rows($res_busca_noticia);

  if($num_noticia>0)

  {

   $igual=1;

  }

  else

  {

   $igual=0;

  }

 }

 else

 {

  $igual=0;

 }

 if($igual==0)

 {

 

  $mod_noticia = "update tabela set tipo = '".$tipo."',codigo_procedimento = '".$codigo_procedimento."',descricao = '".$descricao."',valor = '".$valor."' where id = '".$codigo_noticia."';";
  
  $ok=mysql_query($mod_noticia,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Tabela $codigo_procedimento foi alterada com sucesso.');

   window.location='mod_tabela2.php?id=$codigo_noticia';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Tabela: $codigo_procedimento já existe.');</script>";

 }

}

?>

</body>

</html>


