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

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Remover Not&iacute;cia:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td>T&iacute;tulo:</td>
  <td><input type=text name=nome class=botao size=50 maxlength=50></td></tr>

<tr><td></td><td><input type=submit value=' Procurar ' class=botao></td></tr>

</table>

</form>

<?

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca="select * from  noticias where nome_noticia like '%".$nome."%' order by nome_noticia asc;";

 $res_busca=mysql_query($busca,$conn);

 $num=mysql_num_rows($res_busca);

 if($num>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>T�tulo Not�cia</th></tr>";

  for($x=0;$x<$num;$x++)

  {

   $campo=mysql_fetch_array($res_busca);

   echo "<tr height=20><td bordercolor=white><a href='rem_noticia2.php?codigo_noticia=$campo[codigo_noticia]'>$campo[nome_noticia]</a></td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "N�o foi encontrado nenhuma not�cia com o nome <b>$nome</b>.";

 }

}

?>

</body>

</html>

