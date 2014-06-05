<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');
 include('functions.php');
 include('fckeditor/fckeditor.php');
 
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<script language="javascript">
function submitar(){
document.demoform.submit();
}

</script>
<script language="javascript">

function abrir(pagina,nome,caracteristicas) {

	window.open(pagina,nome,caracteristicas);

	

}
</script>

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
<body class=fonte>
<?php
/*
$_POST[edia];
$_POST[emes];
$_POST[eano];
$_POST[ehora];
$_POST[emin];

$_POST[sdia];
$_POST[smes];
$_POST[sano];
$_POST[shora];
$_POST[smin];
*/

if($_POST['gravar']){

$data = explode("/",$_POST['dc']);
$diaEnt = $data[0];
$mesEnt = $data[1];
$anoEnt = $data[2];
$ano_exame = date("Y");
$id_pac=$_POST['id_pac'];
$id_med=$_POST['id_med'];
$ex_status_id=1;
$data_entrada=mktime($_POST[ehora], $_POST[emin], 0, $_POST[emes], $_POST[edia], $_POST[eano]);
$data_previsao=mktime($_POST[shora], $_POST[smin], 0, $_POST[smes], $_POST[sdia], $_POST[sano]);
$data_saida='';
$convenio=$_POST['convenio'];
$data_saida=0;
$id_ex=$_POST['id_ex'];
$material=$_POST['material'];
$lab=$_POST['lab'];
$macroscopia=$_POST['macroscopia'];
$microscopia='';
$conclusao='';
$valor='';
$obs_entrada=$_POST['obs_entrada'];
$obs_saida=NULL;

if(($id_med!='')and($data_entrada!='')and($data_previsao!='')and($lab!=''))
{


##Gerar o ID do exame de acordo com os cadastrados##

$busca_tipos="select * from tipo_exame where id_ex = '5';";
$res_busca_tipos=mysql_query($busca_tipos,$conn);
$campo_tipos=mysql_fetch_array($res_busca_tipos);

$busca_tipos2="select * from tipo_exame where id_ex = '7';";
$res_busca_tipos2=mysql_query($busca_tipos2,$conn);
$campo_tipos2=mysql_fetch_array($res_busca_tipos2);

$busca_tipos3="select * from tipo_exame where id_ex = '10';";
$res_busca_tipos3=mysql_query($busca_tipos3,$conn);
$campo_tipos3=mysql_fetch_array($res_busca_tipos3);

$busca_tipos4="select * from tipo_exame where id_ex = '11';";
$res_busca_tipos4=mysql_query($busca_tipos4,$conn);
$campo_tipos4=mysql_fetch_array($res_busca_tipos4);

$busca_tipos5="select * from tipo_exame where id_ex = '12';";
$res_busca_tipos5=mysql_query($busca_tipos5,$conn);
$campo_tipos5=mysql_fetch_array($res_busca_tipos5);
//TIPO DE EXAME SENDO :Citologia, Citologia oncotica, Colposcopia e Descarga papilar
if(($_POST['id_ex']==$campo_tipos[id_ex])or($_POST['id_ex']==$campo_tipos2[id_ex])or($_POST['id_ex']==$campo_tipos3[id_ex])or($_POST['id_ex']==$campo_tipos4[id_ex])or($_POST['id_ex']==$campo_tipos5[id_ex])){


//Buscando o tipo de exame sendo Citologia, Citologia oncotica, Colposcopia e Descarga papilar 
$busca_id_exa="select * from exame where tipo = '".$campo_tipos[id_ex]."' or tipo = '".$campo_tipos2[id_ex]."' or tipo = '".$campo_tipos3[id_ex]."' or tipo = '".$campo_tipos4[id_ex]."' or tipo = '".$campo_tipos5[id_ex]."' order by id_exame DESC limit 0,1;";
$res_busca_id_exa=mysql_query($busca_id_exa,$conn);
$campo_id_exa=mysql_fetch_array($res_busca_id_exa);


if(($campo_id_exa['id']=='')or($campo_id_exa['id']=='0')){
$id_exame = $_GET['id'];
} else {

$id_exame = $_GET['id'];
}
}
//Até aqui


##Gerar o ID do exame de acordo com os cadastrados##

$busca_tiposb="select * from tipo_exame where id_ex = '1';";
$res_busca_tiposb=mysql_query($busca_tiposb,$conn);
$campo_tiposb=mysql_fetch_array($res_busca_tiposb);

$busca_tipos2b="select * from tipo_exame where id_ex = '3';";
$res_busca_tipos2b=mysql_query($busca_tipos2b,$conn);
$campo_tipos2b=mysql_fetch_array($res_busca_tipos2b);

$busca_tipos3b="select * from tipo_exame where id_ex = '6';";
$res_busca_tipos3b=mysql_query($busca_tipos3b,$conn);
$campo_tipos3b=mysql_fetch_array($res_busca_tipos3b);

$busca_tipos4b="select * from tipo_exame where id_ex = '9';";
$res_busca_tipos4b=mysql_query($busca_tipos4b,$conn);
$campo_tipos4b=mysql_fetch_array($res_busca_tipos4b);

//TIPO DE EXAME SENDO :Citologia, Citologia oncotica, Colposcopia e Descarga papilar
if(($_POST['id_ex']==$campo_tiposb[id_ex])or($_POST['id_ex']==$campo_tipos2b[id_ex])or($_POST['id_ex']==$campo_tipos3b[id_ex])or($_POST['id_ex']==$campo_tipos4b[id_ex])){


//Buscando o tipo de exame sendo Citologia, Citologia oncotica, Colposcopia e Descarga papilar 
$busca_id_exa="select * from exame where tipo = '".$campo_tiposb[id_ex]."' or tipo = '".$campo_tipos2b[id_ex]."' or tipo = '".$campo_tipos3b[id_ex]."' or tipo = '".$campo_tipos4b[id_ex]."' order by id_exame DESC limit 0,1;";
$res_busca_id_exa=mysql_query($busca_id_exa,$conn);
$campo_id_exa=mysql_fetch_array($res_busca_id_exa);


if(($campo_id_exa['id']=='')or($campo_id_exa['id']=='0')){
$id_exame = $_GET['id'];
} else {

$id_exame = $_GET['id'];
}
}
//Até aqui


##Gerar o ID do exame de acordo com os cadastrados##

$busca_tiposc="select * from tipo_exame where id_ex = '2';";
$res_busca_tiposc=mysql_query($busca_tiposc,$conn);
$campo_tiposc=mysql_fetch_array($res_busca_tiposc);

$busca_tipos2c="select * from tipo_exame where id_ex = '4';";
$res_busca_tipos2c=mysql_query($busca_tipos2c,$conn);
$campo_tipos2c=mysql_fetch_array($res_busca_tipos2c);

$busca_tipos3c="select * from tipo_exame where id_ex = '8';";
$res_busca_tipos3c=mysql_query($busca_tipos3c,$conn);
$campo_tipos3c=mysql_fetch_array($res_busca_tipos3c);


//TIPO DE EXAME SENDO :Citologia, Citologia oncotica, Colposcopia e Descarga papilar
if(($_POST['id_ex']==$campo_tiposc[id_ex])or($_POST['id_ex']==$campo_tipos2c[id_ex])or($_POST['id_ex']==$campo_tipos3c[id_ex])){


//Buscando o tipo de exame sendo Citologia, Citologia oncotica, Colposcopia e Descarga papilar 
$busca_id_exa="select * from exame where tipo = '".$campo_tiposc[id_ex]."' or tipo = '".$campo_tipos2c[id_ex]."' or tipo = '".$campo_tipos3c[id_ex]."' order by id_exame DESC limit 0,1;";
$res_busca_id_exa=mysql_query($busca_id_exa,$conn);
$campo_id_exa=mysql_fetch_array($res_busca_id_exa);


if(($campo_id_exa['id']=='')or($campo_id_exa['id']=='0')){
$id_exame = $_GET['id'];
} else {

$id_exame = $_GET['id'];
}
}
//Até aqui

/*
 $busca_ex1="select * from exame where paciente_id = '".$id_pac."';";
 $res_busca_ex1=mysql_query($busca_ex1,$conn);
 $num_ex1=mysql_num_rows($res_busca_ex1);
 if($num_ex1==0)

 {
*/
$ano_exame = date("Y");
   $cad_ex="insert into exame values ('','".$id_exame."','".$id_pac."','".$id_med."','','".$convenio."','".$campo_cod2['tipo']."','".$codigo_procedimento."','','','".$ex_status_id."','".$data_entrada."','".$data_previsao."','".$data_saida."','".$id_ex."','".$material."','".$lab."','".$macroscopia."','','".$microscopia."','','".$conclusao."','','','','','','','".$valor."','".$obs_entrada."','".$obs_saida."','','','','','','".$usuario_autenticado."','','','','','".$ano_exame."');";
	;

  $ok=mysql_query($cad_ex,$conn);
  

  

  if($ok==1)

  {
   //Pega o último id
   $last_id = mysql_insert_id();
   //echo $last_id;
  
	$_SESSION["macroscopia"]=NULL;
	
     
    echo "<script>alert('Exame Cadastrado com Sucesso. Exame Nº  $id_exame');window.open('reimp.php?id=$id_exame');</script>";
	
	//printSuccess("Exame Nº $last_id  Cadastrado com sucesso","100","ent.php?id=$last_id");
      //  exit;

  }

  else

  {

   printerror("Erro no cadastro.");
        exit;

  }
/*
 }

 else

 {

  echo "<script>alert('O suprimento: $nome_suprimento já está cadastrado.');</script>";

 }
*/
}
}

