<?
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
if($usuario_autenticado!=NULL)

{
 include('estiloc.css');
 include('conn.php');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>

<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/contato.JPG);
}
</style>
<style type="text/css">
<!--
.style1 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>
<form name=form1 method=post>
<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Log de Exames :</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr>
  <td class="style10">Filtrar Por:</td>
  <td><select name="nome" class="caixa" id="nome">
    <?
$busca_status="select * from ex_status order by nome asc;";
$res_busca_status=mysql_query($busca_status,$conn);
$num_status=mysql_num_rows($res_busca_status);
if($num_status==0)
{
 printf("<option value=''>Nenhum status encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_status;$x++)

 {

  $campo_status=mysql_fetch_array($res_busca_status);

  printf("<option value='$campo_status[id]'>$campo_status[nome]");
  

 }

}

?>
  </select></td></tr>



<tr><td></td><td>&nbsp;</td></tr>
</table>

<table border=0>

<tr><td width=40></td><td width="257"><input name="buscar" type=submit class=botao id="buscar" value=" Buscar ">
  <input name="todos" type=submit class=botao id="todos" value="Exibir Todos"> <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>

</form>
<?
if($_POST['todos']){
$nome=$_POST['nome'];
$ex_status_id=$_POST['ex_status_id'];


 $busca_ex.="select * from exame order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Laudo Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>STATUS</th><th bordercolor=white>Ação</th></tr>";

  for($x=0;$x<$num_ex;$x++)

  {

   $campo_ex=mysql_fetch_array($res_busca_ex);
   //Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$campo_ex[ex_status_id]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);
   
     echo "<tr height=20><td bordercolor=white><a href='laudos.php?id=$campo_ex[id]'>$campo_ex[id]</td><td bordercolor=white>$campo_pa[nome]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex2[nome]</td><td bordercolor=white>&nbsp;&nbsp;<a href='log.php?id=$campo_ex[id]' target='_blank'>Log</td></a></tr>";

  }

  echo "</table>";

  echo $num_ex;

  if($num_ex==1)

  {

   echo " Registro.";

  }

  else

  {

   echo " Registros.";

  }

 }

 else

 {

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro.";

 }
}
?>
<?
if($_POST['buscar']){

$nome=$_POST['nome'];

if($nome!=NULL)

{

 $busca_ex="select * from exame where";

 $and="";

 if($nome!=NULL)

 {

  $busca_ex.=" ex_status_id like '%".$nome."%'";

  //$and=" and";

 }

 
 $busca_ex.=" order by id asc;";

 $res_busca_ex=mysql_query($busca_ex,$conn);

 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";

  echo "<tr><th bordercolor=white>Laudo Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>STATUS</th><th bordercolor=white>Ação</th></tr>";

  for($x=0;$x<$num_ex;$x++)

  {

   $campo_ex=mysql_fetch_array($res_busca_ex);

//Busca o Status do ID
   $busca_ex2="select * from ex_status where id = '".$_POST[nome]."';";
   $res_busca_ex2=mysql_query($busca_ex2,$conn);
   $campo_ex2=mysql_fetch_array($res_busca_ex2);
   //Busca o ID do paciente
   
   $busca_pa="select * from paciente where id = '".$campo_ex[paciente_id]."';";
   $res_busca_pa=mysql_query($busca_pa,$conn);
   $campo_pa=mysql_fetch_array($res_busca_pa);

   echo "<tr height=20><td bordercolor=white><a href='laudos.php?id=$campo_ex[id]'>$campo_ex[id]</td><td bordercolor=white>$campo_pa[nome]</td></a></td><td bordercolor=white>$campo_ex2[nome]</td><td bordercolor=white>&nbsp;&nbsp;<a href='log.php?id=$campo_ex[id]' target='_blank'>Log</td></a></tr>";

  }

  echo "</table>";

  echo $num_ex;

  if($num_ex==1)

  {

   echo " Registro.";

  }

  else

  {

   echo " Registros.";

  }

 }

 else

 {

  echo "Foi procurado por todo o banco de dados mas não foi encontrada nenhum registro.";

 }

}
}
?>

</body>

</html>

