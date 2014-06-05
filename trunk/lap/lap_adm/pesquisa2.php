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
<body class=fonte>

<form name=pesquisa method=post>

<h1 class="style4"><font face=verdana>Pesquisa de Exames:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="189">Nome do Paciente  :</td>
  <td width="425"><select name="id" class="caixa" id="id">
    <?php
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
  <td width="91">
    <div align="left"></div></td>
</tr>


<tr>
  <td>Nome M&eacute;dico :</td>
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

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
  </select></td>
  <td>&nbsp;</td>
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

  printf("<option value='$campo_conv[nome]'>$campo_conv[nome]");
  

 }

}

?>
  </select></td>
  <td><span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>


<TD class=back2 align=right width=189><div align="left">Entre das Datas : </div></td>
<td class=back>
								<select name=smonth><?php
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								<select name=sday>';
								
	for ($i= 1; $i < 32; $i ++)
	{
		echo "<option value=$i";
		if ($i == $today['mday'])
			echo " selected";
		echo ">$i</option>\n";
	}
	echo '
								</select>
								
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
	                            </select>
								E&nbsp;
								<select name=emonth>';
	for ($i= 1; $i < 13; $i ++)
	{
		echo "<option value=$i";
		if ($today['mon'] == $i)
			echo ' selected';
		echo ">".$lang_month[$i -1]."</option>";
	}
	echo '					</select>
								<select name=eday>
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
	                            </select>
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
	                            </select>
	  </td>
							</tr>';
							?>
							

  <td><input type=submit value='Pesquisar' class=botao>
    <input type=submit value='Fechar' class=botao></tr>
</table>

<hr color=black size=1>
</form>

  <?php
$id_med=$_POST['id_med'];
$convenio=$_POST['convenio'];
$nome=$_POST['id'];

if(($nome!=NULL)or($id_med!=NULL)or($convenio!=NULL))

{


$consulta = mysql_query("SELECT * FROM exame WHERE paciente_id = '$nome' OR medico_id = '$id_med' OR convenio = '$convenio'");
$resultado_total = mysql_num_rows($consulta);


if ($resultado_total == 0) {
	print "nao existe";
}

else
{
while($mensagens = mysql_fetch_array($consulta)) { ?>
<?php
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$mensagens['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$mensagens['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
?>
<table width="522" border="1" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="141"><span class="style3">Exame:</span></td>
    <td width="371"><span class="style3"><?php echo $mensagens['id']; ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">Nome Paciente :</span></td>
    <td><?php echo $campo_pac['nome']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Nome M&eacute;dico :</span></td>
    <td><?php echo $campo_med['nome']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Conv&ecirc;nio :</span></td>
    <td><span class="style3"><?php echo $mensagens['convenio']; ?></span></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><a href="detalhes.php?id=<?php echo $mensagens['id']; ?>">Detalhes</a></td>
  </tr>
</table>
<?php 
}
}
}
 ?>

<br>
<hr color=black size=1>
</body>

</html>

