<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_noticia=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_noticia!=NULL))

{

 include('conn.php');

 include('data.php');

 $busca_noticia="select * from paciente where id = '".$codigo_noticia."';";

 $res_busca_noticia=mysql_query($busca_noticia,$conn);

 $campo_noticia=mysql_fetch_array($res_busca_noticia);

 echo mysql_error($conn);

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<style type="text/css">
<!--
.style1 {color: #000033}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<input type=hidden name=nome_antigo value="<?phpecho $campo_noticia[nome];?>">

<h1 class="style1"><font face=verdana>Modificar Paciente:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td width="147">Nome:</td>
  <td width="405"><input name=nome type=text class=botao id="nome" value="<?phpecho $campo_noticia[nome];?>" size=50 maxlength=100></td></tr>

<tr>
<tr>
  <td width="147">Nome da Mãe:</td>
  <td width="405"><input name=nome_mae type=text class=botao id="nome_mae" value="<?phpecho $campo_noticia[nome_mae];?>" size=50 maxlength=100></td></tr>

<tr>
  <td>Idade   : </td>
  <td><input name=data_nascimento type=text class=botao id="data_nascimento" value="<?phpecho $campo_noticia[data_nascimento];?>" size=50 maxlength=100></td>
</tr>
<tr>
  <td>RG   : </td>
  <td><input name=rg type=text class=botao id="rg" value="<?phpecho $campo_noticia[rg];?>" size=50 maxlength=100></td>
</tr>
<tr>
  <td>Telefone Residencial     : </td>
  <td><input name=ddd_fone1 type=text class=botao id="ddd_fone1" value="<?phpecho $campo_noticia[ddd_fone1];?>" size=3 maxlength=3>
-
  <input name=fone_1 type=text class=botao id="fone_1" value="<?phpecho $campo_noticia[fone_1];?>" size=15 maxlength=100></td>
</tr>
<tr>
  <td>Telefone Comercial     : </td>
  <td><input name=ddd_fone2 type=text class=botao id="ddd_fone2" value="<?phpecho $campo_noticia[ddd_fone2];?>" size=3 maxlength=3>
    - 
      <input name=fone_2 type=text class=botao id="fone_2" value="<?phpecho $campo_noticia[fone_2];?>" size=15 maxlength=100></td>
</tr>
<tr>
  <td>Celular    : </td>
  <td><input name=ddd_fone3 type=text class=botao id="ddd_fone3" value="<?phpecho $campo_noticia[ddd_fone3];?>" size=3 maxlength=3>
-
  <input name=fone_3 type=text class=botao id="fone_3" value="<?phpecho $campo_noticia[fone_3];?>" size=15 maxlength=100></td>
</tr>
<tr>
  <td>Convenio   : </td>
  <td><input name=convenio type=text class=botao id="convenio" value="<?phpecho $campo_noticia[convenio];?>" size=50 maxlength=100></td>
</tr>
<tr>
  <td>N&uacute;mero Carteirinha    : </td>
  <td><input name=identif_convenio type=text class=botao id="identif_convenio" value="<?phpecho $campo_noticia[identif_convenio];?>" size=50 maxlength=100></td>
</tr>
<tr>
  <td>Email   : </td>
  <td><input name=email type=text class=botao id="email" value="<?phpecho $campo_noticia[email];?>" size=50 maxlength=100></td>
</tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Modificar ' class=botao>
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td></tr>
</table>

</form>

<?php
$nome=$_POST['nome'];
$nome_mae=$_POST['nome_mae'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
$cep=$_POST['cep'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$data_nascimento=$_POST['data_nascimento'];
$ddd_fone1=$_POST['ddd_fone1'];
$fone_1=$_POST['fone_1'];
$ddd_fone2=$_POST['ddd_fone2'];
$fone_2=$_POST['fone_2'];
$ddd_fone3=$_POST['ddd_fone3'];
$fone_3=$_POST['fone_3'];
$convenio=$_POST['convenio'];
$identif_convenio=$_POST['identif_convenio'];
$email=$_POST['email'];

if(($nome_antigo!=NULL)or($nome!=NULL)or($endereco!=NULL)or($bairro!=NULL)or($cidade!=NULL)or($uf!=NULL)or($cep!=NULL)or($cpf!=NULL)or($rg!=NULL)or($data_nascimento!=NULL)or($ddd_fone1!=NULL)or($fone_1!=NULL)or($ddd_fone2!=NULL)or($fone_2!=NULL)or($ddd_fone3!=NULL)or($fone_3!=NULL)or($convenio!=NULL)or($identif_convenio!=NULL)or($email!=NULL))

{

 if($nome!=$nome_antigo)

 {

  $busca_noticia="select * from paciente where nome = '".$nome."';";

  $res_busca_noticia=mysql_query($busca_noticia,$conn);

  $num_noticia=mysql_num_rows($res_busca_noticia);

  if($num_noticia>0)

  {

   $igual=1;

  }

  else

  {

   $igual=0;

  }

 }

 else

 {

  $igual=0;

 }

 if($igual==0)

 {

 

  $mod_noticia = "update paciente set nome = '".$nome."',nome_mae = '".$nome_mae."',endereco = '".$endereco."',bairro = '".$bairro."',cidade = '".$cidade."',uf = '".$uf."',cep = '".$cep."',cpf = '".$cpf."',rg = '".$rg."',data_nascimento = '".$data_nascimento."',ddd_fone1 = '".$ddd_fone1."',fone_1 = '".$fone_1."',ddd_fone2 = '".$ddd_fone2."',fone_2 = '".$fone_2."',ddd_fone3 = '".$ddd_fone3."',fone_3 = '".$fone_3."',convenio = '".$convenio."',identif_convenio = '".$identif_convenio."',email = '".$email."' where id = '".$codigo_noticia."';";
  
  $ok=mysql_query($mod_noticia,$conn);

  if($ok==1)

  {

   echo "<script>alert('O Paciente $nome foi alterado com sucesso.');

   window.location='mod_pac2.php?id=$codigo_noticia';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Paciente: $nome já existe.');</script>";

 }

}

?>

</body>

</html>


