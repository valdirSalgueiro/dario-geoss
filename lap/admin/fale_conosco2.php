<?
session_start();
include('../estilo.css');
include('mailling.php');
$codigo_recado=$_GET['codigo_recado'];
$usuario_autenticado=$_SESSION["usuario_autenticado"];
if(($usuario_autenticado!=NULL)and($codigo_recado!=NULL))
{
 include('../conn.php');
 include('../data.php');
 $busca_recado="select * from recado where codigo_recado = '".$codigo_recado."';";
 $res_busca_recado=mysql_query($busca_recado,$conn);
 $campo_recado=@mysql_fetch_array($res_busca_recado);
}
else
{
 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";
}
?>
<html>
<body>
<form name=form1 method=post>
<h1><font face=arial color='#ff9900'><b>Recados:</b></font></h1><hr color=black size=2>
<table border=0 bordercolor=black class=fonte>
<tr><td bordercolor=white>E-mail:</td><td bordercolor=white><?echo $campo_recado[email_recado];?></td></tr>
<tr><td bordercolor=white>Assunto:</td><td bordercolor=white><?echo $campo_recado[assunto];?></td></tr>
<tr><td bordercolor=white>Mensagem:</td><td bordercolor=white><textarea name=msg class=botao cols=50 rows=15 readonly><?echo $campo_recado[msg];?></textarea></td></tr>
<?
if(($campo_recado['resposta']!=NULL)or($campo_recado['usu']!=NULL))
{
 $readonly="readonly";
 if($campo_recado['usu']!=NULL)
 {
  echo "<tr><td bordercolor=white>ADM:</td><td bordercolor=white>$campo_recado[usu]</td></tr>";
 }
}
?>
<tr><td bordercolor=white>Resposta:</td><td bordercolor=white><textarea name=resposta class=botao cols=50 rows=15 <?echo $readonly;?>><?echo $campo_recado['resposta'];?></textarea></td></tr>
<?
if($campo_recado[lido]==0)
{
 echo "<tr><td bordercolor=white></td><td bordercolor=white><input type=submit value=' Enviar ' class=botao><input type=submit name=lido value=' Marcar como lido ' class=botao></td></tr>";
}
?>
<tr><td bordercolor=white></td><td bordercolor=white><input type=button value=' Voltar ' onclick="history.go(-1);" class=botao></td></tr>
</table>
</form>
<?
$resposta=$_POST['resposta'];
$lido=$_POST['lido'];
if(($lido!=NULL)or($resposta!=NULL))
{
 $add_resposta="update recado set";
 if($resposta!=NULL)
 {
  $add_resposta.=" resposta='".$resposta."',";
 }
 $add_resposta.=" usu='".$usuario_autenticado."' , lido = '1' where codigo_recado = '".$codigo_recado."';";
 $ok=mysql_query($add_resposta,$conn);
 if($ok==1)
 {
  if($resposta!=NULL)
  {
   //escrever aqui o código de envio de e-mail.
   $head="MIME-Version: 1.0\r\n";
   $head.="Content-type: text/html; charset=iso-8859-1\r\n";
   $head.="From: espaco@espacoencantado.com.br\r\n";
   $msg=msg_email($resposta);
   mail($campo_recado[email_recado],"Resposta:".$campo_recado[assunto],$msg,$head);
   echo "<script>alert('A resposta foi enviada com sucesso.');</script>";
  }
  echo "<script>window.location='fale_conosco.php';</script>";
 }
 else
 {
  echo "<script>alert('".mysql_error($conn)."');</script>";
 }
}

?>
</body>
</html>
