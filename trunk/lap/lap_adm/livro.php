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
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {
	font-size: 16px;
	font-weight: bold;
}
.style12 {font-size: 12px}
-->
</style>
<body class=fonte>

<form name=pesquisa method=post>

<h1 class="style4"><font face=verdana><span class="style1"><img src="arquivos/BotaoLupa.jpg" width="48" height="48"></span> Livro de Registro de Exames:</font></h1>
<hr color=black size=2>

<div align="center"><span class="style1"><br>
  </span><br>
</div>
<table border=0 class=fonte>

</tr>


<TD class=style10 align=right width=178><div align="left">Entre das Datas : </div></td>
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

	                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option>
	                                <option value=2008';
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>
	                                <option value=2009';
	if ($today['year'] == 2009)
		echo ' selected';
	echo '>2009</option>
	                                <option value=2010';
	if ($today['year'] == 2010)
		echo ' selected';
	echo '>2010</option>
	                                <option value=2011';
	if ($today['year'] == 2011)
		echo ' selected';
	echo '>2011</option>
	                                <option value=2012';
	if ($today['year'] == 2012)
		echo ' selected';
	echo '>2012</option>
	                                <option value=2013';
	if ($today['year'] == 2013)
		echo ' selected';
	echo '>2013</option>
	                                <option value=2014';
	if ($today['year'] == 2014)
		echo ' selected';
	echo '>2014</option>
	                                <option value=2015';
	if ($today['year'] == 2015)
		echo ' selected';
	echo '>2015</option>
	                                <option value=2016';
	if ($today['year'] == 2016)
		echo ' selected';
	echo '>2016</option>
	                                <option value=2017';
	if ($today['year'] == 2017)
		echo ' selected';
	echo '>2017</option>
	                                <option value=2018';
	if ($today['year'] == 2018)
		echo ' selected';
	echo '>2018</option>
									<option value=2019';
	if ($today['year'] == 2019)
		echo ' selected';
	echo '>2019</option>
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
                                <option value=2007';
	if ($today['year'] == 2007)
		echo ' selected';
	echo '>2007</option>
	                                <option value=2008';
	if ($today['year'] == 2008)
		echo ' selected';
	echo '>2008</option>
	                                <option value=2009';
	if ($today['year'] == 2009)
		echo ' selected';
	echo '>2009</option>
	                                <option value=2010';
	if ($today['year'] == 2010)
		echo ' selected';
	echo '>2010</option>
	                                <option value=2011';
	if ($today['year'] == 2011)
		echo ' selected';
	echo '>2011</option>
	                                <option value=2012';
	if ($today['year'] == 2012)
		echo ' selected';
	echo '>2012</option>
	                                <option value=2013';
	if ($today['year'] == 2013)
		echo ' selected';
	echo '>2013</option>
	                                <option value=2014';
	if ($today['year'] == 2014)
		echo ' selected';
	echo '>2014</option>
	                                <option value=2015';
	if ($today['year'] == 2015)
		echo ' selected';
	echo '>2015</option>
	                                <option value=2016';
	if ($today['year'] == 2016)
		echo ' selected';
	echo '>2016</option>
	                                <option value=2017';
	if ($today['year'] == 2017)
		echo ' selected';
	echo '>2017</option>
	                                <option value=2018';
	if ($today['year'] == 2018)
		echo ' selected';
	echo '>2018</option>
									<option value=2019';
	if ($today['year'] == 2019)
		echo ' selected';
	echo '>2019</option>';
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
if($_POST['pesquisar']!=NULL){

echo "<script>window.open('ver_livro.php?dia=$_POST[sday]&&mes=$_POST[smonth]&&ano=$_POST[syear]');</script>";

}
?>
<? if($_POST[sday]!=NULL){ ?>
<span class="style11">Livro de Registro do dia <? echo "$_POST[sday] / $_POST[smonth] / $_POST[syear]"; ?> <? } ?></span>
  <?
$id=$_POST['id'];
$id_med=$_POST['id_med'];
$convenio=$_POST['convenio'];
$nome=$_POST['id'];
$status=$_POST['status'];




$sql = "SELECT * FROM exame WHERE ";


if ($_POST[pesquisar])
	{
	 	
		if (isset ($_POST[syear]) && isset ($_POST[smonth]) && isset ($_POST[sday]))
		{
		$stimestamp= mktime(0, 0, 0, $_POST[smonth], $_POST[sday], $_POST[syear]);
		$etimestamp= mktime(23, 59, 59, $_POST[emonth], $_POST[eday], $_POST[eyear]);

		if ($flag != 1 || !isset ($flag))
		{
			$sql .= " (data_entrada > $stimestamp and data_entrada < $etimestamp) ORDER BY id_exame ASC";
			$flag= 1;
		}
		else
		{
			$sql .= " and (data_entrada > $stimestamp and data_entrada < $etimestamp) ORDER BY id_exame ASC";
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
 
    ##Busca do do laboratorio##
 $busca_convel="SELECT id,nome from lab WHERE id = '".$row['lab']."'";
 $res_busca_convel=mysql_query($busca_convel,$conn);
 $num_convel=mysql_num_rows($res_busca_convel);
 $campo_convel=mysql_fetch_array($res_busca_convel);
 ##Até aqui##
 
?>

<table width="728" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="35" class="style10"><span class="style3"><? echo $row['id']; ?></span></td>
    <td width="64" class="style10"><span class="style3"><? echo date("d/m/Y",$row['data_entrada']); ?></span></td>
    <td width="197" class="style12"><? echo $campo_pac['nome']; ?></td>
    <td width="81" class="style10"><span class="style3"><? echo $campo_conve['nome']; ?></span></td>
    <td width="108" class="style3"><? echo  $campo_med['nome']; ?></td>
    <td width="163" class="style10"><span class="style3"><? echo $row['material']; ?></span></td>
    <td width="80" class="style10"><span class="style3"><? echo $campo_convel['nome']; ?></span></td>
  </tr>
</table>
<hr color=black size=1>
<? 
}
}

 ?>

<br>
<hr color=black size=1>
</body>

</html>

