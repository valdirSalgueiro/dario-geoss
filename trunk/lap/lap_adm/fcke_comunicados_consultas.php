<?

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('../conn.php');

 include('../data.php');

 include("email.php");
 
 include('fckeditor/fckeditor.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

$hoje=date('Y-m-d');

?>

<html>

<style>

body {BACKGROUND-ATTACHMENT: fixed;

background-position: center center;

background-repeat: no-repeat;}

.style1 {
	color: #000080;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>

<body background="imagens/LOGEMAIL.JPG">

<form name=form1 method=post>

<h2><font face=verdana color='#000080'><b>Pesquisar clientes para enviar comunicados:</b></font></h2><hr color=black size=2>

<table border=0>

<tr><td><font face=verdana size=2 color="#000080">E-mail</font></td><td><input type=text name=email size=50 maxlength=50></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Nome</font></td><td><input type=text name=nome size=30 maxlength=30></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Data de nascimento</font></td><td><input type=text name=nasc size=10 maxlength=10><font face=verdan size=3 color=red>(aaaa-mm-dd)</font></td></tr>

</tr><td><font face=verdana size=1 color=red>A consulta por data de nascimento está funcionando da seguinte forma:<BR><BR>



AAAA-MM-DD<BR>

EX:.  "1978-04-24"<BR><BR>



caso queria procurar só o ano de nascimento vc vai escrever "1978-"<BR>

caso queria procurar o mes vai ser "-04-"<BR>

caso queira procurar o dia "-24"<BR>

Ano e mes  "1978-04-"<BR>

mes e dia "-04-24"<BR>

Não existe forma de consulta para o ano e o dia.</font></td><td></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Endereço</font></td><td><input type=text name=end size=50 maxlength=50></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Cidade</font></td><td><input type=text name=cidade size=50 maxlength=50></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Estado</font></td><td><input type=text name=est size=3 maxlength=3></td></tr>

<tr><td><font face=verdana size=2 color="#000080">Pais</font></td><td><input type=text name=pais size=30 maxlength=30></td></tr>

<tr>
    <td><span class="style1">Comunicado a enviar: </span></td>
    <td><?

$oFCKeditor = new FCKeditor('texto_para_enviar');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = '';

$oFCKeditor->Create();

?></td>
  </tr>
  <tr><td></td><td><input type=image src='pesquisar.gif'></td></tr>
</table>

</form>

<?

$email=$_POST['email'];

$nome=$_POST['nome'];

$nasc=$_POST['nasc'];

$end=$_POST['end'];

$cidade=$_POST['cidade'];

$est=$_POST['est'];

$pais=$_POST['pais'];

$fridays=$_POST['fridays'];

$loja=$_POST['loja'];

$tipo=$_POST['tipo'];

if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL)or($est!=NULL)or($pais!=NULL)or($fridays!=NULL)or($loja!=NULL)or($tipo!=NULL))

{

 $consulta="select * from clientes where comunicados = '1' and ";

  if($email!=NULL)

 {

  if($email!=NULL)

  {

   $consulta.="and ";

  }

  $consulta.="email = '".$email."'";

 }

 if($nome!=NULL)

 {

  if($email!=NULL)

  {

   $consulta.="and ";

  }

  $consulta.="nome like '%".$nome."%' ";

 }

 if($nasc!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="nasc like '%".$nasc."%' ";

 }

 if($end!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="end like '%".$end."%' ";

 }

 if($cidade!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="cidade like '%".$cidade."%' ";

 }

 if($est!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="est = '".$est."' ";

 }

 if($pais!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL)or($est!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="pais = '".$pais."' ";

 }

 if($fridays!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL)or($est!=NULL)or($pais!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="fridays = '".$fridays."' ";

 }
  if($loja!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL)or($est!=NULL)or($pais!=NULL)or($fridays!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="loja = '".$loja."' ";

 }
 if($tipo!=NULL)

 {

  if(($email!=NULL)or($nome!=NULL)or($nasc!=NULL)or($end!=NULL)or($cidade!=NULL)or($est!=NULL)or($pais!=NULL)or($fridays!=NULL)or($loja!=NULL))

  {

   $consulta.="and ";

  }

  $consulta.="tipo = '".$tipo."' ";

 }

 $consulta.="order by nome_cliente asc;";

 $res_consulta=mysql_query($consulta,$conn);

 $num_consulta=mysql_num_rows($res_consulta);

 $num_cliente=$num_consulta;

 if($num_consulta>0)

 {

  printf("<form name=form2 method=post>");

  printf("<table border=0>");

  for($x=0;$x<$num_consulta;$x++)

  {

   $campo=mysql_fetch_array($res_consulta);

   $datanasc=alt_data_en_br($campo[nasc]);

   printf("<tr height='20'><td><input type=checkbox name='email$x' value='$campo[email]' checked><font face=verdana size=2 color='#000080'>$campo[email]</font></td></tr>");

  }

  printf("</table>");

  if($num_consulta==1)

  {

   printf("<font face=verdana size=2 color=black><b>Foi encontrado apenas 1 registro. </b></font>");

  }

  else

  {

   printf("<p><font face=verdana size=2 color=black><b>Foram encontrados $num_consulta registros.</b></font>");

  }

  $busca_eventos="select * from eventos where datafim >= '".$hoje."' order by evento asc;";

  $res_busca_eventos=mysql_query($busca_eventos,$conn);

  $num_eventos=mysql_num_rows($res_busca_eventos);

  if($num_eventos>0)

  {

   printf("<table border=0>");

   printf("<tr height='40'><td><font face=verdana size=3>Eventos:</font></td></tr>");

   for($x=0;$x<$num_eventos;$x++)

   {

    $campo_eventos=mysql_fetch_array($res_busca_eventos);

    printf("<tr height='20'><td><input type=checkbox name='evento$x' value='$campo_eventos[evento]' checked><font face=verdana size=2 color='#000080'>$campo_eventos[evento] </font></td></tr>");

   }

   printf("</table>");

  }

  $busca_promocao="select * from promocao where validade >= '".$hoje."' order by promocao asc;";

  $res_busca_promocao=mysql_query($busca_promocao,$conn);

  $num_promocao=mysql_num_rows($res_busca_promocao);

  if($num_promocao>0)

  {

   printf("<table border=0>");

   printf("<tr height='40'><td><font face=verdana size=3>Promocôes:</font></td></tr>");

   for($x=0;$x<$num_promocao;$x++)

   {

    $campo_promocao=mysql_fetch_array($res_busca_promocao);

    printf("<tr height='20'><td><input type=checkbox name='promocao$x' value='$campo_promocao[promocao]' checked><font face=verdana size=2 color='#000080'>$campo_promocao[promocao]</font></td></tr>");

   }

   printf("</table>");

  }

  printf("<input type=hidden name=num_cliente value='$num_cliente'>");

  printf("<input type=hidden name=num_eventos value='$num_eventos'>");

  printf("<input type=hidden name=num_promocao value='$num_promocao'>");

  printf("<input type=submit value=Enviar>");

  printf("</form>");



 }

 else

 {

  printf("<font face=verdana size=2 color=red><b>Nenhum registro encontrado.</b></font>");

 }

}

