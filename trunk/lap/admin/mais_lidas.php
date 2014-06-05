<title>:: FIFABRASIL News - &quot;O jornal da comunidade fifeira.&quot; ::</title>
<LINK href="../arquivos/estilo.css" type=text/css rel=stylesheet>

<style type="text/css">
<!--
body {
	background-image: url(arquivos/bg.JPG);
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
.style33 {Font-Family: arial; Font-Size: 10pt; Font-Style: normal; Text-Decoration: none; }
</style>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8" class="style22"></td>
  </tr>
</table>
<table width="778" height="227" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
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
                      <tr><?php
					  //Contando o número de notícias cadastradas
include "../conn.php";					  
$consulta2 = mysql_query("SELECT count(codigo_noticia) as total FROM noticias WHERE nome_noticia like '%".$_GET['busca']."%' order by visualizacoes DESC limit  0,10") or die(mysql_error());
$totalmat = mysql_result($consulta2,0,"total");
					   ?>
                        <td height="20" background="arquivos/up_preto.jpg"><span class="style33">&nbsp;Mais Lidas</span></td>
                      </tr>
                    </table>
                    <table width="468" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="6" height="590">&nbsp;</td>
                        <td><?php
        include "../conn.php";
		include "../data.php";
		
		?>
                          <span class="style29">
                          <?php

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

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria order by e.visualizacoes desc limit 0,10;";

     }

     else

     {

      $busca_noticia="select * from noticias e, categorias c where c.codigo_categoria = e.codigo_categoria and e.nome_noticia like '%".$busca."%' order by e.visualizacoes desc limit 0,10;";

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

         $imagem_noticia="<img src=$campo_foto[foto] name=PictureBox width=80 border=0><BR> ";

        }

       
        echo "<tr><td width='100'>$imagem_noticia</td><td><font color=black><b><a href='../noticia.php?codigo_noticia=$campo_noticia[codigo_noticia]'><b>$campo_noticia[nome_noticia]</b></a></b></font><BR>$campo_noticia[desc_not]<br>$campo_noticia[data_cadastro] - $campo_noticia[hora_cadastro] <BR>

		

		$campo_noticia[nome_categoria]

		<br>
		Esta noticia teve : <b>$campo_noticia[visualizacoes]</b> Visualizacoes

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

     $busca_noticia="select * from noticias e , categorias c where e.codigo_noticia = '".$codigo_noticia."' and c.codigo_categoria = e.codigo_categoria order by e.visualizacoes desc limit 0,10;";

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

         echo "<center><img src=$campo_foto[foto] name=PictureBox width=90 border=0><BR>";

        }

        echo "</td>";

       }

       echo "</tr>";

      }
     
     }

    }

    echo "</table>";

          ?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                          </span></td>
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
    </td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8" class="style22"></td>
  </tr>
</table>
