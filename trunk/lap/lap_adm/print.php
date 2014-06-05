<?php

session_start();
$id = $_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{

 include('conn.php');
 include('caracteres.php'); 

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}
 $busca_cod="select * from exame where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);
 
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome,ddd_fone1,fone_1 from paciente WHERE id = '".$campo_cod['paciente_id']."'";
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
     ##Busca do material##
 $busca_mat="SELECT id,nome from material WHERE id = '".$campo_cod['material']."'";
 $res_busca_mat=mysql_query($busca_mat,$conn);
 $num_mat=mysql_num_rows($res_busca_mat);
 $campo_mat=mysql_fetch_array($res_busca_mat);
 ##Até aqui##
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
<head>
<title>Laudo</title>
<link href="botoes.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="estilomenu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style72 {font-size: 16px}
.style75 {font-size: 18px; font-weight: bold; }
.style76 {font-size: 18px}
.style77 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="803" border="0">
  <tr>
    <td width="368" class="fonte_link"><img src="Figura1.jpg" width="291" height="86" /></td>
    <td width="425" class="fonte_link style44 style77"><span class="fonte_link style44 style77">Rua Frei Matias Tev&ecirc;s, 280 - Sl. 106 - Empresarial Albert Einstein</span><br />
Ilha do Leite - Recife - PE - Fone : (81) 3222-0476 - 3222-2097 </td>
  </tr>
</table>
<p><span class="style72"><br />
</span></p>
<table width="849" border="0">
  <tr>
    <td width="843" class="style72"><div align="center" class="style76"><strong>COMPROVANTE DE ENTREGA </strong></div></td>
  </tr>
</table>
<span class="style72"><br />
</span>
<table width="851" border="0" bordercolor="#331A1C">
  <tr>
    <td colspan="5" class="style72"><hr color="black" size="4" /></td>
  </tr>
  <tr>
    <td width="135" class="style75">Nome :</td>
    <td class="style72"><span class="style76"><?php echo $campo_pac['nome']; ?></span></td>
    <td class="style75">Laudo N &ordm; :</td>
    <td colspan="2" class="style72"><span class="style76"><?php echo $campo_cod['id']; ?></span></td>
  </tr>
  
  <tr>
    <td class="style75">Material :</td>
    <td colspan="4" class="style72"><span class="style76"><?php echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="style75">Solicita&ccedil;&atilde;o :</td>
    <td class="style72"><span class="style76"><?php echo $campo_med['nome']; ?></span></td>
    <td class="style75">Recepcionista :</td>
    <td colspan="2" class="style72"><span class="style76"><?php echo $campo_cod['por']; ?></span></td>
  </tr>
  
  <tr>
    <td class="style75">Conv&ecirc;nio :</td>
    <td width="323" class="style72"><span class="style76"><?php echo $campo_conv['nome']; ?></span></td>
    <td width="186" class="style75">Previs&atilde;o de Sa&iacute;da:</td>
    <td width="189" colspan="2" class="style72"><span class="style76"><?php echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  <tr>
    <td colspan="5" class="style72"><hr color="black" size="4" /></td>
  </tr>
</table>
<span class="style72">
<script language="javascript">window.print(); </script>
</span>
<p class="style72">&nbsp;</p>
<table width="849" border="0">
  <tr>
    <td width="843" class="style72"><p><span class="style76"><strong>OBS:</strong><br />
        <br />
        1 - Ocorrendo problemas de ordem t&eacute;cnicas, o LAP poder&aacute; marcar nova data para entrega do laudo.<br />
        2 - O hor&aacute;rio 
        de funcionamento do laboratorio &eacute; de 8:00 as 17:00 - Segunda a Sexta. </span></p>
      <p><br />
    </p></td>
  </tr>
</table>
<p class="style72"><br />
  <br />
</p>
</body>
</html>

