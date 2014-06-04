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
 $busca_pac="SELECT id,nome,ddd_fone1,fone_1,data_nascimento from paciente WHERE id = '".$campo_cod['paciente_id']."'";
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laudo</title>
<link href="botoes.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="estilomenu.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style45 {font-size: 12px}
.style46 {font-size: 17px}
.style48 {	font-size: 18px;
	font-weight: bold;
}
.style49 {font-size: 13px}
-->
</style>
</head>

<body>
<span class="style48">GUIA DE SERVIÇOS LABORATORIAIS</span><br />
<table width="695" border="0">
  <tr>
    <td width="689"><hr color="black" size="1" /></td>
  </tr>
</table>
<table width="846" border="0" bordercolor="#331A1C">
  <tr>
    <td class="fonte_link style45">&nbsp;</td>
    <td colspan="4" class="fonte_link">&nbsp;</td>
  </tr>
  <tr>
    <td width="169" class="fonte_link style46">GSL N º  :</td>
    <td colspan="4" class="fonte_link"><span class="style46"><? echo $campo_cod['id']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">Nome :</td>
    <td colspan="4" class="fonte_link"><span class="style46"><? echo $campo_pac['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">&nbsp;</td>
    <td class="fonte_link">&nbsp;</td>
    <td class="fonte_link style46">Idade :</td>
    <td colspan="2" class="fonte_link style46">
    <? $ano = date("Y");  echo $campo_pac['data_nascimento']; ?>    Anos </td>
  </tr>
  <tr>
    <td class="fonte_link style46">Telefone :</td>
    <td class="fonte_link"><span class="fonte_link style46">( <? echo $campo_pac['ddd_fone1']; ?> ) - <? echo $campo_pac['fone_1']; ?></span></td>
    <td class="fonte_link style46">Recepcionista :</td>
    <td colspan="2" class="fonte_link"><span class="fonte_link style46"><? echo $campo_cod['por']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">Material :</td>
    <td colspan="4" class="fonte_link"><span class="style46"><? echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">Convênio :</td>
    <td colspan="4" class="fonte_link"><span class="style46"><? echo $campo_conv['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">&nbsp;</td>
    <td class="fonte_link">&nbsp;</td>
    <td class="fonte_link style46">Solicitação :</td>
    <td colspan="2" class="fonte_link"><span class="fonte_link style49"><? echo $campo_med['nome']; ?></span></td>
  </tr>
  <tr>
    <td class="fonte_link style46">Data Entrada :</td>
    <td width="211" class="fonte_link"><span class="style46"><? echo date ("d/m/Y",$campo_cod['data_entrada']); ?></span></td>
    <td width="150" class="fonte_link style46">Previsão de Saída :</td>
    <td width="298" colspan="2" class="fonte_link"><span class="style46"><? echo date ("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="fonte_link style46"><table width="695" border="0">
      <tr>
        <td width="689"><hr color="black" size="1" /></td>
      </tr>
    </table>
      <br />
    Obs : <? echo $campo_cod['obs_entrada']; ?></td>
  </tr>
  
  <tr>
    <td class="fonte_link style46">Exame Macroscopico :</td>
    <td colspan="4" class="fonte_link style46">&nbsp;</td>
  </tr>
  <tr>
    <td height="77" colspan="5" class="fonte_link"><span class="style46"><? echo $campo_cod['macroscopia']; ?></span></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p align="center"><br />
  <br />
</p>
</body>
</html>
