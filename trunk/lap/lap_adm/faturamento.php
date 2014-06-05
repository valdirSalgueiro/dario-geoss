<?php

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
.style4 {
	color: #000033;
	font-weight: bold;
}
.style6 {font-size: 10px; color: #FFFFFF; }
.style8 {color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style9 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 24px;
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

<form name=pesquisa method=post>

<h1 class="style4"><font face="verdana"> <img src="images/Faturamento_01.bmp"> Faturamento:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td class="style10">Conv&ecirc;nio :</td>
  <td width="366"><select name="convenio" class="caixa" id="convenio">
    <?php
$busca_conv="select * from convenio order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 echo("<option value=''>Nenhum Conv&ecirc;nio encontrado</option>");
}

else

{

 echo("<option value=''></option>");

 for($x=0;$x<$num_conv;$x++)

 {

  $campo_conv=mysql_fetch_array($res_busca_conv);

  echo("<option value='$campo_conv[id]'>$campo_conv[nome]</option>");
  

 }

}

?>
  </select></td>
  <td width="174">&nbsp;</td>
</tr>


<TD class=back2 align=right width=187><div align="left">Entre das Datas : </div></td>
<td class=back><?php
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
<td><input id = "pesquisar" name="pesquisar" type=submit value='Pesquisar' class=botao>
    <input type=submit value='Fechar' class=botao> 
    <span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
    </span></tr>
</table>

<hr color=black size=1>
</form>

  <?php
$id_med=$_POST['id_med'];
$convenio=$_POST['convenio'];
$nome=$_POST['id'];
$status=3;




$sql = "SELECT * FROM exame WHERE ";


if ($_POST[pesquisar])
	{
	    	
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " ex_status_id=$status";
				$flag= 1;
			}
			else
			{
				$sql .= " and ex_status_id=$status";
				$flag= 1;
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
<?php
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
 $busca_conven="SELECT id,nome from convenio WHERE id = '".$row['convenio']."'";
 $res_busca_conven=mysql_query($busca_conven,$conn);
 $num_conven=mysql_num_rows($res_busca_conven);
 $campo_conven=mysql_fetch_array($res_busca_conven);
 ##Até aqui##
 
?>
<table width="617" border="1" bordercolor="#CCCCCC">
  <tr>
    <br>
    <td width="47" bgcolor="#000033"><span class="style6"><span class="style8">Laudo</span> :</span></td>
    <td width="111" bgcolor="#000033"><span class="style6"><span class="style8">Nome Paciente</span> :</span></td>
    <td width="100" bgcolor="#000033"><span class="style6"><span class="style8">Convenio</span> :</span></td>
    <td width="95" bgcolor="#000033"><span class="style6"><span class="style8">Tipo de Tabela </span> :</span></td>
    <td width="124" bgcolor="#000033"><span class="style6"><span class="style8">Codigos Procedimento </span> :</span></td>
    <td width="100" bgcolor="#000033"><span class="style6"><span class="style8">Valor</span> :</span></td>
  </tr>
  <tr>
    <td><span class="style3"><?php echo $row['id']; ?></span></td>
    <td><?php echo $campo_pac['nome']; ?></td>
    <td><span class="style3"><?php echo $campo_conven['nome']; ?></span></td>
    <td><span class="style3"><?php echo $row['tipo_tabela']; ?></span></td>
    <td><span class="style3"><?php echo $row['codigo_procedimento']; ?> </span><br><span class="style3"> <?php echo $row['codigo_procedimento2']; ?></span><br><span class="style3"><?php echo $row['codigo_procedimento3']; ?></span></td>
    <td><span class="style3"><?php echo $row['valor']; ?></span></td>
  </tr>
  <tr>
    <td colspan="6"><div align="center"><a href="detalhes.php?id=<?php echo $row['id']; ?>">Detalhes</a></div></td>
  </tr>
</table>
<p>
  <?php 
$total = $total+$row['valor'];
$total=number_format($total,2,',','.');
}

}

				  




 ?>
</p><?php if($_POST['pesquisar']!=NULL){ ?>
<table width="399" border="0">
  <tr>
    <td width="339"><div align="right"><strong>Valor Total : </strong></div></td>
    <td width="50" bgcolor="#333333"><span class="style9"><?php echo $total; ?></span></td>
  </tr>
</table><?php } ?>
<p><br>
</p>
<hr color=black size=1>
</body>

</html>

