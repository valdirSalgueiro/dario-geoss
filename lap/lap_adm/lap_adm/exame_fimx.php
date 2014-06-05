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
.style44 {font-size: 12px}
.style54 {font-family: arial}
.style55 {font-family: arial; font-weight: bold; }
.style56 {font-size: 12pt}
.style57 {font-family: arial; font-size: 12pt; }
.style58 {font-size: 10pt}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="803" border="0">
  <tr>
    <td width="432" class="fonte_link"><img src="timbrado.PNG" width="244" height="86" /></td>
    <td width="361" class="fonte_link">Rua Sport Clube do Recife, 280 - Sl. 106 - Empresarial Albert Einstein<br />
    Ilha do Leite - Recife - PE - Fone : (81) 3222-0476 - 3222-2097 </td>
  </tr>
</table>
<table width="802" border="0">
  <tr>
    <td width="796"><hr color="black" size="2" /></td>
  </tr>
</table>
<table width="805" border="0" bordercolor="#331A1C">
  <tr>
    <td width="166" class="style55">Laudo N &ordm;  :</td>
    <td colspan="4" class="fonte_link style56"><?php echo $campo_cod['id']; ?></td>
  </tr>
  <tr>
    <td class="style55">Nome :</td>
    <td class="fonte_link style56"><?php echo $campo_pac['nome']; ?></td>
    <td class="style54">&nbsp;</td>
    <td colspan="2" class="style54">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="style55">Material :</td>
    <td colspan="4" class="fonte_link style56"><?php echo $campo_cod['material']; ?></td>
  </tr>
  <tr>
    <td class="style55">Solicita&ccedil;&atilde;o :</td>
    <td class="fonte_link style56"><span class="style57"><?php echo $campo_med['nome']; ?></span></td>
    <td class="style55">&nbsp;</td>
    <td colspan="2" class="fonte_link">&nbsp;</td>
  </tr>
  <tr>
    <td class="style54"><span class="style55">Conv&ecirc;nio :</span></td>
    <td class="fonte_link"><span class="style57"><span class="fonte_link style56"><?php echo $campo_conv['nome']; ?></span></span></td>
    <td class="style55">Data :</td>
    <td colspan="2" class="fonte_link style56"><?php echo date ("d/m/Y",$campo_cod['data_previsao']); ?></td>
  </tr>
  <tr>
    <td class="style54">&nbsp;</td>
    <td width="425" class="fonte_link">&nbsp;</td>
    <td width="65" class="style55">&nbsp;</td>
    <td width="131" colspan="2" class="fonte_link style56">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="5" class="style54"><table width="797" border="0">
      <tr>
        <td width="791"><hr color="black" size="2" /></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="31" colspan="5" class="style54">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="5" class="style55">Exame Macroscopico :</td>
  </tr>
  <tr>
    <td height="58" colspan="5" class="fonte_link style58"><?php echo $campo_cod['macroscopia']; ?></td>
  </tr>
  <tr>
    <td colspan="5" class="style55">Exame Microscopico :</td>
  </tr>
  <tr>
    <td height="66" colspan="5" class="fonte_link style58"><?php echo $campo_cod['microscopia']; ?></td>
  </tr>
  <tr>
    <td class="style55">Conclus&atilde;o :</td>
    <td colspan="4" class="style54">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="fonte_link"><?php echo $campo_cod['conclusao']; ?></td>
  </tr>
</table>
<p><span class="style44"><strong><br />
</strong></span><br />
<br />
<br />
</p>
<p>&nbsp;</p>
<p><br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
<span class="style44"><strong><br />
  <br />
  <br />
    OBS:</strong></span><br />
    <span class="style44">1 - Blocos de parafina e l<font size="2">â</font>minas s&atilde;o entregues 48 horas ap&oacute;s solicita&ccedil;&atilde;o. </span></p>
<table width="810" border="0">
  <tr>
    <td><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td><table width="805" border="0">
      <tr>
        <td width="630" height="21" class="fonte_link">Denise Camboim<br />
          CRM - 5797 </td>
        <td width="630" class="fonte_link">Ros&acirc;ngela Andrade <br />
CRM - 8081 </td>
        <td width="164" class="fonte_link">Vivina Figuer&ocirc;a<br />
          CRM - 5609 </td>
      </tr>
    </table></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>
