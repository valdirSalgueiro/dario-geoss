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
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
</style>
<html>

<head>

<script>

function testa_vazio()

{

 senha=form1.senha.value;

 confirmacao=form1.confirmacao.value;

 if((senha!="")&&(confirmacao!="")&&(senha==confirmacao))

 {

  form1.btn_troca.disabled=false;

  form1.btn_troca.title=' Alterar senha ';

 }

 else

 {

  form1.btn_troca.disabled=true;

  form1.btn_troca.title='';

 }

}

</script>

</head>

<body background="imagens/LOGEMAIL.JPG">

<form name=form1 method=post>

<h1><font face=verdana color='#000033'><b><img src="images/cadeadoq.jpg" width="35" height="35"> <font size="5">Trocar Senha</font></b></font></h1>
<hr color=black size=2>

<table border=0 class=fonte>

<tr><td>Nova Senha:</td><td><input type=password name=senha size=30 maxlength=30 class=botao onKeyUp="testa_vazio();"></td></tr>

<tr><td>Confirmação:</td><td><input type=password name=confirmacao size=30 maxlength=30 class=botao onKeyUp="testa_vazio();"></td></tr>

<tr><td></td><td><input type=submit name=btn_troca value="Trocar Senha" class=botao disabled> <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
</span></td>
</tr>

</table>

</form>

<?php

$senha=$_POST['senha'];

$confirmacao=$_POST['confirmacao'];

if(($senha!=NULL)and($confirmacao!=NULL))

{

 if($senha==$confirmacao)

 {

  $senha=crypt($senha);

  $trocar_senha="update usu set senha = '".$senha."' where usu = '".$usuario_autenticado."';";

  $ok=mysql_query($trocar_senha,$conn);

  if($ok==1)

  {

   printf("<script>alert('A senha do usuário $usuario_autenticado foi alterada com sucesso.');</script>");

  }

  else

  {

   echo "ERRO:".mysql_error($conn).".";

  }

 }

 else

 {

  printf("<script>alert('ERRO: A SENHA está diferente da CONFIRMAÇÃO.');</script>");

 }

}

?>

</body>

</html>

