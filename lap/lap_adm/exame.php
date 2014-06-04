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
 $busca_med="SELECT id,nome,ddd_fone1,fone_1 from medico WHERE id = '".$campo_cod['medico_id']."'";
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
.style48 {
	font-size: 18px;
	font-weight: bold;
}
.style57 {font-size: 16px}
.style61 {font-size: 18px}
.style63 {font-family: arial}
.style68 {font-family: arial; font-size: 18px; }
.style69 {font-size: 22px}
-->
</style>
</head>

<body>
<table width="834" border="0">
  <tr>
    <td width="714"><span class="style48">GUIA DE SERVI&Ccedil;OS LABORATORIAIS</span></td>
    <td width="110"><div align="center" class="style48">LAP</div></td>
  </tr>
</table>
<table width="835" border="0">
  <tr>
    <td width="829" class="style57"><hr color="black" size="4" /></td>
  </tr>
</table>
<table width="835" border="0" bordercolor="#331A1C">
  <tr>
    <td width="125" class="fonte_link style57"><span class="style48">Paciente :</span></td>
    <td width="389" class="fonte_link style57"><span class="style61"><? echo $campo_pac['nome']; ?></span></td>
    <td width="117" class="fonte_link style57"><span class="style61"><strong>N
&ordm;  :</strong></span></td>
    <td width="186" class="fonte_link style57"><span class="style69"><? echo $campo_cod['id']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style61"><strong>Telefone :</strong></span></td>
    <td class="fonte_link style57"><span class="style68">( <? echo $campo_pac['ddd_fone1']; ?> ) - <? echo $campo_pac['fone_1']; ?></span></td>
    <td class="fonte_link style57"><span class="style61"><strong>Idade :</strong></span></td>
    <td class="fonte_link style57"><span class="style68">
      <? $ano = date("Y");  echo $campo_pac['data_nascimento']; ?>
&nbsp;Anos </span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style61"><strong>Exame :</strong></span></td>
    <td class="fonte_link style57"><span class="style61"><? echo $campo_matex['nome']; ?></span></td>
    <td class="fonte_link style61"><span class="style61"><strong>Conv&ecirc;nio :</strong></span></td>
    <td class="fonte_link style61"><span class="style61"><? echo $campo_conv['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style61"><strong>Material :</strong></span></td>
    <td colspan="3" class="fonte_link style57"><span class="style68"><? echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style61"><strong>Solicitante :</strong></span></td>
    <td class="fonte_link style57"><span class="style68"><? echo $campo_med['nome']; ?></span></td>
    <td class="style61">&nbsp;</td>
    <td class="fonte_link style61">&nbsp;</td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style61"><strong>Telefone :</strong></span></td>
    <td class="fonte_link style57"><span class="style68">( <? echo $campo_med['ddd_fone1']; ?> ) - <? echo $campo_med['fone_1']; ?></span></td>
    <td class="style61">&nbsp;</td>
    <td class="fonte_link style61">&nbsp;</td>
  </tr>
  <tr>
    <td class="fonte_link style57"><strong class="style68">Data Entrada :</strong></td>
    <td class="fonte_link style57"><span class="style68"><? echo date ("d/m/Y",$campo_cod['data_entrada']); ?></span></td>
    <td class="style61"><strong class="style68">Resultado :</strong></td>
    <td class="fonte_link style57"><span class="style61"><? echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  
  
  <tr>
    <td height="77" colspan="4" class="fonte_link style61"><table width="828" border="0">
      <tr>
        <td width="822"><hr color="black" size="4" /></td>
      </tr>
    </table>
      <table width="829" border="0">
        <tr>
          <td width="159"><strong>Recepcionista :</strong></td>
          <td width="346"><strong><span class="style63"><? echo $campo_cod['por']; ?></span></strong></td>
          <td width="124"><strong>Laborat&oacute;rio :</strong></td>
          <td width="182"><strong><? echo $campo_lab['nome']; ?></strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      
      <span class="style61"><strong><strong>Obs :</strong> <? echo $campo_cod['obs_entrada']; ?></strong></span><strong><br />
      <br />
      </strong></td>
  </tr>
  
  <tr>
    <td colspan="4" class="fonte_link style57"><span class="style61"><strong>Exame Macroscopico :</strong></span></td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style57"><span class="style61"><? echo $campo_cod['macroscopia']; ?></span></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>
