<?php

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
 $busca_cod="select * from exame where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);
 
  ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome,data_nascimento,ddd_fone1,fone_1 from paciente WHERE id = '".$campo_cod['paciente_id']."'";
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
     ##Busca do nome do laboratorio##
 $busca_lab="SELECT id,nome from lab WHERE id = '".$campo_cod['lab']."'";
 $res_busca_lab=mysql_query($busca_lab,$conn);
 $num_lab=mysql_num_rows($res_busca_lab);
 $campo_lab=mysql_fetch_array($res_busca_lab);
 ##Até aqui##
      ##Busca do tipo de exame##
 $busca_matex="SELECT id_ex,nome from tipo_exame WHERE id_ex = '".$campo_cod['tipo']."'";
 $res_busca_matex=mysql_query($busca_matex,$conn);
 $campo_matex=mysql_fetch_array($res_busca_matex);
 ##Até aqui##
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html;"/>
<head>
<title>Laudo</title>
<link href="botoes.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="estilomenu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style45 {font-size: 12px}
.style47 {font-size: 17px}
.style48 {
	font-size: 24px;
	font-weight: bold;
}
.style52 {font-size: 24px}
-->
</style>
</head>

<body>
<span class="style48">GUIA DE SERVI&Ccedil;OS LABORATORIAIS</span>
<table width="926" border="0">
  <tr>
    <td width="920"><hr color="black" size="1" /></td>
  </tr>
</table>
<table width="959" border="0" bordercolor="#331A1C">
  <tr>
    <td class="fonte_link style45">&nbsp;</td>
    <td colspan="4" class="fonte_link">&nbsp;</td>
  </tr>
  <tr>
    <td width="162" class="style47 fonte_link"><span class="style48">GSL N
&ordm;  :</span></td>
    <td colspan="4" class="fonte_link"><span class="style52"><?php echo $campo_cod['id']; ?></span></td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Paciente :</strong></span></td>
    <td class="fonte_link"><span class="style52"><?php echo $campo_pac['nome']; ?></span></td>
    <td class="fonte_link style52">&nbsp;</td>
    <td colspan="2" class="fonte_link style52">&nbsp;</td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Idade :</strong></span></td>
    <td class="fonte_link"><span class="fonte_link style52">
      <?php $ano = date("Y");  echo $campo_pac['data_nascimento']; ?>
&nbsp;Anos </span></td>
    <td class="fonte_link style52">&nbsp;</td>
    <td colspan="2" class="fonte_link style52">&nbsp;</td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Telefone :</strong></span></td>
    <td class="fonte_link"><span class="fonte_link style52">( <?php echo $campo_pac['ddd_fone1']; ?> ) - <?php echo $campo_pac['fone_1']; ?></span></td>
    <td class="style47 fonte_link"><span class="style52"><strong>Recepcionista :</strong></span></td>
    <td colspan="2" class="fonte_link"><span class="fonte_link style52"><?php echo $campo_cod['por']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style47"><span class="style52"><strong>Laborat&oacute;rio : </strong></span></td>
    <td colspan="4" class="fonte_link"><span class="style52"><?php echo $campo_lab['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Material :</strong></span></td>
    <td colspan="4" class="fonte_link"><span class="style52"><?php echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Exame :</strong></span></td>
    <td class="fonte_link"><span class="style52"><?php echo $campo_matex['nome']; ?></span></td>
    <td class="fonte_link style52">&nbsp;</td>
    <td colspan="2" class="fonte_link style52">&nbsp;</td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Conv&ecirc;nio :</strong></span></td>
    <td class="fonte_link"><span class="style52"><?php echo $campo_conv['nome']; ?></span></td>
    <td class="fonte_link style52">&nbsp;</td>
    <td colspan="2" class="fonte_link style52">&nbsp;</td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Solicita&ccedil;&atilde;o :</strong></span></td>
    <td class="fonte_link"><span class="fonte_link style52"><?php echo $campo_med['nome']; ?></span></td>
    <td class="fonte_link style52">&nbsp;</td>
    <td colspan="2" class="fonte_link style52">&nbsp;</td>
  </tr>
  <tr>
    <td class="style47 fonte_link"><span class="style52"><strong>Data Entrada :</strong></span></td>
    <td width="393" class="fonte_link"><span class="style52"><?php echo date ("d/m/Y",$campo_cod['data_entrada']); ?></span></td>
    <td width="226" class="style47 fonte_link"><span class="style52"><strong>Previs&atilde;o de Sa&iacute;da :</strong></span></td>
    <td width="160" colspan="2" class="fonte_link"><span class="style52"><?php echo date ("d/m/Y",$campo_cod['data_previsao']); ?> <br />
    </span></td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="fonte_link style52"><table width="951" border="0">
      <tr>
        <td width="945"><hr color="black" size="1" /></td>
      </tr>
    </table>
    <strong>Obs :</strong> <?php echo $campo_cod['obs_entrada']; ?></td>
  </tr>
  
  <tr>
    <td colspan="5" class="style47 fonte_link"><span class="style52"><strong>Exame Macroscopico :</strong></span></td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="fonte_link"><span class="style52"><?php echo $campo_cod['macroscopia']; ?></span></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>
