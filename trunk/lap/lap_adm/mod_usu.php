<?php

session_start();

include('estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');

 $busca_usu="select * from usu order by usu asc;";

 $res_busca_usu=mysql_query($busca_usu,$conn);

 $num_usu=mysql_num_rows($res_busca_usu);

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
<form name=form1 method=post>

<h1><font face=verdana color='#000033'><b><img src="images/img6.gif" width="44" height="34"> Modificar Usuário</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td>Usuário:</td><td><select name=usu class=botao onChange="form1.submit();">

<?php

if($num_usu>0)

{

 echo "<option value=''></option>";

 for($x=0;$x<$num_usu;$x++)

 {

  $campo_usu=mysql_fetch_array($res_busca_usu);

  echo "<option value='$campo_usu[usu]'>$campo_usu[usu]</option>";

 }

}

else

{

 echo "<option value=''>Nenhum usuário cadastrado.</option>";

}

?>

</select></td></tr>

</table>

</form>

<?php

$usu=$_POST['usu'];

if($usu!=NULL)

{

 echo "<script>window.location='mod_usu2.php?usu=$usu';</script>";

}

?>

<span class="atributos_titulo">
<input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span>
</body>

</html>

