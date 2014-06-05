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
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name="form1" method="post" action="entrega.php">

<h1 class="style3"><font face=verdana><img src="images/img_down.gif" width="33" height="45"> Entrega de Exames:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174" class="style10">Laudo N &ordm; :</td>
  <td width="367"><input name=id type=text class=botao id="id" value="<?php echo $_POST['id'];?>" size=20 maxlength=20></td>
</tr>

<?php if($_POST['ok']){ ?>
<?php
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo=mysql_fetch_array($res_busca_ex);

##Buscando o paciente##
$busca_ex2="select * from paciente where id  = '".$campo['paciente_id']."';";
$res_busca_ex2=mysql_query($busca_ex2,$conn);
$campo_pac=mysql_fetch_array($res_busca_ex2);

if($campo['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='entrega.php'>Refazer A busca</a><br>"; 
return; }

if(($campo['ex_status_id']==3)&&($campo['data_saida']!=0))
{
echo "Este exame já foi fechado e impresso.&nbsp;&nbsp;<a href='reimp.php'>Reemprimir?</a><br><BR>
"; ?>
<BR><table border=0 class=fonte>
  <tr>
    <td colspan="2" bgcolor="#000033"><div align="center" class="style4">Dados da Entrega
    </div>
      <div align="center"></div>
      <div align="center"></div></td>
	
    </tr>
  
  <tr>
    <td width="135">Nome Portador :</td>
    <td width="187" colspan="2"><strong><?php print $campo[portador]; ?></strong></div></td>
  </tr>
   <tr>
    <td width="135">RG Portador :</td>
    <td colspan="2"><strong><?php print $campo[rg_portador]; ?></strong></div></td>
  </tr>
   <tr>
    <td width="135">Data de Entrega :</td>
    <td colspan="2"><strong><?php print $campo[data_saida]; ?></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
  
  
</table><?php 
die(); } 

if($campo['ex_status_id']!=3)
{
echo "Este exame ainda não está fechado.&nbsp;&nbsp;<a href='entrega.php'>Refazer A busca</a><br>"; 
return; } else {

?>
<tr>
  <td class="style10">Data de Entrada :</td>
  <td><?php echo date("d/m/Y - H:i",$campo['data_entrada']);?> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td class="style10">Valor :</td>
  <td><?php echo $campo['valor'];?></td>
</tr>
<tr>
  <td class="style10">Paciente :</td>
  <td><?php echo $campo_pac['nome'];?></td>
</tr>
<tr>
  <td bgcolor="#CCCCCC" class="style10">Nome Portador: </td>
  <td bgcolor="#CCCCCC"><input name="portador" type="text" id="portador" size="30"></td>
</tr>
<tr>
  <td bgcolor="#CCCCCC" class="style10">RG Portador:</td>
  <td bgcolor="#CCCCCC"><input name="rg_portador" type="text" id="rg_portador" size="30"></td>
</tr>
<tr>
<?php
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$hora = date("H");
$min = date("i");

?>
  <td class="style10">Data de Saida :</td>
  <td><input name="edia" id="edia" size="2" value="<?php echo $dia; ?>" maxlength="2">
    <span class="style1"> /
    <input name="emes" id="emes" value="<?php echo $mes; ?>" size="2" maxlength="2">
/
<input name="eano" id="eano" value="<?php echo $ano; ?>" size="4" maxlength="4">
-
<input name="ehora" id="ehora" value="<?php echo $hora; ?>" size="2" maxlength="2">
:
<input name="emin" id="emin" value="<?php echo $min; ?>" size="2" maxlength="2">
( dd / mm / aaaa - HH : mm ) </span></td>
</tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<?php } ?><?php } ?>
<tr><td></td><td><?php if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Ok'><?php } else { ?><input name="ok2" type=submit class=botao id="ok2" value='Ok'><?php } ?>
 <input type=submit value='Cancelar' class=botao> <span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>
<?php
if($_POST['ok2']){

if(($_POST['edia']=='')or($_POST['emes']=='')or($_POST['eano']=='')or($_POST['ehora']=='')or($_POST['emin']=='')){

echo "Data de saída é um campo obrigatório."; } else {


$data= mktime($_POST[ehora],$_POST[emin],0,$_POST[emes],$_POST[edia],$_POST[eano]);


$data_entregue = mktime();
$portador = $_POST['portador'];
$rg_portador = $_POST['rg_portador'];

   $cad="update exame set data_saida = '".$data."', portador = '".$portador."', rg_portador = '".$rg_portador."'  where id = '".$_POST['id']."';";
   $ok=mysql_query($cad,$conn);

 
 echo "<script>alert('Data de Saída Cadastrada.');window.open('print.php?id=$_POST[id]');</script>";

}
}
?>



</body>

</html>

