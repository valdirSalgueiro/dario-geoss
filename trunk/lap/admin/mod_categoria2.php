<?

session_start();

include('../estilo.css');

$codigo_categoria=$_GET['codigo_categoria'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_categoria))

{

 include('../conn.php');

 $busca_categoria="select * from categorias where codigo_categoria = '".$codigo_categoria."';";

 $res_busca_categoria=mysql_query($busca_categoria,$conn);

 $campo_categoria=mysql_fetch_array($res_busca_categoria);

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

<tr><td>Nome Categoria: </td><td><input type=text name=nome_categoria value="<?echo $campo_categoria[nome_categoria];?>" size=51 maxlength=50 class=botao></td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao></td></tr>



</table>

</form>

<?

$nome_categoria=$_POST['nome_categoria'];

if($nome_categoria!=NULL)

{

 $busca_categoria="select * from categorias where nome_categoria = '".$nome_categoria."' and codigo_categoria <> '".$codigo_categoria."';";

 $res_busca_categoria=mysql_query($busca_categoria,$conn);

 $num_categoria=mysql_num_rows($res_busca_categoria);

 if($num_categoria==0)

 {

  $mod_categoria="update categorias set nome_categoria = '".$nome_categoria."' where codigo_categoria='".$codigo_categoria."';";

  $ok=mysql_query($mod_categoria,$conn);

  if($ok==1)

  {

   echo "<script>alert('A categoria: $nome_categoria foi modificada com sucesso.');

   window.location='mod_categoria2.php?codigo_categoria=$codigo_categoria';</script>";

  }

  else

  {

   echo "ERRO:".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A categoria: $nome_categoria já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

