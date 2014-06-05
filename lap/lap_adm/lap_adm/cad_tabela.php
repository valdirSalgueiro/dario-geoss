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
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
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
.style4 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style8 {font-size: 16px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/cad_tabela.bmp"> Cadastrar Tabela:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>
<script language="javascript">
function submitar(){
document.form1.submit();
}

</script>

<tr>
  <td><span class="style8">Tipo : </span></td>
  <td><select name="tipo" class="caixa" id="tipo" onChange="submitar()">
  <?php if($_POST['tipo']!=NULL){ 
   printf("<option value='$_POST[tipo]'>$_POST[tipo]");
    } ?>
    <?php
$busca_conv="select * from tabelas WHERE nome!= '".$_POST[tipo]."' order by nome asc;";
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
  <td width="174"><span class="style8">C&oacute;digo Procedimento :</span></td>
  <td width="318"><input name=codigo_procedimento type=text class=botao id="codigo_procedimento" size=50 maxlength=50></td></tr>

<tr>
  <td><span class="style8">Descri&ccedil;&atilde;o do Procedimento :</span></td>
  <td><textarea name="descricao" cols="45" class="botao" id="descricao"></textarea></td>
</tr>

<tr>
  <td><span class="style8">Valor : </span></td>
  <td><input name=valor type=text class=botao id="valor" size=20 maxlength=50> </td>
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
<script language="javascript">
function submitar(){
document.form1.submit();
}

</script>
</form>

<p>
  <?php
$tipo=$_POST['tipo'];
$codigo_procedimento=$_POST['codigo_procedimento'];
$descricao=$_POST['descricao'];
$valor=$_POST['valor'];
$data=mktime();
$por=$_SESSION["usuario_autenticado"];
$valor_tot = str_replace(",", ".", "$valor");

if(($codigo_procedimento!=NULL)and($descricao!=NULL)and($valor!=NULL))

{

 $busca_conv="select * from tabela where codigo_procedimento = '".$codigo_procedimento."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

  $cad_conv="insert into tabela values ('','".$tipo."','".$codigo_procedimento."','".$descricao."','".$valor_tot."','".$data."','".$por."');";

  $ok=mysql_query($cad_conv,$conn);

  if($ok==1)

  {

   $busca_conv2="select * from tabela where codigo_procedimento = '".$codigo_procedimento."';";

   $res_busca_conv2=mysql_query($busca_conv2,$conn);

   $campo_conv2=mysql_fetch_array($res_busca_conv2);

   echo "<script>alert('Tabela Cadastrada.');window.location='cad_tabela.php?id=$campo_conv2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('A Tabela: $codigo_procedimento já está cadastrado.');</script>";

 }

}

?>
</p>
<?php if($_POST['tipo']!=NULL){ ?>
<table border=0 class=fonte>
  <tr>
    <td width="328" colspan="2" bgcolor="#000033"><div align="center" class="style4">Tipo de Tabela <?php echo $_POST['tipo']; ?></div>
        <div align="center"></div>
      <div align="center"></div></td>
    <?php
	$sql = "SELECT * FROM tabela WHERE tipo = '".$_POST['tipo']."'  order by id ASC";
	$result = mysql_query($sql);
	  while($row = mysql_fetch_array($result)) { ?>
  </tr>
  <tr>
    <td colspan="2"><table width="329" border="1">
      <tr>
        <td width="126">C&oacute;digo Procedimento </td>
        <td width="101">Descri&ccedil;&atilde;o</td>
        <td width="79">Valor</td>
      </tr>
      <tr>
        <td><?php print $row['codigo_procedimento']; ?></td>
        <td><?php print $row['descricao']; ?></td>
        <td><?php print $row['valor']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <?php } ?><?php } ?>
  <tr>
    <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>

