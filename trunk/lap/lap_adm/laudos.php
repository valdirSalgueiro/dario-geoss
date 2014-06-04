<?
session_start();
if($_GET['local']=='busca'){
$_SESSION["busca"]=$_GET['id'];
}
$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];

if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('tab.css');
 include('conn.php');
 include('data.php');
 include('fckeditor/fckeditor.php');
 ##Busca o id do exame##
 
 $busca_ex="select * from exame where id = '".$id."';";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);
 if($num_ex>0)
 {
  $campo_ex=mysql_fetch_array($res_busca_ex);
 }
 
 ##Até aqui
  ##Busca do codigo de procedimento pra ve se exame ja esta faturado##
 $busca_faturar="SELECT * from faturar WHERE id_exame = '".$campo_ex['id']."'";
 $res_busca_faturar=mysql_query($busca_faturar,$conn);
 $campo_faturar=mysql_fetch_array($res_busca_faturar);
 ##Até aqui##
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_ex['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 

 
   ##Busca do nome do exame##
 $busca_exa="SELECT id,nome from ex_status WHERE id = '".$campo_ex['ex_status_id']."'";
 $res_busca_exa=mysql_query($busca_exa,$conn);
 $num_exa=mysql_num_rows($res_busca_exa);
 $campo_exa=mysql_fetch_array($res_busca_exa);
 ##Até aqui##
 
  ##Busca do nome do convênio##
 $busca_conv="SELECT id,nome from convenio WHERE id = '".$campo_ex['convenio']."'";
 $res_busca_conv=mysql_query($busca_conv,$conn);
 $num_conv=mysql_num_rows($res_busca_conv);
 $campo_conv=mysql_fetch_array($res_busca_conv);
 ##Até aqui##
 
   ##Busca do tipo do exame##
 $busca_tipo="SELECT * from tipo_exame WHERE id_ex = '".$campo_ex['tipo']."'";
 $res_busca_tipo=mysql_query($busca_tipo,$conn);
 $num_tipo=mysql_num_rows($res_busca_tipo);
 $campo_tipo=mysql_fetch_array($res_busca_tipo);
 ##Até aqui##
 
    ##Busca do médico##
 $busca_med="SELECT * from medico WHERE id = '".$campo_ex['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<script language="javascript">

function abrir(pagina,nome,caracteristicas) {

	window.open(pagina,nome,caracteristicas);

	

}
</script>
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
.style4 {
	font-size: 12px;
	color: #000080;
}
.style6 {font-size: 12px; color: #000080; font-weight: bold; }
-->
</style>
<link href="botoes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style7 {color: #000033}
.style8 {
	color: #FFFFFF;
	font-weight: bold;
}
.style9 {	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
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

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b><br>
  </b></font><font face=verdana><b>    <span class="style7">Digita&ccedil;&atilde;o de Laudos:</span></b></font></h1>
<hr color=black size=2>

<div align="center"><br>
    <table width="732" bgcolor="" border="0">
      <tr>
        <td width="517">   

                </head>

                
               
        </head></td>
      </tr>
    </table>
    <div align="center"></div>
	
  <table border=0 class=fonte>
<tr>
  <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr>
<? if($campo_tipo['nome']!='HISTOPATOLOGICO'){ ?>
  <td colspan="2" bgcolor="#000033">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><div align="center">
<form name="colposcopia" method="post">
</form>
    <?  } ?>
	<?
	if($_POST[cadc]!=NULL){
	 echo "<script>
 window.location='cadastrar_colposcopia.php?id=$id';</script>";
	}
	?>  
	<?
	if($_POST[fotos]!=NULL){
	 echo "<script>
 window.location='cad_foto_exame.php?id=$id';</script>";
	}
	?>  
  </div></td>
  </tr>
<input name="fotos" type=submit class=botaooo id="fotos" value='Fotos '>
<? if($campo_ex['ex_status_id']!=4){ ?>
                <input name="guia" type=submit class=botaooo id="guia" value='N&uacute;mero da Guia'>
                <? if($campo_faturar['id_exame']==NULL){ ?>
          <input name="faturar" type=submit class=botaooo id="faturar" value='Faturar '><? } else { ?><strong class="style6">FATURADO</strong><? } ?><? } ?>
<tr>
 <td colspan="2" bgcolor="#333333"><div align="center" class="style4"><font color="#FFFFFF">Informações Técnicas</font> </div>
        <div align="center"></div>
    <div align="center"></div></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><span class="style10"> Status  :</span></td>
  <td><span class="style10">
    <select name="id" class="botaooo" id="id">
      <?
$exid = $campo_ex['id'];

$sql = "select id,nome 
		from ex_status 
		where id =(select ex_status_id 
	   			from exame 
	   			where id = $exid)";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);	   
	   
echo "<option value=".$row['id'].">".$row['nome']."</option>";	

$busca_cod="select * from ex_status where id <> ".$row['id']." order by id asc;";
$res_busca_cod=mysql_query($busca_cod,$conn);
$num_cod=mysql_num_rows($res_busca_cod);


 for($x=0;$x<$num_cod;$x++)

 {

  $campo_cod=mysql_fetch_array($res_busca_cod);

  echo("<option value='$campo_cod[id]'>$campo_cod[nome]</option>");
  

 }



?>
<?
if($_POST[faturar]!=NULL){
	 echo "<script>
 window.location='faturar.php?id=$campo_ex[id]';</script>";
	}
?>

    </select>
  </span></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="174"><span class="style10">Opções  :</span></td>
  <td width="367"><span class="style10"><input type="radio" name="tipo_cod" id="tipo_cod" value="g">
      <span class="style10">Geral</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tipo_cod" id="tipo_cod" value="mc">
      <span class="style10">Microscopia e Conclusão</span>&nbsp;&nbsp;<input name="fin1" type=submit class=botao id="fin1" value='Atualizar'></td>
	  </tr>
<tr>
  <td width="174"><span class="style10">Laudo N &ordm;  :</span></td>
  <td width="367"><span class="style10"><? echo $campo_ex['id']; ?></span></td>
</tr>
<tr>
  <td><span class="style10">Paciente :</span></td>
  <td><span class="style10">
<select name="paciente" class="caixa2" id="paciente">
	<? 
 $busca_conven="SELECT * from paciente WHERE nome = '".$campo_pac['nome']."'";
 $res_busca_conven=mysql_query($busca_conven,$conn);
 $num_conven=mysql_num_rows($res_busca_conven);
 $campo_conven=mysql_fetch_array($res_busca_conven);

   printf("<option value='$campo_conven[id]'>$campo_conven[nome]");
     ?>
      <?
$busca_med2="select * from paciente where id != $campo_conven[id]  order by nome asc;";
$res_busca_med2=mysql_query($busca_med2,$conn);
$num_med2=mysql_num_rows($res_busca_med2);
if($num_med2==0)
{
 printf("<option value=''>Nenhum paciente encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med2;$x++)

 {

  $campo_med2=mysql_fetch_array($res_busca_med2);

  printf("<option value='$campo_med2[id]'>$campo_med2[nome]");
  

 }

}

?>
    </select>

</span></td>
</tr>
<tr>
  <td width="174"><span class="style10">Nome da Mãe:</span></td>
  <td width="367"><span class="style10"><? echo $campo_conven['nome_mae']; ?></span></td>
</tr>

<tr>
  <td><span class="style10">Data de Entrada :</span></td>
  <td><span class="style10"><? echo date("d-m-Y-H:h",$campo_ex['data_entrada']); ?> 
     &nbsp;</span></td>
</tr>
<tr>
  <td><span class="style10">Previs&atilde;o de Saida:</span></td>
  <td><span class="style10">
    <input name="edia" id="edia" value="<? echo date("d",$campo_ex['data_previsao']); ?>" size="2" maxlength="2">
    <span class="style1"> /
    <input name="emes" id="emes" value="<? echo date("m",$campo_ex['data_previsao']); ?>" size="2" maxlength="2">
/
<input name="eano" id="eano" value="<? echo date("Y",$campo_ex['data_previsao']); ?>" size="4" maxlength="4">
-
<input name="ehora" id="ehora" value="<? echo date("H",$campo_ex['data_previsao']); ?>" size="2" maxlength="2">
:
<input name="emin" id="emin" value="<? echo date("i",$campo_ex['data_previsao']); ?>" size="2" maxlength="2">
    </span></span></td>
</tr>
<tr>
  <td><span class="style10">Tipo de Exame:</span></td>
  <td><span class="style10"><? echo $campo_tipo['nome']; ?></span></td>
</tr>
<tr>
  <td><span class="style10">Solicita&ccedil;&atilde;o :</span></td>
  <td><span class="style10"><? echo $campo_med['nome']; ?></span></td>
</tr>
<tr>
  <td><span class="style10">Conv&ecirc;nio :</span></td>
  <td><span class="style10">

 <select name="convenio" class="caixa2" id="convenio">
	<? 
 $busca_conven="SELECT * from convenio WHERE nome = '".$campo_conv['nome']."'";
 $res_busca_conven=mysql_query($busca_conven,$conn);
 $num_conven=mysql_num_rows($res_busca_conven);
 $campo_conven=mysql_fetch_array($res_busca_conven);

   printf("<option value='$campo_conven[id]'>$campo_conven[nome]");
     ?>
      <?
$busca_med2="select * from convenio where id != $campo_conven[id]  order by nome asc;";
$res_busca_med2=mysql_query($busca_med2,$conn);
$num_med2=mysql_num_rows($res_busca_med2);
if($num_med2==0)
{
 printf("<option value=''>Nenhum convênio encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_med2;$x++)

 {

  $campo_med2=mysql_fetch_array($res_busca_med2);

  printf("<option value='$campo_med2[id]'>$campo_med2[nome]");
  

 }

}

?>
    </select>

</span></td>
</tr>

<tr>
 <td><span class="style10">Procedimentos Necessários ?</span></td><td> <input name="1" type="submit" class="botao" id="mais" value="1"><input name="2" type="submit" class="botao" id="mais" value="2"><input name="3" type="submit" class="botao" id="mais" value="3">
<tr>
  <td><span class="style10">Médico :</span></td>
  <td><span class="style10">
   <select name="medico" class="caixa2" id="medico">
	<? 
   printf("<option value='$campo_ex[medico_id]'>$campo_med[nome]");
     ?>
      <?
$busca_med="select * from medico where id != $campo_ex[medico_id]  order by nome asc;";
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

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
    </select>
  </span></td>
</tr>
<tr>
  <td><span class="style10">Material :</span></td>
  <td><span class="style10">
    <input name=material type=text class=botao2222 id="material" value="<? echo $campo_ex['material']; ?>" size=75>
  </span></td>
</tr>
<tr>
  <td><span class="style10">C&oacute;d Macroscopia:</span></td>
  <td><span class="style10">
    <select name="codigo_mac" class="caixa2" id="codigo_mac" onChange="submitar()">
      <?
$busca_atendimentos="select * from codigo_mac order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo macroscopia encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[id]</option>");
  

 }

}

?>
    </select>
  </span><span class="style10"><a href="javascript:abrir('codigos_macroscopia.php?id=<? echo $_GET[id];?>','IPS','width=800, height=650, resizable=no, scrollbars=yes, scrolbar=yes, status=no')"><span class="style18 style38"><img src="images/BotaoLupa.jpg" width="34" border="0" height="30"></a>
    <?php
    if( $_POST['codigo_mac']!=''){
	//die('entrou');
	//$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql2="select * from codigo_mac where id  = ".$_POST['codigo_mac']."";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	$campo_ex['macroscopia'] = $row2['descricao'];
	if( $_SESSION["macroscopia"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["macroscopia"]= "$_SESSION[macroscopia] $nbsp $campo_ex[macroscopia]";
		
	} else {
	
    $_SESSION["macroscopia"]=$campo_ex['macroscopia'];
	}
	}
	
	if( $_POST['codigo_conc']!=''){
	//die('entrou');
	//$campo_ex['macroscopia'] = $_POST['macroscopia'];
	$sql="select * from codigo_conc  where id  = ".$_POST['codigo_conc']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['conclusao'] = $row['descricao'];
	
	}
	
	?>
    </span></td>
</tr>
<?
$espaco="&nbsp;";
?>
<?
 $busca_exm="select * from exame where id = '".$id."';";
 $res_busca_exm=mysql_query($busca_exm,$conn);
 $num_exm=mysql_num_rows($res_busca_exm);
 if($num_exm>0)
 {
  $campo_exm=mysql_fetch_array($res_busca_exm);
 }
 
?>
<tr>
  <td><span class="style10"><br>
  </span></td>
  <td>&nbsp;</td>
</tr>
  <tr><td><span class="style10">Macroscopia :</span></td>
  <td><span class="style10">
    <?
$mac="$campo_exm[macroscopia] $_SESSION[macroscopia]</div>";

$oFCKeditor = new FCKeditor('macroscopia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $mac;

$oFCKeditor->Create();

?>
  </span></td>
</tr>
<?
if($campo_ex['tipo_cod']=='mc'){
?>
<tr>
  <td><span class="style10">C&oacute;d Microscopia e Conclusão:</span></td>
  <td><span class="style10">
    <select name="codigo_mic" class="caixa2" id="codigo_mic" onChange="submitar()">
      <?
$busca_atendimentos="select * from codigo_conc order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo microscopia e conclusao encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[id]</option>");
  

 }

}

?>
    </select>
  </span><span class="style10"><a href="javascript:abrir('codigos_conclusao.php?id=<? echo $_GET[id];?>','IPS','width=800, height=650, resizable=no, scrollbars=yes, scrolbar=yes, status=no')"><span class="style18 style38"><img src="images/BotaoLupa.jpg" width="34" border="0" height="30"></a>
    <?php
    if( $_POST['codigo_mic']!=''){
	//die('entrou');
	//$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql2="select * from codigo_conc where id  = ".$_POST['codigo_mic']."";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	
	$campo_ex['microscopia'] = $row2['descricao'];
	if( $_SESSION["microscopia"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["microscopia"]= "$_SESSION[microscopia] $nbsp $campo_ex[microscopia]";
		
	} else {
	
    $_SESSION["microscopia"]=$campo_ex['microscopia'];
	}
	}
	
	if( $_POST['codigo_conc']!=''){
	//die('entrou');
	//$campo_ex['microscopia'] = $_POST['microscopia'];
	$sql="select * from codigo_conc  where id  = ".$_POST['codigo_conc']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['conclusao'] = $row['descricao'];
	
	}
	
	?>
    </span></td>
</tr>
<?
$espaco="&nbsp;";
?>
<?
 $busca_exm="select * from exame where id = '".$id."';";
 $res_busca_exm=mysql_query($busca_exm,$conn);
 $num_exm=mysql_num_rows($res_busca_exm);
 if($num_exm>0)
 {
  $campo_exm=mysql_fetch_array($res_busca_exm);
 }
 
?>
<tr>
  <td><span class="style10"><br>
  </span></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td><span class="style10">Microscopia e Conclusão :</span></td>
  <td><span class="style10">
    <?

$mic="$campo_exm[microscopia] $_SESSION[microscopia]";

$oFCKeditor = new FCKeditor('microscopia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $mic;

$oFCKeditor->Create();

?>
  </span></td>
</tr>
<? } ?>
<? if($campo_ex['tipo_cod']=='g'){  ?>
<tr>
  <td><span class="style10">C&oacute;d Microscopia:</span></td>
  <td><span class="style10">
    <select name="codigo_micros" class="caixa2" id="codigo_micros" onChange="submitar()">
      <?
$busca_atendimentos="select * from codigo order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum código microscopia encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[id]</option>");
  

 }

}

?>
    </select>
    <a href="javascript:abrir('codigos_microscopia.php?id=<? echo $_GET[id];?>','IPS','width=800, height=650, resizable=no, scrollbars=yes, scrolbar=yes, status=no')"><img src="images/BotaoLupa.jpg" width="34" border="0" height="30"></a>    
    <?php
    if( $_POST['codigo_micros']!=''){
	//die('entrou');
	//$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql="select * from codigo where id  = ".$_POST['codigo_micros']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['microscopia'] = $row['descricao'];
	if( $_SESSION["microscopia"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["microscopia"]= "$_SESSION[microscopia] $nbsp $campo_ex[microscopia]";
		
	} else {
	
 	$_SESSION["microscopia"]=$campo_ex['microscopia'];
	}
	}
	 if( $_POST['codigo_mac']!=''){
	//die('entrou');
	//$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql="select * from codigo_mac where id  = ".$_POST['codigo_mac']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['macroscopia'] = $row['descricao'];
	}
	if( $_POST['codigo_conc']!=''){
	//die('entrou');
	$sql="select * from codigo_conc  where id  = ".$_POST['codigo_conc']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$campo_ex['conclusao'] = $row['descricao'];
	
	if($_SESSION["codigo_conc"]!=''){
	$nbsp= "&nbsp;";
	
	$_SESSION["codigo_conc"]= "$_SESSION[codigo_conc] $nbsp $campo_ex[conclusao]";
		
	} else {
	
    $_SESSION["codigo_conc"]=$campo_ex['conclusao'];
	}
	
	}

	?>
  </span><span class="style10"><br>
  </span></td>
</tr><tr><td>&nbsp;</td>
</tr>
<tr>
  <td><span class="style10">Microscopia :</span></td>
  <td><span class="style10">
    <?

$mic="$campo_exm[microscopia] $_SESSION[microscopia]";

$oFCKeditor = new FCKeditor('microscopia');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $mic;

$oFCKeditor->Create();

?>
  </span></td>
</tr>
  <td><span class="style10">C&oacute;d Conclus&atilde;o:</span></td>
  <td><span class="style10">
    <select name="codigo_conc" class="caixa2" id="codigo_conc" onChange="submitar()">
      <?
$busca_atendimentos="select * from codigo_conc order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo conclusão encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[id]'>$campo_atendimentos[id]</option>");
  

 }

}

