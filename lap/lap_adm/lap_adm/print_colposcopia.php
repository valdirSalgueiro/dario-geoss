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
 $busca_cod="select * from colposcopias where id = '".$id."';";
 $res_busca_cod=mysql_query($busca_cod,$conn);
 $campo_cod=mysql_fetch_array($res_busca_cod);
 
  $busca_coda="select * from exame where id = '".$id."';";
 $res_busca_coda=mysql_query($busca_coda,$conn);
 $campo_coda=mysql_fetch_array($res_busca_coda);
 
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_coda['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_coda['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
   ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_coda['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Colposcopia</title>
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
.style42 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<img src="timbrado.PNG" width="641" height="93" />
<table width="645" border="0" bordercolor="#331A1C">
  <tr>
    <td width="109">Nome :</td>
    <td><?php echo $campo_pac['nome']; ?></td>
    <td>N º :</td>
    <td><?php echo $campo_coda['id']; ?></td>
  </tr>
  <tr>
    <td>Material :</td>
    <td colspan="3"><?php echo $campo_coda['material']; ?></td>
  </tr>
  <tr>
    <td>Solicitação :</td>
    <td colspan="3"><?php echo $campo_med['nome']; ?></td>
  </tr>
  <tr>
    <td>Convênio :</td>
    <td width="283"><?php echo $campo_conv['nome']; ?></td>
    <td width="50">Data :</td>
    <td width="185"><?php echo date("d/m/Y-H:h",$campo_cod['data_cadastro']); ?></td>
  </tr>
  <tr>
    <td height="28" colspan="4"><hr color="black" size="2" /></td>
  </tr>
</table>
<table width="412" height="59" border="0">
  <tr>
    <td><div align="center"><strong><br />
      COLPOSCOPIA</strong><img src="colposcopia.PNG" width="176" height="213" /><br>
        <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div></td>
    <td><table width="645" border="0" bordercolor="#331A1C">


      <tr>
        <td width="627"><span class="style42">MACROSCOPIA:</span></td>
      </tr>
      <tr>
        <td height="87"><?php echo $campo_coda['macroscopia']; ?></td>
      </tr>
      <tr>
        <td><span class="style42">ACHADOS COLPOSCÓPICOS NORMAIS:</span> </td>
      </tr>
      <tr>
        <td>Zona de transformação com orifícios glandulares. </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>JEC Anterior : <?php echo $campo_cod['jec_anterior']; ?></td>
      </tr>
      <tr>
        <td>JEC Posterior : <?php echo $campo_cod['jec_anterior']; ?></td>
      </tr>
      <tr>
        <td>Última Glandula : <?php echo $campo_cod['ultima_glandula']; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Teste Schiller  : <?php echo $campo_cod['schiller']; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style42">CITOLOGIA</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style42">DESCRIÇÃO :</span></td>
      </tr>
      <tr>
        <td height="87"><?php echo $campo_coda['conclusao']; ?></td>
      </tr>

    </table></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<table width="645" border="0">
  <tr>
    <td colspan="4"><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td width="182"><font size="2">Denise Camboim</font></td>
    <td width="176"><font size="2">Juliana Camara </font></td>
    <td width="177"><font size="2">Silvana Viganó </font></td>
    <td width="282"><font size="2">Vivina Figueirôa</font></td>
  </tr>
  <tr>
    <td> <font size="2">CRM - 5797</font></td>
    <td><font size="2">CRM - 6950 </font></td>
    <td><font size="2">CRM - 6497 </font></td>
    <td> <font size="2">CRM - 5609</font></td>
  </tr>
</table>
<p><br />
  <br />
</p>
</body>
</html>
