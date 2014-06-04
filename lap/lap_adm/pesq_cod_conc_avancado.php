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
	background-image: url(img/background.PNG);
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
<body class=fonte>
<form name=form1 method=post>
<h1 class="style1"><font face=verdana><img src="images/forum_old.gif" width="29" height="30">Pesquisar C&oacute;digo Conclus&atilde;o Avan&ccedil;ado:</font></h1>
<hr color=black size=2>

<table border=0 class=fonte>
  <tr>
    <td width="306" bgcolor="#CCCCCC"><div align="center"><strong>Instru&ccedil;oes:</strong><br>
      Insira a PALAVRA-CHAVE do c&oacute;digo para que a busca retorne todos os exames que possuem a Palavra-Chave. </div></td>
  </tr>
</table>
<table border=0 class=fonte>
<tr>
  <td width="97">Palavra-Chave : </td>
  <td width="203"><input name="palavra" type="text" id="palavra" value="<?=$_SESSION["palavra"]?>"></td></tr>
</table>

<table border=0>

<tr><td width=40></td><td width="257"><input name="buscar" type=submit class=botao id="buscar" value=" Buscar ">
<span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>

</form>
<?
$_SESSION["palavra"]=$_POST[palavra];
$palavra=$_SESSION["palavra"];
if($_SESSION["palavra"]!=NULL){
$_POST['buscar']=$_SESSION["palavra"];

}
if($_POST['buscar']){


$palavra=$_POST['palavra'];
if($palavra!=NULL)

{

 $busca_ex="select * from exame where";

 $and="";

 if($palavra!=NULL)

 {

  $busca_ex.=" conclusao like '%".$palavra."%'";

  //$and=" and";

 }
 
 
 $busca_ex.=" order by id asc;";

 $res_busca_ex=mysql_query($busca_ex,$conn);

 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Laudo Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>Conclusão</th><th bordercolor=white>STATUS</th><th bordercolor=white>Imprimir</th></tr>";

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

  echo "<tr height=20><td bordercolor=white><a href='laudos.php?id=$campo_ex[id]'>$campo_ex[id]</td><td bordercolor=white>$campo_pa[nome]</td><td bordercolor=white>$campo_ex[conclusao]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex2[nome]</td><td bordercolor=white>&nbsp;&nbsp;<a href='exame.php?id=$campo_ex[id]' target='_blank'>Print</td></a></tr>";

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

