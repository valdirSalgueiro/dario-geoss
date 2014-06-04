<?

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

<h1><font face=verdana color='#ff9900'><b>Modificar Not&iacute;cia:</b></font></h1>
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
  <?
if ($_POST['todos']) 
{
 $busca_video="select * from videos order by nome_video asc;";

 $res_busca_video=mysql_query($busca_video,$conn);

 $num_video=mysql_num_rows($res_busca_video);

 if($num_video>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Notícia</th></tr>";

  for($x=0;$x<$num_video;$x++)

  {

   $campo_video=mysql_fetch_array($res_busca_video);

   echo "<tr height=20><td bordercolor=white><a href='mod_video2.php?codigo_video=$campo_video[codigo_video]'>$campo_video[nome_video]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhuma notícia com o nome <b>$nome</b>.";

 }

}

?>
 <?

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_video="select * from videos where nome_video like '%".$nome."%' order by nome_video asc;";

 $res_busca_video=mysql_query($busca_video,$conn);

 $num_video=mysql_num_rows($res_busca_video);

 if($num_video>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Notícia</th></tr>";

  for($x=0;$x<$num_video;$x++)

  {

   $campo_video=mysql_fetch_array($res_busca_video);

   echo "<tr height=20><td bordercolor=white><a href='mod_video2.php?codigo_video=$campo_video[codigo_video]'>$campo_video[nome_video]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhum video com o nome <b>$nome</b>.";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

