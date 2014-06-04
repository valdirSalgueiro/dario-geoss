<?

session_start();

include('estiloc.css');

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
-->
</style>
<link href="estiloc.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style4 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<body class=fonte>

<form name=pesquisa method=post>

<h1 class="style4"><font face=verdana>Pesquisa de Agendamento:</font></h1>
<hr color=black size=2>

<div align="center"><span class="style1"><img src="arquivos/BotaoLupa.jpg" width="48" height="48"><br>
  </span><br>
</div>
<table border=0 class=fonte>
<tr>
  <td>Por Data :</td>
  <td><input name="dc" value="" size="11">
      <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style2"> &nbsp;</span></td>
  <td>&nbsp;</td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="178">Nome do Paciente  :</td>
  <td width="376"><select name="paciente" class="caixa" id="id">
    <?
$busca_pac="select * from paciente order by nome asc;";
$res_busca_pac=mysql_query($busca_pac,$conn);
$num_pac=mysql_num_rows($res_busca_pac);
if($num_pac==0)
{
 printf("<option value=''>Nenhum Pciente encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_pac;$x++)

 {

  $campo_pac=mysql_fetch_array($res_busca_pac);

  printf("<option value='$campo_pac[id]'>$campo_pac[nome]");
  

 }

}

?>
    </select></td>
  <td width="173">
    <div align="left"></div></td>
</tr>


<tr>
  <td>Nome M&eacute;dico :</td>
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
  </select></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Telefone</td>
  <td><input name="telefone" type="text" id="telefone"></td>
  <td>&nbsp;</td>
</tr>


<TD class=back2 align=right width=178><div align="left">Entre das Datas : </div></td>
<td class=back>
								<?
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
	                            </select>
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
  <td><input id = "pesquisar" name="pesquisar" type=submit value='Pesquisar' class=fonte_link>
    <input type=submit value='Fechar' class=fonte_link>
    <span class="atributos_titulo">
    <input name="button" type=button class="fonte_link" onClick="history.go(-1);" value="Voltar">
    </span></tr>
</table>

<hr color=black size=1>
</form>

  <?
$id=$_POST['id'];
$id_med=$_POST['id_med'];
$convenio=$_POST['convenio'];
$nome=$_POST['id'];
$status=$_POST['status'];




$sql = "SELECT * FROM exame WHERE ";


if ($_POST[pesquisar])
	{
	 	if (isset ($_POST[id]) && $_POST[id] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " id=$_POST[id]";
				$flag= 1;
			}
			else
			{
				$sql .= " and id=$_POST[id]";
				$flag= 1;
			}
		}
	    	if (isset ($_POST[status]) && $_POST[status] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " ex_status_id=$_POST[status]";
				$flag= 1;
			}
			else
			{
				$sql .= " and ex_status_id=$_POST[status]";
				$flag= 1;
			}
		}
		if (isset ($_POST[paciente]) && $_POST[paciente] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " paciente_id=$_POST[paciente]";
				$flag= 1;
			}
			else
			{
				$sql .= " and paciente_id=$_POST[paciente]";
				$flag= 1;
			}
		}
		if (isset ($_POST[medico]) && $_POST[medico] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " medico_id=$_POST[medico]";
				$flag= 1;
			}
			else
			{
				$sql .= " and medico_id=$_POST[medico]";
				$flag= 1;
			}
		}
		if (isset ($_POST[convenio]) && $_POST[convenio] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " convenio=$_POST[convenio]";
				$flag= 1;
			}
			else
			{
				$sql .= " and convenio=$_POST[convenio]";
				$flag= 1;
			}
		}
		if (isset ($_POST[syear]) && isset ($_POST[smonth]) && isset ($_POST[sday]))
		{
		$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
		$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);

		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " (data_entrada > $stimestamp and data_entrada < $etimestamp)";
			$flag= 1;
		}
		else
		{
			$sql .= " and (data_entrada > $stimestamp and data_entrada < $etimestamp)";
			$flag= 1;
		}

}

$result = mysql_query($sql);
//die($sql);

while($row = mysql_fetch_array($result)) { ?>
<?
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$row['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$row['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
   ##Busca do nome do convênio##
 $busca_conve="SELECT id,nome from convenio WHERE id = '".$row['convenio']."'";
 $res_busca_conve=mysql_query($busca_conve,$conn);
 $num_conve=mysql_num_rows($res_busca_conve);
 $campo_conve=mysql_fetch_array($res_busca_conve);
 ##Até aqui##
 
?>
<table width="522" border="1" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="141"><span class="style3">Laudo N &ordm;:</span></td>
    <td width="371"><span class="style3"><? echo $row['id']; ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">Nome Paciente :</span></td>
    <td><? echo $campo_pac['nome']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Nome M&eacute;dico :</span></td>
    <td><? echo  $campo_med['nome']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Conv&ecirc;nio :</span></td>
    <td><span class="style3"><? echo $campo_conv['nome']; ?></span></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><a href="detalhes.php?id=<? echo $row['id']; ?>">Detalhes</a></td>
  </tr>
</table>
<? 
}
}

 ?>

<br>
<hr color=black size=1>
</body>

</html>

