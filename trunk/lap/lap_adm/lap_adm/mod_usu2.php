<?php

session_start();

include('estilo.css');

include('data.php');

$usu=$_GET['usu'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($usu!=NULL))

{

 include('conn.php');

 $busca_usu="select * from usu where usu = '".$usu."';";

 $res_busca_usu=mysql_query($busca_usu,$conn);

 $num_usu=mysql_num_rows($res_busca_usu);

 if($num_usu>0)

 {

  $campo_usu=mysql_fetch_array($res_busca_usu);

  $acesso=$campo_usu[acesso];

 }

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
.style1 {color: #000033}
-->
</style>

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana><b><span class="style1">Modificar Usuário:</span></b></font><font face=verdana color='#ff9900'><b> <?phpecho $campo_usu[usu];?></b></font></h1>
<hr color=black size=2>

<input type=hidden name=usu_antigo value="<?phpecho $campo_usu[usu];?>">

<table border=0 class=fonte>

<tr><td>Usuário:</td><td><input type=text name=usu size=30 maxlength=30 class=botao value="<?phpecho $campo_usu[usu];?>"></td></tr>

</table>

<input type=checkbox name='marcar_todas' onClick="check(this.form.acessos);"> Marcar Tudo.

<table border=0 class=fonte width=400 bordercolor=black>

<tr><td bgcolor='#00CC00'></td>
<td bgcolor='#00CC00'><p align="center">Cadastrar:</p></td><td bgcolor='#00CC00'><p align="center">Modificar:</p></td><td bgcolor='#00CC00'><p align="center">Remover:</p></td></tr>

<tr><td bgcolor='#00CC00'>Usuário:</td>
<td><center><input type=checkbox name=cad_usu value=1 id=acessos <?phpif($acesso[0]==1){echo "checked";}?>></center></td><td><p align="center"><input type=checkbox name=mod_usu value=1 id=acessos <?phpif($acesso[1]==1){echo "checked";}?>></p></td><td><p align="center"><input type=checkbox name=rem_usu value=1 id=acessos <?phpif($acesso[2]==1){echo "checked";}?>></p></td></tr>

<tr>
  <td bgcolor='#00CC00'>Cadastro:</td>
  <td><center><input type=checkbox name=cad value=1 id=acessos <?phpif($acesso[3]==1){echo "checked";}?>></center></td><td><p align="center">&nbsp;</p></td><td><p align="center">&nbsp;</p></td></tr>

<tr>
  <td bgcolor='#00CC00'>Altera&ccedil;&atilde;o:</td>
  <td><center><input type=checkbox name=alt value=1 id=acessos <?phpif($acesso[4]==1){echo "checked";}?>></center></td><td><p align="center">&nbsp;</p></td><td><p align="center">&nbsp;</p></td></tr>
</table>

<table border=1 bordercolor=black class=fonte width=400>
  <tr>
    <td bordercolor=white><input type=checkbox name=exames value=1 id=acessos <?phpif($acesso[5]==1){echo "checked";}?>>
      O usu&aacute;rio tem acesso ao menu de exames.<br>
<input type=checkbox name=financeiro value=1 id=acessos <?phpif($acesso[6]==1){echo "checked";}?>>
      O usu&aacute;rio pode acessar o financeiro.<br>
      <input type=checkbox name=adm value=1 id=acessos <?phpif($acesso[7]==1){echo "checked";}?>>
      O usu&aacute;rio tem acesso a administra&ccedil;&atilde;o.<br>
      <input type=checkbox name=agendamento value=1 id=acessos <?phpif($acesso[8]==1){echo "checked";}?>>
      O usu&aacute;rio pode agendar e pesquisar.<br>
      <input type=checkbox name=logs value=1 id=acessos <?phpif($acesso[9]==1){echo "checked";}?>>
      O usu&aacute;rio tem acesso aos logs.</td>
  </tr>
</table>

<table border=0>

<tr><td width=50></td><td><input type=submit value=" Modificar " class=botao>
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
</tr>

</table>

</form>

<?php



$usu=$_POST['usu'];

$usu_antigo=$_POST['usu_antigo'];



$cad_usu=$_POST['cad_usu'];//0

$mod_usu=$_POST['mod_usu'];//1

$rem_usu=$_POST['rem_usu'];//2



$cad=$_POST['cad'];//3

$alt=$_POST['alt'];//4



$exames=$_POST['exames'];//5

$financeiro=$_POST['financeiro'];//6

$adm=$_POST['adm'];//7



$agendamento=$_POST['agendamento'];//8

$logs=$_POST['logs'];//9


if(($usu!=NULL))

{

 $igual=0;

 if($usu!=$usu_antigo)

 {

  $busca_usu="select * from usu where usu = '".$usu."';";

  $res_busca_usu=mysql_query($busca_usu,$conn);

  $num_usu=mysql_num_rows($res_busca_usu);

  if($num_usu>0)

  {

   $igual=1;

  }

 }

 if($igual==0)

 {

  if($cad_usu==1)

  {

   $acesso=1;

  }

  else

  {

   $acesso=0;

  }

  if($mod_usu==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($rem_usu==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($cad==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($alt==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($exames==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($financeiro==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($adm==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($agendamento==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($logs==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

 
  $modificar="update usu set usu = '".$usu."',acesso = '".$acesso."' where usu = '".$usu_antigo."';";

  $ok=mysql_query($modificar,$conn);

  if($ok==1)

  {

   printf("<script>alert('O usuário $usu foi modificado com sucesso.');</script>");

   if($usu_antigo==$usuario_autenticado)

   {

    printf("<script>top.location='main.php';</script>");

   }

   else

   {

    printf("<script>window.location='mod_usu2.php?usu=$usu';</script>");

   }

  }

  else

  {

   echo "ERRO:".mysql_error($conn).".";

  }

 }

 else

 {

  printf("<script>alert('ERRO: O usuário $usu já existe.');</script>");

 }

}

?>

</body>

</html>

