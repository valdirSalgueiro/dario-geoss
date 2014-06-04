<?

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id= $_GET['id'];
if($usuario_autenticado!=NULL)

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');
 
 //Buscando o agendamento pelo ID trazido
 $busca_agend="select * from agendamentos where id = '".$id."';";
 $res_busca_agend=mysql_query($busca_agend,$conn);
 $campo_agend=mysql_fetch_array($res_busca_agend);
//Até aqui
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
<body class=fonte>

<form name="demoform" method=post>

<h1 class="style3"><font face=verdana>Altera&ccedil;&atilde;o de  Agendamento:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>


<tr>

  <td width="174">Data  :</td>
  <td width="367"><input name="dc" value="<? echo $campo_agend['data'];  ?>" size="11">
  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Paciente :</td>
  <td><input name=nome type=text class=botao id="nome" value="<? echo $campo_agend['paciente'];  ?>" size=50 maxlength=11></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<tr>
  <td>M&eacute;dico Atual : </td>
  <td><? echo $campo_agend['medico'];  ?></td>
</tr>
<tr>
  <td>M&eacute;dico :</td>
  <td><select name="medico" class="caixa" id="medico">
    <?
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
  <td>Telefone:</td>
  <td><input name=ddd type=text class=botao id="ddd" value="<? echo $campo_agend['ddd'];  ?>" size=3 maxlength=3>
    -
      <input name=telefone type=text class=botao id="telefone" value="<? echo $campo_agend['telefone'];  ?>" size=8 maxlength=8></td>
</tr>
<tr>
  <td>Conv&ecirc;nio Atual : </td>
  <td><? echo $campo_agend['convenio'];  ?></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?
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
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input name="alterar" type=submit class=botao id="alterar" value='Alterar'> 
<input type=submit value='Cancelar' class=botao>
<span class="atributos_titulo">
<input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>
</table>

</form>
<?
//Alterando o agendamento
if($_POST['alterar']){

 $mod_agend = "update agendamentos set data = '".$_POST['dc']."',paciente = '".$_POST['nome']."',medico = '".$_POST['medico']."',ddd = '".$_POST['ddd']."',telefone = '".$_POST['telefone']."',convenio = '".$_POST['convenio']."' where id = '".$id."';";
  
  $ok=mysql_query($mod_agend,$conn);

  if($ok==1)

  {

   echo "<script>alert('O agendamento de $_POST[paciente] foi alterado com sucesso.');

   window.location='agendamento.php';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }
?>
</body>

</html>

