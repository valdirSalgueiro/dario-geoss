<?

session_start();
$id = $_GET['id'];
$nome = $_GET['nome'];
$valor = $_GET['valor'];
$servicos = $_GET['servicos'];
$data = date("d / m / Y - H:h");

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
 
  ##Busca do nome do paciente##
 $busca_mat="SELECT id,nome from material WHERE id = '".$campo_cod['material']."'";
 $res_busca_mat=mysql_query($busca_mat,$conn);
 $campo_mat=mysql_fetch_array($res_busca_mat);
 ##Até aqui##
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Etiqueta</title>
<style type="text/css">
<!--
.style37 {
	font-size: 36px;
	font-weight: bold;
	color: #000033;
}
.style38 {font-size: 9px}
-->
</style>
</head>

<body>
<table width="144" border="0">
  <tr>
    <td width="168" height="45"><font face="verdana"><span class="style37"><img src="etiqueta2.PNG" width="67" height="43" /></span></font></td>
  </tr>
</table>
<table width="220" border="0" bordercolor="#331A1C">
  <tr>
    <td colspan="2"><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td><span class="style38">Laudo N º  :</span></td>
    <td width="119"><span class="style38"><? echo $id; ?></span></td>
  </tr>
  <tr>
    <td><span class="style38">Paciente :</span></td>
    <td><span class="style38"><? echo $campo_pac['nome']; ?></span></td>
  </tr>
  
  
  <tr>
    <td width="109"><span class="style38">Material :</span></td>
    <td><span class="style38"><? echo $campo_cod['material']; ?></span></td>
  </tr>
  <tr>
    <td><span class="style38">Data de Entrada:</span></td>
    <td><span class="style38"><? echo date("d/m/Y",$campo_cod['data_entrada']); ?></span></td>
  </tr>
  
  
  <tr>
    <td><span class="style38">Previs&atilde;o de Saida: </span></td>
    <td><span class="style38"><? echo date("d/m/Y",$campo_cod['data_previsao']); ?></span></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><hr color="black" size="2" /></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
</body>
</html>
