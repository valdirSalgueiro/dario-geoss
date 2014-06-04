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
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_cod['paciente_id']."'";
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
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<img src="timbrado.PNG" width="641" height="93" />
<table width="645" border="0" bordercolor="#331A1C">
  <tr>
    <td colspan="5"><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td width="135">Nome :</td>
    <td><? echo $campo_pac['nome']; ?></td>
    <td>Laudo N º :</td>
    <td colspan="2"><? echo $campo_cod['id']; ?></td>
  </tr>
  
  <tr>
    <td>Material :</td>
    <td colspan="4"><? echo $campo_mat['nome']; ?></td>
  </tr>
  <tr>
    <td>Solicitação :</td>
    <td colspan="4"><? echo $campo_med['nome']; ?></td>
  </tr>
  
  <tr>
    <td>Convênio :</td>
    <td width="257"><? echo $campo_conv['nome']; ?></td>
    <td width="112">Previsão de Saída:</td>
    <td width="123" colspan="2"><? echo date ("d/m/Y-H:h",$campo_cod['data_previsao']); ?></td>
  </tr>
  <tr>
    <td height="28" colspan="5"><hr color="black" size="2" /></td>
  </tr>
  
  <tr>
    <td colspan="5">Exame Macroscópico :</td>
  </tr>
  <tr>
    <td height="87" colspan="5"><? echo $campo_cod['macroscopia']; ?></td>
  </tr>
  <tr>
    <td colspan="5">Exame Microscópico :</td>
  </tr>
  <tr>
    <td height="87" colspan="5"><? echo $campo_cod['microscopia']; ?></td>
  </tr>
  <tr>
    <td colspan="5">Conclusão :</td>
  </tr>
  <tr>
    <td height="87" colspan="5"><? echo $campo_cod['conclusao']; ?></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<table width="644" border="0">
  <tr>
    <td colspan="4"><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td width="462"><font size="2">Denise Camboim</font></td>
    <td width="462"><font size="2">Juliana Camara </font></td>
    <td width="462"><font size="2">Silvana Viganó </font></td>
    <td width="172"><font size="2">Vivina Figueirôa</font></td>
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