?>
    </select>
    <a href="javascript:abrir('codigos_conclusao.php?id=<? echo $_GET[id];?>','IPS','width=800, height=650, resizable=no, scrollbars=yes, scrolbar=yes, status=no')"><img src="images/BotaoLupa.jpg" width="34" border="0" height="30"></a></span></td>
</tr>
<tr><td><span class="style10"><br></span></td>
</tr>
<tr>
<tr>
  <td><span class="style10">Conclus&atilde;o :</span></td>
  <td><span class="style10">
    <?


$conc="$campo_exm[conclusao] $_SESSION[codigo_conc]";
$oFCKeditor = new FCKeditor('conclusao');

$oFCKeditor->BasePath = 'fckeditor/';

$oFCKeditor->Value = $conc;

$oFCKeditor->Create();

?>
  </td></tr><? } ?>
  <tr><td><span class="style10">Médico Execultante :</span></td>
  <td><span class="style10">
   
    <select name="medico_execultante" class="caixa2" id="medico_execultante">
	<? 
   printf("<option value='$campo_ex[medico_execultante]'>$campo_ex[medico_execultante]");
     ?>
      <?
$busca_med="select * from medico where nome != '".$campo_ex[medico_execultante]."' and id='5' or id='7' or id='84' order by nome asc;";
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
    </select></span></td>
