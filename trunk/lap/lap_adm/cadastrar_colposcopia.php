<?php
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];

if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('tab.css');
 include('conn.php');
 include('data.php');
 ##Busca o id do exame##
 
 $busca_ex="select * from schiller where id = '".$id."';";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);
 if($num_ex>0)
 {
  $campo_ex=mysql_fetch_array($res_busca_ex);
 }
 
 ##Até aqui
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_ex['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_ex['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
 
   ##Busca do nome do exame##
 $busca_exa="SELECT id,nome from ex_status WHERE id = '".$campo_ex['ex_status_id']."'";
 $res_busca_exa=mysql_query($busca_exa,$conn);
 $num_exa=mysql_num_rows($res_busca_exa);
 $campo_exa=mysql_fetch_array($res_busca_exa);
 ##Até aqui##
 
  ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_ex['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
 
   ##Busca do tipo do exame##
 $busca_tipo="SELECT * from tipo_exame WHERE id_ex = '".$campo_ex['tipo']."'";
 $res_busca_tipo=mysql_query($busca_tipo,$conn);
 $num_tipo=mysql_num_rows($res_busca_tipo);
 $campo_tipo=mysql_fetch_array($res_busca_tipo);
 ##Até aqui##
 
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
.style4 {
	font-size: 12px;
	color: #000080;
}
.style6 {font-size: 12px; color: #000080; font-weight: bold; }
-->
</style>
<link href="botoes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {color: #000033}
.style8 {
	color: #FFFFFF;
	font-weight: bold;
}
.style9 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style11 {color: #000000; font-weight: bold; font-size: 12px; }
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b><br>
  </b></font><font face=verdana><b><span class="style7">Cadastro de Colposcopia:</span></b></font></h1>
<hr color=black size=2>

<div align="center"><br>
<table width="750" border="1">
  <tr>
    <td width="238"><div align="center"><img src="colposcopia.PNG" width="176" height="213"></div></td>
    <td width="496"><table width="476" border="1" align="center">
      <tr>
        <td colspan="2" bgcolor="#333333"><div align="center"><span class="style9">CADASTRO</span></div></td>
      </tr>
      <tr>
        <td width="203"><span class="style11">JEC ANTERIOR </span></td>
        <td width="257"><input name=jec_anterior type=text class=botao id="jec_anterior" size=5></td>
      </tr>
      <tr>
        <td><span class="style11">JEC POSTERIOR </span></td>
        <td><input name=jec_posterior type=text class=botao id="jec_posterior" size=5></td>
      </tr>
      <tr>
        <td><span class="style11">&Uacute;LTIMA GLANDULA </span></td>
        <td><input name=ultima_glandula type=text class=botao id="ultima_glandula" size=5></td>
      </tr>
      <tr>
        <td><span class="style11">TESTE SCHILLER </span></td>
        <td><select name="schiller" class="caixa" id="schiller" onChange="submitar()">
          <?php
$busca_atendimentos="select * from schiller order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum Teste de Schiller encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo]'>$campo_atendimentos[codigo]</option>");
  

 }

}

?>
        </select>

              <?php
			  
     if( $_POST['schiller']!=''){
	//die('entrou');
	
	$sql2="select * from schiller where codigo  = ".$_POST['schiller']."";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	$campo_ex['descricao'] = $row2['descricao'];
	if( $_SESSION["schiller"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["schiller"]= "$_SESSION[schiller] $nbsp $campo_ex[descricao]";
		
	} else {
	if($_POST['print']==NULL){
    $_SESSION["schiller"]=$campo_ex['descricao'];
	}
	}
	}
	
	
	?>
          &nbsp;&nbsp;<a href="cad_schiller.php">Cadastrar ?</a></td>
      </tr>
      <tr>
        <td><span class="style11">DESCRI&Ccedil;&Atilde;O</span></td>
        <td><textarea name="descricao" cols="40" rows="6" id="descricao"><?php echo $_SESSION["schiller"]; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input name="print" type=submit class=botao id="print" value='Imprimir'>
          <input name="cancelar" type=submit class=botao id="cancelar" value='Cancelar'>
          <input name="reiniciar" type=submit class=botao id="reiniciar" value='Reiniciar'>
          <span class="atributos_titulo">
           <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
          </span></div></td>
        </tr>
    </table></td>
  </tr>
</table>
<table border=0 class=fonte>
<tr>
  <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr></tr>
</body>

</html>
<?php
if(($_POST['cancelar'])or($_POST['reiniciar'])){
	$_SESSION["schiller"]=NULL;
   printf("<script>alert('Reiniciando.');
   window.location='cadastrar_colposcopia.php?id=$id';</script>");
}
if($_POST['print']){
$jec_anterior=$_POST['jec_anterior'];
$jec_posterior=$_POST['jec_posterior'];
$ultima_glandula=$_POST['ultima_glandula'];
$descricao=$_POST['descricao'];
$data = mktime();

if(($jec_anterior!='')and($jec_posterior!='')and($ultima_glandula!=''))
{

     $cad_ex="insert into colposcopias values ('".$id."','".$jec_anterior."','".$jec_posterior."','".$ultima_glandula."','".$descricao."','".$_SESSION["usuario_autenticado"]."','".$data."');";

  $ok=mysql_query($cad_ex,$conn);

  if($ok==1)

  {
  $_SESSION["schiller"]=NULL;
   printf("<script>alert('Cadastrado. Imprimindo...');
   window.location='print_colposcopia.php?id=$id';</script>");
}
}
}
?>
<script language="javascript">
function submitar(){
document.form1.submit();
}

</script>