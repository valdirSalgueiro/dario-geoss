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

 echo "<script>alert('A sess�o expirou, � preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Modificar Foto do Dia:</b></font></h1>
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
 $busca_foto_dia="select * from foto_dia order by nome_foto_dia asc;";

 $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

 $num_foto_dia=mysql_num_rows($res_busca_foto_dia);

 if($num_foto_dia>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Foto do Dia</th></tr>";

  for($x=0;$x<$num_foto_dia;$x++)

  {

   $campo_foto_dia=mysql_fetch_array($res_busca_foto_dia);

   echo "<tr height=20><td bordercolor=white><a href='mod_foto_dia2.php?codigo_foto_dia=$campo_foto_dia[codigo_foto_dia]'>$campo_foto_dia[nome_foto_dia]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "N�o foi encontrado nenhuma foto do dia com o nome <b>$nome</b>.";

 }

}

?>
 <?

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_foto_dia="select * from foto_dia where nome_foto_dia like '%".$nome."%' order by nome_foto_dia asc;";

 $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);

 $num_foto_dia=mysql_num_rows($res_busca_foto_dia);

 if($num_foto_dia>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Foto do Dia</th></tr>";

  for($x=0;$x<$num_foto_dia;$x++)

  {

   $campo_foto_dia=mysql_fetch_array($res_busca_foto_dia);

   echo "<tr height=20><td bordercolor=white><a href='mod_foto_dia2.php?codigo_foto_dia=$campo_foto_dia[codigo_foto_dia]'>$campo_foto_dia[nome_foto_dia]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "N�o foi encontrado nenhuma foto do dia com o nome <b>$nome</b>.";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