?>

<h1 class="style3"><font face=verdana><img src="images/arquivo.jpg" width="48" height="48"> GSL - Guia Servi&ccedil;os Laboratoriais:</font></h1>
<hr color=black size=2>
<span class="style1"><br>
</span><br>
<?php
$busca_paci="select * from paciente where rg = '".$_POST[rg]."' or id = '".$_POST[id_pac]."';";
$res_busca_paci=mysql_query($busca_paci,$conn);
$campo_paci=mysql_fetch_array($res_busca_paci);


?>
<form name="demoform" method=post>
<table border=0 class=fonte>
<tr>
  <td width="174">RG :</td>
  <td width="367"><select name="rg" class="caixa" id="rg" onChange="submitar()">
    <?php if($_POST['id_pac']!=NULL){ 
   printf("<option value='$campo_paci[rg]'>$campo_paci[rg]");
    } else { ?>
	<?php if($_POST['rg']!=NULL){ 
   printf("<option value='$_POST[rg]'>$campo_paci[rg]");
    } else { ?>
	<?php
$busca_conv="select * from paciente order by rg asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);

if($num_conv==0)
{

 printf("<option value=''>Nenhum RG encontrado");

}

else

{

 printf("<option value=''>");
 for($x=0;$x<$num_conv;$x++)

 {

  $campo_conv=mysql_fetch_array($res_busca_conv);
  printf("<option value='$campo_conv[rg]'>$campo_conv[rg]");
  

 }

}
}
}
?>
    </select>
    &nbsp;&nbsp;<a href="pac.php"></a> </td>
