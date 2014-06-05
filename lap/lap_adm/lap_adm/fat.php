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

<h1 class="style4"><font face="verdana"><img src="images/Faturamento_01.bmp"> Faturamento por Conv&ecirc;nio:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>

<tr>
  <td width="176" class="style10">Nome do Paciente  :</td>
  <td width="346"><select name="paciente" class="caixa" id="id">
    <?php
$busca_pac="select * from paciente order by nome asc;";
$res_busca_pac=mysql_query($busca_pac,$conn);
$num_pac=mysql_num_rows($res_busca_pac);
if($num_pac==0)
{
 printf("<option value=''>Nenhum Pciente encontrado</option>");
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
  <td width="205">
    <div align="left"></div></td>
</tr>


<tr>
  <td class="style10">Nome M&eacute;dico :</td>
  <td><select name="medico" class="caixa" id="id_med">
    <?php
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
  <td class="style10">Conv&ecirc;nio :</td>
  <td><select name="convenio" class="caixa" id="convenio">
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
  <td>&nbsp;</td>
</tr>


<TD class=style10 align=right width=176><div align="left">Entre das Datas : </div></td>
<td class=back>
								<?php
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
 $busca_conve="SELECT id,nome from convenio WHERE id = '".$row['convenio']."'";
 $res_busca_conve=mysql_query($busca_conve,$conn);
 $num_conve=mysql_num_rows($res_busca_conve);
 $campo_conve=mysql_fetch_array($res_busca_conve);
 ##Até aqui##
 
?>
<table width="718" border="1" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="93" class="style10"><span class="style3">Exame:</span></td>
    <td width="483" class="style10"><span class="style3"><?php echo $row['id']; ?></span></td>
    <td width="120">&nbsp;</td>
  </tr>
  <tr>
    <td class="style10"><span class="style3">Nome Paciente :</span></td>
    <td class="style10"><?php echo $campo_pac['nome']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style10"><span class="style3">Nome M&eacute;dico :</span></td>
    <td class="style10"><?php echo  $campo_med['nome']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style10"><span class="style3">Conv&ecirc;nio :</span></td>
    <td class="style10"><span class="style3"><?php echo $campo_conv['nome']; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td class="style10"><span class="style3">Valor  :</span></td>
    <td class="style10"><span class="style3"><?php echo $row['valor']; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="detalhes.php?id=<?php echo $row['id']; ?>">Detalhes</a></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>
  <?php 
$total = $total+$row['valor'];
$total=number_format($total,2,',','.');
}

}

				  




 ?>
</p>
<table width="700" border="0">
  <tr>
    <td width="616"><div align="right">Valor Total : </div></td>
    <td width="74"><strong><?php echo $total; ?></strong></td>
  </tr>
</table>
<p><br>
</p>
<hr color=black size=1>
</body>

</html>

