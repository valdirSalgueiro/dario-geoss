<?php
error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
 session_start();
 

 if($_GET['lang']!=NULL){
 session_register("lang");
 $_SESSION['lang']=$_GET['lang'];
 }
?>
<title>:: NEAP ::</title>
<LINK href="arquivos/estilo.css" type=text/css rel=stylesheet>

<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.gif);
}
-->
</style>
<style>
#lightbox{
background-color:#eee;
padding: 10px;
border-bottom: 2px solid #666;
border-right: 2px solid #666;
}
#lightboxCaption{
font-size: 0.8em;
padding-top: 0.4em;
}
#lightbox img{ border: none; }
#overlay img{ border: none; }
#overlay{
background-image: url(lightbox/overlay.png);
}
* html #overlay{
background-color: #000;
back\ground-color: transparent;
background-image: url(blank.gif);
filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="lightbox/overlay.png", sizingMethod="scale");
}
</style>
<script type="text/javascript" src="lightbox/lightbox.js"></script>
<style type="text/css">

<!--

body {

	background-color: #FFFFFF;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

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
<style tytpe="text/css">
.fonte{Font-Family: arial; Font-Size: 8pt; Font-Style: normal; color: #666666; Text-Decoration: none}
.fonte_link{Font-Family: arial; Font-Size: 8pt; Font-Style: normal; Text-Decoration: none}
.botao{font-family: verdana; font-size: 10 px;background-color:;}
a:link{color:'#000080';text-decoration:none}
a:active{color:'#000080'}
a:visited{color:'#000080'}
a:hover{text-decoration:none;color="black";size:1}
.boldlaranja { font-family:tahoma; font-size:11px; color:#FFFFFF; font-weight:bold; }
.boldamarelo { font-family:tahoma; font-size:11px; color:#CC9900; font-weight:bold; }
.boldazul { font-family:tahoma; font-size:11px; color:#006699; font-weight:bold; }



#Layer1 {
	position:absolute;
	left:289px;
	top:220px;
	width:366px;
	height:253px;
	z-index:1;
}
.style29 {	font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;
}
.style29 {
	font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;
}
</style>
<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.gif);
}
.style29 {font-size: 11px}
.acesso { font-family:Arial; font-size:11px; font-weight:bold; color:#FFFFFF; }
.titulo { font-family:Arial; font-size:18px; font-weight:bold; color:#333333; }
.atributos_titulo { font-family:Arial; font-size:11px; font-weight:bold; color:#333333; }
.materia { font-family:Tahoma; font-size:11px; color:#2D2D2D; }
.arquivo { font-family:Arial; font-size:12px; font-weight:bold; color:#FFFFFF; }
.meses { font-family:Arial; font-size:11px; font-weight:bold; color:#F6F6F6; }
.por { font-family:Verdana; font-size:10px; font-weight:bold; color:#000000; }
.comentarios_italico { font-family:Tahoma; font-size:11px;  color:#333333; font-style:italic;}
.fonte_cinza { font-family:Arial; font-size:11px; color:#666666; }
.comentarios_responsabilidade { font-family:Verdana; font-size:11px; color:#666666; font-style:italic;}
.email_materia { font-family:Verdana; font-size:12px; font-weight:bold; color:#666666;}


a.l_meses:link    { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:visited { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:active  { text-decoration: none; color:#FFFFFF; font-size:11px; }
a.l_meses:hover   { text-decoration: none; background-color:#FFFFFF; color:#333333; font-size:11px; }

a.l_menu_materia:link    { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:visited { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:active  { text-decoration: none; color:#333333; font-size:11px; }
a.l_menu_materia:hover   { text-decoration: none; background-color:#E9E9E9; color:#000000; font-size:11px; }

a.menu_principal:link    { text-decoration: none; color:#333333; font-size:11px;}
a.menu_principal:visited { text-decoration: none; color:#333333; font-size:11px;}

a.menu_principal:hover   { text-decoration: none; color:#000000; font-size:11px; font-weight:bold}
a.menu_principal:active  { text-decoration: none; color:#33333; font-size:11px;}
-->
</style>
<style>
#lightbox{
background-color:#eee;
padding: 10px;
border-bottom: 2px solid #666;
border-right: 2px solid #666;
}
#lightboxCaption{
font-size: 0.8em;
padding-top: 0.4em;
}
#lightbox img{ border: none; }
#overlay img{ border: none; }
#overlay{
background-image: url(lightbox/overlay.png);
}
* html #overlay{
background-color: #000;
back\ground-color: transparent;
background-image: url(blank.gif);
filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="lightbox/overlay.png", sizingMethod="scale");
}
.style30 {font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;
}
.style30 {	font-size: 12px;

	font-weight: bold;

	font-family: Arial, Helvetica, sans-serif;
}
.style81 {color: #FFFFFF}
.style82 {font-size: 12px}
</style>
<script type="text/javascript" src="lightbox/lightbox.js"></script>
<?php
 include('random.php');
 //$foto = gera_foto(); 
?>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td class="style22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1"></td>
      </tr>
    </table>
      <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td height="112"><table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="2"></td>
            </tr>
          </table>
            <table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="772" height="150" background=""><table width="768" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="124" colspan="2"><div align="center"><img src="_adm/img/lap.gif" width="76" height="100" /></div></td>
                  </tr>
                  <tr><?php
						if($_POST['buscarnot']){
						$buscar = $_POST['buscar'];
						echo "<script>window.location='noticias.php?busca=$buscar';</script>";
						}
						?>
                    <td width="35"><img src="arquivos/BotaoLupa.jpg" width="26" height="24"></td>
                     <form action="http://www.portalsentinela.com/busca.php" id="cse-search-box"> <td width="733">
<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>

        
        <input type="hidden" name="cx" value="partner-pub-3585189984164153:3q4q63-1f2p" />
        <input type="hidden" name="cof" value="FORID:11" />
        <input type="text" name="q" size="28" />
        <input type="submit" name="sa" value="Pesquisar" />
                      </td></form>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="772" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="2"><table width="772" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="3"></td>
                    </tr>
                  <tr>
                    <td height="1" bgcolor="#999999"></td>
                    </tr>
                  <tr>
                    <td height="3"></td>
                    </tr>
                </table>
                  <table width="772" height="17" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="3%" height="17"><div align="center"><img src="arquivos/casa.gif" width="16" height="15" /></div></td>
                    <td width="5%" class="style11 style1"><a href="index.php" class="style25"><span class="menu">         <?php
					 if($_SESSION['lang']==''){
                     $_SESSION['lang']='Brazil';
 }					  ?>
                      <?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span>Capa
                      <?php } if($_SESSION['lang']=='eng') { ?></span>Index<?php } if($_SESSION['lang']=='esp') { ?></span>Início
                      <?php } ?></span></a></td>
                    <td width="2%"><img src="arquivos/seta.gif" width="10" height="10" /></td>
                    <td width="44%" class="style11 style1 style25"><span class="style25"><a href="videos.php">Videos</a> | Sobre | <a href="#">Equipe</a> | <a href="index.php" class="style25"><span class="menu">
                      <?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?>                    </span></a><a href="contato.php">Fale Conosco</a><?php } if($_SESSION['lang']=='eng') { ?></span></a><a href="contato.php">Contact</a><?php } if($_SESSION['lang']=='esp') { ?></span></a><a href="contato.php">Hable conosco</a><?php } ?>  | <a href="#" onClick="javascript:window.external.AddFavorite('http://www.portalsentinela.com/','Portal Sentinela');"><span class="style25"><a href="lap_adm">Admin</a></span></a></span></td>
                    <td width="46%" class="style11 style1"><table width="360" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="4%"><div align="center"><img src="arquivos/calendario.gif" width="14" height="14"></div></td>
                        <td width="81%"><span class="style26">
<?php					
 if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){
$dia_semana = date("w");

						  switch($dia_semana)
   {
      case "0" : echo "Domingo"; break;
      case "1" : echo "Segunda"; break;
      case "2" : echo "Ter&ccedil;a"; break;
      case "3" : echo "Quarta"; break;
      case "4" : echo "Quinta"; break;
      case "5" : echo "Sexta"; break;
      case "6" : echo "S&aacute;bado"; break;
   }

						   ?>
,
<?php

    $dia=date('d');

    $mes=date('m');

    $ano=date('Y');

    $hora=date('H');

    $min=date('i');

    $xx="Bom dia";

    $mes2['01']="Janeiro";

    $mes2['02']="Fevereiro";

    $mes2['03']="Mar&ccedil;o";

    $mes2['04']="Abril";

    $mes2['05']="Maio";

    $mes2['06']="Junho";

    $mes2['07']="Julho";

    $mes2['08']="Agosto";

    $mes2['09']="Setembro";

    $mes2['10']="Outubro";

    $mes2['11']="Novembro";

    $mes2['12']="Dezembro";

    if(($hora>=12)and($hora<18))

    {

     $xx="Boa tarde";

    }

    if(($hora>=18)and($hora<=24))

    {

     $xx="Boa noite";

    }

    echo "$dia de ".$mes2[$mes]." de $ano. $xx";
	
} else {
$dia_semana = date("w");

						  switch($dia_semana)
   {
      case "0" : echo "Sunday"; break;
      case "1" : echo "Monday"; break;
      case "2" : echo "Tuesday"; break;
      case "3" : echo "Wednesday"; break;
      case "4" : echo "Thursday"; break;
      case "5" : echo "Friday"; break;
      case "6" : echo "Saturday"; break;
   }

						   ?>
,
<?php

    $dia=date('d');

    $mes=date('m');

    $ano=date('Y');

    $hora=date('H');

    $min=date('i');

    $xx="Good Day";

    $mes2['01']="January";

    $mes2['02']="February";

    $mes2['03']="March";

    $mes2['04']="April";

    $mes2['05']="May";

    $mes2['06']="Juny";

    $mes2['07']="July";

    $mes2['08']="August";

    $mes2['09']="September";

    $mes2['10']="October";

    $mes2['11']="November";

    $mes2['12']="December";

    if(($hora>=12)and($hora<18))

    {

     $xx="Good Afternoon";

    }

    if(($hora>=18)and($hora<=24))

    {

     $xx="Good Night";

    }

    echo "$dia of ".$mes2[$mes]." of $ano. $xx";

}
	

	
	
	include "conn.php";
   //Contando o numero de noticias por cada categoria
   
mysql_select_db("sentinela");
   
$consulta_cat = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '1'") or die(mysql_error());
$total_cat = mysql_result($consulta_cat,0,"total");	

$consulta_cat2 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '2'") or die(mysql_error());
$total_cat2 = mysql_result($consulta_cat2,0,"total");

$consulta_cat3 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '3'") or die(mysql_error());
$total_cat3 = mysql_result($consulta_cat3,0,"total");

$consulta_cat4 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '4'") or die(mysql_error());
$total_cat4 = mysql_result($consulta_cat4,0,"total");	

$consulta_cat5 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '5'") or die(mysql_error());
$total_cat5 = mysql_result($consulta_cat5,0,"total");

$consulta_cat6 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '6'") or die(mysql_error());
$total_cat6 = mysql_result($consulta_cat6,0,"total");

$consulta_cat7 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '7'") or die(mysql_error());
$total_cat7 = mysql_result($consulta_cat7,0,"total");

$consulta_cat8 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '8'") or die(mysql_error());
$total_cat8 = mysql_result($consulta_cat8,0,"total");

$consulta_cat9 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '9'") or die(mysql_error());
$total_cat9 = mysql_result($consulta_cat9,0,"total");

$consulta_cat10 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '10'") or die(mysql_error());
$total_cat10 = mysql_result($consulta_cat10,0,"total");

$consulta_cat11 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '11'") or die(mysql_error());
$total_cat11 = mysql_result($consulta_cat11,0,"total");

$consulta_cat12 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '12'") or die(mysql_error());
$total_cat12 = mysql_result($consulta_cat12,0,"total");

$consulta_cat13 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '13'") or die(mysql_error());
$total_cat13 = mysql_result($consulta_cat13,0,"total");

$consulta_cat14 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '14'") or die(mysql_error());
$total_cat14 = mysql_result($consulta_cat14,0,"total");

$consulta_cat15 = mysql_query("SELECT count(codigo_categoria) as total FROM noticias WHERE codigo_categoria = '15'") or die(mysql_error());
$total_cat15 = mysql_result($consulta_cat15,0,"total");

    ?>!</span><font color=blue class="style22">
&nbsp;&nbsp;<?php //include('whosonline.php'); ?>
</font></td>
                        <td width="15%"><?php if($_SESSION['lang']=='eng'){	?>
                          <a href="index.php?lang=Brazil"><img src="images/Brazil.gif" alt="Brazil" width="18" height="12" border="0" /></a><span class="style25"> | </span> <a href="index.php?lang=esp"><img src="images/Spain.gif" alt="English" width="18" height="12" border="0" /></a>
                          <?php } ?>
                          <?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){ ?>
                          <a href="index.php?lang=eng"><img src="images/United_States.gif" alt="English" width="18" height="12" border="0" /></a><span class="style25"> | </span> <a href="index.php?lang=esp"><img src="images/Spain.gif" alt="Espanish" width="18" height="12" border="0" /></a>
                          <?php } ?>
                          <?php if($_SESSION['lang']=='esp'){ ?>
                          <a href="index.php?lang=Brazil"><img src="images/Brazil.gif" alt="Brazil" width="18" height="12" border="0" /></a><span class="style25"> | </span> <a href="index.php?lang=eng"><img src="images/United_States.gif" alt="English" width="18" height="12" border="0" /></a>
                          <?php } ?></td>
                      </tr>
                    </table></td>
                    </tr>
                </table>
                  <table width="772" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="3"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8" class="style22"></td>
  </tr>
</table>
<table width="778" height="227" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="155" valign="top" class="style22"><table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="59" class="style22"><table width="154" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
            <tr>
              <td width="159"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="1" class="style22"></td>
                  </tr>
                </table>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="98" height="18" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25 style71"><strong>&nbsp;<?php if($_GET['lang']=='Brazil'){	?>
                              <span class="style81">Menu:</span>
                            <?php } else { ?>
                            <span class="style81">Menu:</span>
                            <?php } ?></strong></div></td>
                          </tr>
                  </table>
                  <table width="152" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td width="152" height="68" valign="top"><DIV class=menu>
					  
<UL>
  <li><a title="Principal" 
            href="index.php">Principal</a></li>
  <LI><A title="Rádio Sentinela Ao Vivo" 
            href="contato.php">Contato</A></LI>
  <LI><A title="Rádio e TV Sentinela" 
            href="noticias.php">Not&iacute;cias</A></LI>			
    <LI><a 
            href="sugestoes.php" title="Sugest&otilde;es">Sugest&otilde;es</a></LI>	
	<LI><A title="V&iacute;deos" 
            href="videos.php">V&iacute;deos </A></LI>
                  <LI><A title="Galeria de Fotos" 
            href="galeria.php">Galeria Fotos</A></LI>
                  <LI><A 
            href="chat" title="Chat" target="_blank">Chat</A></LI>
			  </UL>
</DIV></DIV></td>
                    </tr>
                  </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1"></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
    </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                          <tr>
                            <td width="140"><div align="center"><span class="style26">
                                <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='1'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '1' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                            </span></div></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                          <tr>
                            <td width="140"><div align="center"><span class="style26"><?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='2'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '2' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                            </span></div></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                          <tr>
                            <td width="140"><div align="center"><span class="style26">
                              <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='3'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '3' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                            </span></div></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                            <tr>
                              <td width="140"><div align="center"><span class="style26">
                                  <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='4'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '4' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                              </span></div></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                            <tr>
                              <td width="140"><div align="center"><span class="style26">
                                <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='5'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '5' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                              </span></div></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="152" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="152" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="150" height="68" border="1">
                            <tr>
                              <td width="140"><div align="center"><span class="style26">
                                  <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='6'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espaço Reservado.</font>";  }
	          

		  $busca_propaganda= "SELECT * FROM propaganda where ativado=0 order by rand();";
          $res_busca_propaganda=mysql_query($busca_propaganda,$conn);
          $num_propaganda=mysql_num_rows($res_busca_propaganda);


          $col=1;



          $linha=$num_propaganda/$col;



          if($linha>1)



          {



           $linha=1;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_propaganda=mysql_fetch_array($res_busca_propaganda);



            echo "<td>";



            if($campo_propaganda[codigo_propaganda]!=NULL)



            {



             $busca_foto="select * from foto_propaganda where codigo_propaganda = '6' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=$campo_foto[descricao_foto] target=_blank><img src=admin/$campo_foto[foto] name=PictureBox width=140 height=48 border=0></a><BR>";



             }


/*
             echo "<font size=2 class='materia' color=black><b>".$campo_propaganda[nome_propaganda]."</b></font>



            ";
*/


             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                              </span></div></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
    </td>
    <td width="4" valign="top" class="style22">&nbsp;</td>
    <td width="474" valign="top" class="style22"><table width="470" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="1" class="style22"></td>
            </tr>
          </table>
            <table width="468" height="575" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td height="464" valign="top"><table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="0" class="style22"></td>
                    </tr>
                  </table>
                    <table width="468" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20" background="imgalessandro6.jpg"><table width="468" border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="20" background="images/bg.jpg"><span class="style26 style28"><span class="menu"><?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span><span class="style81">&Uacute;ltimas
                              <?php } if($_SESSION['lang']=='eng') { ?>
                            </span></span><span class="style81"><strong>Lasts</strong>
                            <?php } if($_SESSION['lang']=='esp') { ?>
                            <strong>Las &Uacute;ltimas</strong></span>
                            <?php } ?>
                            </span></span></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <center><iframe src="ticker.php" name="webtv" width="463" marginwidth="0" height="45" marginheight="0" align="center" frameborder="0" scrolling="No" id="tickerFrame"></iframe>
                    <br />
                    <table width="467" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="461" height="20" background="images/bg.jpg"><span class="style26 style28"><span class="menu"><?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span><span class="style81">Not&iacute;cias
                        <?php } if($_SESSION['lang']=='eng') { ?>
                        News
                        <?php } if($_SESSION['lang']=='esp') { ?>
                        Not&iacute;cias
                        <?php } ?>
                        </span></span></td>
                      </tr>
                  </table>
                    <table width="468" height="207" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="143" valign="top"><table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="6" class="style22"></td>
                          </tr>
                        </table>
						<table width="464" border="0" cellspacing="0" cellpadding="0">
                          <tr>
						  <td height="200" background=""><table width="464" height="224" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="233" height="222" bordercolor="#CCCCCC" bgcolor="#FFFFFF"><div align="left"></div>
                                  <center><iframe src="tvnoticia.php" name="iframe" width="210" marginwidth="0" height="230" marginheight="0" align="center" scrolling="No" frameborder="no" id="iframe">
                                  <div align="left">ASAA</div>
                                  </iframe></td>
                                <td width="225"><div align="left"><span class="style30">
                                  <?php
$busca_noti="select * from noticias where ativado=1 order by codigo_noticia DESC limit 0,1;";
$res_busca_noti=mysql_query($busca_noti,$conn);
$campo_noti=mysql_fetch_array($res_busca_noti);

$timestamp=mktime();
/*
print $campo_noti['data_entrada'];
print $timestamp;
die();
*/
if(($campo_noti['data_entrada']<=$timestamp)and($campo_noti['data_entrada']!=NULL)){

$mod_noticia = "update noticias set ativado = '0',data_entrada = '' where codigo_noticia = '".$campo_noti['codigo_noticia']."';";
  
$ok=mysql_query($mod_noticia,$conn);

  
}

//Busca das últimas notícias
$busca_col2="select * from noticias order by codigo_noticia desc limit 0,1;";
$res_busca_col2=mysql_query($busca_col2,$conn);
$campo_col2=mysql_fetch_array($res_busca_col2);

$busca_col3="select * from noticias order by codigo_noticia desc limit 1,2;";
$res_busca_col3=mysql_query($busca_col3,$conn);
$campo_col3=mysql_fetch_array($res_busca_col3);

$busca_col4="select * from noticias order by codigo_noticia desc limit 2,3;";
$res_busca_col4=mysql_query($busca_col4,$conn);
$campo_col4=mysql_fetch_array($res_busca_col4);



		 
		   if($_GET['busca']!=NULL)
		   {
		   $busca=$_GET['busca'];
		   
		   } else {
		   
		   $busca=$_POST['busca'];
		   
		   }

          echo "<table border=0 class=fonte cellspacing=10 >";
		  
	
    if($codigo_noticia==NULL)

    {
	
     if($busca==NULL)

     {

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and e.codigo_noticia != '".$campo_col2[codigo_noticia]."' and e.codigo_noticia != '".$campo_col3[codigo_noticia]."' and e.codigo_noticia != '".$campo_col4[codigo_noticia]."' and e.pais= '".$_SESSION['lang']."'  and e.ativado = '0' order by e.codigo_noticia desc limit 0,4;";

     }

     else

     {

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and e.codigo_noticia != '".$campo_col2[codigo_noticia]."' and e.codigo_noticia != '".$campo_col3[codigo_noticia]."' and e.codigo_noticia != '".$campo_col4[codigo_noticia]."' and e.nome_noticia like '%".$busca."%' AND e.ativado = '0' order by e.codigo_noticia desc limit 0,4;";

     }

     $res_busca_noticia=mysql_query($busca_noticia,$conn);
     $num_noticia=mysql_num_rows($res_busca_noticia);
     if($num_noticia>0)

     {

      $col=3;

      $lin=$num_noticia/$col;

      for($x=0;$x<$num_noticia;$x++)

      {

       $campo_noticia=mysql_fetch_array($res_busca_noticia);

       if($campo_noticia[codigo_noticia]!=NULL)

       {

        $busca_foto="select * from foto_noticias where codigo_noticia = '".$campo_noticia[codigo_noticia]."' order by rand();";

        $res_busca_foto=mysql_query($busca_foto,$conn);

        $num_foto=mysql_num_rows($res_busca_foto);

        if($num_foto>0)

        {

         $campo_foto=mysql_fetch_array($res_busca_foto);

         //$imagem_noticia="<a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><img src=admin/$campo_foto[foto] name=PictureBox width=80 border=0><BR> ";

        }

       
        echo "<tr><td width='10'>$imagem_noticia</td><td><font color=black><b><a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><b>$campo_noticia[nome_noticia]</b></b></font></a><BR><img src=images/ico_relogio.gif width=11 height=11/>&nbsp;&nbsp;$campo_noticia[data_cadastro] - $campo_noticia[hora_cadastro]


		";

       }

       $imagem_noticia=NULL;

      }

     }

     else

     {

      if($busca!=NULL)

      {

       echo "<tr><td>N&atilde;o foi encontrado nenhuma ocorrencia de <b>$busca</b> em todo o site.</td></tr> ";

      }

     }

    }

    else

    {

     $busca_noticia="select * from noticias e , categorias c where e.codigo_noticia = '".$codigo_noticia."' and e.codigo_noticia != '".$campo_col2[codigo_noticia]."' and e.codigo_noticia != '".$campo_col3[codigo_noticia]."' and e.codigo_noticia != '".$campo_col4[codigo_noticia]."' AND e.ativado = '0' and c.codigo_categoria = e.codigo_categoria;";

     $res_busca_noticia=mysql_query($busca_noticia,$conn);

     $num_noticia=mysql_num_rows($res_busca_noticia);

     if($num_noticia>0)

     {

      $campo_noticia=mysql_fetch_array($res_busca_noticia);

      $busca_foto="select * from foto_noticias where codigo_noticia = '".$codigo_noticia."' order by rand();";

      $res_busca_foto=mysql_query($busca_foto,$conn);

      $num_foto=mysql_num_rows($res_busca_foto);

      $col=2;

      $lin=$num_foto/$col;

      for($l=0;$l<$lin;$l++)

      {

       echo "<tr>";

       for($c=0;$c<$col;$c++)

       {

        echo "<td>";

        $campo_foto=mysql_fetch_array($res_busca_foto);

        if($campo_foto[codigo_foto]!=NULL)

        {

         echo "<center><img src=admin/$campo_foto[foto] name=PictureBox width=90 border=0><BR>";

        }

        echo "</td>";

       }

       echo "</tr>";

      }
     
     }

    }

    echo "</table>";

          ?>
                                </span></div></td>
                              </tr>
                            </table></td></tr></table>
						
                          <table width="464" border="0" cellspacing="0" cellpadding="0">
                          <tr>
						    <td width="4"></td>
                            <td width="460"><p class="style25 style11 style25 style25">&nbsp;</p>
                              <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="20" background="images/bg.jpg"><span class="style26 style28"><span class="menu"><?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span><span class="style81">Not&iacute;cias Atualizadas
                                    <?php } if($_SESSION['lang']=='eng') { ?>
                                    Actual News
                                    <?php } if($_SESSION['lang']=='esp') { ?>
                                    Not&iacute;cias Actualizadas
                                    <?php } ?>
                                  </span></span></td>
                                </tr>
                              </table>
                              <p class="style25 style11 style25 style25">
                                <?php
        include "conn.php";
		include "data.php";

		?>
                                <span class="style30">
                                <?php
//Busca das 4 notícias do lado da TV

$busca_col5="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 1,7;";
$res_busca_col5=mysql_query($busca_col5,$conn);
$campo_col5=mysql_fetch_array($res_busca_col5);


$busca_col6="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 2,7;";
$res_busca_col6=mysql_query($busca_col6,$conn);
$campo_col6=mysql_fetch_array($res_busca_col6);

$busca_col7="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 3,7;";
$res_busca_col7=mysql_query($busca_col7,$conn);
$campo_col7=mysql_fetch_array($res_busca_col7);

$busca_col8="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 4,7;";
$res_busca_col8=mysql_query($busca_col8,$conn);
$campo_col8=mysql_fetch_array($res_busca_col8);

$busca_col9="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 5,7;";
$res_busca_col9=mysql_query($busca_col9,$conn);
$campo_col9=mysql_fetch_array($res_busca_col9);

$busca_col10="select * from noticias WHERE pais = '".$_SESSION['lang']."' order by codigo_noticia desc limit 6,7;";
$res_busca_col10=mysql_query($busca_col10,$conn);
$campo_col10=mysql_fetch_array($res_busca_col10);



		 
		   if($_GET['busca']!=NULL)
		   {
		   $busca=$_GET['busca'];
		   
		   } else {
		   
		   $busca=$_POST['busca'];
		   
		   }

          echo "<table border=0 class=fonte cellspacing=10 >";
		  
	
    if($codigo_noticia==NULL)

    {
	
     if($busca==NULL)

     {

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and e.pais= '".$_SESSION['lang']."' and e.codigo_noticia != '".$campo_col2[codigo_noticia]."' and e.codigo_noticia != '".$campo_col3[codigo_noticia]."' and e.codigo_noticia != '".$campo_col4[codigo_noticia]."' and e.codigo_noticia != '".$campo_col5[codigo_noticia]."' and e.codigo_noticia != '".$campo_col6[codigo_noticia]."' and e.codigo_noticia != '".$campo_col7[codigo_noticia]."' and e.codigo_noticia != '".$campo_col8[codigo_noticia]."' and e.codigo_noticia != '".$campo_col9[codigo_noticia]."' and e.codigo_noticia != '".$campo_col10[codigo_noticia]."' and e.ativado = '0' order by e.codigo_noticia desc limit 0,4;";

     }

     else

     {

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and e.codigo_noticia != '".$campo_col2[codigo_categoria]."' and e.codigo_noticia != '".$campo_col3[codigo_categoria]."' and e.codigo_noticia != '".$campo_col4[codigo_categoria]."' and e.codigo_noticia != '".$campo_col5[codigo_categoria]."' and e.codigo_noticia != '".$campo_col6[codigo_categoria]."' and e.codigo_noticia != '".$campo_col7[codigo_categoria]."' and e.codigo_noticia != '".$campo_col8[codigo_categoria]."' and e.codigo_noticia != '".$campo_col9[codigo_noticia]."'  and e.codigo_noticia != '".$campo_col10[codigo_noticia]."' and e.pais= '".$_SESSION['lang']."' and e.nome_noticia like '%".$busca."%' AND e.ativado = '0' order by e.codigo_noticia desc limit 0,4;";

     }

     $res_busca_noticia=mysql_query($busca_noticia,$conn);
     $num_noticia=mysql_num_rows($res_busca_noticia);
     if($num_noticia>0)

     {

      $col=3;

      $lin=$num_noticia/$col;

      for($x=0;$x<$num_noticia;$x++)

      {

       $campo_noticia=mysql_fetch_array($res_busca_noticia);

       if($campo_noticia[codigo_noticia]!=NULL)

       {

        $busca_foto="select * from foto_noticias where codigo_noticia = '".$campo_noticia[codigo_noticia]."' order by rand();";

        $res_busca_foto=mysql_query($busca_foto,$conn);

        $num_foto=mysql_num_rows($res_busca_foto);

        if($num_foto>0)

        {

         $campo_foto=mysql_fetch_array($res_busca_foto);

         $imagem_noticia="<a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><img src=admin/$campo_foto[foto] name=PictureBox width=80 border=0><BR> ";

        }

       
        echo "<tr><td width='80'>$imagem_noticia</td><td><font color=black><b><a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><b>$campo_noticia[nome_noticia]</b></b></font></a><BR>$campo_noticia[desc_not]<br><img src=images/ico_relogio.gif width=11 height=11/>&nbsp;&nbsp;$campo_noticia[data_cadastro] - $campo_noticia[hora_cadastro] <BR>

		

		$campo_noticia[nome_categoria]

		<br>

		";

       }

       $imagem_noticia=NULL;

      }

     }

     else

     {

      if($busca!=NULL)

      {

       echo "<tr><td>N&atilde;o foi encontrado nenhuma ocorrencia de <b>$busca</b> em todo o site.</td></tr> ";

      }

     }

    }

    else

    {

     $busca_noticia="select * from noticias e , categorias c where e.codigo_noticia = '".$codigo_noticia."' and e.pais= '".$_SESSION['lang']."' AND e.ativado = '0' and c.codigo_categoria = e.codigo_categoria;";

     $res_busca_noticia=mysql_query($busca_noticia,$conn);

     $num_noticia=mysql_num_rows($res_busca_noticia);

     if($num_noticia>0)

     {

      $campo_noticia=mysql_fetch_array($res_busca_noticia);

      $busca_foto="select * from foto_noticias where codigo_noticia = '".$codigo_noticia."' order by rand();";

      $res_busca_foto=mysql_query($busca_foto,$conn);

      $num_foto=mysql_num_rows($res_busca_foto);

      $col=2;

      $lin=$num_foto/$col;

      for($l=0;$l<$lin;$l++)

      {

       echo "<tr>";

       for($c=0;$c<$col;$c++)

       {

        echo "<td>";

        $campo_foto=mysql_fetch_array($res_busca_foto);

        if($campo_foto[codigo_foto]!=NULL)

        {

         echo "<center><img src=admin/$campo_foto[foto] name=PictureBox width=90 border=0><BR>";

        }

        echo "</td>";

       }

       echo "</tr>";

      }
     
     }

    }

    echo "</table>";

          ?>
                                </span></p>
                              <p align="center" class="style11 style25 style25 style25"><strong><em><a href="noticias.php" class="style22 style22 style25 style25 style29"><img src="images/parabolica.gif" width="39" height="39" border="0" /> [ CLIQUE AQUI para Abrir Arquivo de Not&iacute;cias]</a></em></strong></p></td>
                          </tr>
                        </table>                          </td>
                      </tr>
                    </table>
                    <p class="style25 style11 style25 style25">&nbsp;</p>
                    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20" background="images/bg.jpg"><span class="style26 style28">&nbsp;<span class="style81">V&iacute;deos </span></span></td>
                      </tr>
                    </table>
                    <p align="center" class="style25 style11 style25 style25"><strong><em><a href="videos.php" class="style22 style22 style25 style25 style29">[ CLIQUE AQUI para Abrir Arquivo de V&iacute;deos ]</a></em></strong></p>
                    <table width="464" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="4"></td>
                        <td width="460"><p class="style25 style11 style25 style25"><strong><em><a href="noticias.php" class="style22 style22 style25 style25 style29"><br />
</a></em></strong></p>
                        </td>
                      </tr>
                    </table>
                    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25"><strong>&nbsp;&nbsp;<span class="style81">No Portal:</span></strong></div></td>
                      </tr>
                    </table>
                    <table width="466" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="466"><table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="8" class="style22"></td>
                          </tr>
                        </table>
                          <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="3" class="style22"></td>
                            </tr>
                          </table>
                          <?php
$busca_not9="select * from noticias WHERE pais = '".$_SESSION['lang']."' ORDER by codigo_noticia DESC limit 5,6";
$res_busca_not9=mysql_query($busca_not9,$conn);
$campo_noticia9=mysql_fetch_array($res_busca_not9);

$busca_not10="select * from noticias WHERE pais = '".$_SESSION['lang']."' ORDER by codigo_noticia DESC limit 6,7";
$res_busca_not10=mysql_query($busca_not10,$conn);
$campo_noticia10=mysql_fetch_array($res_busca_not10);

$busca_not11="select * from noticias WHERE pais = '".$_SESSION['lang']."' ORDER by codigo_noticia DESC limit 7,8";
$res_busca_not11=mysql_query($busca_not11,$conn);
$campo_noticia11=mysql_fetch_array($res_busca_not11);

$busca_not12="select * from noticias WHERE pais = '".$_SESSION['lang']."' ORDER by codigo_noticia DESC limit 8,9";
$res_busca_not12=mysql_query($busca_not12,$conn);
$campo_noticia12=mysql_fetch_array($res_busca_not12);


	           //include "conn.php"; 
      
		  $busca_noticia= "SELECT * FROM noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and ativado=0 and codigo_noticia != '".$campo_noticia['codigo_noticia']."' and codigo_noticia != '".$campo_col2['codigo_noticia']."' and codigo_noticia != '".$campo_col3['codigo_noticia']."' and codigo_noticia != '".$campo_col4['codigo_noticia']."' and codigo_noticia != '".$campo_col5['codigo_noticia']."' and codigo_noticia != '".$campo_col6['codigo_noticia']."' and codigo_noticia != '".$campo_col7['codigo_noticia']."' and codigo_noticia != '".$campo_col8['codigo_noticia']."' and codigo_noticia != '".$campo_noticia9['codigo_noticia']."' and codigo_noticia != '".$campo_noticia10['codigo_noticia']."' and codigo_noticia != '".$campo_noticia11['codigo_noticia']."' and codigo_noticia != '".$campo_noticia12['codigo_noticia']."' and pais = '".$_SESSION['lang']."' order by rand();";
          $res_busca_noticia=mysql_query($busca_noticia,$conn);
          $num_noticia=mysql_num_rows($res_busca_noticia);
          $col=2;



          $linha=$num_noticia/$col;



          if($linha>2)



          {



           $linha=2;



          }



          echo "<table border=0 class=fonte width=100% cellspacing=20>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_noticia=mysql_fetch_array($res_busca_noticia);



            echo "<td><a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'>";



            if($campo_noticia[codigo_noticia]!=NULL)



            {



             $busca_foto="select * from foto_noticias where codigo_noticia = '".$campo_noticia[codigo_noticia]."' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);

       

              echo "<img src=admin/$campo_foto[foto] name=PictureBox width=50 border=0><BR></a>";



             }


             
             echo "<td><a href='noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><font size=2 class='materia' color=#0066FF><b>".$campo_noticia[nome_noticia]."</b></font><BR></a><font size=2 class='materia' color=#0066FF>".$campo_noticia[nome_categoria]."</font>



            ";



             echo "</td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";

//Contando o número de notícias existentes
$consultac = mysql_query("SELECT count(codigo_noticia) as total FROM noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and ativado=0 and codigo_noticia != '".$campo_noticia['codigo_noticia']."' and codigo_noticia != '".$campo_noticia2['codigo_noticia']."' and codigo_noticia != '".$campo_noticia3['codigo_noticia']."' and codigo_noticia != '".$campo_noticia4['codigo_noticia']."' order by rand();") or die(mysql_error());
$totalcom = mysql_result($consultac,0,"total");
if($totalcom==0){ echo "<font class=materia>&nbsp;&nbsp;Ainda não existem mais que 4 notícias.</font>"; } 

          ?></td>
                      </tr>
                  </table>
                  <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="8" class="style22"></td>
                      </tr>
                  </table>
                  <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25">
                        <div align="left"><strong><span class="menu"><?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span><span class="style81">Galeria de Fotos:</span></strong><span class="style26 style28 style81"><span class="style25">
                          <?php } if($_SESSION['lang']=='eng') { ?>
                          <span class="style25"><strong>Galery of Pictures:</strong></span>
                          <?php } if($_SESSION['lang']=='esp') { ?>
                          <span class="style25">Galeria del images:</span></span><span class="style82">
                          <?php } ?>
                          </span></span></div>
                      </div></td>
                    </tr>
                  </table>
                  <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="8" class="style22"></td>
                    </tr>
                  </table>
                  <table width="461" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="149"><div align="left">
                        <table width="461" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><?php
                   
		  
		  		 //Contando o n&uacute;mero de galeriass existentes
$consulta_galerias = mysql_query("SELECT count(codigo_galeria) as total FROM galerias WHERE tipo!='i'") or die(mysql_error());
$total_galerias = mysql_result($consulta_galerias,0,"total");
         if($total_galerias==0){ 
		 echo "<font class=materia>N&atilde;o h&aacute; galerias cadastradas.</font>";  }
	          

		  $busca_galeria= "SELECT * FROM galerias where ativado=0 and tipo!='i' order by rand();";
          $res_busca_galeria=mysql_query($busca_galeria,$conn);
          $num_galeria=mysql_num_rows($res_busca_galeria);


          $col=3;



          $linha=$num_galeria/$col;



          if($linha>3)



          {



           $linha=2;



          }



          echo "<table border=0 align=center class=fonte width=100% cellspacing=20>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_galeria=mysql_fetch_array($res_busca_galeria);



            echo "<td><a href='#' title='Veja o Album da Galeria $campo_galeria[nome_galeria] ' onclick=window.open('album_galerias.php?codigo_galeria=$campo_galeria[codigo_galeria]','Entrada','toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=no,width=950,height=690');>";



            if($campo_galeria[codigo_galeria]!=NULL)



            {



             $busca_foto="select * from foto_galerias where codigo_galeria = '".$campo_galeria[codigo_galeria]."' order by rand();";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><img src=admin/$campo_foto[foto] name=PictureBox width=60 border=0><BR>";



             }



             echo "<font size=2 class='materia' color=black><b>".$campo_galeria[nome_galeria]."</b></font><br><font size=2 class='materia' color=black><b>".$campo_galeria[por]."</b></font>



            ";



             echo "</a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                                <div align="center"><br />
                                  <strong><em><a href="galeria.php" class="style22 style22 style25 style25 style29"><img src="images/porta retrato.jpg" border="0" width="49" height="45" /> [ CLIQUE AQUI para Abrir Arquivo de Galeria de Fotos ]</a></em></strong></div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                  </table>
                  <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="8" class="style22"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="1"></td>
              </tr>
          </table></td>
      </tr>
    </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
    </td>
    <td width="145" valign="top" class="style22"><table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="144" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="1" class="style22"></td>
                  </tr>
                </table>
                  <table width="142" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td height="68" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25"><strong>&nbsp;<span class="style81">Enquete:</span></strong></div></td>
                        </tr>
                      </table>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="98" height="1" bgcolor="#CCCCCC" class="style27"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="197"><?php
include ("enquete/apgconecta.php");
require ("enquete/apgvota.php");
?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1"></td>
                    </tr>
                </table></td>
            </tr>
          </table></td>
        </tr>
          </table>      
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="144" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="142" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25"><strong><span class="menu"><?php if(($_SESSION['lang']=='Brazil')or($_SESSION['lang']=='')){	?></span><span class="style81">Foto do Dia :<span class="style26 style28">
                              <?php } if($_SESSION['lang']=='eng') { ?>
                              <span class="style25">Picture of Day:</span>
                              <?php } if($_SESSION['lang']=='esp') { ?>
                              <span class="style25">Image del dia:
                              <?php } ?>
                              </span> </span></span></strong></div></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="98" height="1" bgcolor="#CCCCCC" class="style27"></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="122"><div align="center">
                                <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_foto_dia = mysql_query("SELECT count(codigo_foto_dia) as total FROM foto_dia") or die(mysql_error());
$total_foto_dia = mysql_result($consulta_foto_dia,0,"total");
         if($total_foto_dia==0){ 
		 echo "<font class=materia>N&atilde;o h&aacute; Foto do Dia cadastrada.</font>";  }
	          

		  $busca_foto_dia= "SELECT * FROM foto_dia where ativado=0 order by codigo_foto_dia DESC limit 0,1;";
          $res_busca_foto_dia=mysql_query($busca_foto_dia,$conn);
          $num_foto_dia=mysql_num_rows($res_busca_foto_dia);


          $col=3;



          $linha=$num_foto_dia/$col;



          if($linha>3)



          {



           $linha=2;



          }



          echo "<table border=0 class=fonte width=100 cellspacing=0>";



          for($l=0;$l<$linha;$l++)



          {



           echo "<tr>";



           for($c=0;$c<$col;$c++)



           {



            $campo_foto_dia=mysql_fetch_array($res_busca_foto_dia);



            echo "<td>";



            if($campo_foto_dia[codigo_foto_dia]!=NULL)



            {



             $busca_foto="select * from foto_foto_dia where codigo_foto_dia = '".$campo_foto_dia[codigo_foto_dia]."' order by codigo_foto_dia DESC limit 0,1;";



             $res_busca_foto=mysql_query($busca_foto,$conn);



             $num_foto=mysql_num_rows($res_busca_foto);



             if($num_foto>0)



             {



              $campo_foto=mysql_fetch_array($res_busca_foto);



              echo "<center><a href=admin/$campo_foto[foto] rel=lightbox title=$campo_foto[descricao_foto]><img src=admin/$campo_foto[foto] name=PictureBox width=100 border=0></a><BR>";



             }



             echo "<font size=2 class='materia' color=black><b>".$campo_foto_dia[nome_foto_dia]."</b></font>



            ";



             echo "</center></a></td>";



            }



           }



           echo "</tr>";



          }



          echo "</table>";



          ?>
                              </div></td>
                            </tr>
                          </table></td>
                      </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="144" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="142" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="68"><div align="center" class="style21">
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style25 style25"><strong>&nbsp;<span class="style81">Publicidade:</span></strong></div></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="98" height="1" bgcolor="#CCCCCC" class="style27"></td>
                            </tr>
                          </table>
                          <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="6" class="style22"></td>
                            </tr>
                          </table>
<script type="text/javascript"><!--
google_ad_client = "pub-3585189984164153";
/* 120x600, created 5/10/08 */
google_ad_slot = "2770220984";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>


                          <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="6" class="style22"></td>
                            </tr>
                          </table>
<script type="text/javascript"><!--
google_ad_client = "pub-3585189984164153";
/* 120x240, created 5/10/08 */
google_ad_slot = "1891746805";
google_ad_width = 120;
google_ad_height = 240;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

                          <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="6" class="style22"></td>
                            </tr>
                          </table>
<script type="text/javascript"><!--
google_ad_client = "pub-3585189984164153";
/* 120x240, created 5/10/08 */
google_ad_slot = "7666152373";
google_ad_width = 120;
google_ad_height = 240;
google_cpa_choice = ""; // on file
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>


                          <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="6" class="style22"></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="1"></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6" class="style22"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8" class="style22"></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="1" class="style22"></td>
      </tr>
    </table>
        <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td height="35"><div align="center" class="style21"><span class="style17"><span class="style18">Copyright &copy; NEAP Todos os   direitos reservados<br />
            </span></span><span class="style16"><strong>Proibida a c&oacute;pia</strong> ou qualquer outra forma de   reprodu&ccedil;&atilde;o, integral ou parcial, sem o pr&eacute;vio acordo do autor.</span></div></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1"></td>
          </tr>
      </table></td>
  </tr>
</table>
