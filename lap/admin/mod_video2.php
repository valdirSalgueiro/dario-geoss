<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_video=$_GET['codigo_video'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_video!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_video="select * from videos where codigo_video = '".$codigo_video."';";

 $res_busca_video=mysql_query($busca_video,$conn);

 $campo_video=mysql_fetch_array($res_busca_video);

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

<input type=hidden name=nome_antigo value="<?phpecho $campo_video[nome_video];?>">

<h1><font face=verdana color='#ff9900'><b>Modificar Video:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td width="147">T&iacute;tulo Video:</td><td width="405"><input name=nome_video type=text class=botao id="nome_video" value="<?phpecho $campo_video[nome_video];?>" size=50 maxlength=100></td></tr>

<tr>
  <td>Descri&ccedil;&atilde;o Video : </td>
  <td><input name=desc_video type=text class=botao id="desc_video" value="<?phpecho $campo_video[desc_video];?>" size=50 maxlength=100></td>
</tr>
<tr>
  <td>Link Video : </td>
  <td><input name=link_video type=text class=botao id="link_video" value="<?phpecho $campo_video[link_video];?>" size=50 maxlength=100></td>
</tr>

<tr>
  <td>Sobre o Video :</td><td>

<?php

$oFCKeditor = new FCKeditor('descricao_video');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_video['descricao_video'];

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao></td></tr>
</table>

</form>

<?php
$nome_antigo=$_POST['nome_video'];
$nome_video=$_POST['nome_video'];
$desc_video=$_POST['desc_video'];
$link_video= str_replace('watch?v=','v/',$_POST['link_video']);
$descricao_video=$_POST['descricao_video'];
$data_alterado=date('d/m/Y');
$hora_alterado=date('H:h');

if(($nome_antigo!=NULL)or($nome_video!=NULL)or($desc_video!=NULL)or($link_video!=NULL)or($descricao_video!=NULL))

{

 if($nome_video!=$nome_antigo)

 {

  $busca_video="select * from videos where nome_video = '".$nome_video."' AND link_video = '".$link_video."';";

  $res_busca_video=mysql_query($busca_video,$conn);

  $num_video=mysql_num_rows($res_busca_video);

  if($num_video>0)

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

 

  $mod_video = "update videos set nome_video = '".$nome_video."',desc_video = '".$desc_video."',link_video = '".$link_video."',descricao_video = '".$descricao_video."', alterado_por = '".$usuario_autenticado."', data_alterado = '".$data_alterado."', hora_alterado = '".$hora_alterado."' where codigo_video = '".$codigo_video."';";
  
  $ok=mysql_query($mod_video,$conn);

  if($ok==1)

  {

   echo "<script>alert('O Video $nome_video foi alterado com sucesso.');

   window.location='mod_video2.php?codigo_video=$codigo_video';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O video: $nome_video já existe.');</script>";

 }

}

?>

</body>

</html>

