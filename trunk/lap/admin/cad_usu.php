<?

session_start();

include('../estilo.css');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

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

<h1><font face=verdana color='#ff9900'><b>Cadastrar Usuário</b></font></h1><hr color=black size=2>

<table border=0 class=fonte>

<tr><td>Usuário:</td><td><input type=text name=usu size=30 maxlength=30 class=botao></td></tr>

<tr><td>Senha:</td><td><input type=password name=senha size=30 maxlength=30 class=botao></td></tr>

<tr><td>Confirmação:</td><td><input type=password name=confirmacao size=30 maxlength=30 class=botao></td></tr>

</table>

<table border=0 class=fonte>

<tr><td bgcolor='#ff9900'></td><td bgcolor='#ff9900'>Cadastrar:</td><td bgcolor='#ff9900'>Modificar:</td><td bgcolor='#ff9900'>Remover:</td></tr>

<tr><td bgcolor='#ff9900'>Usuário:</td><td><center><input type=checkbox name=cad_usu value=1></center></td><td><p align="center"><input type=checkbox name=mod_usu value=1></p></td><td><p align="center"><input type=checkbox name=rem_usu value=1></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Galeria de Fotos :</td>
  <td><center><input type=checkbox name=cad_festa value=1></center></td><td><p align="center"><input type=checkbox name=mod_festa value=1></p></td><td><p align="center"><input type=checkbox name=rem_festa value=1></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Notícias:</td>
  <td><center><input type=checkbox name=cad_not value=1></center></td><td><p align="center"><input type=checkbox name=mod_not value=1></p></td><td><p align="center"><input type=checkbox name=rem_not value=1></p></td></tr>

<tr>
  <td bgcolor='#ff9900'>Enquete:</td>
  <td><center><input type=checkbox name=cad_cli value=1></center></td><td><p align="center">&nbsp;</p></td><td><p align="center">&nbsp;</p></td></tr>
</table>

<table border=1 bordercolor=black class=fonte>

<tr><td bordercolor=white><input type=checkbox name=email value=1> 
O usuário pode Cadastrar / Alterar R&aacute;dio.</td>
</tr>

<tr><td bordercolor=white><input type=checkbox name=recado value=1> O usuário pode ler e responder os recados.</td></tr>

<tr><td bordercolor=white><input type=checkbox name=consulta value=1> 
O usuário pode Cadastrar / Alterar expediente e Colunistas.</td>
</tr>

<tr>
  <td bordercolor=white><input name=foto_dia type=checkbox id="foto_dia" value=1>
O usu&aacute;rio pode Cadastrar  Foto do Dia</td>
</tr>
<tr><td bordercolor=white><input type=checkbox name=instalacoes value=1> 
O usuário pode Cadastrar  Foto Propaganda </td>
</tr>
<tr>
  <td bordercolor=white><input name=videos type=checkbox id="videos" value=1>
O usu&aacute;rio pode Cad / Mod / Rem Videos </td>
</tr>
</table>

<table border=0 class=fonte>

<tr><td width=50></td><td><input type=submit value="Cadastrar" class=botao></td></tr>

</table>

</form>

<?



$usu=$_POST['usu'];

$senha=$_POST['senha'];

$confirmacao=$_POST['confirmacao'];



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

$email=$_POST['email'];//10

$recado=$_POST['recado'];//11

$consulta=$_POST['consulta'];//12

$foto_dia=$_POST['foto_dia'];//13

$instalacoes=$_POST['instalacoes'];//14

$videos=$_POST['videos'];//15


if(($usu!=NULL)and($senha!=NULL)and($confirmacao!=NULL))

{

 if($senha==$confirmacao)

 {

  $busca_usu="select * from usu where usu = '".$usu."';";

  $res_busca_usu=mysql_query($busca_usu,$conn);

  $num_usu=mysql_num_rows($res_busca_usu);

  if($num_usu==0)

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

   if($recado==1)

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

   $senha=crypt($senha);

   $cadastrar="insert into usu values ('".$usu."','".$senha."','".$acesso."');";

   $ok=mysql_query($cadastrar,$conn);

   if($ok==1)

   {

    printf("<script>alert('O usuário $usu foi cadastrado com sucesso.');</script>");

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

 else

 {

  printf("<script>alert('ERRO: A SENHA está diferente da CONFIRMAÇÃO.');</script>");

 }

}

?>

</body>

</html>