</tr>
   <td colspan="2" bgcolor="#333333"><div align="center" class="style4"><span class="style10"><font color="#FFFFFF">Outras Informações</font> </span></div>
        <div align="center"></div>
    <div align="center"></div></td>
   <span class="style10">
   </tr>
   </span>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<?
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_ex['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $campo_med=mysql_fetch_array($res_busca_med);
 ##Até aqui##
?>
<tr>
  <td><span class="style10">Tabela : </span></td>
  <td><span class="style10"><? echo $campo_ex['tipo_tabela']; ?></span></td>
</tr>
<? if(($campo_ex['codigo_procedimento']!=NULL)or($campo_ex['codigo_procedimento2']!=NULL)or($campo_ex['codigo_procedimento3']!=NULL)){ ?><tr>
  <td><span class="style10">C&oacute;digos de Procedimento inseridos : </span></td>
  <td><span class="style10"><br> <b><? echo $campo_ex['codigo_procedimento']; ?> <br> <? echo $campo_ex['codigo_procedimento2']; ?> <br> <? echo $campo_ex['codigo_procedimento3']; ?></b>
  </tr><? } ?>
<tr>
  <td><span class="style10">C&oacute;digo de Procedimento : </span></td>
  <td><span class="style10">
    <select name="codigo_procedimento" class="caixa2" id="codigo_procedimento">
      <?
$busca_atendimentos="select * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo de procedimento encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo_procedimento]'>$campo_atendimentos[codigo_procedimento]</option>");
  
