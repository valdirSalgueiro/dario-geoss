<?

session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{
 
 include('estilo.css');
 include('conn.php');
 include('data.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>
<?
//Testar Paciente
$cpf=$_POST['cpf'];

if($_POST['testar']) {  

if( !empty($_POST['cpf2']) )
{
  $cpf = mysql_escape_string($_POST['cpf2']);
 
  $res = mysql_query("SELECT cpf_cliente FROM clientes WHERE cpf_cliente = '$cpf'");
 
  if( mysql_num_rows($res) )
  {
    //retornou algo, j tem
	$_SESSION['cpf2'] = NULL;
	 printf("<script>alert('Paciente já cadastrado.');
    window.location='pac.php';</script>");
  }
  else
  {
    //nada encontrado
	$_SESSION['cpf2'] = $_POST['cpf2'];
    printf("<script>alert('Paciente não cadastrado.');
    window.location='pac.php';</script>");
	
	  }
}
}




?>
<html>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<body class=fonte>

<form name="demoform" method=post>

<h1 class="style3"><font face=verdana>Entrada de Exames:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Paciente :</td>
  <td width="367"><select name="nome" class="caixa" id="nome">
    <?
$busca_conv="select * from paciente order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum paciente encontrado");
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
    </select></td>
</tr>


<tr>
  <td>Data de Entrada :</td>
  <td><input name="dc" value="" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="HelloWorld/calbtn.gif" width="34" height="22" border="0" alt=""></a><span class="style1"> &nbsp;</span></td>
</tr>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="HelloWorld/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<tr>
  <td>Previs&atilde;o de Saida:</td>
  <td><input name=nome_produto2 type=text class=botao id="nome_produto2" size=30 maxlength=30></td>
</tr>
<tr>
  <td>Material :</td>
  <td><input type=text name=nome_equipamento3 class=botao size=50 maxlength=50></td>
</tr>


<tr>
  <td>Solicita&ccedil;&atilde;o :</td>
  <td><select name="nome" class="caixa" id="nome">
    <?
$busca_med="select * from medico order by nome asc;";
$res_busca_med=mysql_query($busca_med,$conn);
$num_med=mysql_num_rows($res_busca_med);
if($num_med==0)
{
 printf("<option value=''>Nenhum médico encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med;$x++)

 {

  $campo_med=mysql_fetch_array($res_busca_med);

  printf("<option value='$campo_med[nome]'>$campo_med[nome]");
  

 }

}

?>
    </select></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?
$busca_conv="select * from convenio order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum Conv&ecirc;nio encontrado");
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
  </select></td>
</tr>
<tr>
  <td>Identific. do Conv&ecirc;nio :</td>
  <td><input name=nome_fabricante12 type=text class=botao id="nome_fabricante14" size=50 maxlength=50></td>
</tr>
<tr>
  <td>Macroscopia : </td>
  <td><textarea name="textarea" id="textarea" cols="40" rows="7"></textarea></td>
</tr>
<tr>
  <td>Observa&ccedil;&atilde;o :</td>
  <td><textarea name="textarea2" id="textarea2" cols="40" rows="4"></textarea></td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input type=submit value='Gravar' class=botao> <input type=submit value='Cancelar' class=botao> <input type=submit value='Reiniciar' class=botao></td>
</tr>
</table>

</form>

<?

$codigo_categoria=$_POST['codigo_categoria'];

$promocao=$_POST['promocao'];

$nome_equipamento=$_POST['nome_equipamento'];

$nome_produto=$_POST['nome_produto'];

$nome_fabricante=$_POST['nome_fabricante'];

$descricao_equipamento=$_POST['descricao_equipamento'];

$valor=$_POST['valor'];

if(($nome_equipamento!=NULL)and($descricao_equipamento!=NULL)and($nome_produto!=NULL)and($nome_fabricante!=NULL)and($valor!=NULL)and($codigo_categoria!=NULL))

{

 $busca_equipamento="select * from equipamentos where nome_equipamento = '".$nome_equipamento."';";

 $res_busca_equipamento=mysql_query($busca_equipamento,$conn);

 $num_equipamento=mysql_num_rows($res_busca_equipamento);

 if($num_equipamento==0)

 {

  $valor=str_replace(',','.',$valor);

  $cad_equipamento="insert into equipamentos values ('','".$codigo_categoria."','".$nome_equipamento."','".$nome_produto."','".$nome_fabricante."','".$descricao_equipamento."','".$promocao."','".$valor."');";

  $ok=mysql_query($cad_equipamento,$conn);

  if($ok==1)

  {

   $busca_equipamento="select * from equipamentos where nome_equipamento = '".$nome_equipamento."';";

   $res_busca_equipamento=mysql_query($busca_equipamento,$conn);

   $campo_equipamento=mysql_fetch_array($res_busca_equipamento);

   echo "<script>window.location='cad_foto_equipamentos.php?codigo_equipamento=$campo_equipamento[codigo_equipamento]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O suprimento: $nome_suprimento já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