$cliente=NULL;

$promocao=NULL;

$evento=NULL;

$num_cliente=$_POST['num_cliente'];

$num_eventos=$_POST['num_eventos'];

$num_promocao=$_POST['num_promocao'];

if($num_promocao>0)

{

 $dados_promocao="<tr><td width=50%><h2><font face=verdana color=white>Promoções.</font></h2></td></tr>";

}

if($num_eventos>0)

{

 $dados_evento="<tr><td width=50%><h2><font face=verdana color=white>Eventos.</font></h2></td></tr>";

}

for($y=0;$y<$num_promocao;$y++)

{

 $promocao=$_POST["promocao$y"];

 if($promocao!=NULL)

 {

  $busca_promocao="select * from promocao where promocao = '".$promocao."';";

  $res_busca_promocao=mysql_query($busca_promocao,$conn);

  $num_promocao2=mysql_num_rows($res_busca_promocao);

  for($count=0;$count<$num_promocao2;$count++)

  {

   $campo=mysql_fetch_array($res_busca_promocao);

  
  }

 }

}



for($y=0;$y<$num_eventos;$y++)

{

 $evento=$_POST["evento$y"];

 if($evento!=NULL)

 {

  $busca_eventos="select * from eventos where evento = '".$evento."';";

  $res_busca_eventos=mysql_query($busca_eventos,$conn);

  $num_eventos2=mysql_num_rows($res_busca_eventos);

  for($count=0;$count<$num_eventos2;$count++)

  {

   $campo=mysql_fetch_array($res_busca_eventos);

   if($campo[dataini]==$campo[datafim])

   {

    $data="Dia ".alt_data_en_br($campo[dataini])."<BR>";

   }

   else

   {

    $data="De ".alt_data_en_br($campo[dataini])." até ".alt_data_en_br($campo[datafim])."<BR>";

   }

   $dados_evento.="<tr><td width=50%>

   <font face=verdana size=2 color=white><b>$campo[evento]</b></font><BR><BR>

   <font face=verdana size=1 color=white>$campo[detalhes]<BR><BR>

   ".$data."<BR>



   Local: $campo[local]<BR><BR>



   Apoio $campo[patro] <BR><BR> <BR><BR><BR><BR><BR>



   </td></tr>

   ";

  }

 }

}







 $noticias=NULL;

 $busca_noticias="select * from noticias;";

 $res_busca_noticias=mysql_query($busca_noticias,$conn);

 $num_noticias=mysql_num_rows($res_busca_noticias);


$noticias_promocoes='';

$dados='';

$message=corpo_email($dados,$noticias_promocoes);


if ($_POST['texto_para_enviar']) 
{
	$message .= "<br><br>".$_POST['texto_para_enviar'];
}

for($x=0;$x<$num_cliente;$x++)

{

 $cliente=$_POST["email$x"];

 if($cliente!=NULL)

 {

  $head="MIME-Version: 1.0\r\n";

  $head.="Content-type: text/html; charset=iso-8859-1\r\n";

  $head.="From: TGIfridays@tgifridays.com.br\r\n";

  mail($cliente,"Comunicados TGIFridays", $message,$head);

 }

}

?>

</body>

</html>

