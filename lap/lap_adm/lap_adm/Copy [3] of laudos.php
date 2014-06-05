<?php
session_start();

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET["id"];

if($usuario_autenticado!='')

{
 
 include('estilo.css');
 include('tab.css');
 include('conn.php');
 include('data.php');
 ##Busca o id do exame##
 
 $busca_ex="select * from exame where id = '".$id."';";
 $res_busca_ex=mysql_query($busca_ex,$conn);
 $num_ex=mysql_num_rows($res_busca_ex);
 if($num_ex>0)
 {
  $campo_ex=mysql_fetch_array($res_busca_ex);
 }
 
 ##Até aqui
 
 ##Busca do nome do paciente##
 $busca_pac="SELECT id,nome from paciente WHERE id = '".$campo_ex['paciente_id']."'";
 $res_busca_pac=mysql_query($busca_pac,$conn);
 $num_pac=mysql_num_rows($res_busca_pac);
 $campo_pac=mysql_fetch_array($res_busca_pac);
 ##Até aqui##
 
  ##Busca do nome do médico##
 $busca_med="SELECT id,nome from medico WHERE id = '".$campo_ex['medico_id']."'";
 $res_busca_med=mysql_query($busca_med,$conn);
 $num_med=mysql_num_rows($res_busca_med);
 $campo_med=mysql_fetch_array($res_busca_med);
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

                
               
                </head>

               
                <div id="tabs">
                                <ul>
                                        <!-- CSS Tabs -->

                                </ul>
        </div></td>
      </tr>
    </table>
    <div align="center"><a href="#"><span class="style4">Informa&ccedil;&otilde;es T&eacute;cnicas</span></a>   </div>
	
  <table border=0 class=fonte>
<tr>
  <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr>
<?php if($campo_tipo['nome']!='HISTOPATOLOGICO'){ ?>
  <td colspan="2" bgcolor="#000033"><div align="center"><span class="style9">Op&ccedil;&atilde;o de Colposcopia </span></div></td>
  </tr>
<tr>
  <td colspan="2"><div align="center">
    
	<form name="colposcopia" method="post">
    <input name="cadc" type=submit class=botaooo id="cadc" value='Cadastrar Colposcopia'>    
	</form>
    <?php  } ?>
	<?php
	if($_POST[cadc]!=NULL){
	 echo "<script>
 window.location='cadastrar_colposcopia.php?id=$id';</script>";
	}
	?>    
  </div></td>
  </tr>

<tr>
  <td colspan="2" bgcolor="#000033">&nbsp;</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td> Status  :</td>
  <td><select name="id" class="botaooo" id="id">
    <?php
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
      </select></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="174">Laudo N&uacute;mero  :</td>
  <td width="367"><?php echo $campo_ex['id']; ?></td>
</tr>
<tr>
  <td>Paciente :</td>
  <td><?php echo $campo_pac['nome']; ?>    </td>
</tr>

<tr>
  <td>Data de Entrada :</td>
  <td><?php echo date("d-m-Y-H:h",$campo_ex['data_entrada']); ?> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Previs&atilde;o de Saida:</td>
  <td><?php echo date("d-m-Y-H:h",$campo_ex['data_previsao']); ?></td>
</tr>
<tr>
  <td>Tipo de Exame:</td>
  <td><?php echo $campo_tipo['nome']; ?></td>
</tr>
<tr>
  <td colspan="2" bgcolor="#666666"><div align="center" class="style8"><?php echo "Previs&atilde;o de $campo_tipo[dias] Dias."; ?></div></td>
  </tr>
<tr>
  <td>Material :</td>
  <td><input name=material type=text class=botao id="material" value="<?php echo $campo_ex['material']; ?>" size=50 maxlength=50></td>
</tr>
<tr>
  <td>Médico Execultante :</td>
  <td><select name="medico_execultante" class="caixa" id="medico_execultante">
    <?php
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

  printf("<option value='$campo_med[id]'>$campo_med[nome]");
  

 }

}

?>
    </select>
    &nbsp;</td>
</tr>
<tr>
  <td>C&oacute;d Macroscopia:</td>
  <td><select name="codigo_mac" class="caixa" id="codigo_mac" onChange="submitar()">
    <?php
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

  printf("<option value='$campo_atendimentos[codigo]'>$campo_atendimentos[codigo]</option>");
  

 }

}

?>
    </select>
    <?php
    if( $_POST['codigo_mac']!=''){
	//die('entrou');
	$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql2="select * from codigo_mac where codigo  = ".$_POST['codigo_mac']."";
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
	$campo_ex['macroscopia'] = $_POST['macroscopia'];
	$sql="select * from codigo_conc  where codigo  = ".$_POST['codigo_conc']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['conclusao'] = $row['descricao'];
	
	}
	
	?></td>
