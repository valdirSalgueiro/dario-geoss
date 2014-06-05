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

<form name="form1" method="post" action="entrega.php">

<h1 class="style3"><font face=verdana>Entrega de Exames:</font> <img src="images/img_down.gif" width="33" height="45"></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Exame :</td>
  <td width="367"><input name=id type=text class=botao id="id" value="<?php echo $_POST['id'];?>" size=20 maxlength=20></td>
</tr>

<?php if($_POST['ok']){ ?>
<?php
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo=mysql_fetch_array($res_busca_ex);

if($campo['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='entrega.php'>Refazer A busca</a><br>"; 
return; }

if(($campo['ex_status_id']==3)&&($campo['data_saida']!=0))
{
echo "Este exame já foi fechado e impresso.&nbsp;&nbsp;<a href='reimp.php'>Reemprimir?</a><br>"; 
die(); } 

if($campo['ex_status_id']!=3)
{
echo "Este exame ainda não está fechado.&nbsp;&nbsp;<a href='entrega.php'>Refazer A busca</a><br>"; 
return; } else {

?>
<tr>
  <td>Data de Entrada :</td>
  <td><?php echo $campo['data_entrada'];?> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Valor :</td>
  <td><?php echo $campo['valor'];?></td>
</tr>
<tr>
  <td>Paciente :</td>
  <td><?php echo $campo['paciente_id'];?></td>
</tr>
<tr>
  <td>Data de Saida :</td>
  <td><input name="edia" id="edia" size="2" maxlength="2">
    <span class="style1"> /
    <input name="emes" id="emes" value="" size="2" maxlength="2">
/
<input name="eano" id="eano" value="" size="4" maxlength="4">
-
<input name="ehora" id="ehora" value="" size="2" maxlength="2">
:
<input name="emin" id="emin" value="" size="2" maxlength="2">
( dd / mm / aaaa - HH : mm ) </span></td>
</tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<?php } ?><?php } ?>
<tr><td></td><td><?php if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Ok'><?php } else { ?><input name="ok2" type=submit class=botao id="ok2" value='Ok'><?php } ?>
 <input type=submit value='Cancelar' class=botao></td>
</tr>
</table>

</form>
<?php
if($_POST['ok2']){

if(($_POST['edia']=='')or($_POST['emes']=='')or($_POST['eano']=='')or($_POST['ehora']=='')or($_POST['emin']=='')){

echo "Data de saída é um campo obrigatório."; } else {


$data= mktime($_POST[ehora],$_POST[emin],0,$_POST[emes],$_POST[edia],$_POST[eano]);

   $cad="update exame set data_saida = '".$data."' where id = '".$_POST['id']."';";
   $ok=mysql_query($cad,$conn);

 
 echo "<script>alert('Data de Saída Cadastrada.');window.open('print.php?id=$_POST[id]');</script>";

}
}
?>



</body>

</html>

