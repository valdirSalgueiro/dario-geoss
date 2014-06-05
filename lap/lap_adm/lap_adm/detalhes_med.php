<?php

session_start();

$id=$_GET['id'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($id!=NULL))

{
 include('estiloc.css');
 include('conn.php');
 include('data.php');

 $busca_cliente="select * from medico where id = '".$id."';";

 $res_busca_cliente=mysql_query($busca_cliente,$conn);

 $campo_cliente=mysql_fetch_array($res_busca_cliente);

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="estilo.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<body>

<form name=form1 method=post>

<h1 class="style1"><font face=verdana><?phpecho $campo_cliente[nome]." ".$campo_cliente[sobrenome_cliente];?></font></h1>
<hr color=black size=2>

<table width="100" border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" bgcolor="#FFFFFF">
  <tr>
    <td><table border=0 class=fonte>
      <?php

$busca_foto="select * from foto_med where id = '".$campo_cliente['id']."' order by codigo_foto asc;";

$res_busca_foto=mysql_query($busca_foto,$conn);

$num_foto=mysql_num_rows($res_busca_foto);

$coluna=5;

$count=0;

$linha=$num_foto/$coluna;

for($x=0;$x<$linha;$x++)

{

 echo "<tr>";

 for($y=0;$y<$coluna;$y++)

 {

  echo "<td>";

  $campo_foto=mysql_fetch_array($res_busca_foto);

  if($campo_foto[codigo_foto]!=NULL)

  {

   printf("<center><img src='$campo_foto[foto]' $campo_foto[dimencao]=200></center><br>");


   $count++;

  }

  echo "</td>";

 }

 echo "</tr>";

}

?>
    </table></td>
  </tr>
</table>
<br>
<table border=0 class=fonte>

<tr>
  <td width="94"><div align="left">C&oacute;d. M&eacute;d : </div></td>
  <td width="60"><?phpecho $campo_cliente[id];?></td>
</tr>
<tr><td><div align="left">Nome:</div></td><td><?phpecho $campo_cliente[nome];?></td></tr>
<tr>
  <td><div align="left">Email:</div></td>
  <td><?phpecho $campo_cliente[email];?></td>
</tr>

<tr>
  <td><div align="left">CREMEPE:</div></td><td><?php echo $campo_cliente[cremepe];?></td></tr>

<tr>
  <td><div align="left">Telefone:</div></td><td>(<?php echo $campo_cliente[ddd_fone1];?>)&nbsp;<?php echo $campo_cliente[fone_1];?></td></tr>

<tr>
  <td><div align="left">Celular:</div></td><td>(<?php echo $campo_cliente[ddd_fone2];?>)&nbsp;<?php echo $campo_cliente[fone_2];?></td></tr>
</table>

<br>
<input type=button value=" Voltar " class=botao onClick="history.go(-2);";>
</form>

</body>

</html>

