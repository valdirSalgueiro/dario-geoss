<?

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

 include('conn.php');
 include('estilo.css');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
<html>
<link href="estilo.css" rel="stylesheet" type="text/css">
	<style type="text/css">
<!--
body {
	background-image: url(img/background.PNG);
}
    </style>
<style type="text/css">
<!--
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {font-size: 16px}
.style1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<body class=fonte>

<form name="demoform" method="post">

<h1 class="style3"><font face=verdana><img src="images/cadastro_convenios.jpg" width="45" height="45"> Prazos para fechamento de Conv&ecirc;nio:</font></h1>
<hr color=black size=2>
<br>
<table border=0 class=fonte>


<tr>
  <td width="174"><span class="style7">Nome Conv&ecirc;nio:</span></td>
  <td width="318"><select name="nome" class="caixa" id="nome">
    <?
$busca_conv="select * from convenio order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum convênio encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_conv;$x++)

 {

  $campo_conv=mysql_fetch_array($res_busca_conv);

  printf("<option value='$campo_conv[nome]'>$campo_conv[nome]");
  

 }

}

?>
    </select></td></tr>

<tr>
  <td><span class="style7">Prazo:</span></td>
  <td><input name="dc" value="" size="11">
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style1"> &nbsp;</span></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><div align="center">
  <input type=submit value=' Cadastrar ' class=por> 
  <span class="atributos_titulo">
  <input name="button" type=button class="por" onClick="history.go(-1);" value="Voltar">
  </span></div></td></tr>
</table>

</form>

<?
$nome=$_POST['nome'];
$prazo=$_POST['dc'];
$por=$_SESSION["usuario_autenticado"];
$data_cadastro=mktime();


if(($nome!=NULL)and($prazo!=NULL))

{

 $busca_conv="select * from fechamentos where nome = '".$nome."';";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 if($num_conv==0)

 {

  $cad_conv="insert into fechamentos values ('','".$nome."','".$prazo."','".$por."','".$data_cadastro."');";

  $ok=mysql_query($cad_conv,$conn);

  if($ok==1)

  {

   $busca_conv2="select * from fechamentos where nome = '".$nome."';";

   $res_busca_conv2=mysql_query($busca_conv2,$conn);

   $campo_conv2=mysql_fetch_array($res_busca_conv2);

   echo "<script>alert('Fechamento para o Convênio $nome Cadastrado.');window.location='fechamento.php?id=$campo_conv2[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {
   $mod_noticia = "update fechamentos set nome = '".$nome."',prazo_fechamento = '".$prazo."' where nome = '".$nome."';";
  
  $ok=mysql_query($mod_noticia,$conn);
  echo "<script>alert('O Fechamento para o convênio: $nome foi alterado com sucesso.');</script>";

 }

}

?>

</body>

</html>

