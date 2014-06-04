<?

session_start();
$id = $_GET['id'];
$nome = $_GET['nome'];
$valor = $_GET['valor'];
$servicos = $_GET['servicos'];
]$cpf = $_GET['cpf'];
$data = date("d / m / Y");

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Recibo</title>
</head>

<body>
<p>&nbsp;</p>
<span class="fonte_link"><img src="Figura1.jpg" width="291" height="86" /></span>
<table width="849" border="0" bordercolor="#331A1C">
  <tr>
    <td><hr color="black" size="2" /></td>
  </tr>
  <tr>
    <td><div align="center"><strong>RECIBO</strong></div></td>
  </tr>
  <tr>
    <td><div align="center">Recebi a importancia de <strong><? echo $valor; ?> </strong>de <strong><? echo $nome; ?></strong>, CPF: <strong><? echo $_GET[cpf];?> </strong>referente aos serviços de <strong><? echo $servicos; ?> </strong>em <strong><? echo $data; ?></strong></div></td>
  </tr>
  
  <tr>
    <td height="28"><hr color="black" size="2" /></td>
  </tr>
</table>
<script language="javascript">window.print(); </script>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
</body>
</html>
