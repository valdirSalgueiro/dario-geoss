<?php

session_start();

$id=$_GET['id'];

include('conn.php');

include('../estilo.css');

include('data.php');

?>

<HTML>

<HEAD>

<TITLE>Lap</TITLE>

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	background-color: #FFFFFF;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style5 {

	font-size: 13px;

	font-family: Arial, Helvetica, sans-serif;

	font-weight: bold;

	color: #003333;

}

.style6 {

	font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;

}

a:link {

	color: #000000;

	text-decoration: none;

}

a:visited {

	color: #000000;

	text-decoration: none;

}

a:hover {

	color: #000000;

	text-decoration: underline;

}

a:active {

	color: #000000;

	text-decoration: none;

}

-->

</style>

</HEAD>

<BODY>

<!-- ImageReady Slices (template.psd) -->

<TABLE WIDTH=579 height="390" BORDER=0 CELLPADDING=0 CELLSPACING=0 class=fonte >

	<TR background="index001/images/cap04.jpg">

		<TD height="36"  background="index001/images/cap04.jpg"><table width="255" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="37">&nbsp;</td>

            <td width="218"><span class="style5">Paciente:</span></td>

          </tr>

        </table></TD>

	</TR>

	<TR valign="top">

		<TD height="153" ><blockquote><br>

		<span class="style6">

           <?php

           $busca_cliente="select * from paciente where id  = '".$id."';";

           $res_busca_cliente=mysql_query($busca_cliente,$conn);

           $campo_cliente=mysql_fetch_array($res_busca_cliente);

           echo "<table border=0 class=fonte>

           <tr><th>Dados Pessoais:</th><th></th></tr>

           <tr><td>Nome :</td><td>$campo_cliente[nome]</td></tr>

           <tr><td>E-mail:</td><td>$campo_cliente[email]</td></tr>

           <tr><td>Endereço:</td><td>$campo_cliente[endereco]</td></tr>
		   
		    <tr><td>Bairro:</td><td>$campo_cliente[bairro]</td></tr>

           <tr><td>Cidade:</td><td>$campo_cliente[cidade]</td></tr>

           <tr><td>Estado:</td><td>$campo_cliente[uf]</td></tr>

           <tr><td>CEP:</td><td>$campo_cliente[cep]</td></tr>

           <tr><th>Dados do cliente:</th><th></th></tr>

           <tr><td>Codigo do cliente:</td><td>$campo_cliente[codigo_cliente]</td></tr>";

           $x=1;

           if(($campo_cliente["ddd1_cliente"]!=NULL)and($campo_cliente["tel1_cliente"]!=NULL))

           {

            echo "<tr><td>Telefone $x:</td><td>(".$campo_cliente["ddd1_cliente"].") ".$campo_cliente["tel1_cliente"]."</td></tr>";

            $x++;

           }

           if(($campo_cliente["ddd2_cliente"]!=NULL)and($campo_cliente["tel2_cliente"]!=NULL))

           {

            echo "<tr><td>Telefone $x:</td><td>(".$campo_cliente["ddd2_cliente"].") ".$campo_cliente["tel2_cliente"]."</td></tr>";

            $x++;

           }

           if(($campo_cliente["ddd3_cliente"]!=NULL)and($campo_cliente["tel3_cliente"]!=NULL))

           {

            echo "<tr><td>Telefone $x:</td><td>(".$campo_cliente["ddd3_cliente"].") ".$campo_cliente["tel3_cliente"]."</td></tr>";

            $x++;

           }

           echo "</table>";

           ?>

          </span></blockquote></TD>

    <TR>

</TABLE>

</BODY>

</HTML>

