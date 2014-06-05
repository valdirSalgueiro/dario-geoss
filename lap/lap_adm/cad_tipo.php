<?php

session_start();

$cpf3 = $_SESSION['cpf2'];



$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

 include('data.php');

 include('estilo.css');

 include('fckeditor/fckeditor.php');
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
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="estilo.css" rel="stylesheet" type="text/css">
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
.style4 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style6 {font-size: 14px}
.style8 {font-size: 14px; font-weight: bold; }
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/exame.png" width="33" height="31"> Cadastrar Tipo de Exame:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>


<tr>
  <td><span class="style6">Insira o tipo aqui :</span>
    <div align="center"></div>    <div align="center"></div></td>
  <td width="480"><input name=tipo type=text class=botao id="tipo" size=30></td>
</tr>
<tr>
  <td><span class="style6">Dias para Resultado :</span></td>
  <td><input name=dias type=text class=botao id="dias" size=5>
    <span class="style6">Dias </span></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><div align="center">
    <input name="submit" type=submit class=atributos_titulo value=' Cadastrar '>
    <span class="atributos_titulo">
     <input name="button" type=button class="atributos_titulo" onClick="history.go(-1);" value="Voltar">
    </span></div></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>

<br>
<br>
<br>
</form>

<?php

$tipo=$_POST['tipo'];
$dias=$_POST['dias'];

if($tipo!=NULL)

{

 $busca_cod="select * from tipo_exame where nome = '".$tipo."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $num_cod=mysql_num_rows($res_busca_cod);

 if($num_cod==0)

 {


  $cad_cod="insert into tipo_exame values ('','".$tipo."','".$dias."');";

  $ok=mysql_query($cad_cod,$conn);

  if($ok==1)

  {

   $busca_cod2="select * from tipo_exame where nome = '".$tipo."';";
   $res_busca_cod2=mysql_query($busca_cod2,$conn);
   $campo_cod2=mysql_fetch_array($res_busca_cod2);

 echo "<script>alert('Tipo de Exame Cadastrado.');window.location='cad_tipo.php';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Tipo de Exame: $tipo já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

