<?php

session_start();

include('estilo.css');

$id=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado=='Dyogo')


{

 include('conn.php');

 include('data.php');

}

else

{

 echo "<script>alert('Você não possui acesso para esta área!');

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

<form name="form1" method="post" action="exclusao.php">

<h1 class="style3"><font face=verdana><img src="images/img_down.gif" width="33" height="45"> Exclus&atilde;o de Exames:</font></h1>
<hr color=black size=2>

<span class="style1">Insira abaixo o ID do exame que deseja remover . Lembrando que o dado da exclus&atilde;o ser&aacute; arquivado em LOG para consultas futuras.<br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="137" class="style10">Laudo N &ordm; :</td>
  <td width="404"><input name=id type=text class=botao id="id" value="<?php echo $_POST['id'];?>" size=20 maxlength=20></td>
</tr>

<?php if($_POST['ok']){ ?>
<?php
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id_exame  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo_ex=mysql_fetch_array($res_busca_ex);

##Buscando o paciente##
$busca_ex2="select * from paciente where id  = '".$campo_ex['paciente_id']."';";
$res_busca_ex2=mysql_query($busca_ex2,$conn);
$campo_pac=mysql_fetch_array($res_busca_ex2);

##Buscando o medico##
$busca_ex22="select * from medico where id  = '".$campo_ex['medico_id']."';";
$res_busca_ex22=mysql_query($busca_ex22,$conn);
$campo_med=mysql_fetch_array($res_busca_ex22);

if($campo_ex['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='exclusao.php'>Refazer A busca</a><br>"; 
return; }

if($campo_ex['ex_status_id']==4)
{
 ?>
<BR><BR><table border=0 class=fonte>
  <tr>
    <td width="135">Nome Paciente :</td>
    <td width="187" colspan="2"><strong><?php echo $campo_pac['nome']; ?></strong></div></td>
  </tr>
  <tr>
    <td width="135">Nome Médico Solicitante :</td>
    <td width="187" colspan="2"><strong><?php echo $campo_med['nome']; ?></strong></div></td>
  </tr>
  <tr>
    <td width="135">Motivo da exclusão :</td>
    <td width="187" colspan="2"><strong><input name=substituicao type=text class=botao id="exclusao" size=50></strong></div></td>
  </tr>
    <tr>
    <td width="135"></td>
    <td width="187" colspan="2"><strong><input name="sub2" type=submit class=botao id="sub2" value='Excluir Laudo'></strong></div></td>
  </tr>
  
</table><?php 
die(); } 

if($campo_ex['ex_status_id']!=4)
{
echo "Este exame ainda não foi cancelado e não pode ser excluido.&nbsp;&nbsp;<a href='exclusao.php'>Refazer A busca</a><br>"; 
return; } else {

?>



<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<?php } ?><?php } ?>
<tr><td></td><td><?php if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Excluir'>
<?php } else { ?><input name="ok22" type=submit class=botao id="ok22" value='Ok'><?php } ?>
 <input type=submit value='Cancelar' class=botao><span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>
<?php
if($_POST['sub2']){

$data= mktime();
$motivo = $_POST['exclusao'];

  $cad_subs="insert into exclusoes values ('','".$_POST['id']."','".$data."','".$motivo."','".$usuario_autenticado."');";
  $ok=mysql_query($cad_subs,$conn);

   $cad="delete from exame where where id_exame = '".$_POST['id']."';";
   $ok=mysql_query($cad,$conn);

 
 echo "<script>alert('Exame excluido com sucesso');window.open('exclusao.php?id=$_POST[id]');</script>";

}
?>



</body>

</html>

