<?

session_start();

include('../estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Modificar Categoria</b></font></h1><hr color=black size=2>

<table border=0 class=fonte>

<tr><td>Nome Categoria: </td><td><select name=codigo_categoria class=botao onchange='form1.submit();'>

<?

$busca_categoria="select * from categorias order by nome_categoria asc;";

$res_busca_categoria=mysql_query($busca_categoria,$conn);

$num_categoria=mysql_num_rows($res_busca_categoria);

if($num_categoria>0)

{

 echo "<option value=''></option>";

 for($x=0;$x<$num_categoria;$x++)

 {

  $campo_categoria=mysql_fetch_array($res_busca_categoria);

  echo "<option value='$campo_categoria[codigo_categoria]'>$campo_categoria[nome_categoria]</option>";

 }

}

else

{

 echo "<option value=''>Nenhuma categoria cadastrada.</option>";

}

?>

</select></td></tr>

</table>

</form>

<?

$codigo_categoria=$_POST['codigo_categoria'];

if($codigo_categoria!=NULL)

{

 echo "<script>window.location='mod_categoria2.php?codigo_categoria=$codigo_categoria';</script>";

}

?>

</body>

</html>

