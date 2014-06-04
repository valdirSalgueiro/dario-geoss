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
.style66 {font-size: 24px}
.style69 {font-weight: bold; font-family: arial;}
.style70 {text-decoration: none; font-family: arial; font-style: normal;}
.style71 {font-family: arial}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="888" border="0">
  <tr>
    <td width="882"><hr width="880" size="2" color="black" /></td>
  </tr>
</table>
<table width="889" border="0" bordercolor="#331A1C">
  <tr>
    <td width="205" class="style69">Laudo N &ordm;  :</td>
    <td colspan="4" class="style70"><? echo $campo_cod['id']; ?></td>
  </tr>
  <tr>
    <td class="style69">Nome :</td>
    <td class="style70"><? echo $campo_pac['nome']; ?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="style69">Material :</td>
    <td colspan="4" class="style70"><? echo $campo_cod['material']; ?></td>
  </tr>
  <tr>
    <td class="style69">Conv&ecirc;nio :</td>
    <td class="style70"><? echo $campo_conv['nome']; ?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class="style69">Solicita&ccedil;&atilde;o :</td>
    <td class="style71"><? echo $campo_med['nome']; ?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class="style69">Data de Entrada  :</td>
    <td class="style47 "><? echo date ("d/m/Y-H:h",$campo_cod['data_entrada']); ?></td>
    <td class="style69">Previs&atilde;o de Sa&iacute;da:</td>
    <td colspan="2" class="style70"><? echo date ("d/m/Y",$campo_cod['data_previsao']); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="299">&nbsp;</td>
    <td width="217">&nbsp;</td>
    <td width="150" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="5"><table width="881" border="0">
      <tr>
        <td width="831"><hr width="880" size="2" color="black" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="31" colspan="5">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="5" class="style69">Exame Macroscopico :</td>
  </tr>
  <tr>
    <td height="58" colspan="5" class="style70"><? echo $campo_cod['macroscopia']; ?></td>
  </tr>
  <tr>
    <td colspan="5" class="style69">Exame Microscopico :</td>
  </tr>
  <tr>
    <td height="66" colspan="5" class="style70"><? echo $campo_cod['microscopia']; ?></td>
  </tr>
  <tr>
    <td class="style69">Conclus&atilde;o :</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="style70"><? echo $campo_cod['conclusao']; ?></td>
  </tr>
</table>
<p class="style70"><strong><br />
</strong><br />
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
  <span class="style66"><br />
  <br />
    OBS:</span></strong></span><span class="style66"><br />
1 - Blocos de parafina e lâminas s&atilde;o entregues 48 horas ap&oacute;s solicita&ccedil;&atilde;o. </span></p>
<table width="810" border="0">
  
  <tr>
    <td class="style66">&nbsp;</td>
  </tr>
</table>
<span class="style66">
<script language="javascript">window.print(); </script>
</span>
<p class="style66">&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>

