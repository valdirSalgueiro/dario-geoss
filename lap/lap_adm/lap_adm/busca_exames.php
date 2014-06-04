<?
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{
 include('estiloc.css');
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
<h1 class="style1"><font face=verdana><img src="img/Search_grey.gif" width="24" height="24"> Busca de Exames:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<TD class=back2 align=right><div align="left" class="style10">Entre das Datas : </div></td>
    <td class=back><?
$today= getdate();	
$lang_month = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
	
echo '<select name=sday>';
	for ($i= 1; $i < 32; $i ++)
	{
		echo "<option value=$i";
		if ($i == $today['mday'])
			echo " selected";
		echo ">$i</option>\n";
	}
	echo '
								</select>';	
						
echo'<select name=smonth>';
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								
								<select name=syear>
 <option value=2001';
	if ($today['year'] == 2001)
		echo ' selected';
	echo '>2001</option>
	                                <option value=2002';
	if ($today['year'] == 2002)
		echo ' selected';
	echo '>2002</option>
	                                <option value=2003';
	if ($today['year'] == 2003)
		echo ' selected';
	echo '>2003</option>
	                                <option value=2004';
	if ($today['year'] == 2004)
		echo ' selected';
	echo '>2004</option>
	                                <option value=2005';
	if ($today['year'] == 2005)
		echo ' selected';
	echo '>2005</option>
	                                <option value=2006';
	if ($today['year'] == 2006)
		echo ' selected';
	echo '>2006</option>
	                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option>
	
									<option value=2008';
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>
	                            </select>&nbsp;&nbsp;&nbsp;e&nbsp;
								'.$lang_and.'&nbsp;';
								
		echo '<select name=eday>
									<option></option>';
	for ($i= 1; $i < 32; $i ++)
	{
		echo "<option value=$i";
		if ($i == $today['mday'])
			echo " selected";
		echo ">$i</option>\n";
	}
	echo '
								</select>						
								<select name=emonth>';
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								
	                            
	                            <select name=eyear>
	                                <option value=2001';
	if ($today['year'] == 2001)
		echo ' selected';
	echo '>2001</option>
	                                <option value=2002';
	if ($today['year'] == 2002)
		echo ' selected';
	echo '>2002</option>
	                                <option value=2003';
	if ($today['year'] == 2003)
		echo ' selected';
	echo '>2003</option>
	                                <option value=2004';
	if ($today['year'] == 2004)
		echo ' selected';
	echo '>2004</option>
	                                <option value=2005';
	if ($today['year'] == 2005)
		echo ' selected';
	echo '>2005</option>
	                                <option value=2006';
	if ($today['year'] == 2006)
		echo ' selected';
	echo '>2006</option>
	                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option>
									<option value=2008';
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>';
							?>
  </tr>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

<tr>
  <td class="style10">M&eacute;dico : </td>
  <td><select name="medico" class="caixa" id="id_med">
    <?
$busca_med="select * from medico order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum m&eacute;dico encontrado</option>");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_med;$x++)

 {

  $campo_med=mysql_fetch_array($res_busca_med);

  printf("<option value='$campo_med[id]'>$campo_med[nome]</option>");
  

 }

}

?>
  </select></td></tr>
</table>

<table border=0>

<tr><td width=40></td><td width="257"><input name="todos" type=submit class=botao id="todos" value="Buscar">
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>


<?
if($_POST['todos']){
$data = date("d/m/Y");
$nome=$_POST['nome'];
$ex_status_id=$_POST['ex_status_id'];
$medico=$_POST['medico'];
$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);



 $busca_ex.="select * from exame  WHERE data_previsao > $stimestamp and data_previsao < $etimestamp and ex_status_id !=3 and  medico_id = $medico  or data_previsao > $stimestamp and data_previsao < $etimestamp and medico_id = $medico  and ex_status_id !=3 order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>Médico</th><th bordercolor=white>Status</th><th bordercolor=white>Convenio</th><th bordercolor=white>Ação</th></tr>";

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
     //Busca o ID do médico
   $busca_me="select * from medico where id = '".$campo_ex[medico_id]."';";
   $res_busca_me=mysql_query($busca_me,$conn);
   $campo_me=mysql_fetch_array($res_busca_me);
     //Busca o convenio
   $busca_con="select * from convenio where id = '".$campo_ex[convenio]."';";
   $res_busca_con=mysql_query($busca_con,$conn);
   $campo_con=mysql_fetch_array($res_busca_con);
   
     echo "<tr height=20><td bordercolor=white><a href='laudos.php?id=$campo_ex[id]'>$campo_ex[id]</a></td><td bordercolor=white>$campo_pa[nome]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_me[nome]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex2[nome]</td><td bordercolor=white>&nbsp;&nbsp;$campo_con[nome]</td><td bordercolor=white>&nbsp;&nbsp;<a href='exame.php?id=$campo_ex[id]' target='_blank'>Print</td></a></tr>";

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

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro de exame com a data de previsão $data.";

 }
}
?>
<?
//Excluindo um agendamento
if($_POST['excluir']){
$sql = mysql_query("DELETE FROM agendamentos WHERE id = '".$campo_ex[id]."'") or die(mysql_error());
  printf("<script>alert('Excluido.');
   window.location='agendados.php';</script>");
}


?>
<?
if($_POST['buscar']){
$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);
$nome=$_POST['dc'];
$medico=$_POST['medico'];
if($nome!=NULL)

{

 $busca_ex="select * from exame where ex_status_id ='3'";

 $and="";

 if($nome!=NULL)

 {

  $busca_ex.=" data_previsao > $stimestamp and data_previsao < $etimestamp";

  //$and=" and";

 }
 if($medico!=NULL)

 {

  $busca_ex.="or medico_id = '".$medico."'";

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

//Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$_POST[nome]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);

   echo "<tr height=20><td bordercolor=white>$campo_ex[id]</td><td bordercolor=white>$campo_ex[paciente]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_ex[medico]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[data]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[convenio]</td><td bordercolor=white>&nbsp;&nbsp;($campo_ex[ddd]) $campo_ex[telefone]</td><td bordercolor=white><a href='excluir.php?id=$campo_ex[id]' target='conteudo'>Excluir</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='alterar.php?id=$campo_ex[id]' target='conteudo'>Alterar</td></a></tr>";

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

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro de exame com a data de previsão $_POST[dc] .";

 }

}
}
?>
</form>
</body>

</html>

