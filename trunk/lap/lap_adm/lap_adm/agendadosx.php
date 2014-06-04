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

<form name=demoform method=post>

<h1 class="style4"><font face=verdana>Pesquisa de Exames:</font></h1>
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
  <td>Paciente : </td>
  <td><select name="paciente" class="caixa" id="id">
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

  printf("<option value='$campo_pac[nome]'>$campo_pac[nome]");
  

 }

}

?>
  </select></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>M&eacute;dico</td>
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

  printf("<option value='$campo_med[nome]'>$campo_med[nome]</option>");
  

 }

}

?>
  </select></td>
  <td width="173">
    <div align="left"></div></td>
</tr>


<tr>
  <td>Telefone</td>
  <td><input name="telefone" type="text" id="telefone"></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Convenio</td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?
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

  echo("<option value='$campo_conv[nome]'>$campo_conv[nome]</option>");
  

 }

}

?>
  </select></td>
  <td>&nbsp;</td>
</tr>


<TD class=back2 align=right width=178>&nbsp;</td>
  <td class=back>
  
  <td><input id = "pesquisar" name="pesquisar" type=submit value='Buscar' class=fonte_link>
    <span class="atributos_titulo">
    <input name="todos" type=submit class=fonte_link id="todos" value="Exibir Todos">
    <input name="button" type=button class="fonte_link" onClick="history.go(-1);" value="Voltar">
    </span></tr>
</table>

<hr color=black size=1>
</form>

   <?
 

$sql = "SELECT * FROM agendamentos WHERE ";


if ($_POST[pesquisar])
	{
	 	
	    	if (isset ($_POST[dc]) && $_POST[dc] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " data=$_POST[dc]";
				$flag= 1;
			}
			else
			{
				$sql .= " or data=$_POST[dc]";
				$flag= 1;
			}
		}
		if (isset ($_POST[paciente]) && $_POST[paciente] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " paciente=$_POST[paciente]";
				$flag= 1;
			}
			else
			{
				$sql .= " or paciente=$_POST[paciente]";
				$flag= 1;
			}
		}
		if (isset ($_POST[medico]) && $_POST[medico] != '')
		{
			if ($flag != 1 || !isset ($flag))
			{
				$sql .= " medico=$_POST[medico]";
				$flag= 1;
			}
			else
			{
				$sql .= " or medico=$_POST[medico]";
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
				$sql .= " or convenio=$_POST[convenio]";
				$flag= 1;
			}
		}
		

$result = mysql_query($sql);
//die($sql);

while($row = mysql_fetch_array($result)) { ?>
<table width="522" border="1" bordercolor="#FFFFFF">
  <tr>
    <br>
    <td width="141"><span class="style3">Laudo N &ordm;:</span></td>
    <td width="371"><span class="style3"><? echo $row['id']; ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">Nome Paciente :</span></td>
    <td><? echo $row['paciente']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Nome M&eacute;dico :</span></td>
    <td><? echo  $row['medico']; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Conv&ecirc;nio :</span></td>
    <td><span class="style3"><? echo $row['convenio']; ?></span></td>
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

