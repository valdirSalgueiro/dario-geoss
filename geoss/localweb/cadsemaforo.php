<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Nome       : GEOSWEB
Empresa    : Sinalvida dispositivos de segurança viária Ltda.
Versão     : 1.0
Projeto    : 16/0/2013

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>G E O S W E B</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="login.css" rel="stylesheet" type="text/css">
<script src="login.js" type="text/javascript"></script>



</head>
<body>
<div id="bg1">
	<div id="header">
		<h1><a href="#">Geosweb<sup>1.6</sup></a></h1>
		<h2>Gestor de Operacoes Semaforicas</h2>
	</div>
</div>
<div id="bg2">
	<div id="header2">
		<div id="menu">
			<ul>
				<li><a href="operacional.php">Operacional</a></li>
				<li><a href="cadastro.php">Cadastro</a></li>
				<li><a href="#">Sobre</a></li>
				<li><a href="#">Contato</a></li>
				<li><a href="index.php">Sair</a></li>
			</ul>
		</div>
		<div id="search">

                        <form action="bemvindo.php" method="post" name="login" id="login">


				<fieldset>
				<input type="text" name="q" value="procurar" id="q" class="text" />
				<input type="submit" value="Search" class="button" />
				</fieldset>
			</form>
		</div>
	</div>
</div>
<div id="bg3">
	<div id="bg4">
		<div id="bg5">
			<div id="page">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">Cadastro Semaforo</a></h2>
							<p>16.10.2013</p>
						</div>
					</div>
				</div>
        </br></br></br></br></br>
		<div id="menu">
		  <h2>Semaforo Num.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="user_div_field" type="text" size="9" maxlength="9" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
          <h2>UF:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="estados_config_escola" id="estados_config_escola" style="background-color:#CCC">
                           <option value="0">Selecionar Estado</option>
                           <option value="ac">Acre</option>
                           <option value="al">Alagoas</option>
                           <option value="ap">Amapa</option>
                           <option value="am">Amazonas</option>
                           <option value="ba">Bahia</option>
                           <option value="ce">Ceara</option>
                           <option value="df">Distrito Federal</option>
                           <option value="es">Espirito Santo</option>
                           <option value="go">Goias</option>
                           <option value="ma">Maranhao</option>
                           <option value="ms">Mato Grosso do Sul</option>
                           <option value="mt">Mato Grosso</option>
                           <option value="mg">Minas Gerais</option>
                           <option value="pa">Para</option>
                           <option value="pb">Paraiba</option>
                           <option value="pr">Parana</option>
                           <option value="pe">Pernambuco</option>
                           <option value="pi">Piaui</option>
                           <option value="rj">Rio de Janeiro</option>
                           <option value="rn">Rio Grande do Norte</option>
                           <option value="rs">Rio Grande do Sul</option>
                           <option value="ro">Rondonia</option>
                           <option value="rr">Roraima</option>
                           <option value="sc">Santa Catarina</option>
                           <option value="sp">Sao Paulo</option>
                           <option value="se">Sergipe</option>
                           <option value="to">Tocantins</option>
                        </select></h2>
		  <h2>Cidade:&nbsp;<input name="user_div_field" type="text" size="30" maxlength="30" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
		  <h2>Bairro:&nbsp;<input name="user_div_field" type="text" size="31" maxlength="31" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
		  <h2>Logradouro:&nbsp;<input name="user_div_field" type="text" size="25" maxlength="25" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
		  <h2>Transversal:&nbsp;<input name="user_div_field" type="text" size="25" maxlength="25" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
          <h2>Area:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="area" id="area" style="background-color:#CCC">
             <option value="0">Selecionar Area</option>
          </select></h2>
		  <h2>Latitude:&nbsp;<input name="user_div_field" type="text" size="28" maxlength="28" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
		  <h2>Longitude:&nbsp;<input name="user_div_field" type="text" size="26" maxlength="26" id="user" onMouseOver="this.focus()" class="cxtext"></h2>
        </br>
				</div>
						<div class="entry">
                          <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modo:&nbsp;<select name="estados_config_escola" id="estados_config_escola" style="background-color:#CCC">
                            <option value="0">Veicular</option>
                            <option value="0">Pedestre Ocasional</option>
                            <option value="0">Veicular com Pedestre Paralelo</option>
                            <option value="0">Veicular com Pedestre Ocasional</option>
                            <option value="0">Piscante</option>
                            </select>
                          </br></br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controlador:&nbsp;&nbsp;&nbsp;&nbsp;<select name="estados_config_escola" id="estados_config_escola" style="background-color:#CCC">
                            <option value="0">Eletro-mecanico</option>
                            <option value="0">Eletro-eletronico</option>
                            <option value="0">Eletronico</option>
                            <option value="0">Eletronico Centralizado</option>
                            </select>
                          </br></br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Operacao:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="estados_config_escola" id="estados_config_escola" style="background-color:#CCC">
                            <option value="0">Isolado</option>
                            <option value="0">Rede</option>
                            </select><h2>




						</div>
				<div style="clear: both; height: 20px;">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>(c) 2013 Sinalvida.com.br - Design by Sinalvida <a href="http://www.sinalvida.com.br/"</a></p>
</div>
<div align=center>sinalvida<a href='http://www.sinalvida.com.br/'</a></div></body>
</html>
