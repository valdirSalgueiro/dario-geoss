<?php
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
.style4 {color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<body class=fonte>
<form name=form1 method=post>
<h1 class="style1"><font face=verdana><img src="images/usuarios.jpg" width="50" height="50"> Exames Fechados:</font></h1>
<hr color=black size=2>
</form>
<table width="634" border=0 class=fonte>
  <tr>
    <td width="730" bgcolor="#333333"><div align="center" class="style4">Buscar Todos ? </div>
        <div align="center"></div>
    <div align="center"></div></td>
    
  </tr>

  <tr>
    <td bgcolor="#FFFFFF"><div align="center">
      <form name="buscar" method="post">
        <input name="buscar" type="submit" id="buscar" value="Buscar ">
        <span class="atributos_titulo">
        <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
        </span>
      </form>
    </div>
        <div align="center"></div></td>
  </tr>
</table>
<?php
if($_POST['buscar']!=NULL)
{
 echo "<script>
 window.location='ex_todos.php';</script>";
}
$nome=$_POST['nome'];
$ex_status_id=$_POST['ex_status_id'];


 $busca_ex.="select * from exame where ex_status_id=3 order by id asc;";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);

 if($num_ex>0)

 {

  echo "<table border=1 bordercolor=black class=fonte>";
  echo "<tr><th bordercolor=white>Laudo Número</th><th bordercolor=white>Nome Paciente</th><th bordercolor=white>STATUS</th><th bordercolor=white>Imprimir</th></tr>";

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
   
     echo "<tr height=20><td bordercolor=white><a href='laudos.php?id=$campo_ex[id]'>$campo_ex[id]</td><td bordercolor=white>$campo_pa[nome]</td><td bordercolor=white>&nbsp;&nbsp;$campo_ex2[nome]</td><td bordercolor=white>&nbsp;&nbsp;<a href='exame_fim.php?id=$campo_ex[id]' target='_blank'>Print</td></a></tr>";

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

 ?>

</body>

</html>