</tr>
<?php
##Busca do id convenio do usuario##
$busca_conve="select * from paciente where id = '".$_POST['id_pac']."';";
$res_busca_conve=mysql_query($busca_conve,$conn);
$campo_conve=mysql_fetch_array($res_busca_conve);
?>
<tr>
  <td width="174">Paciente :</td>
  <td width="367"><select name="id_pac" class="caixa" id="id_pac" onChange="submitar()">
    <?php if($_POST['id_pac']!=NULL){ 
   printf("<option value='$campo_paci[id]'>$campo_paci[nome]");
    } else { ?>
	<?php if($_POST['rg']!=NULL){ 
   printf("<option value='$campo_conve[id]'>$campo_paci[nome]");
    } else { ?>
    <?php
$busca_conv="select * from paciente order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);

if($num_conv==0)
{

 printf("<option value=''>Nenhum paciente encontrado");

}

else

{

 printf("<option value=''>");
 for($x=0;$x<$num_conv;$x++)

 {

  $campo_conv=mysql_fetch_array($res_busca_conv);
  printf("<option value='$campo_conv[id]'>$campo_conv[nome]");
  

 }

}
}
}
?>
  </select>    &nbsp;&nbsp;<a href="pac.php"></a> </td>
</tr>

<?php
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$hora = date("H");
$min = date("i");
?>
<?php if($_POST['id_pac']!=NULL){ 
   printf("$campo_paci[rg]");
    } ?>
<tr>
  <td>Data de Entrada :</td>
  <td> <input name="edia" id="edia" value="<?php echo $dia; ?>" size="2" maxlength="2">    
    <span class="style1"> /
    <input name="emes" id="emes" value="<?php echo $mes; ?>" size="2" maxlength="2">
    /
    <input name="eano" id="eano" value="<?php echo $ano; ?>" size="4" maxlength="4">
