<?

session_start();
$id = $_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{

 include('conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}
 $busca_cod="select * from agendamentos where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);
   ##Busca do nome do exame##
 $busca_exa="SELECT id,nome from ex_status WHERE id = '".$campo_cod['ex_status_id']."'";
 $res_busca_exa=mysql_query($busca_exa,$conn);
 $num_exa=mysql_num_rows($res_busca_exa);
 $campo_exa=mysql_fetch_array($res_busca_exa);
 ##Até aqui##
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_cod['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_cod['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
   ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_cod['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log de Agendamento</title>
<style type="text/css">
<!--
.style37 {
	font-size: 36px;
	font-weight: bold;
	color: #000033;
}
.style39 {font-size: 10px}
.style40 {	color: #006633;
	font-weight: bold;
	font-size: 12px;
}
.style41 {font-size: 9px}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="645" border="0">
  <tr>
    <td width="292"><font face="verdana"><span class="style37">NEAP</span></font><font face="verdana" color='#ff9900'> Log <br />
    </font></td>
    <td width="343"><span class="style39"><span class="style40">NÚCLEO ESPECIALIZADO EM ANATOMIA PATOLÓGICA</span><br />
        <span class="style41">AV. PORTUGAL, 163 - BOA VISTA - RECIFE - PE - TEL :
(81) 3221.6031 / 3416.1210</span></span></td>
  </tr>
</table>
<table width="645" border="0" bordercolor="#331A1C">
  <tr>
    <td colspan="2"><hr color="black" size="2" /></td>
  </tr>
  
  
  <tr>
    <td width="289">Agendamento Número  :</td>
    <td width="346"><? echo $campo_cod['id']; ?></td>
  </tr>
  
  <tr>
    <td>Este Agendamento foi cadastrado por </td>
    <td><strong><? echo $campo_cod['por']; ?> </strong>em <strong><? echo date("d/m/Y - H:i",$campo_cod['data_cadastro']); ?></strong></td>
  </tr>
  <tr>
    <td>Este Agendamento foi alterado por :</td>
    <td><strong><? if($campo_cod['etiqueta_por']!=NULL){ ?><? echo $campo_cod['etiqueta_por']; ?></strong> em <strong><? echo date("d/m/Y - H:i",$campo_cod['data_etiqueta']); ?><? } else { echo "Ainda não teve alteração neste agendamento."; } ?></strong></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><hr color="black" size="2" /></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
</body>
</html>
