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
.style4 {color: #FFFFFF}
-->
</style>
<style type="text/css">
<!--
.style10 {font-size: 14px}
.style11 {font-size: 14}
-->
</style>
<body class=fonte>

<form name="form1" method="post" action="reimp.php">

<h1 class="style3"><font face=verdana><img src="images/impressora.png" width="50" height="50"> I</font><font face=verdana>mpress&atilde;o :</font></h1>
<hr color=black size=2>

<span class="style1"><br>
</span><br>
<?
if(($_POST['id']=='')and($_POST['ok'])){
echo "Preencha o número do exame que deseja reimprimir.&nbsp;&nbsp;<a href='reimp.php'>Preencher Novamente</a><br>"; 
return; 
} 
?>
<?
if(($_POST['id']!='')and($_POST['ok']!='')){

  ##Busca do nome do exame##
$consulta2= mysql_query("SELECT count(id) as total FROM exame WHERE id = '".$_POST['id']."'") or die(mysql_error());
$totalex = mysql_result($consulta2,0,"total");
if($totalex==0){ 
echo "Exame não encontrado.&nbsp;&nbsp;<a href='reimp.php'>Preencher Novamente</a><br>"; 
return; 
} else {

if($_POST['reimp']=='etiqueta'){



##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo_ex=mysql_fetch_array($res_busca_ex);


##Buscando o paciente##
$busca_ex2="select * from paciente where id  = '".$campo['paciente_id']."';";
$res_busca_ex2=mysql_query($busca_ex2,$conn);
$campo_pac=mysql_fetch_array($res_busca_ex2);

if($campo_ex['id']=='')
{
echo "Este exame não existe.&nbsp;&nbsp;<a href='etiqueta.php'>Refazer A busca</a><br>"; 
return; }

if($campo['etiqueta']==1)
{
echo "Este exame já teve etiqueta impressa.&nbsp;&nbsp;<a href='print_etiqueta.php?id=$_POST[id]' target='_blank'>Reemprimir?</a><br><BR>
"; ?>
<BR><table border=0 class=fonte>
  <tr>
    <td colspan="2" bgcolor="#000033"><div align="center" class="style4">Dados da Etiqueta
    </div>
      <div align="center"></div>
      <div align="center"></div></td>
    </tr>
  
  <tr>
    <td width="135" class="style10">Impressa em :</td>
    <td width="187" colspan="2"><strong><? print date("d/m/Y - H:i",$campo[data_etiqueta]); ?></strong></div></td>
  </tr>
     <tr>
    <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
  
  
</table><? 
die(); } 

$data_etiqueta = mktime();
$etiqueta = 1;


$cad="update exame set data_etiqueta = '".$data_etiqueta."', etiqueta = '".$etiqueta."',etiqueta_por = '".$usuario_autenticado."' where id = '".$_POST['id']."';";
$ok=mysql_query($cad,$conn);
   
echo "<script>window.open('print_etiqueta.php?id=$_POST[id]');</script>";

}
##Buscando os dados para postá-los quando der o pulo##
$busca_ex="select * from exame where id  = '".$_POST['id']."';";
$res_busca_ex=mysql_query($busca_ex,$conn);
$campo_ex=mysql_fetch_array($res_busca_ex);

if($_POST['reimp']=='entrega'){

echo "<script>window.open('print.php?id=$_POST[id]');</script>";

}
if($_POST['reimp']=='gsl'){

echo "<script>window.open('exame.php?id=$_POST[id]');</script>";

}
if($_POST['reimp']=='copia'){

echo "<script>window.open('copia.php?id=$_POST[id]');</script>";

}
if($_POST['reimp']=='impressao_neap'){

echo "<script>window.open('impressao_neap.php?id=$_POST[id]');</script>";

}

if($campo_ex['ex_status_id']!=3){
if($_POST['reimp']=='exame'){

echo "<script>window.open('exame_fim.php?id=$_POST[id]');</script>";
} 
}
if($campo_ex['ex_status_id']==3){
if($_POST['reimp']=='exame'){

echo "<script>window.open('exame_fim.php?id=$_POST[id]');</script>";
} 
}
}
}
?>
<table border=0 class=fonte>
<tr>
  <td width="291" class="style10">Documento para reimprimir:</td>
  </tr>


<tr>
  <td>&nbsp;</td>
  </tr>
<tr>
  <td><input type="radio" name="reimp" id="radio" value="etiqueta"> 
    <span class="style10">Etiqueta</span></td>
</tr>
<tr>
  <td><input type="radio" name="reimp" id="entrega" value="entrega"> 
    <span class="style10">Comprovante de Entrega</span></td>
  </tr>
<tr>
  <td><input type="radio" name="reimp" id="exame" value="gsl">
      <span class="style10">GSL - Guia de Servi&ccedil;os Laboratoriais </span></td>
</tr>
<tr>
  <td><input type="radio" name="reimp" id="exame" value="copia">
      <span class="style10">C&oacute;pia </span></td>
</tr>


<tr>
  <td><input type="radio" name="reimp" id="exame" value="exame"> 
    <span class="style10">Laudo</span></td>
  </tr>


<tr>
  <td></td>
  </tr>
<tr>
  <td class="style10">Laudo N &ordm;  </td>
  </tr>
<tr>
  <td><input name=id type=text class=botao id="id" value="<? echo $_POST['id'];?>" size=20 maxlength=20></td>
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
<tr><td><input name="ok" type=submit class=botao id="ok" value='Ok'>
    <input type=submit value='Cancelar' class=botao> <span class="atributos_titulo">
    <input name="button" type=button class="botao" onClick="history.go(-1);" value="Voltar">
    </span></td>
</tr>
</table>

</form>

</body>

</html>

