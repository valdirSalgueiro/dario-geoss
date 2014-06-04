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
.style57 {font-size: 16px}
.style61 {font-size: 18px}
.style63 {font-size: 14px; font-weight: bold; }
.style67 {font-size: 17px; font-weight: bold; }
.style74 {font-size: 14px}
.style75 {font-family: arial; font-size: 14px; }
.style76 {font-size: 20px}
-->
</style>
</head>

<body>
<table width="867" border="0">
  <tr>
    <td width="673"><span class="style67">GUIA DE SERVI&Ccedil;OS LABORATORIAIS</span></td>
    <td width="184"><div align="center" class="style67">LAP</div></td>
  </tr>
</table>
<table width="868" border="0">
  <tr>
    <td width="862" class="style57"><hr color="black" size="4" /></td>
  </tr>
</table>
<table width="869" border="0" bordercolor="#331A1C">
  <tr>
    <td width="171" class="fonte_link style57"><span class="style63">Paciente :</span></td>
    <td width="317" class="fonte_link style57"><span class="style74"><? echo $campo_pac['nome']; ?></span></td>
    <td width="224" class="fonte_link style57"><span class="style74"><strong>N
&ordm;  :</strong></span></td>
    <td width="139" class="fonte_link style57"><span class="style76"><? echo $campo_cod['id']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style74"><strong>Telefone :</strong></span></td>
    <td class="fonte_link style57"><span class="style75">( <? echo $campo_pac['ddd_fone1']; ?> ) - <? echo $campo_pac['fone_1']; ?></span></td>
    <td class="fonte_link style57"><span class="style74"><strong>Idade :</strong></span></td>
    <td class="fonte_link style57"><span class="style75">
      <? $ano = date("Y");  echo $campo_pac['data_nascimento']; ?>
&nbsp;Anos </span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style74"><strong>Exame :</strong></span></td>
    <td class="fonte_link style57"><span class="style74"><? echo $campo_matex['nome']; ?></span></td>
    <td class="fonte_link style61"><span class="style74"><strong>Conv&ecirc;nio :</strong></span></td>
    <td class="fonte_link style61"><span class="style74"><? echo $campo_conv['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style74"><strong>Material :</strong></span></td>
    <td colspan="3" class="fonte_link style57"><span class="style75"><? echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style74"><strong>Solicitante :</strong></span></td>
    <td class="fonte_link style57"><span class="style75"><? echo $campo_med['nome']; ?></span></td>
    <td class="style74">&nbsp;</td>
    <td class="fonte_link style74">&nbsp;</td>
  </tr>
  <tr>
    <td class="fonte_link style57"><span class="style74"><strong>Telefone :</strong></span></td>
    <td class="fonte_link style57"><span class="style75">( <? echo $campo_med['ddd_fone1']; ?> ) - <? echo $campo_med['fone_1']; ?></span></td>
    <td class="style74">&nbsp;</td>
    <td class="fonte_link style74">&nbsp;</td>
  </tr>
  <tr>
    <td class="fonte_link style57"><strong class="style75">Data Entrada :</strong></td>
    <td class="fonte_link style57"><span class="style75"><? echo date ("d/m/Y",$campo_cod['data_entrada']); ?></span></td>
    <td class="style61"><strong class="style75">Previs&atilde;o de Sa&iacute;da :</strong></td>
    <td class="fonte_link style57"><span class="style74"><? echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  
  
  <tr>
    <td height="77" colspan="4" class="fonte_link style74"><table width="862" border="0">
      <tr>
        <td width="856"><hr color="black" size="4" /></td>
      </tr>
    </table>
      <table width="862" border="0">
        <tr>
          <td width="185"><span class="style74"><strong>Recepcionista :</strong></span></td>
          <td width="300"><strong><span class="style75"><? echo $campo_cod['por']; ?></span></strong></td>
          <td width="197"><span class="style74"><strong>Laborat&oacute;rio :</strong></span></td>
          <td width="162"><span class="style74"><strong><? echo $campo_lab['nome']; ?></strong></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      
      <strong><br />
      <br />
      </strong></td>
  </tr>
  
  <tr>
    <td colspan="4" class="fonte_link style57"><span class="style74"><strong>Exame Macroscopico :</strong></span></td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style57"><span class="style74"><? echo $campo_cod['macroscopia']; ?></span></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>