print $campo_atendimentos[nome];
 }

}
if($_POST['codigo_procedimento']!=NULL){
print $campo_atendimentos[nome];
}
?>
  </span></td>
</tr>
    </select>
<? if($_POST['2']){
?>	
<tr>
  <td><span class="style10">C&oacute;digo de Procedimento : </span></td>
  <td><span class="style10">
    <select name="codigo_procedimento2" class="caixa2" id="codigo_procedimento2">
      <?
$busca_atendimentos="select * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo de procedimento encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo_procedimento]'>$campo_atendimentos[codigo_procedimento]</option>");
  
print $campo_atendimentos[nome];

 }

}
if($_POST['codigo_procedimento']!=NULL){
print $campo_atendimentos[nome];
}
?>
    </select>
<tr><td></td><? } ?>
<? if($_POST['3']){
?>	
<tr>
  <td><span class="style10">C&oacute;digo de Procedimento : </span></td>
  <td><span class="style10">
    <select name="codigo_procedimento2" class="caixa2" id="codigo_procedimento2">
      <?
$busca_atendimentos="select * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo de procedimento encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo_procedimento]'>$campo_atendimentos[codigo_procedimento]</option>");
  
print $campo_atendimentos[nome];
 }

}
if($_POST['codigo_procedimento']!=NULL){
print $campo_atendimentos[nome];
}
?>
    </select>
