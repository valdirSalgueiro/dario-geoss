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

<h1><font face=verdana color='#ff9900'><b>Modificar Foto Propaganda:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td>N&uacute;mero:</td>
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
 $busca_propaganda="select * from propaganda order by nome_propaganda asc;";

 $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

 $num_propaganda=mysql_num_rows($res_busca_propaganda);

 if($num_propaganda>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Número Propaganda</th></tr>";

  for($x=0;$x<$num_propaganda;$x++)

  {

   $campo_propaganda=mysql_fetch_array($res_busca_propaganda);

   echo "<tr height=20><td bordercolor=white><a href='mod_propaganda2.php?codigo_propaganda=$campo_propaganda[codigo_propaganda]'>$campo_propaganda[nome_propaganda]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhuma propaganda com o número <b>$nome</b>.";

 }

}

?>
 <?

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_propaganda="select * from propaganda where nome_propaganda like '%".$nome."%' order by nome_propaganda asc;";

 $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

 $num_propaganda=mysql_num_rows($res_busca_propaganda);

 if($num_propaganda>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Número Propaganda</th></tr>";

  for($x=0;$x<$num_propaganda;$x++)

  {

   $campo_propaganda=mysql_fetch_array($res_busca_propaganda);

   echo "<tr height=20><td bordercolor=white><a href='mod_propaganda2.php?codigo_propaganda=$campo_propaganda[codigo_propaganda]'>$campo_propaganda[nome_propaganda]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhuma propaganda com o nome <b>$nome</b>.";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>

