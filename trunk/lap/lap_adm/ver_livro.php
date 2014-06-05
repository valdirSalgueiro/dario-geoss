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
	font-size: 24px;
	font-weight: bold;
}
.style12 {font-size: 12px}
-->
</style>
<body class=fonte>

<form name=pesquisa method=post>

<h1 class="style4"><font face=verdana><span class="style1"><img src="arquivos/BotaoLupa.jpg" width="48" height="48"></span> <?php if($_GET[dia]!=NULL){ ?>
<span class="style11">LAP - Livro de Registro do dia <?php echo "$_GET[dia] / $_GET[mes] / $_GET[ano]"; ?> <?php } ?></span></font></h1>
<hr color=black size=2>

<div align="center"><span class="style1"><br>
  </span></div>
</form>


  <?php
$id=$_POST['id'];
$id_med=$_POST['id_med'];
$convenio=$_POST['convenio'];
$nome=$_POST['id'];
$status=$_POST['status'];




$sql = "SELECT * FROM exame WHERE ";


if ($_GET[dia]!=NULL)
	{
$_POST[syear]=$_GET['ano'];
$_POST[smonth]=$_GET['mes'];
$_POST[sday]=$_GET['dia'];
$_POST[eyear]=$_GET['ano'];
$_POST[emonth]=$_GET['mes'];
$_POST[eday]=$_GET['dia'];

	 	
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
			$sql .= " and (data_entrada > $stimestamp and data_entrada < $etimestamp)  ORDER BY id_exame ASC";
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
 
    ##Busca do do laboratorio##
 $busca_convel="SELECT id,nome from lab WHERE id = '".$row['lab']."'";
 $res_busca_convel=mysql_query($busca_convel,$conn);
 $num_convel=mysql_num_rows($res_busca_convel);
 $campo_convel=mysql_fetch_array($res_busca_convel);
 ##Até aqui##
 
?>

<table width="1413" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="61" class="style10"><span class="style12"><?php echo $row['id']; ?></span></td>
    <td width="95" class="style10"><span class="style12"><?php echo date("d/m/Y",$row['data_entrada']); ?></span></td>
    <td width="234" class="style12"><span class="style12"><?php echo $campo_pac['nome']; ?></span></td>
    <td width="149" class="style10"><span class="style12"><?php echo $campo_conve['nome']; ?></span></td>
    <td width="155" class="style3"><span class="style12"><?php echo  $campo_med['nome']; ?></span></td>
    <td width="552" class="style10"><span class="style12"><?php echo $row['material']; ?></span></td>
    <td width="167" class="style10"><div align="center" class="style12"><?php echo $campo_convel['nome']; ?></div></td>
  </tr>
</table>
<hr color=black size=1>
<?php 
}
}

 ?>

<br>
<hr color=black size=1>
</body>

</html>