</tr>
<tr>
  <td>Macroscopia :</td>
  <td><textarea name="macroscopia" id="macroscopia" cols="40" rows="4"><?php echo $_SESSION["macroscopia"]; ?></textarea></td>
</tr>
<tr>
  <td>C&oacute;d Microscopia:</td>
  <td><select name="codigo_micros" class="caixa" id="codigo_micros" onChange="submitar()">
    <?php
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

  printf("<option value='$campo_atendimentos[codigo]'>$campo_atendimentos[codigo]</option>");
  

 }

}

?>
    </select>
    <?php
    if( $_POST['codigo_micros']!=''){
	//die('entrou');
	$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql="select * from codigo where codigo  = ".$_POST['codigo_micros']."";
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
	$campo_ex['conclusao'] = $_POST['conclusao'];
	$sql="select * from codigo_mac where codigo  = ".$_POST['codigo_mac']."";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	$campo_ex['macroscopia'] = $row['descricao'];
	}
	if( $_POST['codigo_conc']!=''){
	//die('entrou');
	$sql="select * from codigo_conc  where codigo  = ".$_POST['codigo_conc']."";
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

	?>    </td>
</tr>
<tr>
  <td>Microscopia :</td>
  <td><textarea name="microscopia" id="microscopia" cols="40" rows="4"><?php echo $_SESSION["microscopia"]; ?></textarea></td>
</tr>
<tr>
  <td>C&oacute;d Conclus&atilde;o:</td>
  <td><select name="codigo_conc" class="caixa" id="codigo_conc" onChange="submitar()">
    <?php
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

  printf("<option value='$campo_atendimentos[codigo]'>$campo_atendimentos[codigo]</option>");
  

 }

}

?>
    </select></td>
</tr>
<tr>
  <td>Conclus&atilde;o :</td>
  <td><textarea name="conclusao" id="conclusao" cols="40" rows="4"><?php echo $_SESSION["codigo_conc"]; ?>
</textarea></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><span class="style6">Outras Informa&ccedil;&otilde;es</span></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Solicita&ccedil;&atilde;o :</td>
  <td><?php echo $campo_med['nome']; ?></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><?php echo $campo_conv['nome']; ?></td>
</tr>
<tr>
  <td>Tabela : </td>
  <td><?php echo $campo_ex['tipo_tabela']; ?></td>
</tr>
<tr>
  <td>C&oacute;digo de Procedimento : </td>
  <td><select name="codigo_procedimento" class="caixa" id="codigo_procedimento">
    <?php
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
  

 }

}

?>
    </select></td>
</tr>
<tr><td></td><td><input name="fin1" type=submit class=botaooo id="fin1" value='Finalizar'> 
<input type=submit value='Cancelar' name="cancelar" class=botaooo> 
<input type=submit value='Reiniciar' class=botaooo></td>
</tr>
</table>
</form>
<?php
if($_POST['cancelar']){
	$_SESSION["microscopia"]=NULL;
	$_SESSION["codigo_conc"]=NULL;
	$_SESSION["macroscopia"]=NULL;
	   printf("<script>alert('Cancelado.');
   window.location='laudos.php?id=$id';</script>");
}
if($_POST['fin1']){

  ##Busca do valor do exame##
  
 $busca_valor="SELECT * from tabela WHERE tipo = '".$campo_ex['tipo_tabela']."'";
 $res_busca_valor=mysql_query($busca_valor,$conn);
 $num_valor=mysql_num_rows($res_busca_valor);
 $campo_valor=mysql_fetch_array($res_busca_valor);
 ##Até aqui##


  $modificar="update exame set material = '".$_POST['material']."',medico_execultante= '".$_POST['medico_execultante']."',codigo_procedimento = '".$_POST['codigo_procedimento']."', valor = '".$campo_valor['valor']."', macroscopia = '".$_POST['macroscopia']."',obs_entrada = '".$_POST['obs_entrada']."',cod_microscopia = '".$_POST['codigo']."',cod_conclusao = '".$_POST['codigo_conc']."',ex_status_id = '".$_POST['id']."', obs_saida = '".$_POST['obs_saida']."', microscopia = '".$_POST['microscopia']."',conclusao = '".$_POST['conclusao']."' where id = '".$id."';";

  $ok=mysql_query($modificar,$conn);


  if($ok==1)

  {
	$_SESSION["microscopia"]=NULL;
	$_SESSION["codigo_conc"]=NULL;
	$_SESSION["macroscopia"]=NULL;
	
   printf("<script>alert('Atualizado.');
   window.location='laudos.php?id=$id';</script>");
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