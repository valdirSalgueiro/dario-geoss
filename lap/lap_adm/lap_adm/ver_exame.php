<?php

session_start();

include('../estilo.css');

include('fckeditor/fckeditor.php');

$codigo_produto=$_GET['codigo_produto'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($codigo_produto!=NULL))

{

 include('../conn.php');

 include('../data.php');

 $busca_produto="select * from produtos_caixa where codigo_produto = '".$codigo_produto."';";

 $res_busca_produto=mysql_query($busca_produto,$conn);

 $campo_produto=mysql_fetch_array($res_busca_produto);

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
.style1 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<input type=hidden name=nome_antigo value="<?phpecho $campo_produto[nome_produto];?>">

<h1 class="style1"><font face=verdana>Exame:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td width="157">ID: </td>
  <td width="157"><div align="center"><?phpecho $campo_produto[nome_produto];?></div></td></tr>

<tr>
  <td>Nome Paciente: </td>
  <td><div align="center"><?phpecho $campo_produto[qtd];?></div></td>
</tr>
<tr>
  <td>Data de Entrada</td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[qtd];?></div></td>
</tr>
<tr>
  <td>Previs&atilde;o de Saida</td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[qtd];?></div></td>
</tr>
<tr>
  <td>Material</td>
  <td bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr>
  <td>Solicita&ccedil;&atilde;o  :</td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[valor_unit];?></div></td>
</tr>

<tr>
  <td>Soma dos Valores : </td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[soma_valores];?></div></td>
</tr>

<tr>
  <td>Tipo de Pagamento:</td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[tipo_pagamento];?></div></td></tr>

<tr>
  <td>Data de Cadastro : </td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[data_cadastro];?></div></td>
</tr>
<tr>
  <td>Usu&aacute;rio : </td>
  <td bgcolor="#FFFFFF"><div align="center"><?phpecho $campo_produto[usuario];?></div></td>
</tr>



<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
</table>

</form>

<?php

$promocao=$_POST['promocao'];

$codigo_categoria=$_POST['codigo_categoria'];

$nome_antigo=$_POST['nome_produto'];

$nome_produto=$_POST['nome_produto'];

$nome_fabricante=$_POST['nome_fabricante'];

$descricao_produto=$_POST['descricao_produto'];

$valor_produto=$_POST['valor_produto'];

if(($nome_antigo!=NULL)and($nome_produto!=NULL)and($valor_produto!=NULL))

{

 if($nome_produto!=$nome_antigo)

 {

  $busca_produto="select * from produtos where nome_produto = '".$nome_produto."';";

  $res_busca_produto=mysql_query($busca_produto,$conn);

  $num_produto=mysql_num_rows($res_busca_produto);

  if($num_produto>0)

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

  $valor_produto=str_replace(',','.',$valor_produto);

  $mod_produto = "update produtos set nome_produto = '".$nome_produto."',nome_fabricante = '".$nome_fabricante."',codigo_categoria = '".$codigo_categoria."', promocao_produto = '".$promocao."' , descricao_produto = '".$descricao_produto."' , valor_produto = '".$valor_produto."' where codigo_produto = '".$codigo_produto."';";

  $ok=mysql_query($mod_produto,$conn);

  if($ok==1)

  {

   echo "<script>alert('O jogador $nome_produto foi alterado com sucesso.');

   window.location='mod_produto2.php?codigo_produto=$codigo_produto';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Jogador: $nome_produto já existe.');</script>";

 }

}

?>

<span class="atributos_titulo">
<input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span>
</body>

</html>

