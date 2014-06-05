<?php

include('conn.php');

$busca="

SELECT 

	noticias.codigo_noticia as codigo, 

	foto_noticias.foto as foto,

	noticias.nome_noticia as titulo



FROM 

	foto_noticias, noticias



WHERE

	noticias.codigo_noticia = foto_noticias.codigo_noticia 

";

$resultado=mysql_query($busca,$conn);

$num_busca=mysql_num_rows($resultado);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<HTML>

<HEAD>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<SCRIPT TYPE="text/javascript" SRC="slideshow.js"></SCRIPT>



<SCRIPT TYPE="text/javascript">

ss = new slideshow("ss");

ss.timeout = 10000;

//ss.prefetch = 1;

ss.repeat = true;



<?php

for($x=1;$x<=$num_busca;$x++)

{

$campos=mysql_fetch_array($resultado);

?>

s = new slide();

s.src =  "admin/<?php=$campos['foto']?>";

s.link = "noticia.php?codigo_noticia=<?php=$campos['codigo']?>";

//s.title = "";

s.text = "<left><A ID=s_link HREF=noticia.php?codigo_noticia=<?php=$campos['codigo']?> target=_parent><font class=materia color=#003399><?php=$campos['titulo']?></font></a></left>";

//s.target = "";

//s.attr = "";

//s.filter = "";

//s.timeout = "";

ss.add_slide(s);

<?php

}

?>



for (var i=0; i < ss.slides.length; i++) {

  s = ss.slides[i];

  s.target = "ss_popup";

  s.attr = "toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=yes,width=800,height=800";

}

</SCRIPT>

<style type="text/css">

<!--

body {

	

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

a.l_tv:link{ color:#FFFFFF; text-decoration:none; font-weight:bold; font-family:Arial; font-size:10px; background-color:#999999; padding:0 5 2 5;}

a.l_tv:visited { color:#FFFFFF; text-decoration:none; font-weight:bold; font-family:Arial; font-size:10px; background-color:#999999; padding:0 5 2 5;}

a.l_tv:hover { color:#FFFFFF; text-decoration:none; font-weight:bold; font-family:Arial; font-size:10px; background-color:#999999; padding:0 5 2 5;} 

a.l_tv:active { color:#FFFFFF; text-decoration:none; font-weight:bold; font-family:Arial; font-size:10px; background-color:#999999; padding:0 5 2 5;}

.boldescuro{ font-family:tahoma;	font-size:11px;	color:#333333;	font-weight:bold; }



.style1 {font-size: 12px}

</style>

</HEAD>



<BODY ONLOAD="ss.restore_position('SS_POSITION');ss.update();ss.play()" ONUNLOAD="ss.save_position('SS_POSITION');">

<table cellpadding="0" cellspacing="0" width="100%" align="center"> 

<tr><td align="center" bordercolor="#CCCCCC" bgcolor="#DBDBDB" class="boldescuro">

<DIV ID="slideshow">



<FORM ID="ss_form" NAME="ss_form" ACTION="" METHOD="GET">



<DIV ID="ss_controls">
  <input type="hidden" ID="ss_select" NAME="ss_select">

</DIV>



<DIV ID="ss_img_div">



<IMG SRC="images/portalsentinela.PNG" ALT="Tv Notícias" NAME="ss_img" width="351" height="123" border="0" ID="ss_img" STYLE="width:180px;filter:progid:DXImageTransform.Microsoft.Fade();"><br>
</DIV>



<DIV ID="ss_text"></DIV>



</FORM>

<span class="style1"><A ID="ss_start" HREF="javascript:ss.next();ss.play()" class="l_tv">Iniciar</A> <A ID="ss_stop" HREF="javascript:ss.pause()" class="l_tv">Parar</A> <A ID="ss_view" HREF="javascript:ss.hotlink()" class="l_tv">Ver</A> <A ID="ss_prev" HREF="javascript:ss.previous()" class="l_tv">&laquo;</A> <A ID="ss_random" HREF="javascript:ss.goto_random_slide()" class="l_tv">random</A> <A ID="ss_next" HREF="javascript:ss.next()" class="l_tv">&raquo;</A></span></DIV>



<SCRIPT TYPE="text/javascript">

function config_ss_select() {

  var selectlist = document.ss_form.ss_select;

  selectlist.options.length = 0;

  for (var i = 0; i < ss.slides.length; i++) {

    selectlist.options[i] = new Option();

    selectlist.options[i].text = (i + 1) + '. ' + ss.slides[i].title;

  }

  selectlist.selectedIndex = ss.current;

}





ss.pre_update_hook = function() {

  return;

}



ss.post_update_hook = function() {

  document.ss_form.ss_select.selectedIndex = this.current;

  return;

}



if (document.images) {



  ss.image = document.images.ss_img;

  ss.textid = "ss_text";

  // Randomize the slideshow?

  // ss.shuffle();



  config_ss_select();

  ss.update();

  ss.play();

}

</SCRIPT> 

</td></tr></table>

</BODY>

</HTML>

