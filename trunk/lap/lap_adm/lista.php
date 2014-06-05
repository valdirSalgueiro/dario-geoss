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
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];

switch ($mes) {
        case "1":   $mes2 = "01";     break;
        case "2":    $mes2 = "02";   break;
        case "3":    $mes2 = "03";       break;
        case "4":    $mes2 = "04";       break;
        case "5":    $mes2 = "05";        break;
        case "6":    $mes2 = "06";       break;
        case "7":    $mes2 = "07";       break;
        case "8":    $mes2 = "08";      break;
        case "9":    $mes2 = "09";    break;
        case "10":   $mes2 = "10";     break;
        case "11":   $mes2 = "11";    break;
        case "12":   $mes2 = "12";    break; 
 }
 switch ($dia) {
        case "1":   $dia2 = "01";     break;
        case "2":    $dia2 = "02";   break;
        case "3":    $dia2 = "03";       break;
        case "4":    $dia2 = "04";       break;
        case "5":    $dia2 = "05";        break;
        case "6":    $dia2 = "06";       break;
        case "7":    $dia2 = "07";       break;
        case "8":    $dia2 = "08";      break;
        case "9":    $dia2 = "09";    break;
		case "10":    $dia2 = "10";    break;
		case "11":   $dia2 = "11";     break;
        case "12":    $dia2 = "12";   break;
        case "13":    $dia2 = "13";       break;
        case "14":    $dia2 = "14";       break;
        case "15":    $dia2 = "15";        break;
        case "16":    $dia2 = "16";       break;
        case "17":    $dia2 = "17";       break;
        case "18":    $dia2 = "18";      break;
        case "19":    $dia2 = "19";    break;
		case "20":    $dia2 = "20";    break;
	    case "21":   $dia2 = "21";     break;
        case "22":    $dia2 = "22";   break;
        case "23":    $dia2 = "23";       break;
        case "24":    $dia2 = "24";       break;
        case "25":    $dia2 = "25";        break;
        case "26":    $dia2 = "26";       break;
        case "27":    $dia2 = "27";       break;
        case "28":    $dia2 = "28";      break;
        case "29":    $dia2 = "29";    break;
		case "30":    $dia2 = "30";    break;
		case "31":    $dia2 = "31";    break;
       
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
<link href="estilo.css" rel="stylesheet" type="text/css">
<body class=fonte>
<form name="demoform" method=post>
<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Relat&oacute;rio de Agendamentos da data <strong><?php print $dia2; ?>/<?php print $mes2; ?>/<?php print $ano; ?></strong>  :</font></h1>
<hr color=black size=2>
<a href="javaScript:window.print()">Imprimir ?</a><br>
<br> 

<table border=0 class=fonte>

<tr>
  <td>Da Data :</td>
  <td><strong><?php print $dia2; ?>/<?php print $mes2; ?>/<?php print $ano; ?></strong>    <span class="style2"> &nbsp;</span></td>
</tr>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

<tr><td></td><td>&nbsp;</td></tr>
</table>

<?php
$data = "$dia2/$mes2/$ano";
 $busca_ex.="select * from agendamentos  WHERE data = '".$data."' order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>Médico</th><th bordercolor=white>Data Agendamento</th><th bordercolor=white>Convenio</th><th bordercolor=white>Telefone</th><th bordercolor=white>Obs</th><th bordercolor=white>Ação</th></tr>";

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
 ?>
 <script>

function excluir(){
window.opener.location = '<?php echo "excluir.php?id=$campo_ex[id]" ?>';
window.close();
}
function abrir(){
window.opener.location = '<?php echo "alterar.php?id=$campo_ex[id]" ?>';
window.close();
}

</script>
<?php  
     echo "<tr height=20><td bordercolor=white>$i</td><td bordercolor=white>$campo_ex[paciente]</td>&nbsp;&nbsp;<td bordercolor=white>$campo_ex[medico]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[data]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[convenio]</td><td bordercolor=white>&nbsp;&nbsp;($campo_ex[ddd]) $campo_ex[telefone]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex[obs]</td><td bordercolor=white><a href='javascript:excluir()'>Excluir</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href='javascript:abrir()'>Alterar</td></a></tr>";

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

?>
<?php
//Excluindo um agendamento
if($_POST['excluir']){
$sql = mysql_query("DELETE FROM agendamentos WHERE id = '".$campo_ex[id]."'") or die(mysql_error());
  printf("<script>alert('Excluido.');
   window.location='agendados.php';</script>");
}


?>
</form>
</body>

</html>

