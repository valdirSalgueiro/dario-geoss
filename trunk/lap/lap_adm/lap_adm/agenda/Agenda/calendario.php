<html>
<head>
<title>Free-calendario 1.0</title>
<style type="text/css">
    td {font-size:10px;font-family:verdana}
    body{margin:0px}
    a:link{color:#000000;text-decoration:none}
    a:hover{color:#000000;text-decoration:none}
    a:visited{color:#000000;text-decoration:none}
    a:active{color:#FF4500;text-decoration:none}
</style>
<script>
function evento(year,_mes,dia)
    {
        window.open('evento.php?data='+year+'-'+_mes+'-'+dia,'janela01','status=no,scrollbars=yes,menubar=no,resizable=no,width=690	,height=540,left=200,top=1');
    }
</script>
</head>
<body onSelectStart="return false">
<?php

function gerar($cp,$_)
{
echo $cp.$_;
}
$show_month = 1;
if (isset($show_month)) 
{
  if ($show_month==">") 
  {
    if($month==12) 
	{
      $month=1;
      $year++;
    } 
	else 
	{
      $month++;
    }
  }
  if ($show_month=="<") 
  {
    if($month==1) 
	{
      $month=12;
      $year--;
    } 
	else 
	{
      $month--;
    }
  }
}
if (isset($day)) 
{
  if ($day<="9"&ereg("(^[1-9]{1})",$day)) 
  {
    $day="0".$day;
  }
}
if (isset($month)) 
{
  if ($month<="9"&ereg("(^[1-9]{1})",$month)) 
  {
    $month="0".$month;
  }
}
if (!isset($year)) 
{
  $year=date("Y",mktime());
  $year = isset($_GET["ano"]) ? $_GET['ano'] : $year;
}
if (!isset($month)) 
{
  $month=date("m",mktime());
  $month = isset($_GET["mes"]) ? $_GET['mes'] : $month;
  if ($month == 0)
  {
     $month = 12;
     $year--;
  }
  if ($month == 13)
  {
      $month = 1;
      $year++;
  }
}
if (!isset($day)) 
{
  $day=date("d",mktime());
}
$thisday="$year-$month-$day";
$day_name=array("<b>S</b>","<b>T</b>","<b>Q</b>","<b>Q</b>","<b>S</b>","<b>S</b>","<b style=\"color:red\">D</b>");
$cp = "B";
$month_abbr=array("","JANEIRO","FEVEREIO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
$y=date("Y");
switch ($month) 
{
    case 1:  $month_name = "JANEIRO";	break;
    case 2:  $month_name = "FEVEREIRO";	break;
    case 3:  $month_name = "MARÇO";		break;
    case 4:  $month_name = "ABRIL";		break;
    case 5:  $month_name = "MAIO";		break;
    case 6:  $month_name = "JUNHO";		break;
    case 7:  $month_name = "JULHO";		break;
    case 8:  $month_name = "AGOSTO";	break;
    case 9:  $month_name = "SETEMBRO";	break;
    case 10: $month_name = "OUTUBRO";	break;
    case 11: $month_name = "NOVEMBRO";	break;
    case 12: $month_name = "DEZEMBRO";	break;
}
$cp .= "Y W";
$_="ndes";
?>
<table width="160" align="center" style="padding-top: 0.1em">
<tr>
<td>
<table width="160" border="0" cellspacing="1" cellpadding="1" align="center">
<tr align="center" bgcolor="#CCCCCC">
 <td colspan="7" bgcolor="#FFD25B" align="center" class="preto">
              <a href="<?php echo $_SERVER["PHP_SELF"]."?mes=".($month-1)."&ano=".($year); ?>" class="preto">&#171;</a>
              <?phpecho "$month_name $year";?>
              <a href="<?php echo $_SERVER["PHP_SELF"]."?mes=".($month+1)."&ano=".($year); ?>" class="preto">&#187;</a>
</td>
</tr>
<tr align="center">
<?php
$cp .= "end";
for ($i=0;$i<7;$i++) { ?>
  <td width="39" align="center" bgColor="#EEEEEE"><?php echo "$day_name[$i]";
  ?></td>
  <?php } $cp .= "e";?>
  </tr>
  <tr align="center">
  <?php

  $cp .= "r F";
  if (date("w",mktime(0,0,0,$month,1,$year))==0) {
    $start=7;
  } else {
    $start=date ("w",mktime(0,0,0,$month,1,$year));
  }
  for($a=($start-2);$a>=0;$a--)
  {
    $d=date("t",mktime(0,0,0,$month,0,$year))-$a;
    ?>
    <td bgcolor="#ffffff" align="center"><font
    color="#ffffff"><?php=$d?></font></td>
    <?php }
    
    for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++)
    {
      if($month==date("m")&$year==date("Y")&$d==date("d")) {
	  	// Cor de fundo para dia atual
        $bg="bgcolor=\"#FFD25B\" style='font:bold;color:#ffffff'"; 
      } else {
	  	// Cor de fundo para dias diferentes do atual
        $bg="bgcolor=\"#CCCCCC\""; 
      }

      if($d < 10)
      {
          $dia = "0".$d;
      }
      else
      $dia = $d;
      if($month < 10)
      {
          $_mes = "0".$month;
      }
      else
      $_mes = $month;
      
      $date = $year."-".$_mes."-".$dia;
      
      // consulta banco de dados
      include "Connections/conn.php";
	  mysql_select_db($database_conn, $conn); 
	  $sql   =   mysql_query("select data, cor from compromisso  
					   WHERE  data = '".$date."'") 
					   or die("ERRO NO COMANDO SQL");
	  $row   =  mysql_num_rows($sql);
     
	  if(mysql_num_rows($sql)){
	  $cor   =   mysql_result($sql, 0, "cor");
      ?>
            <td bgcolor="#<?php=$cor?>"  align="center" title="visualizar"><img src="../../img/delete.gif" width="24" height="24"><a href="javascript:evento(<?php echo $year.",".$_mes.",".$dia;?>)"><?php=$d?></a></td>
      <?php
      }
      else
      {
        ?>
        <td <?php=$bg;?> align="center"><font color=#333333><?php$bold;?><?php=$d //cor dos dias ?></td>
        <?php
      }
      if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
      {
        ?>
        </tr>
        <tr align="center">
        <?php }}
        $cp .= "erna";
        $da=$d+1;
        if(date("w",mktime(0,0,0,$month+1,1,$year))<>1)
        {
          $d=1;
          while(date("w",mktime(0,0,0,($month+1),$d,$year))<>1)
          {
            ?>
            <td bgcolor="#ffffff" align="center">
			<font color="#ffffff"><?php=$d?></font>
			</td>
            <?php
            $d++;
          }
        }
        ?>
        </tr>
      </table>
</table>
</body>
</html>
