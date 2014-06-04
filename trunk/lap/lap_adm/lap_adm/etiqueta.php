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

<form name="form1" method="post" action="etiqueta.php">

<h1 class="style3"><font face=verdana>Etiqueta:</font> <img src="images/imprimir.gif" width="44" height="44"></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Laudo Número :</td>
  <td width="367"><input name=id type=text class=botao id="id" value="<? echo $_POST['id'];?>" size=20 maxlength=20></td>
</tr>
<? if($_POST['ok']){ ?>
<?
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo=mysql_fetch_array($res_busca_ex);

##Buscando o paciente##
$busca_ex2="select * from paciente where id  = '".$campo['paciente_id']."';";
$res_busca_ex2=mysql_query($busca_ex2,$conn);
$campo_pac=mysql_fetch_array($res_busca_ex2);
?>
<tr>
  <td>Paciente :</td>
  <td><? echo $campo_pac['nome'];?></td>
</tr>
<tr>
  <td>Material :</td>
  <td><? echo $campo['material'];?></td>
</tr>
<tr>
  <td>Data de Entrada :</td>
  <td><? echo date("d/m/Y - H:i",$campo['data_entrada']);?> 
    <span class="style1"> &nbsp;</span></td>
</tr>

<?
if($campo['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='etiqueta.php'>Refazer A busca</a><br>"; 
return; }

if($campo['etiqueta']==1)
{
echo "Este exame já teve etiqueta impressa.&nbsp;&nbsp;<a href='print_etiqueta.php?id=$_POST[id]' target='_blank'>Reemprimir?</a><br><BR>
"; ?>
<BR><table border=0 class=fonte>
  <tr>
    <td colspan="2" bgcolor="#000033"><div align="center" class="style4">Dados da Etiqueta
    </div>
      <div align="center"></div>
      <div align="center"></div></td>
    </tr>
  
  <tr>
    <td width="135">Impressa em :</td>
    <td width="187" colspan="2"><strong><? print date("d/m/Y - H:i",$campo[data_etiqueta]); ?></strong></div></td>
  </tr>
     <tr>
    <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
  
  
</table><? 
die(); } 

?>
<tr>
  <td>Previs&atilde;o de Saida: </td>  <td><? echo date("d/m/Y - H:i",$campo['data_previsao']);?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<? } ?>
<tr><td></td><td><? if($_POST['ok']==''){ ?><input name="ok" type=submit class=botao id="ok" value='Ok'><? } else { ?><input name="ok2" type=submit class=botao id="ok2" value='Imprimir'><? } ?>
 <input type=submit value='Cancelar' class=botao>
 <span class="atributos_titulo">
 <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
 </span></td>
</tr>
</table>

</form>
<?
if($_POST['ok2']){

$data_etiqueta = mktime();
$etiqueta = 1;


   $cad="update exame set data_etiqueta = '".$data_etiqueta."', etiqueta = '".$etiqueta."' where id = '".$_POST['id']."';";
   $ok=mysql_query($cad,$conn);

 
 echo "<script>alert('Clique em ok para imprimir a etiqueta.');window.open('print_etiqueta.php?id=$_POST[id]');</script>";

}

?>



</body>

</html>

