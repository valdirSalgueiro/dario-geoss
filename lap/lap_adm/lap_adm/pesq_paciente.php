<?php

session_start();

include('estilo.css');

include('data.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">


<link href="estilo.css" rel="stylesheet" type="text/css">
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
<form name=form1 method=post>

<h1 class="style1"><font face=verdana><img src="images/ico_topicos.jpg" width="45" height="35"> Pesquisar Paciente:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
<td width="86" class="style10">Nome :</td>
<td width="163"><input name=nome type=text class=botao id="nome" size=30></td></tr>

<tr><td class="style10">E-mail :</td>
<td><input name=email type=text class=botao id="email" size=30></td></tr>


<tr>
  <td class="style10">RG :</td>
  <td><input name=rg type=text class=botao id="rg" size=30></td>
</tr>
<tr>
  <td class="style10">Conv&ecirc;nio : </td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?php
$busca_conv="select * from convenio order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum Conv&ecirc;nio encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_conv;$x++)

 {

  $campo_conv=mysql_fetch_array($res_busca_conv);

  printf("<option value='$campo_conv[nome]'>$campo_conv[nome]");
  

 }

}

?>
  </select></td>
</tr>
<tr>
  <td></td>
  <td><input name="submit" type=submit class=botao value=" Consultar "></td>
</tr>
<tr><td></td><td><input type="submit" name="todos" id="todos" value=" Exibir Todos " class="F_erro"> <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>
</table>

</form>
<?php
if($_POST['todos']) 
{

 $busca_cliente="select * from paciente order by nome asc";

 $res_busca_cliente=mysql_query($busca_cliente,$conn);

 $num_cliente=mysql_num_rows($res_busca_cliente);

 if($num_cliente>0)

 {

  echo "<table border=0 class=fonte cellspacing=10>

  <tr><th><p align=left>Nome:</p></th><th><p align=left>E-mail:</p></th></tr>";

  for($x=0;$x<$num_cliente;$x++)

  {

   $campo_cliente=mysql_fetch_array($res_busca_cliente);

   echo "<tr><td><a href='paciente.php?id=$campo_cliente[id]'>$campo_cliente[nome] </a></td><td>$campo_cliente[email]</td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "<table border=0 class=fonte>";

  echo "<tr><td>Nenhum Paciente encontrado.</td></tr>";

  echo "</table>";

 }



}

?>

<?php

$nome=$_POST['nome'];

$email=$_POST['email'];

$cpf=$_POST['cpf'];

$rg=$_POST['rg'];

$convenio=$_POST['convenio'];


if(($nome!=NULL)or($email!=NULL)or($rg!=NULL)or($convenio!=NULL))

{

 $busca_cliente="select * from paciente where";

 $and="";

 if($nome!=NULL)

 {

  $busca_cliente.=$and." (nome like '%".$nome."%')";

  $and=" and";

 }

 if($email!=NULL)

 {

  $busca_cliente.=$and." email like '%".$email."%'";

  $and=" and";

 }
 if($rg!=NULL)

 {

  $busca_cliente.=$and." rg like '%".$rg."%'";

  $and=" and";

 }
 if($convenio!=NULL)

 {

  $busca_cliente.=$and." convenio like '%".$convenio."%'";

  $and=" and";

 }



 $busca_cliente.=" order by nome asc;";

 $res_busca_cliente=mysql_query($busca_cliente,$conn);

 $num_cliente=mysql_num_rows($res_busca_cliente);

 if($num_cliente>0)

 {

  echo "<table border=0 class=fonte cellspacing=10>

  <tr><th><p align=left>Nome:</p></th><th><p align=left>E-mail:</p></th></tr>";

  for($x=0;$x<$num_cliente;$x++)

  {

   $campo_cliente=mysql_fetch_array($res_busca_cliente);

   echo "<tr><td><a href='paciente.php?id=$campo_cliente[id]'>$campo_cliente[nome] </a></td><td>$campo_cliente[email]</td></tr>";

  }

  echo "</table>";

 }

 else

 {

  echo "<table border=0 class=fonte>";

  echo "<tr><td>Nenhum Paciente encontrado.</td></tr>";

  echo "</table>";

 }



}

?>

</body>

</html>

