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
<h1 class="style1"><font face=verdana><img src="images/search.gif" width="48" height="48"> Pesquisar M&eacute;dico:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td class="style10">Nome:</td>
<td><input name=nome type=text class=botao id="nome" size=51 maxlength=50></td></tr>

<tr>
  <td class="style10">Email: </td>
  <td><input name=email type=text class=botao id="email" size=51 maxlength=50></td>
</tr>
<tr>
  <td class="style10">CREMEPE:</td>
  <td><input name=cremepe type=text class=botao id="cremepe" size=51 maxlength=50></td></tr>


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
$email=$_POST['email'];
$cremepe=$_POST['cremepe'];


 $busca_cliente.="select * from medico order by nome asc;";
 $res_busca_cliente=mysql_query($busca_cliente,$conn);
 $num_cliente=mysql_num_rows($res_busca_cliente);

 if($num_cliente>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Nome Completo</th><th bordercolor=white>CREMEPE</th></tr>";

  for($x=0;$x<$num_cliente;$x++)

  {

   $campo_cliente=mysql_fetch_array($res_busca_cliente);

   echo "<tr height=20><td bordercolor=white><a href='detalhes_med.php?id=$campo_cliente[id]'>$campo_cliente[nome] </a></td><td bordercolor=white>$campo_cliente[cremepe]</td></tr>";

  }

  echo "</table>";

  echo $num_cliente;

  if($num_cliente==1)

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

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro.";

 }

}

?>
<?php

$nome_cliente=$_POST['nome'];
$email=$_POST['email'];
$cremepe=$_POST['cremepe'];

if(($nome!=NULL)or($email!=NULL)or($cremepe!=NULL))

{

 $busca_cliente="select * from medico where";

 $and="";

 if($nome!=NULL)

 {

  $busca_cliente.=" nome like '%".$nome."%'";

  $and=" and";

 }
 if($email!=NULL)

 {

  $busca_cliente.=" email like '%".$email."%'";

  $and=" and";

 }

 if($cremepe!=NULL)

 {

  $busca_cliente.=$and." cremepe like '%".$cremepe."%'";

  $and=" and";

 }


 $busca_cliente.=" order by nome asc;";

 $res_busca_cliente=mysql_query($busca_cliente,$conn);

 $num_cliente=mysql_num_rows($res_busca_cliente);

 if($num_cliente>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Nome Completo</th><th bordercolor=white>CREMEPE</th></tr>";

  for($x=0;$x<$num_cliente;$x++)

  {

   $campo_cliente=mysql_fetch_array($res_busca_cliente);

   echo "<tr height=20><td bordercolor=white><a href='detalhes_med.php?id=$campo_cliente[id]'>$campo_cliente[nome]</a></td><td bordercolor=white>$campo_cliente[cremepe]</td></tr>";

  }

  echo "</table>";

  echo $num_cliente;

  if($num_cliente==1)

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

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro.";

 }

}

?>

</body>

</html>

