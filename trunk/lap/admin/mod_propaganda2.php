<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_propaganda=$_GET['codigo_propaganda'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_propaganda!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_propaganda="select * from propaganda where codigo_propaganda = '".$codigo_propaganda."';";

 $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

 $campo_propaganda=mysql_fetch_array($res_busca_propaganda);

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

<input type=hidden name=nome_antigo value="<?phpecho $campo_propaganda[nome_propaganda];?>">

<h1><font face=verdana color='#ff9900'><b>Modificar Foto Propaganda:</b></font></h1>
<hr color=black size=2>

<table width="626" border=0 class=fonte>


<tr>
  <td width="200">N&uacute;mero Foto Propaganda:</td>
  <td width="379"><input name=num type=text class=botao id="num" value="<?phpecho $campo_propaganda[nome_propaganda];?>" size=50 maxlength=100></td></tr>


<tr>
  <td>Descri&ccedil;&atilde;o Foto Propaganda:</td>
  <td>

<?php

$oFCKeditor = new FCKeditor('descricao_propaganda');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_propaganda['descricao_propaganda'];

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao><input type=button value=" Foto " class=botao onClick="window.location='mod_foto_propaganda.php?codigo_propaganda=<?phpecho $campo_propaganda[codigo_propaganda];?>';"></td></tr>
</table>

</form>

<?php
$nome_antigo=$_POST['nome_propaganda'];
$nome_propaganda=$_POST['nome_propaganda'];
$descricao_propaganda=$_POST['descricao_propaganda'];

if(($nome_antigo!=NULL)and($nome_propaganda!=NULL)and($descricao_propaganda!=NULL))

{

 if($nome_propaganda!=$nome_antigo)

 {

  $busca_propaganda="select * from propaganda where nome_propaganda = '".$nome_propaganda."';";

  $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

  $num_propaganda=mysql_num_rows($res_busca_propaganda);

  if($num_propaganda>0)

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

 

  $mod_propaganda = "update propaganda set nome_propaganda = '".$nome_propaganda."', codigo_propaganda = '".$nome_propaganda."',descricao_propaganda = '".$descricao_propaganda."' where codigo_propaganda = '".$codigo_propaganda."';";

  $ok=mysql_query($mod_propaganda,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Propaganda $nome_propaganda foi alterada com sucesso.');

   window.location='mod_propaganda2.php?codigo_propaganda=$codigo_propaganda';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Propaganda: $nome_propaganda já existe.');</script>";

 }

}

?>

</body>

</html>

