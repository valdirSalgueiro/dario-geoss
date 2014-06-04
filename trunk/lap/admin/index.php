<?
session_start();
include('../conn.php');
include('../estilo.css');
?>
<html>
<body bgcolor=white>
<center>
<h1><font face=verdana color='#ff9900'>Admin.</font></h1>
<hr size=2 color=black>
<form name=form1 method=post>
<table border=0 class=fonte>
<tr><td><b>Usuário:</b></td><td><input type=text name=usu size=30 maxlength=30 class=botao></td></tr>
<tr><td><b>Senha:</b></td><td><input type=password name=senha size=30 maxlength=30 class=botao></td></tr>
<tr><td></td><td><input type=submit value=Entrar class=botao></td></tr>
</table>
<?
$usu=$_POST['usu'];
$senha=$_POST['senha'];
if(($usu!=NULL)and($senha!=NULL))
{
 $busca_usu="select * from usu where usu = '".$usu."';";
 $res_busca_usu=mysql_query($busca_usu,$conn);
 $num_usu=mysql_num_rows($res_busca_usu);
 if($num_usu==1)
 {
  $campo_usu=mysql_fetch_array($res_busca_usu);
  if(crypt($senha,$campo_usu[senha])==$campo_usu[senha])
  {
   session_register("usuario_autenticado");
   $_SESSION['usuario_autenticado']=$usu;
   printf("<script>window.location='main.php'</script>");
  }
  else
  {
   printf("<script>alert('ERRO: A senha está incorreta.');</script>");
  }
 }
 else
 {
  printf("<script>açert('ERRO: O Usuário $usu não existe.');</script>");
 }
}
?>
</center>
</body>
</html>
