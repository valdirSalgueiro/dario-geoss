<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_foto_dia=$_GET['codigo_foto_dia'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_foto_dia!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_foto_dia="select * from foto_dia where codigo_foto_dia = '".$codigo_foto_dia."';";

 $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

 $campo_foto_dia=mysql_fetch_array($res_busca_foto_dia);

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

<body class=fonte>

<form name=form1 method=post>

<input type=hidden name=nome_antigo value="<?phpecho $campo_foto_dia[nome_foto_dia];?>">

<h1><font face=verdana color='#ff9900'><b>Modificar Foto do Dia:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td width="147">T&iacute;tulo Foto do Dia:</td>
  <td width="405"><input name=nome_foto_dia type=text class=botao id="nome_foto_dia" value="<?phpecho $campo_foto_dia[nome_foto_dia];?>" size=50 maxlength=100></td></tr>


<tr>
  <td>Descri&ccedil;&atilde;o Foto do Dia:</td>
  <td>

<?php

$oFCKeditor = new FCKeditor('descricao_foto_dia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_foto_dia['descricao_foto_dia'];

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao><input type=button value=" Foto " class=botao onClick="window.location='mod_foto_foto_dia.php?codigo_foto_dia=<?phpecho $campo_foto_dia[codigo_foto_dia];?>';"></td></tr>
</table>

</form>

<?php
$nome_antigo=$_POST['nome_foto_dia'];
$nome_foto_dia=$_POST['nome_foto_dia'];
$descricao_foto_dia=$_POST['descricao_foto_dia'];

if(($nome_antigo!=NULL)and($nome_foto_dia!=NULL)and($descricao_foto_dia!=NULL))

{

 if($nome_foto_dia!=$nome_antigo)

 {

  $busca_foto_dia="select * from foto_dia where nome_foto_dia = '".$nome_foto_dia."';";

  $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

  $num_foto_dia=mysql_num_rows($res_busca_foto_dia);

  if($num_foto_dia>0)

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

 

  $mod_foto_dia = "update foto_dia set nome_foto_dia = '".$nome_foto_dia."',descricao_foto_dia = '".$descricao_foto_dia."' where codigo_foto_dia = '".$codigo_foto_dia."';";

  $ok=mysql_query($mod_foto_dia,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Foto do Dia $nome_foto_dia foi alterada com sucesso.');

   window.location='mod_foto_dia2.php?codigo_foto_dia=$codigo_foto_dia';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A foto do dia: $nome_foto_dia já existe.');</script>";

 }

}

?>

</body>

</html>

