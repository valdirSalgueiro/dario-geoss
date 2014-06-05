<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_galeria=$_GET['codigo_galeria'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_galeria!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_galeria="select * from galerias where codigo_galeria = '".$codigo_galeria."';";

 $res_busca_galeria=mysql_query($busca_galeria,$conn);

 $campo_galeria=mysql_fetch_array($res_busca_galeria);

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

<input type=hidden name=nome_antigo value="<?phpecho $campo_galeria[nome_galeria];?>">

<h1><font face=verdana color='#ff9900'><b>Modificar Galeria de Fotos:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td width="147">T&iacute;tulo Galeria:</td>
  <td width="405"><input name=nome_galeria type=text class=botao id="nome_galeria" value="<?phpecho $campo_galeria[nome_galeria];?>" size=50 maxlength=100></td></tr>


<tr>
  <td>Descri&ccedil;&atilde;o Galeria:</td><td>

<?php

$oFCKeditor = new FCKeditor('descricao_galeria');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $campo_galeria['descricao_galeria'];

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao><input type=button value=" Foto " class=botao onClick="window.location='mod_foto_galerias.php?codigo_galeria=<?phpecho $campo_galeria[codigo_galeria];?>';"></td></tr>
</table>

</form>

<?php
$nome_antigo=$_POST['nome_galeria'];
$nome_galeria=$_POST['nome_galeria'];
$descricao_galeria=$_POST['descricao_galeria'];

if(($nome_antigo!=NULL)and($nome_galeria!=NULL)and($descricao_galeria!=NULL))

{

 if($nome_galeria!=$nome_antigo)

 {

  $busca_galeria="select * from galerias where nome_galeria = '".$nome_galeria."';";

  $res_busca_galeria=mysql_query($busca_galeria,$conn);

  $num_galeria=mysql_num_rows($res_busca_galeria);

  if($num_galeria>0)

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

 

  $mod_galeria = "update galerias set nome_galeria = '".$nome_galeria."',descricao_galeria = '".$descricao_galeria."' where codigo_galeria = '".$codigo_galeria."';";

  $ok=mysql_query($mod_galeria,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Galeria $nome_galeria foi alterada com sucesso.');

   window.location='mod_galeria2.php?codigo_galeria=$codigo_galeria';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Galeria: $nome_galeria já existe.');</script>";

 }

}

?>

</body>

</html>

