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
.style69 {font-size: 14px}
.style72 {font-size: 20px}
.style73 {font-family: arial; font-size: 20px; }
.style78 {text-decoration: none; font-family: arial; font-style: normal; font-size: 16px; }
.style79 {font-family: arial; font-weight: bold; font-size: 18px; }
.style80 {font-size: 18px}
.style81 {font-family: arial; font-size: 18px; }
.style82 {font-family: arial; font-weight: bold; font-size: 20px; }
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="866" border="0">
  <tr>
    <td width="860" class="fonte_link">&nbsp;</td>
  </tr>
</table>
<table width="860" border="0">
  <tr>
    <td width="882"><hr width="860" size="4" color="black" /></td>
  </tr>
</table>
<table width="866" border="0" bordercolor="#331A1C">
  <tr>
    <td width="124" class="style79">Nome :</td>
    <td width="556" class="fonte_link style64"><span class="style80"><?php echo $campo_pac['nome']; ?></span></td>
    <td width="56" class="style73"><span class="style79"> N &ordm;  :</span></td>
    <td width="118" class="style73"><span class="style80"><?php echo $campo_cod['id']; ?></span></td>
  </tr>
  
  <tr>
    <td class="style79">Exame : </td>
    <td colspan="3" class="fonte_link style64"><span class="style80"><?php echo $campo_matex['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="style79">Material :</td>
    <td colspan="3" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="style79">Solicita&ccedil;&atilde;o :</td>
    <td class="fonte_link style56"><span class="style81"><?php echo $campo_med['nome']; ?></span></td>
    <td class="style79">&nbsp;</td>
    <td class="fonte_link style80">&nbsp;</td>
  </tr>
  <tr>
    <td class="style54"><span class="style79">Conv&ecirc;nio :</span></td>
    <td class="fonte_link"><span class="style80"><?php echo $campo_conv['nome']; ?></span></td>
    <td class="style79">Data:</td>
    <td class="fonte_link style64"><span class="style80"><?php echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4" class="style54"><table width="860" border="0">
      <tr>
        <td width="831" class="style80"><hr width="860" size="4" color="black" /></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td height="31" colspan="4" class="style81">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="4" class="style82">Exame Macroscopico :</td>
  </tr>
  <tr>
    <td height="58" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['macroscopia']; ?></span></td>
  </tr>
  <tr>
    <td colspan="4" class="style82"><br />
    Exame Microscopico :</td>
  </tr>
  <tr>
    <td height="66" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['microscopia']; ?></span></td>
  </tr>
  <tr>
    <td class="style82"><br />
    Conclus&atilde;o :</td>
    <td colspan="3" class="style81">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="4" class="fonte_link style64"><span class="style80"><?php echo $campo_cod['conclusao']; ?></span></td>
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
  <span class="style72"><strong><br />
  <br />
  <br />
  <br />
  <br />
</strong></span></p>
<p align="center"><br />
  <br />
</p>
</body>
</html>

