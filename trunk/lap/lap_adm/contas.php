<?php

session_start();

include('estilo.css');

$id=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!='')


{

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
<style type="text/css">
<!--
.style10 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name="demoform" method="post">

<h1 class="style3"><font face=verdana><img src="images/img_down.gif" width="33" height="45"> Valores a Pagar / Receber:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>
  <tr>
    <td class="style10">De :</td>
    <td><input name="de" type=text class=botao id="de" size=38></td>
  </tr>
<tr>
  <td width="137" class="style10">Tipo : </td>
  <td width="404"><select name="tipo" id="tipo">
    <option value=""></option>
    <option value="Salario">Salário</option>
    <option value="Pago">Pago</option>
    <option value="Recebido">Recebido</option>
  </select>  </td>
</tr>
<tr>
  <td class="style10">Vencimento : </td>
  <td><input name="dc" value="" size="11">
      <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td class="style10">Valor (R$ ) :   </td>
  <td><input name="valor" type=text class=botao id="pago_a4" size=13></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<BR><BR><table border=0 class=fonte>
  
</table>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
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
  <td>&nbsp;</td>
</tr>
<br><tr><td></td><td><?php if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Inserir Valor'><?php } else { ?><input name="ok22" type=submit class=botao id="ok22" value='Ok'><?php } ?>
 <input type=submit value='Cancelar' class=botao><span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>
<?php
if($_POST['ok']){
//Inserindo os dados para o cadastro da conta a receber e pagar
$tipo = $_POST['tipo'];
$vencimento = $_POST['dc'];
$valor = $_POST['valor'];
$de = $_POST['de'];
$por=$_SESSION["usuario_autenticado"];
$data_cadastro= mktime();

  $cad_contas="insert into contas values ('','".$tipo."','".$vencimento."','".$valor."','".$de."','".$data_cadastro."','".$usuario_autenticado."');";
  $ok=mysql_query($cad_contas,$conn);

   
 echo "<script>alert('Dado inserido com sucesso');window.location('todas_contas.php');</script>";

}
?>
</body>
</html>
