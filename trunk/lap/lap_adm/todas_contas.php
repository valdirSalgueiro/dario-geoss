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
	background-image: url(img/background.PNG);
}
    </style>
<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
.style8 {
	font-size: 15px;
	font-weight: bold;
	color: #000000;
}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
-->
</style>
<body class=fonte>

<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Contas:</font></h1>
<hr color=black size=2>
<form name=form1 method=post>
<table border=0 class=fonte>
  <tr>
    <td width="65">Filtrar Por:</td>
    <td width="340"><select name="tipo" id="tipo">
      <option value=""></option>
      <option value="Salario">Sal&aacute;rio</option>
      <option value="Pago">Pago</option>
      <option value="Recebido">Recebido</option>
    </select></td>
  </tr>
  <tr>
    <td></td>
    <td><input name="buscar" type=submit class=botao id="buscar" value=" Buscar ">
      <?php if($_POST['buscar']!=NULL){ ?><input name="todos" type=submit class=botao id="todos" value="Exibir Todos"><?php } ?></td>
  </tr>
</table></form>
<table width="190" border="0">
  <tr>
    <td colspan="2"><div align="left" class="style8">Legenda</div></td>
  </tr>
  <tr>
    <td width="21"><img src="img/nao.png" width="16" height="15"></td>
    <td width="159"><span class="style9">N&atilde;o Pago</span></td>
  </tr>
  <tr>
    <td><img src="img/sim.png" width="15" height="16"></td>
    <td class="style9">Pago</td>
  </tr>
</table>
<br>
<br>
<?php
$tipo=$_POST['tipo'];
if($tipo==NULL){
 $busca_ex.="select * from contas order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {
  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>De</th><th bordercolor=white>Vencimento</th><th bordercolor=white>Valor</th><th bordercolor=white>Tipo</th><th bordercolor=white>Status</th></tr>";
  for($x=0;$x<$num_ex;$x++)
  {

   $campo_ex=mysql_fetch_array($res_busca_ex);
   //Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$campo_ex[ex_status_id]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);
   if(($campo_ex[tipo]=='Salario')or($campo_ex[tipo]=='Pago')){
   $tipo= "<font color=red>$campo_ex[tipo]</font>";
   }
   if($campo_ex[tipo]=='Recebido'){
   $tipo= "<font color=blue>$campo_ex[tipo]</font>";
   } 
   
     echo "<tr height=20><td bordercolor=white>$campo_ex[de]</td><td bordercolor=white>$campo_ex[vencimento]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[valor],00</td><td bordercolor=white>&nbsp;&nbsp;$tipo</td><td bordercolor=white>&nbsp;&nbsp;<a href='pago.php?id=$campo_ex[id]' alt='Não Pago' target='_blank'><img src=img/nao.png border=0></a></td></tr>";

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
//Contando as contas pagas
$consulta_ex = mysql_query("SELECT SUM(valor) AS total from contas WHERE tipo='Salario' or tipo='Pago'") or die(mysql_error());
$total_pago = mysql_result($consulta_ex,0,"total");

//Contando as contas recebidas
$consulta_recebido = mysql_query("SELECT SUM(valor) AS total from contas WHERE tipo='Recebido'") or die(mysql_error());
$total_recebido = mysql_result($consulta_recebido,0,"total");

//Puxando o valor total
$total_geral = $total_recebido-$total_pago;
if($total_pago>$total_recebido){
$msg="O saldo está negativo em R$ $total_geral,00";
}
if($total_pago==$total_recebido){
$msg="O saldo está zerado";
}
if($total_pago<$total_recebido){
$msg="O saldo está positivo em R$ $total_geral,00";
}
echo "<br><br>Total Pago : R$&nbsp; <strong><font color=red>$total_pago</font></strong>&nbsp;&nbsp;&nbsp;";
echo "Total Recebido : R$&nbsp; <strong><font color=blue>$total_recebido,00</font></strong>&nbsp;&nbsp;&nbsp;";
echo "<br><strong>$msg</strong>";
}
 ?>
 <?php
$tipo=$_POST['tipo'];
if($tipo!=NULL){

 $busca_ex.="select * from contas WHERE tipo='".$tipo."' order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {
  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>De</th><th bordercolor=white>Vencimento</th><th bordercolor=white>Valor</th><th bordercolor=white>Tipo</th><th bordercolor=white>Status</th></tr>";
  for($x=0;$x<$num_ex;$x++)
  {

   $campo_ex=mysql_fetch_array($res_busca_ex);
   //Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$campo_ex[ex_status_id]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);
   if(($campo_ex[tipo]=='Salario')or($campo_ex[tipo]=='Pago')){
   $tipo= "<font color=red>$campo_ex[tipo]</font>";
   }
   if($campo_ex[tipo]=='Recebido'){
   $tipo= "<font color=blue>$campo_ex[tipo]</font>";
   } 
   
     echo "<tr height=20><td bordercolor=white>$campo_ex[de]</td><td bordercolor=white>$campo_ex[vencimento]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[valor],00</td><td bordercolor=white>&nbsp;&nbsp;$tipo</td><td bordercolor=white>&nbsp;&nbsp;<a href='pago.php?id=$campo_ex[id]' alt='Não Pago' target='_blank'><img src=img/nao.png border=0></a></td></tr>";

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
//Contando as contas pagas
$consulta_ex = mysql_query("SELECT SUM(valor) AS total from contas WHERE tipo='Salario' or tipo='Pago'") or die(mysql_error());
$total_pago = mysql_result($consulta_ex,0,"total");

//Contando as contas recebidas
$consulta_recebido = mysql_query("SELECT SUM(valor) AS total from contas WHERE tipo='Recebido'") or die(mysql_error());
$total_recebido = mysql_result($consulta_recebido,0,"total");

//Puxando o valor total
$total_geral = $total_recebido-$total_pago;
if($total_pago>$total_recebido){
$msg="O saldo está negativo em R$ $total_geral,00";
}
if($total_pago==$total_recebido){
$msg="O saldo está zerado";
}
if($total_pago<$total_recebido){
$msg="O saldo está positivo em R$ $total_geral,00";
}
echo "<br><br>Total Pago : R$&nbsp; <strong><font color=red>$total_pago</font></strong>&nbsp;&nbsp;&nbsp;";
echo "Total Recebido : R$&nbsp; <strong><font color=blue>$total_recebido,00</font></strong>&nbsp;&nbsp;&nbsp;";
echo "<br><strong>$msg</strong>";
}
 ?>
</body>
</html>