<?

session_start();

include('estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

 include('data.php');

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
.style3 {	color: #000033;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

  <h1 class="style3"><font face=verdana><img src="images/alterar.png" width="48" height="48"> Modificar Tipo de Tabela:</font></h1>
  <hr color=black size=2>
  <table border=0 class=fonte>

<tr>
  <td class="style10">Tipo:</td>
  <td><select name="nome" class="botao" id="nome" onChange="submitar()">
    <option value=""></option>
    <option value="CBHPM">CBHPM</option>
    <option value="AMB92">AMB92</option>
    <option value="Particular">Particular</option>
    <option value="Cortesia">Cortesia</option>
  </select></td></tr>

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
 $busca_noticia="select * from tabela order by id asc;";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $num_noticia=mysql_num_rows($res_busca_noticia);

 if($num_noticia>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Código de Procedimento</th></tr>";

  for($x=0;$x<$num_noticia;$x++)

  {

   $campo_noticia=mysql_fetch_array($res_busca_noticia);

   echo "<tr height=20><td bordercolor=white><a href='mod_tabela2.php?id=$campo_noticia[id]'>$campo_noticia[codigo_procedimento]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhum tipo com o nome <b>$nome</b>.";

 }

}

?>
 <?

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_noticia="select * from tabela where tipo like '%".$nome."%' order by id asc;";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $num_noticia=mysql_num_rows($res_busca_noticia);

 if($num_noticia>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Código de Procedimento</th></tr>";

  for($x=0;$x<$num_noticia;$x++)

  {

   $campo_noticia=mysql_fetch_array($res_busca_noticia);

   echo "<tr height=20><td bordercolor=white><a href='mod_tabela2.php?id=$campo_noticia[id]'>$campo_noticia[codigo_procedimento]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "Não foi encontrado nenhum tipo com o nome <b>$nome</b>.";

 }

}

?>
</p>
<p>&nbsp;</p>
</body>

</html>


