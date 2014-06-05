<?php

session_start();
$rg3 = $_SESSION['rg2'];
$cpf3 = $_SESSION['cpf2'];

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
<?php
//Testar Paciente
$cpf=$_POST['nome'];

if($_POST['testar']) {  

if( !empty($_POST['cpf2']) )
{
  $cpf = mysql_escape_string($_POST['cpf2']);
 
  $res = mysql_query("SELECT nome FROM paciente WHERE nome = '$cpf'");
 
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

//Testar RG
$rg=$_POST['rg'];

if($_POST['testar2']) {  

if( !empty($_POST['rg2']) )
{
  $rg = mysql_escape_string($_POST['rg2']);
 
  $res = mysql_query("SELECT rg FROM paciente WHERE rg = '$rg'");
 
  if( mysql_num_rows($res) )
  {
    //retornou algo, j tem
	$_SESSION['rg2'] = NULL;
	 printf("<script>alert('Paciente já cadastrado.');
    window.location='pac.php';</script>");
  }
  else
  {
    //nada encontrado
	$_SESSION['rg2'] = $_POST['rg2'];
    printf("<script>alert('Paciente não cadastrado.');
    window.location='pac.php';</script>");
	
	  }
}
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
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {font-size: 12px}
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name=form1 method=post>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
$().ready(function() {
	$("select[@name=listEstados]").change(function(){
		$('select[@name=listCidades]').html('<option value="sda">Procurando :::::::</option>');
		$.post('buscacidade.php', 
			{ estado : $(this).val() }, 
			function(resposta){
				
				$('select[@name=listCidades]').html(resposta);
			}
			
		);
	});
});
</script>
<h1 class="style3"><font face=verdana><img src="images/paciente.gif" width="50" height="50"> Cadastro de Paciente:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
<strong>Veja se o Paciente ja est&aacute; cadastrado* </strong></span><span class="por"><strong>Consulte pelo Nome </strong></span> <br>
<span class="style1"><strong>*</strong> = Campos Obrigat&oacute;rios </span><br>
<br>
<table border=0>
  <tr>
    <td width="174" bgcolor="#CCCCCC" class="style2"><strong>Nome : </strong></td>
    <td width="79" bgcolor="#CCCCCC"><input name=cpf2 type=text class="botao" id="cpf2" size=11 maxlength=14 ></td>
    <td width="236" bgcolor="#CCCCCC"><input name="testar" type="submit" class="por" id="testar" value="Testar"></td>
  </tr>
</table>
<br>
<br>
<script>
//Formatação para qualquer mascara
/*

Exemplos:
CEP
OnKeyPress="formatar(this, '#####-###')"
CPF
OnKeyPress="formatar(this, '###.###.###-##')"
DATA
OnKeyPress="formatar(this, '##/##/####')"
*/

function formatar(src, mask)
{
var i = src.value.length;
var saida = mask.substring(0,1);
var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
{
src.value += texto.substring(0,1);
}
}
</script>
<table border=0 class=fonte>


<tr>
  <td width="174"><span class="style10">Nome *:</span></td>
  <td width="318"><input name=nome type=text class=botao id="nome" size=50 maxlength=50></td></tr>

<tr>
<tr>
  <td width="174"><span class="style10">Nome da Mãe *:</span></td>
  <td width="318"><input name=nome_mae type=text class=botao id="nome_mae" size=50 maxlength=50></td></tr>

<tr>
  <td><span class="style10">Idade *:</span> </td>
  <td><input name=data_nascimento type=text class=botao id="data_nascimento" size=12 maxlength=10> 
    <span class="style1"> &nbsp;&nbsp;&nbsp;Anos</span></td>
</tr>
<tr>
  <td><span class="style10">RG :</span></td>
  <td><input name=rg type=text class=botao id="rg" value="<?php echo  $rg3; ?>" size=11 maxlength=16></td>
</tr>
<tr>
  <td><span class="style10">Endereço :</span></td>
  <td><input name=endereco type=text class=botao id="endereco" value="" size=50></td>
</tr>
<tr>
  <td><span class="style10">Telefone Residencial *:</span></td>
  <td><input name=ddd_fone1 type=text class=botao id="ddd_fone1" size=1 maxlength=3> 
    -
      <input name=fone_1 type=text class=botao id="fone_1" size=20 maxlength=20></td>
</tr>
<tr>
  <td><span class="style10">Telefone Comercial :</span></td>
  <td><input name=ddd_fone2 type=text class=botao id="ddd_fone2" size=1 maxlength=3>
-
  <input name=fone_2 type=text class=botao id="fone_2" size=20 maxlength=20></td>
</tr>
<tr>
  <td><span class="style10">Celular :</span></td>
  <td><input name=ddd_fone3 type=text class=botao id="ddd_fone3" size=1 maxlength=3>
-
  <input name=fone_3 type=text class=botao id="fone_3" size=20 maxlength=20></td>
</tr>
<tr>
  <td><span class="style10">Conv&ecirc;nio *:</span></td>
  <td><select name="convenio" class="caixa" id="convenio">
    <?php
$busca_conv="select * from convenio order by nome asc;";
$res_busca_conv=mysql_query($busca_conv,$conn);
$num_conv=mysql_num_rows($res_busca_conv);
if($num_conv==0)
{
 printf("<option value=''>Nenhum Convênio encontrado");
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
  <td><span class="style10">N&uacute;mero Carteirinha * :</span> </td>
  <td><input name=identif_convenio type=text class=botao id="identif_convenio" size=50 maxlength=50></td>
</tr>
<tr>
  <td><span class="style10">E-mail :</span></td><td><input name=email type=text class=botao id="email" size=50 maxlength=50></td></tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
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
</form>

<?php

$nome=$_POST['nome'];
$nome_mae=$_POST['nome_mae'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['listCidades'];
$uf=$_POST['listEstados'];
$cep=$_POST['cep'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$endereco=$_POST['endereco'];
$data_nascimento=$_POST['data_nascimento'];
$ddd_fone1=$_POST['ddd_fone1'];
$fone_1=$_POST['fone_1'];
$ddd_fone2=$_POST['ddd_fone2'];
$fone_2=$_POST['fone_2'];
$ddd_fone3=$_POST['ddd_fone3'];
$fone_3=$_POST['fone_3'];
$convenio=$_POST['convenio'];
$identif_convenio=$_POST['identif_convenio'];
$email=$_POST['email'];
$data=mktime();

if(($nome!=NULL)and($endereco!=NULL)and($data_nascimento!=NULL)and($ddd_fone1!=NULL)and($fone_1!=NULL)and($convenio!=NULL)and($identif_convenio!=NULL))

{

 $busca_pa="select * from paciente where nome = '".$nome."' and rg = '".$rg."';";

 $res_busca_pa=mysql_query($busca_pa,$conn);

 $num_pa=mysql_num_rows($res_busca_pa);

 if($num_pa==0)

 {

    $cad_pa="insert into paciente values ('','".$nome."','".$endereco."','".$bairro."','".$cidade."','".$uf."','".$cep."','".$cpf."','".$rg."','".$data_nascimento."','".$ddd_fone1."','".$fone_1."','".$ddd_fone2."','".$fone_2."','".$ddd_fone3."','".$fone_3."','".$convenio."','".$identif_convenio."','".$email."','".$data."','".$nome_mae."');";

  $ok=mysql_query($cad_pa,$conn);

  if($ok==1)

  {

   $busca_pa2="select * from paciente where nome = '".$nome."' and rg = '".$rg."';";

   $res_busca_pa2=mysql_query($busca_pa2,$conn);

   $campo_pa2=mysql_fetch_array($res_busca_pa2);
  
  $_SESSION['cpf2'] = NULL;
  echo "<script>alert('Paciente cadastrado com sucesso.');
  window.location='ent.php?id=$campo_pa[id]';</script>";

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O Paciente: $nome já está cadastrado com o rg $rg.');</script>";

 }

}

?>
</body>

</html>

