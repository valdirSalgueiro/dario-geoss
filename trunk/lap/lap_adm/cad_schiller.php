<?php

session_start();

$cpf3 = $_SESSION['cpf2'];



$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
  //Arquivo para consertar os caracteres especiais
 include('caracteres.php'); 
 //Include dos arquivos necessários do sistema

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
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana>Cadastrar Teste de Schiller:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>


<tr>
  <td width="174">&nbsp;</td>
  <td width="318">C&oacute;digo: 
    <input name=codigo type=text class=botao id="codigo" size=10></td></tr>

<tr>
  <td>&nbsp;</td>
  <td><div align="center">Descri&ccedil;&atilde;o : </div></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><?php

$oFCKeditor = new FCKeditor('descricao');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?></td>
</tr>


<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td></td>
  <td><div align="center">
    <input name="submit" type=submit class=atributos_titulo value=' Cadastrar '> 
    <span class="atributos_titulo">
    <input name="button" type=button class="atributos_titulo" onClick="history.go(-1);" value="Voltar">
    </span></div></td>
</tr>
<tr><td></td><td><div align="center"></div></td></tr>
</table>

</form>

<?php

$codigo=$_POST['codigo'];
$descricao=$_POST['descricao'];


if(($codigo!=NULL)and($descricao!=NULL))

{

 $busca_cod="select * from schiller where codigo = '".$codigo."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $num_cod=mysql_num_rows($res_busca_cod);

 if($num_cod==0)

 {


  $cad_cod="insert into schiller values ('','".$codigo."','".$descricao."');";

  $ok=mysql_query($cad_cod,$conn);

  if($ok==1)

  {

   $busca_cod2="select * from codigo where codigo = '".$codigo."';";
   $res_busca_cod2=mysql_query($busca_cod2,$conn);
   $campo_cod2=mysql_fetch_array($res_busca_cod2);

 echo "<script>alert('Teste de Schiller Cadastrado.');window.location='cad_schiller.php?id=$campo_cod2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O código: $codigo já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

