<?php

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

<h1><font face=verdana color='#ff9900'><b>Cadastrar Categoria / SubCategoria </b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td width="146">Nome Categoria: </td><td width="340"><input type=text name=nome_categoria size=51 maxlength=50 class=botao></td></tr>

<tr>
  <td>Nome SubCategoria: </td>
  <td><input name=nome_subcategoria type=text class=botao id="nome_subcategoria" size=51 maxlength=50></td>
</tr>
<tr><td></td><td><input type=submit value=' Cadastrar ' class=botao></td></tr>
</table>

</form>

<?php

$nome_categoria=$_POST['nome_categoria'];

if($nome_categoria!=NULL)

{

 $busca_categoria="select * from categorias where nome_categoria = '".$nome_categoria."';";
 
 $res_busca_categoria=mysql_query($busca_categoria,$conn);

 $num_categoria=mysql_num_rows($res_busca_categoria);

 if($num_categoria==0)

 {

  $cad_categoria="insert into categorias values ('','".$nome_categoria."')";

  $ok=mysql_query($cad_categoria,$conn);

  if($ok==1)

  {

   echo "<script>alert('A categoria: $nome_categoria foi cadastrada com sucesso.');</script>";

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
<?php

$nome_subcategoria=$_POST['nome_subcategoria'];

if($nome_subcategoria!=NULL)

{

 $busca_subcategoria="select * from subcategorias where nome_subcategoria = '".$nome_subcategoria."';";

 $res_busca_subcategoria=mysql_query($busca_subcategoria,$conn);

 $num_subcategoria=mysql_num_rows($res_busca_subcategoria);

 if($num_subcategoria==0)

 {

  $cad_subcategoria="insert into subcategorias values ('','".$nome_subcategoria."')";

  $ok=mysql_query($cad_subcategoria,$conn);

  if($ok==1)

  {

   echo "<script>alert('A Subcategoria: $nome_subcategoria foi cadastrada com sucesso.');</script>";

  }

  else

  {

   echo "ERRO:".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Subcategoria: $nome_subcategoria já está cadastrada.');</script>";

 }

}



?>
</body>

</html>

