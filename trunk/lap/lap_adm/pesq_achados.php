<?php
session_start();



$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 include('estiloc.css');
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
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<style type="text/css">
<!--
.style1 {
	color: #000033;
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
<link href="estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>
<form name=form1 method=post>
<h1 class="style1"><font face=verdana><img src="images/forum_old.gif" width="29" height="30"> Pesquisar Achado Colposc&oacute;pico Normal:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td class="style10">C&oacute;digo:</td>
  <td><input name=nome type=text class=botao id="nome" size=30 maxlength=50></td></tr>



<tr><td></td><td>&nbsp;</td></tr>
</table>

<table border=0>

<tr><td width=40></td><td width="257"><input type=submit value=" Buscar " class=botao>
  <input name="todos" type=submit class=botao id="todos" value="Exibir Todos"> <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>

</form>
<?php
if($_POST['todos']){

$nome=$_POST['nome'];

 $busca_cod.="select * from achados_colposcopicos order by id asc;";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $num_cod=mysql_num_rows($res_busca_cod);

 if($num_cod>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Código</th><th bordercolor=white>Descrição</th></tr>";

  for($x=0;$x<$num_cod;$x++)

  {

   $campo_cod=mysql_fetch_array($res_busca_cod);

   echo "<tr height=20><td bordercolor=white><a href='detalhes_achados.php?id=$campo_cod[id]'>$campo_cod[codigo] </a></td><td bordercolor=white>$campo_cod[descricao]</td></tr>";

  }

  echo "</table>";

  echo $num_cod;

  if($num_cod==1)

  {

   echo " Registro.";

  }

  else

  {

   echo " Registros.";

  }

 }

 else

 {

  echo "Foi procurado por todo o banco de dados mas não foi encontrado nenhum registro.";

 }

}

?>
<?php
$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_cod="select * from achados_colposcopicos where";

 $and="";

 if($nome!=NULL)

 {

  $busca_cod.=" codigo like '%".$nome."%'";

  $and=" and";

 }

 $busca_cod.=" order by id asc;";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $num_cod=mysql_num_rows($res_busca_cod);

 if($num_cod>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Código</th><th bordercolor=white>Descrição</th></tr>";

  for($x=0;$x<$num_cod;$x++)

  {

   $campo_cod=mysql_fetch_array($res_busca_cod);

   echo "<tr height=20><td bordercolor=white><a href='detalhes_achados.php?id=$campo_cod[id]'>$campo_cod[codigo]</a></td><td bordercolor=white>$campo_cod[descricao]</td></tr>";

  }

  echo "</table>";

  echo $num_cod;

  if($num_cod==1)

  {

   echo " Registro.";

  }

  else

  {

   echo " Registros.";

  }

 }

 else

 {

  echo "Foi procurado por todo o banco de dados mas não foi encontrado nenhum registro.";

 }

}

?>

</body>

</html>

