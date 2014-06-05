<?php
session_start();
include('../estilo.css');
$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)
{
 include('../conn.php');
 include('../data.php');
}
else
{
 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";
}
?>
<html>
<body class=fonte>
<h1><font face=arial color='#ff9900'><b>Recados:</b></font></h1><hr color=black size=2>
<?php
$busca_recado="select * from recado order by data_recado desc;";
$res_busca_recado=mysql_query($busca_recado);
$num_recado=mysql_num_rows($res_busca_recado);
if($num_recado>0)
{
 echo "<table border=0>";
 for($x=0;$x<$num_recado;$x++)
 {
  $campo_recado=mysql_fetch_array($res_busca_recado);
  $b1='';
  $b2='';
  if($campo_recado[lido]==0)
  {
   $b1='<b>';
   $b2='</b>';
  }
  echo "<tr><td><a href='fale_conosco2.php?codigo_recado=$campo_recado[codigo_recado]'><font face=arial size=2>".$b1.alt_data_en_br($campo_recado[data_recado])." - Assunto: ".$campo_recado[assunto].$b2."</font></a></td></tr>";
 }
 echo "</table>";
}
else
{
 echo "Nenhum recado foi recebido.";
}
?>
</body>
</html>
