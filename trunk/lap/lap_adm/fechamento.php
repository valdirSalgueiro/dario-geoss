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
.style8 {
	font-size: 15px;
	font-weight: bold;
	color: #000000;
}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
-->
</style>
<body class=fonte>

<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Fechamento dos Conv&ecirc;nios:</font></h1>
<hr color=black size=2>
<form name=form1 method=post>
<table border=0 class=fonte>
  <tr>
    <td width="121">Nome Conv&ecirc;nio:</td>
    <td width="368"><input type="text" name="nome" id="nome"></td>
  </tr>
  <tr>
    <td></td>
    <td><input name="buscar" type=submit class=botao id="buscar" value=" Buscar ">
      <? if($_POST['buscar']!=NULL){ ?><input name="todos" type=submit class=botao id="todos" value="Exibir Todos"><? } ?></td>
  </tr>
</table></form>
<br>
<?
$tipo=$_POST['tipo'];
if($tipo==NULL){
 $busca_ex.="select * from fechamentos order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {
  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Nome Convênio</th><th bordercolor=white>Prazo Fechamento</th><th bordercolor=white>Ação</th></tr>";
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
   if(($campo_ex[tipo]=='Salario')or($campo_ex[tipo]=='Pago')){
   $tipo= "<font color=red>$campo_ex[tipo]</font>";
   }
   if($campo_ex[tipo]=='Recebido'){
   $tipo= "<font color=blue>$campo_ex[tipo]</font>";
   } 
   
     echo "<tr height=20><td bordercolor=white>$campo_ex[nome]</td><td bordercolor=white>$campo_ex[prazo_fechamento]</td><td bordercolor=white>&nbsp;&nbsp;<a href='ex.php?convenio=$campo_ex[nome]&&prazo=$campo_ex[prazo_fechamento]' alt='Listar Exames' target='_blank'>Ver Exames Pendentes</a></td></tr>";

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
}
 ?>
</body>
</html>