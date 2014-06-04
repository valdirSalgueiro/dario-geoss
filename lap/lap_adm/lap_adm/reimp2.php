<?

session_start();

include('estilo.css');

//include('fckeditor/fckeditor.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];

if($usuario_autenticado!=NULL)

{

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

<form name=form1 method=post>

<h1 class="style3"><font face=verdana>Reimpress&atilde;o :</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="291">Documento para reimprimir:</td>
  </tr>


<tr>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td><input type="radio" name="radio" id="radio" value="radio"> 
    Comprovante de Entrega</td>
  </tr>
<tr>
  <td><input type="radio" name="radio" id="radio2" value="radio"> 
    Resumo de Laborat&oacute;rio</td>
  </tr>
<tr>
  <td><input type="radio" name="radio" id="radio3" value="radio"> 
    Laudo</td>
  </tr>


<tr>
  <td></td>
  </tr>
<tr>
  <td>N&uacute;mero do Laudo </td>
  </tr>
<tr>
  <td><input name=nome_produto3 type=text class=botao id="nome_produto3" size=30 maxlength=30></td>
  </tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
<tr>
  <td></td>
</tr>
<tr><td><input type=submit value='Ok' class=botao>
    <input type=submit value='Cancelar' class=botao> <span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
    </span></td>
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

