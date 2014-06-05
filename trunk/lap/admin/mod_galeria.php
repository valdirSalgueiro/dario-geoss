<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 include('../data.php');

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

<h1><font face=verdana color='#ff9900'><b>Modificar Galeria de Fotos:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td>T&iacute;tulo:</td>
  <td><input type=text name=nome class=botao size=50 maxlength=50></td></tr>

<tr>
  <td></td>
  <td><input name="submit" type=submit class=botao value=' Procurar '></td>
</tr>
<tr><td></td><td><input type="submit" name="todos" id="todos" value=" Exibir Todos " class="boldamarelo"></td></tr>
</table>

</form>
<p>
  <?php
if ($_POST['todos']) 
{
 $busca_galeria="select * from galerias order by nome_galeria asc;";

 $res_busca_galeria=mysql_query($busca_galeria,$conn);

 $num_galeria=mysql_num_rows($res_busca_galeria);

 if($num_galeria>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Galeria</th></tr>";

  for($x=0;$x<$num_galeria;$x++)

  {

   $campo_galeria=mysql_fetch_array($res_busca_galeria);

   echo "<tr height=20><td bordercolor=white><a href='mod_galeria2.php?codigo_galeria=$campo_galeria[codigo_galeria]'>$campo_galeria[nome_galeria]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhuma galeria com o nome <b>$nome</b>.";

 }

}

?>
 <?php

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_galeria="select * from galerias where nome_galeria like '%".$nome."%' order by nome_galeria asc;";

 $res_busca_galeria=mysql_query($busca_galeria,$conn);

 $num_galeria=mysql_num_rows($res_busca_galeria);

 if($num_galeria>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Notícia</th></tr>";

  for($x=0;$x<$num_galeria;$x++)

  {

   $campo_galeria=mysql_fetch_array($res_busca_galeria);

   echo "<tr height=20><td bordercolor=white><a href='mod_galeria2.php?codigo_galeria=$campo_galeria[codigo_galeria]'>$campo_galeria[nome_galeria]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado galeria notícia com o nome <b>$nome</b>.";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

