<?php

session_start();

include('estilo.css');

include('data.php');

$usuario_autenticado=$_SESSION["usuario_autenticado"];
$id = $_GET['id'];
if($usuario_autenticado!=NULL)

{

 include('conn.php');

}

else

{

 echo "<script>alert('A sessão expirou, é preciso fazer o login novamente');

 top.location='index.php';</script>";

}

?>

<html>
<link href="../estilo.css" rel="stylesheet" type="text/css">


<link href="estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {
	font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;
}
.style7 {color: #0000FF}
-->
</style>
<form name=form1 method=post>
<?php
 $busca_cliente="select * from paciente where id  = '".$id."';";
 $res_busca_cliente=mysql_query($busca_cliente,$conn);
 $campo_cliente=mysql_fetch_array($res_busca_cliente);
 ?>

<h1><font face=verdana color='#000033'><b><?php echo $campo_cliente['nome']; ?></b></font></h1>
<hr color=black size=2>
</form>
<p class="style6">&nbsp;</p>
<p class="style6">
  <?php

          

           echo "<table border=0 class=fonte>

           
           
           <tr><td>E-mail:</td><td>$campo_cliente[email]</td></tr>

           <tr><td>Endereco:</td><td>$campo_cliente[endereco]</td></tr>
		   
		    <tr><td>Bairro:</td><td>$campo_cliente[bairro]</td></tr>

           <tr><td>Cidade:</td><td>$campo_cliente[cidade]</td></tr>

           <tr><td>Estado:</td><td>$campo_cliente[uf]</td></tr>

           <tr><td>CEP:</td><td>$campo_cliente[cep]</td></tr>
		   
		   <tr><td>Cpf:</td><td>$campo_cliente[cpf]</td></tr>
		   
		   <tr><td>Identidade:</td><td>$campo_cliente[rg]</td></tr>
		   
		   <tr><td>Data de Nascimento:</td><td>$campo_cliente[data_nascimento]</td></tr>
		   
		   <tr><td>Telefone Residencial:</td><td>($campo_cliente[ddd_fone1])&nbsp;$campo_cliente[fone_1]</td></tr>
		   
		   <tr><td>Telefone Comercial:</td><td>($campo_cliente[ddd_fone2])&nbsp;$campo_cliente[fone_2]</td></tr>
		   
		   <tr><td>Celular:</td><td>($campo_cliente[ddd_fone3])&nbsp;$campo_cliente[fone_3]</td></tr>
		   
		   <tr><td>Convênio:</td><td>$campo_cliente[convenio]</td></tr>
		   
		   <tr><td>Identificação do Convênio:</td><td>$campo_cliente[identif_convenio]</td></tr>
		   
		
           ";

           $x=1;

           if(($campo_cliente["ddd1_cliente"]!=NULL)and($campo_cliente["tel1_cliente"]!=NULL))

           {

            echo "<tr><td>Telefone $x:</td><td>(".$campo_cliente["ddd1_cliente"].") ".$campo_cliente["tel1_cliente"]."</td></tr>";

            $x++;

           }

           if(($campo_cliente["ddd_fone2"]!=NULL)and($campo_cliente["fone_2"]!=NULL))

           {

            echo "<tr><td>Telefone Comercial:</td><td>(".$campo_cliente["ddd_fone2"].") ".$campo_cliente["fone_2"]."</td></tr>";

            $x++;

           }

           if(($campo_cliente["ddd_fone3"]!=NULL)and($campo_cliente["fone_3"]!=NULL))

           {

            echo "<tr><td>Celular</td><td>(".$campo_cliente["ddd_fone3"].") ".$campo_cliente["fone_3"]."</td></tr>";

            $x++;

           }

           echo "</table>";

           ?>
  <br>
  <br>
Hist&oacute;rico do Paciente </p>
<hr color=black size=2>
<p class="style6">
  Fez <span class="style7">
  <?php $consulta2 = mysql_query("SELECT count(paciente_id) as total FROM exame WHERE paciente_id = '".$campo_cliente['id']."'") or die(mysql_error());
$total_fotos = mysql_result($consulta2,0,"total");
print $total_fotos; ?></span> exames.<br>
  Sua &uacute;ltima vinda na cl&iacute;nica foi em : <span class="style7">
  <?php

    $busca_pa2="select * from exame where paciente_id = '".$campo_cliente['id']."' order by id DESC limit 0,1;";
   $res_busca_pa2=mysql_query($busca_pa2,$conn);
   $campo_pa2=mysql_fetch_array($res_busca_pa2);
  if($$campo_pa2['data_saida']==''){
  echo "Este paciente ainda não tem histórico."; } else {
   print date("d/m/Y - H:i",$campo_pa2['data_saida']);
    }
	?>
  </span><br>
Est&aacute; cadastrado desde : <span class="style7"><?php echo date("d/m/Y - H:i",$campo_cliente['data_cadastro']); ?></span><br>
Tem <span class="style7">
<?php $consulta_aberto = mysql_query("SELECT count(paciente_id) as total FROM exame WHERE paciente_id = '".$campo_cliente['id']."' and ex_status_id='1'") or die(mysql_error());
$total_aberto = mysql_result($consulta_aberto,0,"total");
print $total_aberto; ?> 
</span> Exames em Aberto, <span class="style7">
<?php $consulta_andamento = mysql_query("SELECT count(paciente_id) as total FROM exame WHERE paciente_id = '".$campo_cliente['id']."' and ex_status_id='2'") or die(mysql_error());
$total_andamento = mysql_result($consulta_andamento,0,"total");
print $total_andamento; ?></span> Em Andamento e <span class="style7">
<?php $consulta_fechado = mysql_query("SELECT count(paciente_id) as total FROM exame WHERE paciente_id = '".$campo_cliente['id']."' and ex_status_id='3'") or die(mysql_error());
$total_fechado = mysql_result($consulta_fechado,0,"total");
print $total_fechado; ?> 
</span> Fechados.<br>
</p>
<p class="style6"><br>
  <br>
  <input type=button value=" Voltar " class=botao onClick="history.go(-2);";>
</p>
</body>

</html>

