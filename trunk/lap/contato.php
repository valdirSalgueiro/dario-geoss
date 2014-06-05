<?php
//session_start();
//include "conn.php";
?>
<?php
 include('random.php');
 $foto = gera_foto(); 
?>
<title>:: NEAP ::</title>
<LINK href="arquivos/estilo.css" type=text/css rel=stylesheet>

<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.gif);
}
#Layer1 {
	position:absolute;
	left:289px;
	top:236px;
	width:294px;
	height:170px;
	z-index:1;
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
.style29 {color: #FFFFFF}
</style>
<script type="text/javascript" src="lightbox/lightbox.js"></script>
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
                    <td height="124" colspan="2"><div align="center"><img src="lap_adm/img/lap.gif" width="76" height="100" /></div></td>
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
                      </td></form
                  ></tr>
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
                    <td width="5%" class="style11 style1"><a href="index.php" class="style25">Capa</a></td>
                    <td width="2%"><img src="arquivos/seta.gif" width="10" height="10" /></td>
                    <td width="42%" class="style11 style1 style25"><span class="style25"><a href="videos.php">Videos</a> | <a href="#">Sobre</a><a href="expediente.php"></a> | <a href="#">Equipe</a><a href="colunistas.php"></a> | <a href="contato.php">Fale Conosco</a> | <a href="lap_adm" onclick="javascript:window.external.AddFavorite('http://www.portalsentinela.com/','Portal Sentinela');">Admin</a></span></td>
                    <td width="48%" class="style11 style1"><table width="360" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="6%"><div align="center"><img src="arquivos/calendario.gif" width="14" height="14"></div></td>
                        <td width="94%"><span class="style26">
                          <?php $dia_semana = date("w");
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
	
		include "conn.php";
//Contando o numero de noticias por cada categoria
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

    ?>!<font color="blue" class="style22"> &nbsp;&nbsp;
                          <?php include('whosonline.php'); ?>
                          </font> </span></td>
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
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
                              <td width="140"><div align="center"><span class="style26">
                                <?php
                   
		  
		  		 //Contando o n&uacute;mero de foto_do_dia existentes
$consulta_propaganda = mysql_query("SELECT count(codigo_propaganda) as total FROM propaganda WHERE nome_propaganda='2'") or die(mysql_error());
$total_propaganda = mysql_result($consulta_propaganda,0,"total");
         if($total_propaganda==0){ 
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
		 echo "<font class=materia>Espa&ccedil;o Reservado.</font>";  }
	          

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
                      <td height="4" class="style22"></td>
                    </tr>
                  </table>
                    <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20" background="images/bg.jpg" bgcolor="#FFFFFF"><span class="style26 style28">&nbsp;<span class="style29">Fale Conosco  </span></span></td>
                      </tr>
                    </table>
                    <table width="468" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="6" height="590">&nbsp;</td>
                        <td><span class="style25">- Todos os campos s&atilde;o obrigat&oacute;rios <br />
                            <br />
                            <script>

function teste_vazio()

{

 if((form1.email_recado.value!="")&&(form1.nome.value!="")&&(form1.assunto.value!="")&&(form1.msg.value!=""))

 {

  form1.enviar.disabled=false;

  form1.enviar.title=" Enviar recado.";

 }

}

                            </script>
                            <br />
</span>
                          <form method="post" name="form1" id="form1">
                            <center>
                            <table border="0" bordercolor="black" class="fonte">
                              <tr>
                                <td bordercolor="white" class="style21">Nome:</td>
                                <td bordercolor="white" class="style21"><input type="text" name="nome" size="40" maxlength="51" onkeypress="teste_vazio();" class="botao" /></td>
                              </tr>
                              <tr>
                                <td width="55" bordercolor="white" class="style21">E-mail:</td>
                                <td width="241" bordercolor="white" class="style21"><input type="text" name="email_recado" size="40" maxlength="51" onkeypress="teste_vazio();" class="botao" /></td>
                              </tr>
                              <tr>
                                <td bordercolor="white" class="style21">Assunto:</td>
                                <td bordercolor="white" class="style21"><input type="text" name="assunto" size="40" maxlength="51" onkeypress="teste_vazio();" class="botao" /></td>
                              </tr>
                              <tr>
                                <td bordercolor="white" class="style21">Mensagem:</td>
                                <td bordercolor="white" class="style21"><textarea name="msg" class="style21" cols="55" onkeypress="teste_vazio();" rows="15"></textarea></td>
                              </tr>
                              <tr>
                                <td bordercolor="white"></td>
                                <td bordercolor="white"><input type="submit" name="enviar" disabled="disabled" value=' Enviar ' class="botao" /></td>
                              </tr>
                            </table>
                          </form>
                          <?php
include "conn.php";
$email_recado=$_POST['email_recado'];

$nome=$_POST['nome'];

$assunto=$_POST['assunto'];

$msg=$_POST['msg'];

if(($email_recado!=NULL)and($assunto!=NULL)and($msg!=NULL)and($nome!=NULL))

{

 $msg="Nome: ".$nome."

 ".$msg;

 $add_fale="insert into recado values ('','".date('Y-m-d')."','".$email_recado."','".$assunto."','".$msg."','','0','');";

 $ok_add=mysql_query($add_fale,$conn);

 if($ok_add==1)

 {

  //aqui entra o c&oacute;digo de envio de email de aviso.

  $head="MIME-Version: 1.0\r\n";

  $head.="Content-type: text/html; charset=iso-8859-1\r\n";

  $head.="From: Sentinela@portalsentinela.com.br\r\n";

  $email_envio="Sentinela@portalsentinela.com.br";

  mail($email_envio,"Novo Recado","Assunto:".$assunto,$head);
  
  printf("<script>alert('Recado Enviado. Aguarde a resposta em seu email');

  window.location='contato.php';</script>");



 }

 else

 {

  echo "ERRO:".mysql_error($conn).".";

 }

}

?>

                          <span class="style25"><br />
                          <br />
                          </span><br><br><br><br><br><br><br><br><br><br><br></td>
                      </tr>
                    </table>
                    <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="8" class="style22"></td>
                    </tr>
                  </table>
                  <table width="468" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="6">&nbsp;</td>
                      <td>&nbsp;</td>
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
      <table width="470" height="62" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="59" class="style22"><table width="470" height="62" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#666666">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="1" class="style22"></td>
                    </tr>
                  </table>
                    <table width="468" height="60" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td height="60" valign="top"><script type="text/javascript"><!--
google_ad_client = "pub-3585189984164153";
/* 468x60, created 5/6/08 */
google_ad_slot = "4824279746";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
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
      </table></td>
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
                          <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25"><strong>&nbsp;<span class="style29">Enquete:</span></strong></div></td>
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
                            <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style11 style25"><strong>&nbsp;<span class="style29">Foto do Dia :</span></strong></div></td>
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
                                <td width="98" height="20" background="images/bg.jpg" class="style27"><div align="left" class="style25 style25"><strong>&nbsp;<span class="style29">Publicidade:</span></strong></div></td>
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
      </table></td>
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