<tr><td></td><tr>
  <td><span class="style10">C&oacute;digo de Procedimento : </span></td>
  <td><span class="style10">
    <select name="codigo_procedimento3" class="caixa2" id="codigo_procedimento3">
      <?
$busca_atendimentos="select * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' order by id asc;";
$res_busca_atendimentos=mysql_query($busca_atendimentos,$conn);
$num_atendimentos=mysql_num_rows($res_busca_atendimentos);
if($num_atendimentos==0)
{
 printf("<option value=''>Nenhum c&oacute;digo de procedimento encontrado");
}

else

{

 printf("<option value=''></option>");

 for($x=0;$x<$num_atendimentos;$x++)

 {

  $campo_atendimentos=mysql_fetch_array($res_busca_atendimentos);

  printf("<option value='$campo_atendimentos[codigo_procedimento]'>$campo_atendimentos[codigo_procedimento]</option>");
  
print $campo_atendimentos[nome];
 }

}
if($_POST['codigo_procedimento']!=NULL){
print $campo_atendimentos[nome];
}
?>
    </select>
<tr><td></td><? } ?>
  <td><span class="style10">
    
    <br>
    </span><br>
    <input name="fin1" type=submit class=botao id="fin1" value='Atualizar'><input name="vis" type=submit class=botao id="vis" value='Visualizar'>  
  <input type=submit value='Cancelar' name="cancelar" class=botao> 
  <span class="atributos_titulo">
  <input name="button" type=button class="botao" onClick="history.go(-2);" value="Voltar">
  </span></td>
