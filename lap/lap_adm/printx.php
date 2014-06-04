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
<style type="text/css">
<!--
.style42 {font-size: 17px}
.style43 {	font-size: 18px;
	font-weight: bold;
}
.style44 {font-size: 12px}
.style45 {font-size: 16px}
-->
</style>
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
-->
</style>
</head>

<body>
<table width="803" border="0">
  <tr>
    <td width="432" class="fonte_link"><img src="timbrado.PNG" width="244" height="86" /></td>
    <td width="361" class="fonte_link">Rua Sport Clube do Recife, 280 - Sl. 106 - Empresarial Albert Einstein<br />
      Ilha do Leite - Recife - PE - Fone : (81) 3222-0476 - 3222-2097 </td>
  </tr>
</table>
<p><br />
</p>
<table width="643" border="0">
  <tr>
    <td><div align="center"><span class="style43">COMPROVANTE DE ENTREGA </span></div></td>
  </tr>
</table>
<br />
<table width="645" border="0" bordercolor="#331A1C">
  <tr>
    <td colspan="5"><hr color="black" size="1" /></td>
  </tr>
  <tr>
    <td width="135"><span class="style42">Nome :</span></td>
    <td><span class="style42"><? echo $campo_pac['nome']; ?></span></td>
    <td><span class="style42">Laudo N &ordm; :</span></td>
    <td colspan="2"><span class="style42"><? echo $campo_cod['id']; ?></span></td>
  </tr>
  
  <tr>
    <td><span class="style42">Material :</span></td>
    <td colspan="4"><span class="style42"><? echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td><span class="style42">Solicita&ccedil;&atilde;o :</span></td>
    <td><span class="style42"><? echo $campo_med['nome']; ?></span></td>
    <td><span class="style42">Recepcionista :</span></td>
    <td colspan="2"><span class="style42"><? echo $campo_cod['por']; ?></span></td>
  </tr>
  
  <tr>
    <td><span class="style42">Conv&ecirc;nio :</span></td>
    <td width="257"><span class="style42"><? echo $campo_conv['nome']; ?></span></td>
    <td width="137"><span class="style42">Previs&atilde;o de Sa&iacute;da:</span></td>
    <td width="98" colspan="2"><span class="style42"><? echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  <tr>
    <td colspan="5"><hr color="black" size="1" /></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<table width="644" border="0">
  <tr>
    <td width="1558"><p><strong>OBS:</strong><br />
        <br />
        <span class="style44">1 - Este registro cont&eacute;m informa&ccedil;&otilde;es pessoais e confidenciais, sendo de sua responsabilidade preserv&aacute;-lo fora do alcance de terceiros.<br />
        2 - Ocorrendo problemas de ordem t&eacute;cnicas, o <span class="style45">LAP</span> poder&aacute; marcar nova data para entrega do laudo.<br />
        3 - A entrega do laudo s&oacute; ser&aacute; permitida com este comprovante.</span> <br />
        <span class="style44">4 - O hor&aacute;rio 
        de funcionamento do laboratorio &eacute; de 8 as 17 horas</span></p>
      <p><br />
      </p></td>
  </tr>
</table>
<p><br />
  <br />
</p>
</body>
</html>
