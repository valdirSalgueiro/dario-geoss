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
$cpf=$_POST['cpf'];

if($_POST['testar']) {  

if( !empty($_POST['cpf2']) )
{
  $cpf = mysql_escape_string($_POST['cpf2']);
 
  $res = mysql_query("SELECT cpf FROM paciente WHERE cpf = '$cpf'");
 
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
<strong>Veja se o Paciente ja est&aacute; cadastrado* </strong></span><span class="por"><strong>Consulte pelo CPF ou pelo RG</strong></span> <br>
<span class="style1"><strong>*</strong> = Campos Obrigat&oacute;rios </span><br>
<br>
<table border=0>
  <tr>
    <td width="174" bgcolor="#CCCCCC" class="style2"><strong>CPF : </strong></td>
    <td width="79" bgcolor="#CCCCCC"><input name=cpf2 type=text class="botao" id="cpf2" size=11 maxlength=14 onkeypress='ajustar_cpf(this,event);'></td>
    <td width="236" bgcolor="#CCCCCC"><input name="testar" type="submit" class="por" id="testar" value="Testar"></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" class="style2"><strong>RG : </strong></td>
    <td bgcolor="#CCCCCC"><input name=rg2 type=text class="botao" id="rg2" size=11 maxlength=14></td>
    <td bgcolor="#CCCCCC"><input name="testar2" type="submit" class="por" id="testar2" value="Testar"></td>
  </tr>
</table>
<br>
<br>
<table border=0 class=fonte>


<tr>
  <td width="174"><span class="style10">Nome *:</span></td>
  <td width="318"><input name=nome type=text class=botao id="nome" size=50 maxlength=50></td></tr>

<tr>
  <td><span class="style10">Data Nascimento *:</span> </td>
  <td><input name=data_nascimento type=text class=botao id="data_nascimento" size=10 maxlength=10> 
    <span class="style1"> &nbsp;&nbsp;&nbsp;( DD / MM / AAAA )</span></td>
</tr>
<tr>
  <td><span class="style10">Endere&ccedil;o *:</span> </td>
  <td><span class="style10">
    <span class="style11">
    <input name=endereco type=text class=botao id="endereco" size=50 maxlength=50>
    </span></span></td>
</tr>
<tr>
  <td class="style11">Bairro *:</td>
  <td><input name=bairro type=text class=botao id="bairro" size=50 maxlength=50></td></tr>

 <tr> 
<form name="frmAjax">
 
      <td><label for="listEstados"> <span class="style10">Estado:</span>&nbsp;</label></td>
   
      <td><select name="listEstados" class="botao">
   
      <option value="0"> Selecione o estado>></option>
  
      <option value="ac">Acre</option>
   
      <option value="al">Alagoas</option>
   
      <option value="ap">Amapa</option>
  
      <option value="am">Amazonas</option>
 
      <option value="ba">Bahia</option>
  
      <option value="ce">Ceara</option>
 
      <option value="df">Distrito Federal</option>
  
      <option value="es">Espirito Santo</option>
  
      <option value="go">Goias</option><option value="ma">Maranhao</option><option value="mt">Mato Grosso</option><option value="ms">Mato Grosso do Sul</option><option value="mg">Minhas Gerais</option><option value="pa">Para</option><option value="pb">Paraiba</option><option value="pr">Parana</option><option value="pe">Pernambuco</option><option value="pi">Piaui</option><option value="rj">Rio de Janeiro</option><option value="rn">Rio Grande do Norte</option><option value="rs">Rio Grande do Sul</option><option value="ro">Rondonia</option><option value="rr">Roraima</option><option value="sc">Santa Catarina</option><option value="sp">Sao Paulo</option><option value="se">Sergipe</option><option value="to">Tocantins</option>
  
      </select></td></tr>

      <tr><td><label for="listCidades"><span class="style10">Cidade:</span>&nbsp;</label></td>
 
      <td><select name="listCidades" class="botao">
  
      <option id="opcoes" value="0">-- Primeiro selecione o estado --</option>
 
      </select></td></tr>
</form>


<tr>
  <td><span class="style10">CEP *:</span></td>
  <td><input name=cep type=text class=botao id="cep" onkeypress='ajustar_cep(this,event);' size=11 maxlength=10 ></td>
</tr>
<tr>
  <td><span class="style10">CPF :</span></td>
  <td><input name=cpf type=text class=botao id="cpf" onkeypress='ajustar_cpf(this,event);' value="<?php echo  $cpf3; ?>" size=11 maxlength=14 ></td>
</tr>
<tr>
  <td><span class="style10">RG *:</span></td>
  <td><input name=rg type=text class=botao id="rg" value="<?php echo  $rg3; ?>" size=11 maxlength=16></td>
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
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['listCidades'];
$uf=$_POST['listEstados'];
$cep=$_POST['cep'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
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

if(($nome!=NULL)and($endereco!=NULL)and($bairro!=NULL)and($cidade!=NULL)and($uf!=NULL)and($cep!=NULL)and($rg!=NULL)and($data_nascimento[9]!=NULL)and($ddd_fone1!=NULL)and($fone_1!=NULL)and($convenio!=NULL)and($identif_convenio!=NULL))

{

 $busca_pa="select * from paciente where nome = '".$nome."';";

 $res_busca_pa=mysql_query($busca_pa,$conn);

 $num_pa=mysql_num_rows($res_busca_pa);

 if($num_pa==0)

 {

    $cad_pa="insert into paciente values ('','".$nome."','".$endereco."','".$bairro."','".$cidade."','".$uf."','".$cep."','".$cpf."','".$rg."','".alt_data_br_en($data_nascimento)."','".$ddd_fone1."','".$fone_1."','".$ddd_fone2."','".$fone_2."','".$ddd_fone3."','".$fone_3."','".$convenio."','".$identif_convenio."','".$email."','".$data."');";

  $ok=mysql_query($cad_pa,$conn);

  if($ok==1)

  {

   $busca_pa2="select * from paciente where nome = '".$nome."';";

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

  echo "<script>alert('O Paciente: $nome já está cadastrado.');</script>";

 }

}

?>
</body>

</html>

