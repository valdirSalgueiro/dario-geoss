<?php
session_start();

if($_GET['id']!=$_SESSION["id"]){
@session_destroy("id");
$_SESSION["id"]=$_GET['id'];
	
}

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$_GET['id']=$_SESSION["id"];
$id = $_GET["id"];




if($usuario_autenticado!=NULL)

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
}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');
 top.location='index.php';</script>";

}

?>
<?php
$pro=$_GET['p'];
$semipro=$_GET['s'];
$ama=$_GET['a'];
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
.style2 {font-size: 12px}
-->
</style>
<body class=fonte>

<form name=form1 method=post>

<h1><font face=verdana color='#ff9900'><b><br>
  Digita&ccedil;&atilde;o de Laudos:</b></font></h1>
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

<?php if($_GET['p']=$pro){ ?>										
<li id="current"><a href="laudos.php?p=<?php echo "infos_tec";?>"><span>Informações Técnicas</span></a></li><?php } else { ?><li><a href="laudos.php?p=<?php echo "infos_tec";?>&&id=<?php echo $_SESSION["id"];?>"><span>Informações Técnicas</span></a></li><?php } ?>

<?php if($_GET['s']=$semipro){ ?>
<li id="current"><a href="laudos.php?s=<?php echo "obs";?>&&id=<?php echo $_SESSION["id"];?>"><span>Observações</span></a></li><?php } else { ?><li><a href="laudos.php?s=<?php echo "obs";?> &&id=<?php echo $_SESSION["id"];?>"><span>Observações</span></a></li><?php } ?>

<?php if($_GET['a']=$ama){ ?>
<li id="current"><a href="laudos.php?a=<?php echo "infos";?>&&id=<?php echo $_SESSION["id"];?>"><span>Outras Informações</span></a></li><?php } else { ?><li><a href="laudos.php?a=<?php echo "infos";?>&&id=<?php echo $_SESSION["id"];?>"><span>Outras Informações</span></a></li><?php } ?>


                                </ul>
                        </div></td>
      </tr>
    </table>
<?php if($_GET['p']=$pro){ ?>
<table border=0 class=fonte>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="174">Exame :</td>
  <td width="367"><?php echo $campo_ex['id']; ?></td>
</tr>
<tr>
  <td>Paciente :</td>
  <td><?php echo $campo_pac['nome']; ?>    </td>
</tr>

<tr>
  <td>Data de Entrada :</td>
  <td><?php echo $campo_ex['data_entrada']; ?> 
    <span class="style1"> &nbsp;</span></td>
</tr>
<tr>
  <td>Previs&atilde;o de Saida:</td>
  <td><?php echo $campo_ex['data_previsao']; ?></td>
</tr>
<tr>
  <td>Material :</td>
  <td><input name=material type=text class=botao id="material" value="<?php echo $campo_ex['material']; ?>" size=50 maxlength=50></td>
</tr>


<tr>
  <td>Valor :</td>
  <td>R$
    <input name=valor type=text class=botao id="valor" value="<?php echo $campo_ex['valor']; ?>" size=26 maxlength=30></td>
</tr>
<tr>
  <td>Macroscopia : </td>
  <td><textarea name="macroscopia" id="macroscopia" cols="40" rows="7"><?php echo $campo_ex['macroscopia']; ?></textarea></td>
</tr>
<tr>
  <td>C&oacute;d :</td>
  <td><select name="codigo" class="caixa" id="codigo">
    <?php
$busca_cod="select * from codigo order by id asc;";
$res_busca_cod=mysql_query($busca_cod,$conn);
$num_cod=mysql_num_rows($res_busca_cod);
if($num_cod==0)
{
 printf("<option value=''>Nenhum Código encontrado");
}

else

{

 printf("<option value=''>");

 for($x=0;$x<$num_cod;$x++)

 {

  $campo_cod=mysql_fetch_array($res_busca_cod);

  printf("<option value='$campo_cod[codigo]'>$campo_cod[codigo]");
  

 }

}

?>
    </select></td>
</tr>
<tr>
  <td>Microscopia :</td>
  <td><textarea name="microscopia" id="microscopia" cols="40" rows="4"><?php echo $campo_ex['microscopia']; ?>
</textarea></td>
</tr>
<tr>
  <td>Conclus&atilde;o :</td>
  <td><textarea name="conclusao" id="conclusao" cols="40" rows="4"><?php echo $campo_ex['conclusao']; ?>
</textarea></td>
</tr>
<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input name="fin1" type=submit class=botao id="fin1" value='Finalizar'> 
<input type=submit value='Cancelar' class=botao> <input type=submit value='Reiniciar' class=botao></td>
</tr>
</table>
<?php } ?>
</form>
<?php
if($_POST['fin1']){

 $modificar="update exame set material = '".$_POST['material']."', valor = '".$_POST['valor']."', macroscopia = '".$_POST['macroscopia']."', microscopia = '".$_POST['microscopia']."',conclusao = '".$_POST['conclusao']."' where id = '".$id."';";
 $ok=mysql_query($modificar,$conn);

  if($ok==1)

  {

   printf("<script>alert('Informações Técnicas atualizadas.');
   window.location='laudos.php?s=obs';</script>");
  }   
                   }
?>
<form name=form1 method=post>

<?php if($_GET['s']=$semipro){ ?>

<span class="style1"><span class="style3"><br>
</span><br>
</span><br>
<table border=0 class=fonte>
<tr>
  <td width="174">Entrada :</td>
  <td width="367"><textarea name="obs_entrada" id="obs_entrada" cols="45" rows="5"><?php echo $campo_ex['obs_entrada']; ?>
</textarea></td>
</tr>


<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Laudo :</td>
  <td><span class="style1">
    <textarea name="obs_saida" id="obs_saida" cols="45" rows="5"><?php echo $campo_ex['obs_saida']; ?>
</textarea>
  </span></td>
</tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input name="fin2" type=submit class=botao id="fin2" value='Finalizar'> 
<input type=submit value='Cancelar' class=botao> <input type=submit value='Voltar' class=botao></td>
</tr>
</table>

</form>
<?php
if($_POST['fin2']){

 $modificar2="update exame set obs_entrada = '".$_POST['obs_entrada']."', obs_saida = '".$_POST['obs_saida']."' where id = '".$id."';";
 $ok2=mysql_query($modificar2,$conn);

  if($ok2==1)

  {

   printf("<script>alert('Observações Atualizadas.');
   window.location='laudos.php?a=infos';</script>");
  }   
  }
  }
?>
<?php if($_GET['a']=$ama){ ?>
<table border=0 class=fonte>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="174">Solicita&ccedil;&atilde;o :</td>
  <td width="367"><?php echo $campo_med['nome']; ?></td>
</tr>
<tr>
  <td>Conv&ecirc;nio :</td>
  <td><?php echo $campo_ex['convenio']; ?></td>
</tr>

<tr>
  <td></td>
  <td>&nbsp;</td>
</tr>
<tr><td></td><td><input name="fin3" type=submit class=botao id="fin3" value='Finalizar'> <input type=submit value='Cancelar' class=botao> <input type=submit value='Voltar' class=botao></td>
</tr>
</table>

</form>
<?php
if($_POST['fin3']){
   
  @session_destroy("id");


   printf("<script>alert('Concluido.');
   window.location='ex_aberto.php';</script>");
    
}
}

?>

</body>

</html>