-
<input name="ehora" id="ehora" value="<?php echo $hora; ?>" size="2" maxlength="2">    
:
<input name="emin" id="emin" value="<?php echo $min; ?>" size="2" maxlength="2"> 
( dd / mm / aaaa - HH : mm )
&nbsp;</span></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<?php
$busca_exa="select * from tipo_exame where id_ex = '".$_POST[id_ex]."';";
$res_busca_exa=mysql_query($busca_exa,$conn);
$campo_exa=mysql_fetch_array($res_busca_exa);
?>
<tr>
  <td>Tipo de Exame :</td>
  <td><select name="id_ex" class="caixa" id="id_ex" onChange="submitar()">
    <?php if($_POST['id_ex']!=NULL){ 
   printf("<option value='$_POST[id_ex]'>$campo_exa[nome]");
    } else { ?>
	<?php
$busca_tex="select * from tipo_exame order by id_ex asc;";
$res_busca_tex=mysql_query($busca_tex,$conn);
$num_tex=mysql_num_rows($res_busca_tex);
if($num_tex==0)
{
 printf("<option value=''>Nenhum tipo de exame encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_tex;$x++)

 {

  $campo_tex=mysql_fetch_array($res_busca_tex);

  printf("<option value='$campo_tex[id_ex]'>$campo_tex[nome]");
  

 }

}
}
?>
    </select>
    &nbsp;&nbsp;<a href="cad_tipo.php"></a></td>
</tr>
<tr>
  <td><span class="style10">C&oacute;d Macroscopia:</span></td>
  <td><span class="style10">
    <select name="codigo_mac" class="caixa" id="codigo_mac" onChange="submitar()">
      <?php
$busca_atendimentos="select * from codigo_mac order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo macroscopia encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[id]</option>");
  

 }

}

