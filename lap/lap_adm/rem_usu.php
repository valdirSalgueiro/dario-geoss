<?php

session_start();

include('estilo.css');

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

?>

<html>
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<form name=form1 method=post>

<h1><font face=verdana color='#000033'><b><img src="images/denunciar.gif" width="16" height="16"> Remover Usuário</b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td>Nome:</td><td><select name=sel_nome onChange="form1.submit();" class=botao>

<?php

$busca_usu="select * from usu where usu <> '".$usuario_autenticado."' order by usu asc;";

$res_busca_usu=mysql_query($busca_usu,$conn);

$num_usu=mysql_num_rows($res_busca_usu);

if($num_usu==0)

{

 printf("<option value=''>Nenhum usuário cadastrado");

}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_usu;$x++)

 {

  $campo_usu=mysql_fetch_array($res_busca_usu);

  printf("<option value='$campo_usu[usu]'>$campo_usu[usu]");

 }

}

?>

</select></td></tr>

</table>

</form>

<?php

$sel_nome=$_POST['sel_nome'];

if($sel_nome!=NULL)

{

 printf("<form name=form2 method=post>

 <font face=verdana size=2 color='#666666'>Deseja realmente remover o usuário <b>$sel_nome</b> ?</font>

 <input type=hidden name=nome_sel value='$sel_nome'>

 <table border=0>

 <tr><td width='100'><input type=submit class=botao value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'></td><td><input type=button value='CANCELAR' onclick=window.location='rem_usu.php' class=botao></td></tr>

 </table>

 </form>");

}

$nome_sel=$_POST['nome_sel'];

if($nome_sel!=NULL)

{

 $rem_usu="delete from usu where usu = '".$nome_sel."';";

 $ok=mysql_query($rem_usu,$conn);

 if($ok==1)

 {

  printf("<script>alert('Exclusão realizada');

  window.location='rem_usu.php'</script>");

 }

 else

 {

  echo "ERRO:".mysql_error($conn).".";

 }

}

?>

<span class="atributos_titulo">
<input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span>
</body>

</html>

