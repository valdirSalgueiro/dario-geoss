<?

session_start();

include('estilo.css');

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
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name="form1" method="post" action="recibo.php">

<h1 class="style3"><font face=verdana><img src="images/links.gif" width="48" height="48"> Impress&atilde;o de Recibo:</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<? if($_POST['imprimir']){ ?>
<?
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo_ex=mysql_fetch_array($res_busca_ex);

if($campo_ex['id']==''){
echo "Este exame não existe.&nbsp;&nbsp;<a href='recibo.php'>Refazer A busca</a><br>"; 
return; } else {

 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_ex['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##

}
}
?>
<table border=0 class=fonte>
<tr>
  <td class="style10"><div align="left">Laudo N &ordm;  :</div></td>
  <td><input name=id type=text class=botao id="id" value="<? echo $_POST['id'];?>" size=20 maxlength=20></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<? if($_POST['imprimir']!=''){ ?>
<tr>
  <td width="86" class="style10">Nome  :</td>
  <td width="257"><input name=nome type=text class=botao id="nome" value="<?echo $campo_pac['nome'];?>" size=50 maxlength=50></td>
  <td width="54"><div align="right" class="style10">Valor : </div></td>
  <td width="111"><input name=valor type=text class=botao id="valor" size=20 maxlength=30></td>
</tr>

<tr>
  <td width="86" class="style10">Servi&ccedil;os de  :</td>
  <td width="257"><input name=servicos class=botao type=text id="servicos" size=50></td>
  <td width="54"><div align="right" class="style10">CPF : </div></td>
  <td width="111"><input name=cpf type=text value="<?echo $campo_pac['cpf'];?>" class=botao id="cpf" size=20 maxlength=30></td>
</tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr><? } ?>
<tr><td></td><td><div align="center">

  <? if($_POST['imprimir']==''){ ?><input type=submit value='Continuar' name="imprimir" class=botao>
  <? } else { ?>
  <input type=submit value='Imprimir' name="imprimir2" class=botao><? } ?>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <input type=submit value='Cancelar' class=botao>
</div></td>
  <td><span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
  </span></td>
  <td>&nbsp;</td>
</tr>
</table>

</form>

<?
if($_POST['imprimir2']){

if(($_POST['nome']=='')and($_POST['valor']=='')and($_POST['servicos']=='')and($_POST['id']=='')and($_POST['cpf']=='')){

echo "É obrigatório o preenchimento de todos os campos."; } else {


 
 echo "<script>window.open('print_recibo.php?id=$_POST[id]&&nome=$_POST[nome]&&valor=$_POST[valor]&&servicos=$_POST[servicos]&&cpf=$_POST[cpf]');</script>";

}
}

?>
</body>

</html>