?>
    </select>
  </span><span class="style10"><a href="javascript:abrir('codigos_macroscopia2.php?id=<?php echo $_GET[id];?>','IPS','width=800, height=650, resizable=no, scrollbars=yes, scrolbar=yes, status=no')"><span class="style18 style38"><img src="images/BotaoLupa.jpg" width="34" border="0" height="30"></a>
    <?php
    if( $_POST['codigo_mac']!=''){
	//die('entrou');
	$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql2="select * from codigo_mac where id  = ".$_POST['codigo_mac']."";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	$campo_ex['macroscopia'] = $row2['descricao'];
	if( $_SESSION["macroscopia"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["macroscopia"]= "$_SESSION[macroscopia] $nbsp $campo_ex[macroscopia]";
		
	} else {
	
    $_SESSION["macroscopia"]=$campo_ex['macroscopia'];
	}
	}
	
	if( $_POST['codigo_conc']!=''){
	//die('entrou');
	$campo_ex['macroscopia'] = $_POST['macroscopia'];
	$sql="select * from codigo_conc  where id  = ".$_POST['codigo_conc']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['conclusao'] = $row['descricao'];
	
	}
	
	?>
    </span></td>
</tr>
<tr>
  <td><span class="style10">Macroscopia :</span></td>
  <td><span class="style10">
    <?php
if($_SESSION[macroscopia]!=NULL){
$mac="$_SESSION[macroscopia] $_GET[codigo_mac]";
} else {
$mac='';
}
$oFCKeditor = new FCKeditor('macroscopia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $mac;

$oFCKeditor->Create();

?>
  </span></td>
</tr>

<tr>
</tr><tr><td>Material :</td>
  <td><select name="material" class="caixa" id="material">
    <?php
$busca_med="select * from material order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum material encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med;$x++)

 {

  $campo_med=mysql_fetch_array($res_busca_med);

  printf("<option value='$campo_med[nome]'>$campo_med[nome]");
  

 }

}

?>
    </select>
    &nbsp;&nbsp;<a href="cad_material.php"></a></td>
</tr>
<tr>
</tr><tr><td>Laboratório :</td>
  <td><select name="lab" class="caixa" id="lab">
    <?php
$busca_med="select * from lab order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum laboratório encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med;$x++)

 {

  $campo_med=mysql_fetch_array($res_busca_med);

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
    </select>
    &nbsp;&nbsp;<a href="cad_lab.php"></a></td>
</tr>

<tr>
  <td>Solicita&ccedil;&atilde;o :</td>
  <td><select name="id_med" class="caixa" id="id_med">
    <?php
$busca_med="select * from medico order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum médico encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med;$x++)

 {

  $campo_med=mysql_fetch_array($res_busca_med);

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
    </select>
    &nbsp;&nbsp;<a href="cad_med.php"></a></td>
</tr>
<?php
##Busca do id convenio do usuario##
$busca_conve="select * from convenio where nome = '".$campo_paci[convenio]."';";
$res_busca_conve=mysql_query($busca_conve,$conn);
$campo_conve=mysql_fetch_array($res_busca_conve);
?>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?php if($_POST['id_pac']!=NULL){ 
   printf("<option value='$campo_conve[id]'>$campo_paci[convenio]");
    } else {  ?>
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

  printf("<option value='$campo_conv[id]'>$campo_conv[nome]");
  

 }

}
}
?>
  </select>    &nbsp;&nbsp;<a href="cad_conv.php"></a></td>
</tr><tr><td>&nbsp;</td>
</tr>
<tr>
  <td>Observa&ccedil;&atilde;o :</td>
  <td><textarea name="obs_entrada" id="obs_entrada" cols="40" rows="5" onKeyup='ContaCaracteres(this, demoform.caracteres, 150);'></textarea>
  <br>Caracteres Restantes:
    <input name="caracteres" type="text" disabled value="150" size="3" maxlength="3" class=botao></td>
</tr>
<?php
##Calcular dias automático de acordo com o tipo de exame selecionado##


//Buscando o tipo do exame para saber quantos dias serão
$busca_tipo_exame="select * from tipo_exame where id_ex = '".$_POST[id_ex]."';";
$res_busca_tipo_exame=mysql_query($busca_tipo_exame,$conn);
$campo_tipo_exame=mysql_fetch_array($res_busca_tipo_exame);
//Até aqui

if($_POST[id_ex]!=NULL){
//Contando os dias e transformando em data
$dias = $campo_tipo_exame['dias'];
$timestamp=strtotime("+$dias day");
$data_vencimento=date('d/m/Y', $timestamp);
$dia_previsao=date('d', $timestamp);
$mes_previsao=date('m', $timestamp);
$ano_previsao=date('Y', $timestamp);
$dia_semana_previsao=date('w',$timestamp);


//Se o dia for igual a sexta
if($dia_semana_previsao==5){
$dias = $dias+3;
$timestamp=strtotime("+$dias day");
$data_vencimento=date('d/m/Y', $timestamp);
$dia_previsao=date('d', $timestamp);
$mes_previsao=date('m', $timestamp);
$ano_previsao=date('Y', $timestamp);
$dia_semana_previsao=date('w',$timestamp);
}


//Se o dia for igual a sábado
if($dia_semana_previsao==6){
$dias = $dias+2;
$timestamp=strtotime("+$dias day");
$data_vencimento=date('d/m/Y', $timestamp);
$dia_previsao=date('d', $timestamp);
$mes_previsao=date('m', $timestamp);
$ano_previsao=date('Y', $timestamp);
$dia_semana_previsao=date('w',$timestamp);
}


//Se o dia for igual a domingo
if($dia_semana_previsao==0){
$dias = $dias+1;
$timestamp=strtotime("+$dias day");
$data_vencimento=date('d/m/Y', $timestamp);
$dia_previsao=date('d', $timestamp);
$mes_previsao=date('m', $timestamp);
$ano_previsao=date('Y', $timestamp);
$dia_semana_previsao=date('w',$timestamp);
}
}
##Até aqui a função##
?>
  <td>Previs&atilde;o de Saida: </td>
  <td><input name="sdia" id="sdia" value="<?php echo $dia_previsao; ?>" size="2" maxlength="2">
    <span class="style1"> /
    <input name="smes" id="smes" value="<?php echo $mes_previsao; ?>" size="2" maxlength="2">
/
<input name="sano" id="sano" value="<?php echo $ano_previsao; ?>" size="4" maxlength="4">
-
<input name="shora" id="shora" value="<?php echo "17"; ?>" size="2" maxlength="2">
:
<input name="smin" id="smin" value="<?php echo "00"; ?>" size="2" maxlength="2"> 
( dd / mm / aaaa - HH : mm )</span> </td>
 <tr><td><br><br>ID : 
     <input name="id" type="text" id="id" value="<?php echo $_GET['id']; ?>" disabled size="4" maxlength="4">
  </td>
 <td><br><br><input name="gravar" type=submit class=botao id="gravar" value='Gravar'> 
  &nbsp;&nbsp;
  <input name="reiniciar" type=submit class=botao id="reiniciar" value='Reiniciar'>
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </td>
</tr>
<tr><td></td>
    </td>
</tr></form>

<?php
if($_POST['reiniciar']){
$_SESSION["microscopia"]=NULL;
$_SESSION["codigo_conc"]=NULL;
$_SESSION["macroscopia"]=NULL;
echo "<script>window.location='ent.php';</script>";
}
?>



</body>
</html>

