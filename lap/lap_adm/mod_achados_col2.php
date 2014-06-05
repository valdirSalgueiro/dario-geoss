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

 $busca_noticia="select * from achados_colposcopicos where id = '".$codigo_noticia."';";

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

<input type=hidden name=nome_antigo value="<?phpecho $campo_noticia[codigo];?>">

<h1 class="style1"><font face=verdana>Modificar Achados Colposc&oacute;picos:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td width="147">C&oacute;digo  : </td>
  <td width="405"><input name=codigo type=text class=botao id="codigo" value="<?phpecho $campo_noticia[codigo];?>" size=50 maxlength=100></td>
</tr>

<tr>
  <td>Descri&ccedil;&atilde;o : </td>
  <td><textarea name="descricao" cols="47" rows="4" class="botao" id="descricao"><?phpecho $campo_noticia[descricao];?>
</textarea></td>
</tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao>
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td></tr>
</table>

</form>

<?php
$nome_antigo=$_POST['codigo'];
$codigo_procedimento=$_POST['codigo'];
$descricao=$_POST['descricao'];

if(($nome_antigo!=NULL)or($tipo!=NULL)or($codigo_procedimento!=NULL)or($descricao!=NULL)or($valor!=NULL))

{

 if($codigo_procedimento!=$nome_antigo)

 {

  $busca_noticia="select * from achados_colposcopicos where codigo = '".$codigo_procedimento."';";

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

 

  $mod_noticia = "update achados_colposcopicos set codigo = '".$codigo_procedimento."',descricao = '".$descricao."' where id = '".$codigo_noticia."';";
  
  $ok=mysql_query($mod_noticia,$conn);

  if($ok==1)

  {

   echo "<script>alert('O Achado Colposcópico $codigo_procedimento foi alterado com sucesso.');

   window.location='mod_achados_col2.php?id=$codigo_noticia';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Achado Colposcópico : $codigo_procedimento já existe.');</script>";

 }

}

?>

</body>

</html>


