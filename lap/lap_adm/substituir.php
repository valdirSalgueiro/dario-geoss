<?

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

<form name="form1" method="post" action="substituir.php">

<h1 class="style3"><font face=verdana><img src="images/img_down.gif" width="33" height="45"> Substitui&ccedil;&atilde;o de Exames:</font></h1>
<hr color=black size=2>

<span class="style1">Insira abaixo o ID do exame que deseja remover e fazer a substitui&ccedil;&atilde;o. Para realizar esta a&ccedil;&atilde;o certifique-se de que o exame esteja cancelado. <br>
Ex: Um exame de ID 2020 foi digitado e houve uma desist&ecirc;ncia do mesmo, ficando este ID em uso pelo sistema.<br> 
Para que este ID n&atilde;o fique em uso, insira-o abaixo e siga as instru&ccedil;&otilde;es .<br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="137" class="style10">Laudo N &ordm; :</td>
  <td width="404"><input name=id type=text class=botao id="id" value="<? echo $_POST['id'];?>" size=20 maxlength=20></td>
</tr>

<? if($_POST['ok']){ ?>
<?
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id_exame  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo=mysql_fetch_array($res_busca_ex);

##Buscando o paciente##
$busca_ex2="select * from paciente where id  = '".$campo['paciente_id']."';";
$res_busca_ex2=mysql_query($busca_ex2,$conn);
$campo_pac=mysql_fetch_array($res_busca_ex2);

if($campo['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='substituir.php'>Refazer A busca</a><br>"; 
return; }

if($campo['ex_status_id']==4)
{
 ?>
<BR><BR><table border=0 class=fonte>
  
  <tr>
    <td width="135">Motivo da substituição :</td>
    <td width="187" colspan="2"><strong><input name=substituicao type=text class=botao id="substituicao" size=50></strong></div></td>
  </tr>
    <tr>
    <td width="135"></td>
    <td width="187" colspan="2"><strong><input name="sub2" type=submit class=botao id="sub2" value='Substituir Laudo'></strong></div></td>
  </tr>
  
</table><? 
die(); } 

if($campo['ex_status_id']!=4)
{
echo "Este exame ainda não foi cancelado e não pode ser substituido.&nbsp;&nbsp;<a href='substituir.php'>Refazer A busca</a><br>"; 
return; } else {

?>



<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<? } ?><? } ?>
<tr><td></td><td><? if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Ok'><? } else { ?><input name="ok22" type=submit class=botao id="ok22" value='Ok'><? } ?>
 <input type=submit value='Cancelar' class=botao><span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>
<?
if($_POST['sub2']){

$data= mktime();
$portador = $_POST['portador'];
$motivo= $_POST['substituicao'];
$rg_portador = $_POST['rg_portador'];

  $cad_del="delete from exame where id_exame = '".$_POST['id']."';";
   $ok=mysql_query($cad_del,$conn);
   
  $cad_subs="insert into substituicoes values ('','".$_POST['id']."','".$data."','".$motivo."','".$usuario_autenticado."');";
  $ok=mysql_query($cad_subs,$conn);

   

 
 echo "<script>alert('Dados atualizados. Insira agora os dados para substituição do exame');window.open('ent_sub.php?id=$_POST[id]');</script>";

}
?>



</body>

</html>

