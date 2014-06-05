<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{
 include('estilo.css');
 include('conn.php');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<script>
function Imprimir(id) {
	window.open('imprimir_fat.php?id='+id+'','imprimir','width=600,height=500,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'imprimir'
	document.form_login.action = 'imprimir_fat.php?id='+id+''
	document.form_login.submit();
}
</script>
<html>
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
<body class=fonte>

<form name="demoform" method=post>

<h1 class="style3"><font face=verdana>Faturamento por Conv&ecirc;nio:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Data Inicial :</td>
  <td width="367"><input name=data_ini type=text class=botao id="data_ini" size=20 maxlength=30></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

<tr>
  <td>Data Final :</td>
  <td><input name=data_fim type=text class=botao id="data_fim" size=20 maxlength=30> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
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
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input name="ok" type=submit class=botao id="ok" value='Ok'>
 <input type=submit value='Cancelar' class=botao> <?php if($_POST['ok']!=NULL){  ?><input type=submit onClick="javascript:Imprimir('<?php=$materias['id_materia'] ?>')" value='Imprimir' class=botao><?php } ?>
 <span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>

<?php

$codigo_categoria=$_POST['codigo_categoria'];

$promocao=$_POST['promocao'];

$nome_equipamento=$_POST['nome_equipamento'];

$nome_produto=$_POST['nome_produto'];

$nome_fabricante=$_POST['nome_fabricante'];

$descricao_equipamento=$_POST['descricao_equipamento'];

$valor=$_POST['valor'];

if(($nome_equipamento!=NULL)and($descricao_equipamento!=NULL)and($nome_produto!=NULL)and($nome_fabricante!=NULL)and($valor!=NULL)and($codigo_categoria!=NULL))

{

 $busca_equipamento="select * from equipamentos where nome_equipamento = '".$nome_equipamento."';";

 $res_busca_equipamento=mysql_query($busca_equipamento,$conn);

 $num_equipamento=mysql_num_rows($res_busca_equipamento);

 if($num_equipamento==0)

 {

  $valor=str_replace(',','.',$valor);

  $cad_equipamento="insert into equipamentos values ('','".$codigo_categoria."','".$nome_equipamento."','".$nome_produto."','".$nome_fabricante."','".$descricao_equipamento."','".$promocao."','".$valor."');";

  $ok=mysql_query($cad_equipamento,$conn);

  if($ok==1)

  {

   $busca_equipamento="select * from equipamentos where nome_equipamento = '".$nome_equipamento."';";

   $res_busca_equipamento=mysql_query($busca_equipamento,$conn);

   $campo_equipamento=mysql_fetch_array($res_busca_equipamento);

   echo "<script>window.location='cad_foto_equipamentos.php?codigo_equipamento=$campo_equipamento[codigo_equipamento]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O suprimento: $nome_suprimento já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