</tr>
</table>
</form>
<?
if($_POST['cancelar']){
	$_SESSION["microscopia"]=NULL;
	$_SESSION["codigo_conc"]=NULL;
	$_SESSION["macroscopia"]=NULL;
	   printf("<script>alert('Cancelado.');
   window.location='laudos.php?id=$id';</script>");
}
if($_POST['vis']){
	  printf("<script>
   top.location='exame_fim_vis.php?id=$id';</script>");
}
if(($campo_exm[macroscopia]==NULL)and($_POST[conclusao]!=NULL)and($_POST[medico_execultante]==NULL)){
   printf("<script>alert('É necessário informar o médico execultante.');
   </script>");
}
if($_POST[medico_execultante]!=NULL)
{
if($_POST['fin1']){

  ##Busca do valor do exame##
  
 $busca_valor="SELECT * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' and codigo_procedimento = '".$_POST['codigo_procedimento']."'";
 $res_busca_valor=mysql_query($busca_valor,$conn);
 $num_valor=mysql_num_rows($res_busca_valor);
 $campo_valor=mysql_fetch_array($res_busca_valor);
 ##Até aqui##
   ##Busca do valor do exame##
  
 $busca_valor2="SELECT * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' and codigo_procedimento = '".$_POST['codigo_procedimento2']."'";
 $res_busca_valor2=mysql_query($busca_valor2,$conn);
 $num_valor2=mysql_num_rows($res_busca_valor2);
 $campo_valor2=mysql_fetch_array($res_busca_valor2);
 ##Até aqui##
   ##Busca do valor do exame##
  
 $busca_valor3="SELECT * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."' and codigo_procedimento = '".$_POST['codigo_procedimento3']."'";
 $res_busca_valor3=mysql_query($busca_valor3,$conn);
 $num_valor3=mysql_num_rows($res_busca_valor3);
 $campo_valor3=mysql_fetch_array($res_busca_valor3);
 ##Até aqui##
 
 ##Calculo do valor##
 $valor = $campo_valor['valor']+$campo_valor2['valor']+$campo_valor3['valor'];
 $valor_tot = str_replace(",", ".", "$valor");
$data_modificado=mktime();

 $macroscopia="$campo_ex[macroscopia]  $_POST[macroscopia]";
 $microscopia="$campo_ex[microscopia]  $_POST[microscopia]";
 $conclusao="$campo_ex[conclusao]  $_POST[conclusao]";
 
 if($_POST['codigo_procedimento']==NULL){
 $_POST['codigo_procedimento']=$campo_ex['codigo_procedimento'];
 }
 if($_POST['codigo_procedimento2']==NULL){
 $_POST['codigo_procedimento2']=$campo_ex['codigo_procedimento2'];
 }
 if($_POST['codigo_procedimento3']==NULL){
 $_POST['codigo_procedimento3']=$campo_ex['codigo_procedimento3'];
 }
$data_previsao=mktime($_POST[ehora], $_POST[emin], 0, $_POST[emes], $_POST[edia], $_POST[eano]);

if($_POST['tipo_cod']==NULL){

  $modificar="update exame set material = '".$_POST['material']."',paciente_id = '".$_POST['paciente']."',convenio = '".$_POST['convenio']."',medico_execultante= '".$_POST['medico_execultante']."', data_previsao = '".$data_previsao."',codigo_procedimento = '".$_POST['codigo_procedimento']."',medico_id = '".$_POST['medico']."',codigo_procedimento2 = '".$_POST['codigo_procedimento2']."',codigo_procedimento3 = '".$_POST['codigo_procedimento3']."', valor = '".$valor_tot."', macroscopia = '".$_POST[macroscopia]."',obs_entrada = '".$_POST['obs_entrada']."',cod_microscopia = '".$_POST['codigo']."',cod_conclusao = '".$_POST['codigo_conc']."',ex_status_id = '".$_POST['id']."', obs_saida = '".$_POST['obs_saida']."', microscopia = '".$_POST[microscopia]."',conclusao = '".$_POST[conclusao]."',modificado_por = '".$usuario_autenticado."', data_modificado = '".$data_modificado."'  where id = '".$id."';";
} else {
   
  $modificar="update exame set material = '".$_POST['material']."',paciente_id = '".$_POST['paciente']."',convenio = '".$_POST['convenio']."',tipo_cod = '".$_POST['tipo_cod']."',medico_execultante= '".$_POST['medico_execultante']."', data_previsao = '".$data_previsao."',codigo_procedimento = '".$_POST['codigo_procedimento']."',medico_id = '".$_POST['medico']."',codigo_procedimento2 = '".$_POST['codigo_procedimento2']."',codigo_procedimento3 = '".$_POST['codigo_procedimento3']."', valor = '".$valor_tot."', macroscopia = '".$_POST[macroscopia]."',obs_entrada = '".$_POST['obs_entrada']."',cod_microscopia = '".$_POST['codigo']."',cod_conclusao = '".$_POST['codigo_conc']."',ex_status_id = '".$_POST['id']."', obs_saida = '".$_POST['obs_saida']."', microscopia = '".$_POST[microscopia]."',conclusao = '".$_POST[conclusao]."',modificado_por = '".$usuario_autenticado."', data_modificado = '".$data_modificado."'  where id = '".$id."';";
}
if($_POST['conclusao']!=NULL){
$modificar2="update exame set ex_status_id = '3' where id = '".$id."';";
$ok22=mysql_query($modificar2,$conn);

}
  $ok=mysql_query($modificar,$conn);
  
	$_SESSION["microscopia"]=NULL;
	$_SESSION["codigo_conc"]=NULL;
	$_SESSION["macroscopia"]=NULL;

  if($ok==1)

  {
	$_SESSION["microscopia"]=NULL;
	$_SESSION["codigo_conc"]=NULL;
	$_SESSION["macroscopia"]=NULL;
	
   printf("<script>alert('Atualizado.');
   window.location='laudos.php?id=$id';</script>");
  }   
                   }
}
?>
</body>

</html>
<script language="javascript">
function submitar(){
document.form1.submit();
}

</script>
