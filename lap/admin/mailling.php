<?
function msg_email($msg_email)
{
$recado="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>Portal Sentinela</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #999999;
	font-size: x-small;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style></head>

<body>
<table width='600' border='0' cellpadding='0' cellspacing='0'>
  <tr background=''>
    <td width='300' background=''><div align='center'><img src='../arquivos/topo2.jpg' width='772' height='150'></div></td>
    <td width='300' background=''><div align='center'></div></td>
  </tr>
  <tr>
    <td height='87' colspan='2'><table width='100%' height='40' border='0' align='center' cellpadding='0' cellspacing='0'>
      <tr>
        <td width='66%' height='140'>".
          $msg_email
          ."</td>
      </tr>
    </table></td>
  </tr>
  <tr background=''>
    <td colspan='2'>&nbsp;</td>
  
  <tr background=''>
    <td colspan='2'><div align='center'><span class='style2'><br>
Portal Sentinela &reg;T <br>
Todos os Direitos Reservados - Copyright &copy; 2006 - All Rights Reserved - Portal Sentinela &reg;T <br>
<br>
    </span></div></td>
  </tr>
  <tr background=''>
    <td colspan='2'>&nbsp;</td>
  </tr>
</table>
</body>
</html>
";
return $recado;
}
?>
