<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');
 include('functions.php');
 
 
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
.style4 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
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
$data = explode("/",$_POST['dc']);
$diaEnt = $data[0];
$mesEnt = $data[1];
$anoEnt = $data[2];
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
$obs_saida='0';

if(($id_pac!='')and($id_med!='')and($data_entrada!='')and($data_previsao!='')and($id_ex!='')and($material!='')and($convenio!='')and($obs_entrada!=''))
{
 $busca_cod2="select * from convenio where id = '".$convenio."';";
   $res_busca_cod2=mysql_query($busca_cod2,$conn);
   $campo_cod2=mysql_fetch_array($res_busca_cod2);
/*
 $busca_ex1="select * from exame where paciente_id = '".$id_pac."';";
 $res_busca_ex1=mysql_query($busca_ex1,$conn);
 $num_ex1=mysql_num_rows($res_busca_ex1);
 if($num_ex1==0)

 {
*/
    $cad_ex="insert into exame values ('','".$id_pac."','".$id_med."','','".$convenio."','".$campo_cod2['tipo']."','".$codigo_procedimento."','".$ex_status_id."','".$data_entrada."','".$data_previsao."','".$data_saida."','".$id_ex."','".$material."','".$lab."','','','".$microscopia."','','".$conclusao."','".$valor."','".$obs_entrada."','".$obs_saida."','','','','','','".$usuario_autenticado."','','');";

  $ok=mysql_query($cad_ex,$conn);

  if($ok==1)

  {
   //Pega o último id
   $last_id = mysql_insert_id();
   //echo $last_id;
   
     
    echo "<script>alert('Exame Cadastrado com Sucesso. Numero :Exame Nº  $last_id');window.open('exame.php?id=$last_id');</script>";
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

?>
<form name="demoform" method=post>
<h1 class="style3"><font face=verdana>Entrada de Exames:</font> <img src="images/arquivo.jpg" width="48" height="48"></h1>
<hr color=black size=2>

<table border=0 class=fonte>
  <tr>
    <td colspan="2" bgcolor="#000033"><div align="center" class="style4">Previs&atilde;o de Sa&iacute;da </div>
        <div align="center"></div>
      <div align="center"></div></td>
    <?php
	$sql = "SELECT * FROM tipo_exame order by id_ex ASC";
	$result = mysql_query($sql);
	  while($row = mysql_fetch_array($result)) { ?>
  </tr>
  <tr>
    <td width="135"><div align="center"><?php print $row['nome']; ?></div></td>
    <td width="595"><strong><?php print $row['dias']; ?></strong> Dias </td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="2" bgcolor="#000033"><div align="center"><span class="style4">CADASTRO</span></div></td>
    </tr>
</table>
<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Paciente :</td>
  <td width="367"><select name="id_pac" class="caixa" id="id_pac">
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

?>
    </select>
    &nbsp;&nbsp;<a href="pac.php">Cadastrar ?</a> </td>
</tr>
<?php
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$hora = date("H");
$min = date("i");
?>

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
<tr>
  <td>Tipo de Exame :</td>
  <td><select name="id_ex" class="caixa" id="id_ex">
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

?>
    </select>
    &nbsp;&nbsp;<a href="cad_tipo.php">Cadastrar ?</a></td>
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

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
    </select>
    &nbsp;&nbsp;<a href="cad_material.php">Cadastrar ?</a></td>
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
    &nbsp;&nbsp;<a href="cad_lab.php">Cadastrar ?</a></td>
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
    &nbsp;&nbsp;<a href="cad_med.php">Cadastrar ?</a></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><select name="convenio" class="caixa" id="convenio">
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

?>
  </select>
    &nbsp;&nbsp;<a href="cad_conv.php">Cadastrar ?</a></td>
</tr><tr><td>&nbsp;</td>
</tr>
<tr>
  <td>Observa&ccedil;&atilde;o :</td>
  <td><textarea name="obs_entrada" id="obs_entrada" cols="40" rows="5" onKeyup='ContaCaracteres(this, demoform.caracteres, 150);'></textarea>
  <br>Caracteres Restantes:
    <input name="caracteres" type="text" disabled value="150" size="3" maxlength="3" class=botao></td>
</tr>
  <td>Previs&atilde;o de Saida: </td>
  <td><input name="sdia" id="sdia" value="" size="2" maxlength="2">
    <span class="style1"> /
    <input name="smes" id="smes" value="" size="2" maxlength="2">
/
<input name="sano" id="sano" value="" size="4" maxlength="4">
-
<input name="shora" id="shora" value="<?php echo "17"; ?>" size="2" maxlength="2">
:
<input name="smin" id="smin" value="<?php echo "00"; ?>" size="2" maxlength="2"> 
( dd / mm / aaaa - HH : mm )</span> </td>
 <tr><td><br><br><input name="gravar" type=submit class=botao id="gravar" value='Gravar'> 
  &nbsp;&nbsp;<input name="cancel" type=submit class=botao id="cancel" value='Cancelar'>&nbsp;&nbsp;<input type=submit value='Reiniciar' class=botao></td>
</tr>
<tr><td></td>
    </td>
    <span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
    </span></tr>
</form>
<?php
if($_POST['cancel']){
echo "<script>window.location='conteudo.php';</script>";
}
?>



</body>
</html>

