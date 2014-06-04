<?

session_start();

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
.style3 {
	color: #000033;
	font-weight: bold;
}
-->
</style>
<link href="responsax.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {font-size: 14px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1 class="style3"><font face=verdana><img src="images/cadastro_medico.jpg" width="50" height="50"> Cadastrar M&eacute;dico:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span>
<table border=0 class=fonte>

<tr>
  <td width="174"><span class="style6">Nome :*</span></td>
  <td width="318"><input name=nome type=text class=botao id="nome" size=50 maxlength=50></td>
</tr>

<tr>
  <td><span class="style6">Email :  </span></td>
  <td><input name=email type=text class=botao id="email" size=50 maxlength=50></td>
</tr>
<tr>
  <td><span class="style6">CREMEPE : * </span></td>
  <td><input name=cremepe type=text class=botao id="cremepe" size=30 maxlength=30 OnKeyPress='only_number()'> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td><span class="style6">Telefone : * </span></td>
  <td><input name=ddd_fone1 type=text class=botao id="ddd_fone1" size=1 maxlength=3 OnKeyPress='only_number()'>
    -
    <input name=fone_1 type=text class=botao id="fone_1" size=20 maxlength=20 OnKeyPress='only_number()'></td>
</tr>
<tr>
  <td><span class="style6">Celular :</span></td>
  <td><input name=ddd_fone2 type=text class=botao id="ddd_fone2" size=1 maxlength=3 OnKeyPress='only_number()'>
    -
    <input name=fone_2 type=text class=botao id="fone_2" size=20 maxlength=20 OnKeyPress='only_number()'></td>
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
</table>

</form>
<script language='JavaScript'>
 function only_number(){
   if(event.keyCode<48 || event.keyCode>57)
     event.returnValue=false;
 }
</script>
<?

$nome=$_POST['nome'];
$email=$_POST['email'];
$cremepe=$_POST['cremepe'];
$ddd_fone1=$_POST['ddd_fone1'];
$fone_1=$_POST['fone_1'];
$ddd_fone2=$_POST['ddd_fone2'];
$fone_2=$_POST['fone_2'];


if(($nome!=NULL)and($cremepe!=NULL)and($ddd_fone1!=NULL)and($fone_1!=NULL))
{

 $busca_med="select * from medico where nome = '".$nome."' or cremepe = '".$cremepe."';";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);

 if($num_med==0)

 {


  $cad_med="insert into medico values ('','".$nome."','".$email."','".$cremepe."','".$ddd_fone1."','".$fone_1."','".$ddd_fone2."','".$fone_2."');";

  $ok=mysql_query($cad_med,$conn);

  if($ok==1)

  {

   $busca_med2="select * from medico where nome = '".$nome."' or cremepe = '".$cremepe."' or email = '".$email."';";

   $res_busca_med2=mysql_query($busca_med2,$conn);

   $campo_med2=mysql_fetch_array($res_busca_med2);

    echo "<script>alert('Médico Cadastrado.');

    window.location='cad_foto_med.php?id=$campo_med2[id]';</script>";
 

  }

  else

  {

   echo "ERRO: ".mysql_error($conn).".";

  }

 }

 else

 {

  echo "<script>alert('O médico: $nome ou o Cremepe : $cremepe ou Email : $email  já está cadastrado.');</script>";

 }

}

?>

</body>

</html>

