<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 $hoje=date('d/m/Y');
 $hora=date('H:h');
 include('../conn.php');

 include('../data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html><title>Untitled Document</title>

<link href="../estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Cadastrar Foto Propaganda:</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>


<tr>
  <td>N&uacute;mero:</td>
  <td><select name="num" class="botao" id="num">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
    </select>
    </td></tr>


<tr>
  <td>Data: </td>
  <td><input name=data_cadastro type=text class=botao id="data_cadastro" value="<?phpecho $hoje;?>" size=12 maxlength=12></td>
</tr>

<tr>
  <td>Descri&ccedil;&atilde;o Foto Propaganda:</td>
  <td>

<?php

$oFCKeditor = new FCKeditor('descricao_propaganda');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?>

</td></tr>


<tr><td></td><td>&nbsp;</td></tr>

<tr><td></td><td><input type=submit value=' Cadastrar ' class=botao></td></tr>
</table>

</form>

<?php
$nome_propaganda=$_POST['num'];
$descricao_propaganda=$_POST['descricao_propaganda'];
$ativado=0;
$por=$_SESSION["usuario_autenticado"];

if(($nome_propaganda!=NULL)and($descricao_propaganda!=NULL))

{

 $busca_propaganda="select * from propaganda where nome_propaganda = '".$nome_propaganda."';";

 $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

 $num_propaganda=mysql_num_rows($res_busca_propaganda);

 if($num_propaganda==0)

 {

  
  $cad_propaganda="insert into propaganda values ('".$nome_propaganda."','','".$nome_propaganda."','".$descricao_propaganda."','".$ativado."','".$hoje."','".$hora."','".$por."');";
  print 

  $ok=mysql_query($cad_propaganda,$conn);

  if($ok==1)

  {

   $busca_propaganda="select * from propaganda where nome_propaganda = '".$nome_propaganda."';";

   $res_busca_propaganda=mysql_query($busca_propaganda,$conn);

   $campo_propaganda=mysql_fetch_array($res_busca_propaganda);

   echo "<script>window.location='cad_foto_propaganda.php?codigo_propaganda=$campo_propaganda[codigo_propaganda]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Propaganda: $nome_propaganda já está cadastrada.');</script>";

 }

}

?>

</body>

</html>

