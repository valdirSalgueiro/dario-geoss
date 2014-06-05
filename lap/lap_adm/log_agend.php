<?php
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{
 include('estiloc.css');
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
	background-image: url(img/contato.JPG);
}
</style>
<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
.style2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>
<form name="demoform" method=post>
<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Log de Agendamentos :</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td class="style10">Por Data :</td>
  <td><input name="dc" value="" size="11">
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style2"> &nbsp;</span></td>
</tr>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

<tr><td></td><td>&nbsp;</td></tr>
</table>

<table border=0>

<tr><td width=40></td><td width="257"><input name="buscar" type=submit class=botao id="buscar" value=" Buscar ">
  <input name="todos" type=submit class=botao id="todos" value="Exibir Todos">
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>


<?php
if($_POST['todos']){
$data = date("d/m/Y");
$nome=$_POST['nome'];
$ex_status_id=$_POST['ex_status_id'];


 $busca_ex.="select * from agendamentos order by id asc;";
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
   
     echo "<tr height=20><td bordercolor=white>$i</td><td bordercolor=white>$campo_ex[paciente]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_ex[medico]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[data]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[convenio]</td><td bordercolor=white>&nbsp;&nbsp;($campo_ex[ddd]) $campo_ex[telefone]</td><td bordercolor=white><a href='log_a.php?id=$campo_ex[id]' target='_blank'>Log</a></tr>";

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
}
?>
<?php
//Excluindo um agendamento
if($_POST['excluir']){
$sql = mysql_query("DELETE FROM agendamentos WHERE id = '".$campo_ex[id]."'") or die(mysql_error());
  printf("<script>alert('Excluido.');
   window.location='agendados.php';</script>");
}


?>
<?php
if($_POST['buscar']){

$nome=$_POST['dc'];

if($nome!=NULL)

{

 $busca_ex="select * from agendamentos where";

 $and="";

 if($nome!=NULL)

 {

  $busca_ex.=" data like '%".$nome."%'";

  //$and=" and";

 }

 
 $busca_ex.=" order by id asc;";

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
   $busca_ex2="select * from ex_status where id = '".$_POST[nome]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);

   echo "<tr height=20><td bordercolor=white>$i</td><td bordercolor=white>$campo_ex[paciente]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_ex[medico]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[data]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[convenio]</td><td bordercolor=white>&nbsp;&nbsp;($campo_ex[ddd]) $campo_ex[telefone]</td><td bordercolor=white><a href='log_a.php?id=$campo_ex[id]' target='_blank'>Log</a></tr>";

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

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro de agendamento para a data $_POST[dc] .";

 }

}
}
?>
</form>
</body>

</html>

