<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');
 include('estilo.css');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
<html>
<link href="estilo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
<style type="text/css">
<!--
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {font-size: 16px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/cadastro_convenios.jpg" width="45" height="45"> Cadastrar Conv&ecirc;nio:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>


<tr>
  <td width="174"><span class="style7">Nome:</span></td>
  <td width="318"><input name=nome type=text class=botao id="nome" size=50 maxlength=50></td></tr>

<tr>
  <td><span class="style7">Tabela:</span></td>
  <td><select name="tipo" class="caixa" id="tipo">
    <?php
$busca_conv="select * from tabelas order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum Tipo de Tabela encontrado");
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
  <td>&nbsp;</td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><div align="center">
  <input type=submit value=' Cadastrar ' class=por> 
  <span class="atributos_titulo">
  <input name="button" type=button class="por" onClick="history.go(-1);" value="Voltar">
  </span></div></td></tr>
</table>

</form>

<?php
$nome=$_POST['nome'];
$tipo=$_POST['tipo'];
$cod_anpa=$_POST['cod_anpa'];
$cod_imhi=$_POST['cod_imhi'];
$cod_co=$_POST['cod_co'];
$cod_cige=$_POST['cod_cige'];
$cod_coes=$_POST['cod_coes'];
$primeiro_anpa=$_POST['primeiro_anpa'];
$primeiro_imhi=$_POST['primeiro_imhi'];
$primeiro_co=$_POST['primeiro_co'];
$primeiro_cige=$_POST['primeiro_cige'];
$primeiro_coes=$_POST['primeiro_coes'];
$subsequente_anpa=$_POST['subsequente_anpa'];
$subsequente_imhi=$_POST['subsequente_imhi'];
$subsequente_co=$_POST['subsequente_co'];
$subsequente_cige=$_POST['subsequente_cige'];
$subsequente_coes=$_POST['subsequente_coes'];

if(($nome!=NULL)and($tipo!=NULL))

{

 $busca_conv="select * from convenio where nome = '".$nome."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

  $cad_conv="insert into convenio values ('','".$nome."','".$tipo."','".$cod_anpa."','".$cod_imhi."','".$cod_co."','".$$cod_cige."','".$cod_coes."','".$primeiro_anpa."','".$primeiro_imhi."','".$primeiro_co."','".$primeiro_cige."','".$primeiro_coes."','".$subsequente_anpa."','".$subsequente_imhi."','".$subsequente_co."','".$subsequente_cige."','".$subsequente_coes."');";

  $ok=mysql_query($cad_conv,$conn);

  if($ok==1)

  {

   $busca_conv2="select * from convenio where nome = '".$nome."';";

   $res_busca_conv2=mysql_query($busca_conv2,$conn);

   $campo_conv2=mysql_fetch_array($res_busca_conv2);

   echo "<script>alert('Convênio Cadastrado.');window.location='cad_conv.php?id=$campo_conv2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O convênio: $nome já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

