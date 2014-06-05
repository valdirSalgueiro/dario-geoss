<?php

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
<script type="text/javascript" src="messages.js"></script>
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
<style>
#wrapper {width:300px; margin:50px auto}
.form {float:left; padding:0 10px 10px 10px; background:#f3f3f3; border:2px solid #cfcfcf}
.form label {float:left; width:100px; padding:10px 10px 0 0; font-weight:bold}
.form select {float:left; width:146px; margin-top:10px}
.form input {float:left; margin-top:10px}
.form .submit {clear:both}
#msg {display:none; position:absolute; z-index:200; background:url(images/msg_arrow.gif) left center no-repeat; padding-left:7px}
#msgcontent {display:block; background:#f3e6e6; border:2px solid #924949; border-left:none; padding:5px; min-width:150px; max-width:250px}
</style>
<form name="demoform" method=post onSubmit="return validate(this)">

<h1 class="style3"><font face=verdana><img src="images/calendario.jpg" width="50" height="50"> Calend&aacute;rio de Agendamento:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<?php include "calendario.php"; ?>
<strong>* Todos os campos s&atilde;o obrigat&oacute;rios </strong><br>
<br>
<table border=0 class=fonte>


<tr>
<?php
//Contando o número de agendamentos para a data
$data = date("d/m/Y");

$consulta = mysql_query("SELECT count(data) as total FROM agendamentos WHERE data = '".$data."' ") or die(mysql_error());
$total =  mysql_result($consulta,0,"total");
if($_POST['ver']!=NULL)

  {
   printf("<script>
   window.location='agendados.php';</script>");

  }



?>
  <td width="174" class="style10">Data de Congela&ccedil;&atilde;o:</td>
  <td width="367"><input name="dc" value="" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td class="style10">Paciente :</td>
  <td><input name=nome type=text class=botao id="nome" size=50 maxlength=80></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<tr>
  <td class="style10">M&eacute;dico :</td>
  <td><select name="id_med" class="caixa" id="id_med">
    <?php
$busca_med="select * from medico order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum m&eacute;dico encontrado");
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
  </select></td>
</tr>
<tr>
  <td class="style10">Telefone:</td>
  <td><input name=ddd type=text class=botao id="ddd" size=3 maxlength=3>
    -
      <input name=telefone type=text class=botao id="telefone" size=8 maxlength=8></td>
</tr>
<tr>
  <td class="style10">Conv&ecirc;nio :</td>
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

  printf("<option value='$campo_conv[nome]'>$campo_conv[nome]");
  

 }

}

?>
  </select></td>
</tr>
<tr>
  <td><span class="style10">Observa&ccedil;&atilde;o : </span></td>
  <td><textarea name="obs" rows="3" class="botao" id="obs"></textarea></td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input type=submit value='Agendar' class=botao> 
<input type=submit value='Cancelar' class=botao>
<span class="atributos_titulo">
<input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>
</table>

</form>
<?php

$data = date("d/m/Y");
$nome=$_POST['nome'];
$ex_status_id=$_POST['ex_status_id'];


 $busca_ex.="select * from agendamentos  WHERE data = '".$data."' order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>Médico</th><th bordercolor=white>Data Agendamento</th><th bordercolor=white>Convenio</th><th bordercolor=white>Telefone</th><th bordercolor=white>Ação</th></tr>";

  for($x=0;$x<$num_ex;$x++)

  {

   $campo_ex=mysql_fetch_array($res_busca_ex);
   $i++;
   //Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$campo_ex[ex_status_id]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);
   
     echo "<tr height=20><td bordercolor=white>$i</td><td bordercolor=white>$campo_ex[paciente]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_ex[medico]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[data]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[convenio]</td><td bordercolor=white>&nbsp;&nbsp;($campo_ex[ddd]) $campo_ex[telefone]</td><td bordercolor=white><a href='excluir.php?id=$campo_ex[id]' target='conteudo'>Excluir</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='alterar.php?id=$campo_ex[id]' target='conteudo'>Alterar</td></a></tr>";

  }

  echo "</table>";

  echo $num_ex;

  if($num_ex==1)

  {

   echo " Registro.";

  }

  else

  {

   echo " Registros.";

  }

 }

 else

 {

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro para a data de $data.";

 }

?>
<?php
//Excluindo um agendamento
if($_POST['excluir']){
$sql = mysql_query("DELETE FROM agendamentos WHERE id = '".$campo_ex[id]."'") or die(mysql_error());
  printf("<script>alert('Excluido.');
   window.location='agendamento.php';</script>");
}


?>
<?php
$dc=$_POST['dc'];
$nome=$_POST['nome'];
$id_med=$_POST['id_med'];
$ddd=$_POST['ddd'];
$telefone=$_POST['telefone'];
$convenio=$_POST['convenio'];
$por=$_SESSION["usuario_autenticado"];
$obs=$_POST['obs'];
$data_cadastro=mktime();

if(($dc!=NULL)and($nome!=NULL)and($id_med!=NULL)and($ddd!=NULL)and($telefone!=NULL)and($convenio!=NULL)and($obs!=NULL))

{

 $busca_equipamento="select * from agendamentos where paciente = '".$nome."' and data = '".$_POST['dc']."' ;";

 $res_busca_equipamento=mysql_query($busca_equipamento,$conn);

 $num_equipamento=mysql_num_rows($res_busca_equipamento);

 if($num_equipamento==0)

 {

//Contando o número de agendamentos para a data
$data = date("d/m/Y");
$consulta = mysql_query("SELECT count(data) as total FROM agendamentos WHERE data = '".$dc."' ") or die(mysql_error());
$total =  mysql_result($consulta,0,"total");
if($total==17){
printf("<script>alert('Limite de 17 agendamentos alcançado para a data $dc.');
   window.location='agendamento.php';</script>");
die();
}
    $cad_equipamento="insert into agendamentos values ('','".$dc."','".$nome."','".$id_med."','".$ddd."','".$telefone."','".$convenio."','".$por."','".$data_cadastro."','".$obs."');";

  $ok=mysql_query($cad_equipamento,$conn);

  if($ok==1)

  {

   printf("<script>alert('Agendado.');
   window.location='agendamento.php';</script>");

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O paciente: $nome já está cadastrado para $data');</script>";

 }

}

?>

</body>

</html>

