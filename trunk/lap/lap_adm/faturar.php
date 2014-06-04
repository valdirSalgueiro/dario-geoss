<?

session_start();

include('estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!='')

{

 include('conn.php');
 include('data.php');
 $today= getdate();
 $time = time();
 $stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
 $etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);

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
.style3 {font-size: 10px}
.style4 {
	color: #000033;
	font-weight: bold;
}
.style6 {font-size: 10px; color: #FFFFFF; }
.style8 {color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style9 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name=pesquisa method=post>

<h1 class="style4"><font face="verdana"> <img src="images/Faturamento_01.bmp"> Faturar:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td class="style10">Id do Exame  :</td>
  <td width="366"><span class="back">
    <input name="id" type="text" id="id" disabled="disabled" value="<? echo $_GET['id']; ?>" size="5">
  </span></td>
  <td width="174">&nbsp;</td>
</tr>


<TD class=back2 align=right width=187><div align="left"><span class="style10">N&uacute;mero de C&oacute;digos:</span></div></td>
    <td class=back><input name="codigos" type="text" id="codigos" value="<? echo $_GET[codigos]; ?>" size="5">
<td><? if($_GET[codigos]==NULL){ ?><input id = "faturar" name="faturar" type=submit value='Avançar' class=botao><? } ?>
  <span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
    </span></tr>
</table>

<hr color=black size=1>
</form>
<form name="faturar2" method="post">
<?
if($_POST[faturar]!=NULL){
	 echo "<script>
 window.location='faturar.php?id=$_GET[id]&&codigos=$_POST[codigos]';</script>";
	}
?>
<?
if($_GET[codigos]!=NULL)
{
$countInputs=$_GET[codigos];
for($no=0;$no<$countInputs;$no++)
{
$posicao=$no+1;
		
echo "<table><tr><td><label class=style10>Código $posicao :</label><select name=\"codigo$posicao\" class=caixa id=codigo>";

$busca_atendimentos="select * from tabela order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo de procedimento encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[codigo_procedimento] - $campo_atendimentos[tipo] - R$ $campo_atendimentos[valor]</option>\n");
  
 }
}
				
}
}
?>
<? if($_GET[codigos]!=NULL){ ?><table><tr><td><input id = "faturar2" name="faturar2" type=submit value='Faturar Exame' class=botao></form><? } ?></td></tr></table>
<?
if($_POST[faturar2]!=NULL){
$countInputs=$_GET[codigos];
for($no=0;$no<$countInputs;$no++)
{
$posicao=$no+1;
}
//Código1
$por=$_SESSION["usuario_autenticado"];
$data=mktime();
$tipo_tabela=$_GET[codigos];

if($_POST[codigo1]!=NULL){
 
//Busca do valor do codigo
$busca_codigo="select * from tabela where id = '".$_POST[codigo1]."';";
$res_busca_codigo=mysql_query($busca_codigo,$conn);
$campo_codigo=mysql_fetch_array($res_busca_codigo);
  
 $cad_codigos1="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo1]."','".$campo_codigo[valor]."','".$data."','".$por."');";
 $ok1=mysql_query($cad_codigos1,$conn);
} 
if($_POST[codigo2]!=NULL){

//Busca do valor do codigo
$busca_codigo2="select * from tabela where id = '".$_POST[codigo2]."';";
$res_busca_codigo2=mysql_query($busca_codigo2,$conn);
$campo_codigo2=mysql_fetch_array($res_busca_codigo2);

 $cad_codigos2="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo2]."','".$campo_codigo2[valor]."','".$data."','".$por."');";
 $ok2=mysql_query($cad_codigos2,$conn);
}
if($_POST[codigo3]!=NULL){
//Busca do valor do codigo
$busca_codigo3="select * from tabela where id = '".$_POST[codigo3]."';";
$res_busca_codigo3=mysql_query($busca_codigo3,$conn);
$campo_codigo3=mysql_fetch_array($res_busca_codigo3);

 $cad_codigos3="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo3]."','".$campo_codigo3[valor]."','".$data."','".$por."');";
  $ok3=mysql_query($cad_codigos3,$conn);

}
if($_POST[codigo4]!=NULL){
//Busca do valor do codigo
$busca_codigo4="select * from tabela where id = '".$_POST[codigo4]."';";
$res_busca_codigo4=mysql_query($busca_codigo4,$conn);
$campo_codigo4=mysql_fetch_array($res_busca_codigo4);

 $cad_codigos4="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo4]."','".$campo_codigo4[valor]."','".$data."','".$por."');";
   $ok4=mysql_query($cad_codigos4,$conn);
 
}
if($_POST[codigo5]!=NULL){
//Busca do valor do codigo
$busca_codigo5="select * from tabela where id = '".$_POST[codigo5]."';";
$res_busca_codigo5=mysql_query($busca_codigo5,$conn);
$campo_codigo5=mysql_fetch_array($res_busca_codigo5);

 $cad_codigos5="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo5]."','".$campo_codigo5[valor]."','".$data."','".$por."');";
  $ok5=mysql_query($cad_codigos5,$conn);

 
}
if($_POST[codigo6]!=NULL){
//Busca do valor do codigo
$busca_codigo6="select * from tabela where id = '".$_POST[codigo6]."';";
$res_busca_codigo6=mysql_query($busca_codigo6,$conn);
$campo_codigo6=mysql_fetch_array($res_busca_codigo6);

 $cad_codigos6="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo6]."','".$campo_codigo6[valor]."','".$data."','".$por."');";
  $ok6=mysql_query($cad_codigos6,$conn);
 
}
if($_POST[codigo7]!=NULL){
//Busca do valor do codigo
$busca_codigo7="select * from tabela where id = '".$_POST[codigo7]."';";
$res_busca_codigo7=mysql_query($busca_codigo7,$conn);
$campo_codigo7=mysql_fetch_array($res_busca_codigo7);

 $cad_codigos7="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo7]."','".$campo_codigo7[valor]."','".$data."','".$por."');";
  $ok7=mysql_query($cad_codigos7,$conn);
  
}
if($_POST[codigo8]!=NULL){
//Busca do valor do codigo
$busca_codigo8="select * from tabela where id = '".$_POST[codigo8]."';";
$res_busca_codigo8=mysql_query($busca_codigo8,$conn);
$campo_codigo8=mysql_fetch_array($res_busca_codigo8);

 $cad_codigos8="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo8]."','".$campo_codigo8[valor]."','".$data."','".$por."');";
 $ok8=mysql_query($cad_codigos8,$conn);
 
}
if($_POST[codigo9]!=NULL){
//Busca do valor do codigo
$busca_codigo9="select * from tabela where id = '".$_POST[codigo9]."';";
$res_busca_codigo9=mysql_query($busca_codigo9,$conn);
$campo_codigo9=mysql_fetch_array($res_busca_codigo9);

 $cad_codigos9="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo9]."','".$campo_codigo9[valor]."','".$data."','".$por."');";
  $ok9=mysql_query($cad_codigos9,$conn);

}
if($_POST[codigo10]!=NULL){
//Busca do valor do codigo
$busca_codigo10="select * from tabela where id = '".$_POST[codigo10]."';";
$res_busca_codigo10=mysql_query($busca_codigo10,$conn);
$campo_codigo10=mysql_fetch_array($res_busca_codigo10);

 $cad_codigos10="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo10]."','".$campo_codigo10[valor]."','".$data."','".$por."');";
  $ok10=mysql_query($cad_codigos10,$conn);
}
if($_POST[codigo11]!=NULL){
//Busca do valor do codigo
$busca_codigo11="select * from tabela where id = '".$_POST[codigo11]."';";
$res_busca_codigo11=mysql_query($busca_codigo11,$conn);
$campo_codigo11=mysql_fetch_array($res_busca_codigo11);

 $cad_codigos11="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo11]."','".$campo_codigo11[valor]."','".$data."','".$por."');";
  $ok11=mysql_query($cad_codigos11,$conn);
  
}
if($_POST[codigo12]!=NULL){
//Busca do valor do codigo
$busca_codigo12="select * from tabela where id = '".$_POST[codigo12]."';";
$res_busca_codigo12=mysql_query($busca_codigo12,$conn);
$campo_codigo12=mysql_fetch_array($res_busca_codigo12);

 $cad_codigos12="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo12]."','".$campo_codigo12[valor]."','".$data."','".$por."');";
 $ok12=mysql_query($cad_codigos12,$conn);
 
}
if($_POST[codigo13]!=NULL){
//Busca do valor do codigo
$busca_codigo13="select * from tabela where id = '".$_POST[codigo13]."';";
$res_busca_codigo13=mysql_query($busca_codigo13,$conn);
$campo_codigo13=mysql_fetch_array($res_busca_codigo13);

 $cad_codigos13="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo13]."','".$campo_codigo13[valor]."','".$data."','".$por."');";
  $ok13=mysql_query($cad_codigos13,$conn);
  
}
if($_POST[codigo14]!=NULL){
//Busca do valor do codigo
$busca_codigo14="select * from tabela where id = '".$_POST[codigo14]."';";
$res_busca_codigo14=mysql_query($busca_codigo14,$conn);
$campo_codigo14=mysql_fetch_array($res_busca_codigo14);

 $cad_codigos14="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo14]."','".$campo_codigo14[valor]."','".$data."','".$por."');";
 $ok14=mysql_query($cad_codigos14,$conn);
 
}
if($_POST[codigo15]!=NULL){
//Busca do valor do codigo
$busca_codigo15="select * from tabela where id = '".$_POST[codigo15]."';";
$res_busca_codigo15=mysql_query($busca_codigo15,$conn);
$campo_codigo15=mysql_fetch_array($res_busca_codigo15);

 $cad_codigos15="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo15]."','".$campo_codigo15[valor]."','".$data."','".$por."');";
  $ok15=mysql_query($cad_codigos15,$conn);

}
if($_POST[codigo16]!=NULL){
//Busca do valor do codigo
$busca_codigo16="select * from tabela where id = '".$_POST[codigo16]."';";
$res_busca_codigo16=mysql_query($busca_codigo16,$conn);
$campo_codigo16=mysql_fetch_array($res_busca_codigo16);

 $cad_codigos16="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo16]."','".$campo_codigo16[valor]."','".$data."','".$por."');";
   $ok16=mysql_query($cad_codigos16,$conn);
  
}
if($_POST[codigo17]!=NULL){
//Busca do valor do codigo
$busca_codigo17="select * from tabela where id = '".$_POST[codigo17]."';";
$res_busca_codigo17=mysql_query($busca_codigo17,$conn);
$campo_codigo17=mysql_fetch_array($res_busca_codigo17);

 $cad_codigos17="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo17]."','".$campo_codigo17[valor]."','".$data."','".$por."');";
 $ok17=mysql_query($cad_codigos17,$conn);
 
}
if($_POST[codigo18]!=NULL){
//Busca do valor do codigo
$busca_codigo18="select * from tabela where id = '".$_POST[codigo18]."';";
$res_busca_codigo18=mysql_query($busca_codigo18,$conn);
$campo_codigo18=mysql_fetch_array($res_busca_codigo18);

 $cad_codigos18="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo18]."','".$campo_codigo18[valor]."','".$data."','".$por."');";
  $ok18=mysql_query($cad_codigos18,$conn);
  
}
if($_POST[codigo19]!=NULL){
//Busca do valor do codigo
$busca_codigo19="select * from tabela where id = '".$_POST[codigo19]."';";
$res_busca_codigo19=mysql_query($busca_codigo19,$conn);
$campo_codigo19=mysql_fetch_array($res_busca_codigo19);

 $cad_codigos19="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo19]."','".$campo_codigo19[valor]."','".$data."','".$por."');";
 $ok19=mysql_query($cad_codigos19,$conn);
 
}
if($_POST[codigo20]!=NULL){
//Busca do valor do codigo
$busca_codigo20="select * from tabela where id = '".$_POST[codigo20]."';";
$res_busca_codigo20=mysql_query($busca_codigo20,$conn);
$campo_codigo20=mysql_fetch_array($res_busca_codigo20);

 $cad_codigos20="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo20]."','".$campo_codigo20[valor]."','".$data."','".$por."');";
  $ok20=mysql_query($cad_codigos20,$conn);
  
}
if($_POST[codigo21]!=NULL){
//Busca do valor do codigo
$busca_codigo21="select * from tabela where id = '".$_POST[codigo21]."';";
$res_busca_codigo21=mysql_query($busca_codigo21,$conn);
$campo_codigo21=mysql_fetch_array($res_busca_codigo21);

 $cad_codigos21="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo21]."','".$campo_codigo21[valor]."','".$data."','".$por."');";
 $ok21=mysql_query($cad_codigos21,$conn);
 
}  
if($_POST[codigo22]!=NULL){
//Busca do valor do codigo
$busca_codigo22="select * from tabela where id = '".$_POST[codigo22]."';";
$res_busca_codigo22=mysql_query($busca_codigo22,$conn);
$campo_codigo22=mysql_fetch_array($res_busca_codigo22);

 $cad_codigos22="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo22]."','".$campo_codigo22[valor]."','".$data."','".$por."');";
  $ok22=mysql_query($cad_codigos22,$conn);
  
}
if($_POST[codigo23]!=NULL){
//Busca do valor do codigo
$busca_codigo23="select * from tabela where id = '".$_POST[codigo23]."';";
$res_busca_codigo23=mysql_query($busca_codigo23,$conn);
$campo_codigo23=mysql_fetch_array($res_busca_codigo23);

 $cad_codigos23="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo23]."','".$campo_codigo23[valor]."','".$data."','".$por."');";
 $ok23=mysql_query($cad_codigos23,$conn);
}
if($_POST[codigo24]!=NULL){
//Busca do valor do codigo
$busca_codigo24="select * from tabela where id = '".$_POST[codigo24]."';";
$res_busca_codigo24=mysql_query($busca_codigo24,$conn);
$campo_codigo24=mysql_fetch_array($res_busca_codigo24);

 $cad_codigos24="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo24]."','".$campo_codigo24[valor]."','".$data."','".$por."');";
  $ok24=mysql_query($cad_codigos24,$conn);
}
if($_POST[codigo25]!=NULL){
//Busca do valor do codigo
$busca_codigo25="select * from tabela where id = '".$_POST[codigo25]."';";
$res_busca_codigo25=mysql_query($busca_codigo25,$conn);
$campo_codigo25=mysql_fetch_array($res_busca_codigo25);

 $cad_codigos25="insert into faturar values ('','".$_GET[id]."','".$tipo_tabela."','".$_POST[codigo25]."','".$campo_codigo25[valor]."','".$data."','".$por."');";
   $ok25=mysql_query($cad_codigos25,$conn);
}    
 
   $consulta_ft = mysql_query("SELECT sum(valor_codigo) as total FROM faturar WHERE id_exame = '".$_GET[id]."'") or die(mysql_error());
$total_faturado= mysql_result($consulta_ft,0,"total");
 
 echo "<font size=6 class=style4>Valor total faturado R$ <strong>$total_faturado</strong></font>";
 
  
 
}
?>
</body>

</html>

