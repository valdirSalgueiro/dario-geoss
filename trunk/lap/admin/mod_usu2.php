<?php

session_start();

include('../estilo.css');

$usu=$_GET['usu'];

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if(($usuario_autenticado!=NULL)and($usu!=NULL))

{

 include('../conn.php');

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

<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b>Modificar Usuário: <?phpecho $campo_usu[usu];?></b></font></h1><hr color=black size=2>

<input type=hidden name=usu_antigo value="<?phpecho $campo_usu[usu];?>">

<table border=0 class=fonte>

<tr><td>Usuário:</td><td><input type=text name=usu size=30 maxlength=30 class=botao value="<?phpecho $campo_usu[usu];?>"></td></tr>

</table>

<table border=0 class=fonte>

<tr><td bgcolor='#ff9900'></td><td bgcolor='#ff9900'>Cadastrar:</td><td bgcolor='#ff9900'>Modificar:</td><td bgcolor='#ff9900'>Remover:</td></tr>

<tr><td bgcolor='#ff9900'>Usuário:</td><td><center><input type=checkbox name=cad_usu value=1 <?phpif($acesso[0]==1){echo "checked";}?>></center></td><td><p align="center"><input type=checkbox name=mod_usu value=1 <?phpif($acesso[1]==1){echo "checked";}?>></p></td><td><p align="center"><input type=checkbox name=rem_usu value=1 <?phpif($acesso[2]==1){echo "checked";}?>></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Galeria de Fotos:</td>
  <td><center><input type=checkbox name=cad_festa value=1 <?phpif($acesso[3]==1){echo "checked";}?>></center></td><td><p align="center"><input type=checkbox name=mod_festa value=1 <?phpif($acesso[4]==1){echo "checked";}?>></p></td><td><p align="center"><input type=checkbox name=rem_festa value=1 <?phpif($acesso[5]==1){echo "checked";}?>></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Notícias:</td>
  <td><center><input type=checkbox name=cad_not value=1 <?phpif($acesso[6]==1){echo "checked";}?>></center></td><td><p align="center"><input type=checkbox name=mod_not value=1 <?phpif($acesso[7]==1){echo "checked";}?>></p></td><td><p align="center"><input type=checkbox name=rem_not value=1 <?phpif($acesso[8]==1){echo "checked";}?>></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Enquete:</td>
  <td><center><input type=checkbox name=cad_cli value=1 <?phpif($acesso[9]==1){echo "checked";}?>></center></td><td><p align="center">&nbsp;</p></td><td><p align="center">&nbsp;</p></td></tr>
</table>

<table border=1 bordercolor=black class=fonte>

<tr><td bordercolor=white><input type=checkbox name=email value=1 <?phpif($acesso[10]==1){echo "checked";}?>>
  O usu&aacute;rio pode Cadastrar / Alterar Links R&aacute;dio.</td>
</tr>

<tr><td bordercolor=white><input type=checkbox name=recado value=1 <?phpif($acesso[11]==1){echo "checked";}?>> O usuário pode ler e responder os recados.</td></tr>

<tr><td bordercolor=white><input type=checkbox name=consulta value=1 <?phpif($acesso[12]==1){echo "checked";}?>>
  O usu&aacute;rio pode Cadastrar / Alterar expediente e Colunistas.</td>
</tr>

<tr>
  <td bordercolor=white><input name=foto_dia type=checkbox id="foto_dia" value=1 <?phpif($acesso[13]==1){echo "checked";}?>>
O usu&aacute;rio pode Cadastrar  Foto do Dia</td>
</tr>
<tr><td bordercolor=white><input type=checkbox name=instalacoes value=1 <?phpif($acesso[14]==1){echo "checked";}?>>
  O usu&aacute;rio pode Cadastrar  Foto Propaganda</td>
</tr>
<tr>
  <td bordercolor=white><input type=checkbox name=videos value=1 <?phpif($acesso[15]==1){echo "checked";}?>>
O usu&aacute;rio pode Cad / Mod / Rem Videos </td>
</tr>
</table>

<table border=0>

<tr><td width=50></td><td><input type=submit value=" Modificar " class=botao></td></tr>

</table>

</form>

<?php



$usu=$_POST['usu'];

$usu_antigo=$_POST['usu_antigo'];



$cad_usu=$_POST['cad_usu'];//0

$mod_usu=$_POST['mod_usu'];//1

$rem_usu=$_POST['rem_usu'];//2



$cad_festa=$_POST['cad_festa'];//3

$mod_festa=$_POST['mod_festa'];//4

$rem_festa=$_POST['rem_festa'];//5



$cad_not=$_POST['cad_not'];//6

$mod_not=$_POST['mod_not'];//7

$rem_not=$_POST['rem_not'];//8


$cad_cli=$_POST['cad_cli'];//9

$recado=$_POST['recado'];//11

$email=$_POST['email'];//10

$consulta=$_POST['consulta'];//12

$foto_dia=$_POST['foto_dia'];//13

$instalacoes=$_POST['instalacoes'];//14

$videos=$_POST['videos'];//15

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

  if($cad_festa==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($mod_festa==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($rem_festa==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($cad_not==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($mod_not==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($rem_not==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($cad_cli==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($email==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($recado==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($consulta==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }

  if($foto_dia==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }
   if($instalacoes==1)

  {

   $acesso.=1;

  }

  else

  {

   $acesso.=0;

  }
   if($videos==1)

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

