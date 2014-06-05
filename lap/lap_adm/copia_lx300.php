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
       ##Busca do tipo de exame##
 $busca_matex="SELECT id_ex,nome from tipo_exame WHERE id_ex = '".$campo_cod['tipo']."'";
 $res_busca_matex=mysql_query($busca_matex,$conn);
 $campo_matex=mysql_fetch_array($res_busca_matex);
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
.style56 {font-size: 12pt}
.style64 {font-size: 14pt}
.style72 {font-size: 20px}
.style73 {font-family: arial; font-size: 20px; }
.style80 {font-size: 18px}
.style86 {font-family: arial; font-weight: bold; font-size: 14px; }
.style87 {font-size: 14px}
.style88 {font-family: arial; font-size: 14px; }
-->
</style>
</head>

<body>
<table width="801" border="0">
  <tr>
    <td width="795" class="fonte_link">&nbsp;</td>
  </tr>
</table>
<table width="788" border="0">
  <tr>
    <td width="882"><hr width="788" size="4" color="black" /></td>
  </tr>
</table>
<table width="788" border="0" bordercolor="#331A1C">
  <tr>
    <td width="139" class="style86">Nome :</td>
    <td width="365" class="fonte_link style64"><span class="style87"><?php echo $campo_pac['nome']; ?></span></td>
    <td width="50" class="style73"><span class="style86"> N &ordm;  :</span></td>
    <td width="228" class="style73"><span class="style72"><?php echo $campo_cod['id']; ?></span></td>
  </tr>
  
  <tr>
    <td class="style86">Exame : </td>
    <td colspan="3" class="fonte_link style64"><span class="style87"><?php echo $campo_matex['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="style86">Material :</td>
    <td colspan="3" class="fonte_link style64"><span class="style87"><?php echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="style86">Solicita&ccedil;&atilde;o :</td>
    <td class="fonte_link style56"><span class="style88"><?php echo $campo_med['nome']; ?></span></td>
    <td class="style86">&nbsp;</td>
    <td class="fonte_link style87">&nbsp;</td>
  </tr>
  <tr>
    <td class="style54"><span class="style86">Conv&ecirc;nio :</span></td>
    <td class="fonte_link"><span class="style87"><?php echo $campo_conv['nome']; ?></span></td>
    <td class="style86">Data:</td>
    <td class="fonte_link style64"><span class="style87"><?php echo date ("d/m/Y"); ?></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4" class="style54"><table width="788" border="0">
      <tr>
        <td width="831" class="style87"><hr width="788" size="4" color="black" /></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="31" colspan="4" class="style88">&nbsp;</td>
  </tr>
  <?php if($campo_cod['macroscopia']!=NULL){?>
  <tr>
    <td colspan="4" class="style86">Exame Macrosc&oacute;pico :</td>
  </tr>
  <tr>
    <td height="58" colspan="4" class="fonte_link style64"><span class="style87"><?php echo $campo_cod['macroscopia']; ?></span></td>
  </tr><?php } ?>
   <?php if($campo_cod['microscopia']!=NULL){?><tr>
    <td colspan="4" class="style86"><br />
    <?php if($campo_cod['tipo_cod']=='mc'){ ?>Exame Microsc&oacute;pico e Conclusão :</td><?php } else {?>Exame Microsc&oacute;pico :</td><?php } ?>
  </tr>
  <tr>
    <td height="66" colspan="4" class="fonte_link style64"><span class="style87"><?php echo $campo_cod['microscopia']; ?></span></td>
  </tr><?php } ?>
    <?php if($campo_cod['tipo_cod']!='mc'){ ?><?php if($campo_cod['conclusao']!=NULL){?><tr>
    <td class="style86"><br />
    Conclus&atilde;o :</td>
    <td colspan="3" class="style88">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64"><span class="style87"><?php echo $campo_cod['conclusao']; ?></span></td>
  </tr>  <?php } ?><?php } ?>
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
  <span class="style72"><strong><br />
  <br />
  <br />
  <br />
  <br />
  </strong></span><span class="style80"><br />
  </span><br>
</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>

