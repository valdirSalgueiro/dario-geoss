<?php
include "conn.php";
//Busca das últimas notícias
$busca_col="select * from noticias WHERE pais='".$_GET['lang']."' order by codigo_noticia desc limit 0,5;";
$res_busca_col=mysql_query($busca_col,$conn);
$campo_col=mysql_fetch_array($res_busca_col);


$busca_col2="select * from noticias WHERE ativado='0' order by codigo_noticia desc limit 0,1;";
$res_busca_col2=mysql_query($busca_col2,$conn);
$campo_col2=mysql_fetch_array($res_busca_col2);

$busca_col3="select * from noticias WHERE ativado='0' order by codigo_noticia desc limit 1,2;";
$res_busca_col3=mysql_query($busca_col3,$conn);
$campo_col3=mysql_fetch_array($res_busca_col3);

$busca_col4="select * from noticias WHERE ativado='0' order by codigo_noticia desc limit 2,3;";
$res_busca_col4=mysql_query($busca_col4,$conn);
$campo_col4=mysql_fetch_array($res_busca_col4);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Jan 1970 00:00:00 GMT">
<meta http-equiv="Cache-Control" content="no-store">
<meta http-equiv="Refresh" content="150">
<title>:: Portal Sentinela - O Vigilante da Amaz&ocirc;nia. ::</title>
<script language="javascript" type="text/javascript"><!--
var news = new Array(
[ "<?php echo $campo_col[nome_noticia];?>" , "noticia.php?lang=<?php echo $_GET['lang']; ?>&&codigo_noticia=<?php echo $campo_col[codigo_noticia]; ?>" ] ,
[ "<?php echo $campo_col2[nome_noticia];?>" , "noticia.php?lang=<?php echo $_GET['lang']; ?>&&codigo_noticia=<?php echo $campo_col2[codigo_noticia]; ?>" ] ,
[ "<?php echo $campo_col3[nome_noticia];?>" , "noticia.php?lang=<?php echo $_GET['lang']; ?>&&codigo_noticia=<?php echo $campo_col3[codigo_noticia]; ?>" ] ,
[ "<?php echo $campo_col4[nome_noticia];?>" , "noticia.php?lang=<?php echo $_GET['lang']; ?>&&codigo_noticia=<?php echo $campo_col4[codigo_noticia]; ?>" ] ,
[]
) ;
//--></script>

<!--/-->
<script language="javascript" type="text/javascript"><!--
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6 1m=s;6 l=17;6 L=18;6 5=0;6 7=0;6 19="B";6 1n=1a;6 j=s;6 e;6 c;6 o=1;6 1b=s;b O(){6 T=1c;1k(6 i=0;i<a.d-1;i++){6 t=a[i][0];t=t.F(/\\&1e;/G,\'"\');t=t.F(/\\&1f;/G,\'&\');t=t.F(/\\&#1g;/G,\'\\\'\');6 f=3.w(t);3.4(\'f\').y(f);6 I=3.4(\'f\').U;C(I>T){t=t.V(0,t.1h(\' \'));t+=\'...\';J(\'f\');6 f=3.w(t);3.4(\'f\').y(f);I=3.4(\'f\').U}J(\'f\');a[i][0]=t}}b J(r){8(3.4(r)){C(3.4(r).m!=H){q=3.4(r).m;3.4(r).K(q)}}}b 1j(){9.h("k()",l)}b W(){8(7==0){e=9.h("k()",a[7][0])}p{7=0;x(0)}}b M(){8(7==0){5==0?5=a.d-2:5--;D(0)}p{7=0;D(0)}}b N(){5--;8(5<0){5=a.d-2}o=a[5][0].d-7;c=9.h("k()",l)}b 1l(A){j=s;e=9.n(e);c=9.n(c);c=9.h(\'W()\',l)}b X(A){j=s;e=9.n(e);c=9.n(c);c=9.h(\'M()\',l)}b Y(A){j=!j;8(j){8(7==0&&e){9.n(e)}p{5>=a.d-2?5=0:5++;9.n(c);c=9.h("N()",l)}}p{8(7==0){x(0)}}}b k(){O();6 v;8(7==0){C(3.4(\'g\').m!=H){q=3.4(\'g\').m;3.4(\'g\').K(q)}}8(5<a.d+2&&a[5][0].d>=7){v=a[5];3.4(\'u\').E("Z",v[1]);8(5==0&&11(12)!="13"){3.4(\'u\').E("R","14");3.4(\'u\').S.P="#15"}p{3.4(\'u\').E("R","16");3.4(\'u\').S.P="#1d"}Q=v[0].V(7,7+o);7+=o;8(o>1){o=1}8(3.4(\'g\').m!=H){8(3.4(\'g\').m.1i=="B"){q=3.4(\'g\').m;3.4(\'g\').K(q)}}z=3.w(Q);3.4(\'g\').y(z);8(v[0].d>7){8(7%10!=0){z=3.w("B");3.4(\'g\').y(z)}}c=9.h("k()",l)}p{7=0;8(!j){x(L)}}}b x(t){5>=a.d-2?5=0:5++;e=9.h("k()",t)}b D(t){5==0?5=a.d-2:5--;e=9.h("k()",t)}',62,86,'|||document|getElementById|news_index|var|title_index|if|window|news|function|step_timeout_id|length|freeze_timeout_id|dummy|ticker|setTimeout||pause|roll_ticker|step_time|lastChild|clearTimeout|step_char_length|else|child|name|false||ticker_anchor|title|createTextNode|next_line|appendChild|txt|obj|_|while|prev_line|setAttribute|replace|gi|null|size|clear_element|removeChild|freeze_time|move_prev|fill_line|prepare|color|s_text|target|style|container_size|offsetWidth|substring|move_next|t_prev|t_pause|href||typeof|ticker_ad|undefined|_blank|0033cc|_parent|25|2000|end_title|70|foo|490|cc3300|quot|amp|039|lastIndexOf|nodeValue|begin_roll_ticker|for|t_next|ticker_layer|title_max_size'.split('|'),0,{}))
//--></script>
<style type="text/css"><!--
body { margin: 0; }
a { color: #cc3300; font-family: arial; font-size: 12px; font-weight: bold; text-decoration: none; }
a:hover { color: #cc3300; font-family: arial; font-size: 12px; font-weight: bold; text-decoration: underline; }
#tickerContent { margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0 0; background-color: #efefef; }
#tickerCell { width: 531px; height: 25px; line-height: 25px; padding-bottom: 10px; margin: 0; text-align: left; background-color: #efefef; }
#buttonsCell { width: 80px; height: 25px; line-height: 25px; padding-bottom: 5px; margin: 0; vertical-align: middle; text-align: right; background-color: #efefef; }
#buttonsCell img { vertical-align: middle; text-align: right; background-color: #efefef; padding-bottom: 7px; }
#dummy { color: #cc3300; font-family: arial; font-size: 12px; font-weight: bold; text-decoration: none; margin: 0; visibility: hidden;}
--></style>
</head>
<body onLoad="prepare();begin_roll_ticker();">
<table id="tickerContent">
<tr>
<td id="tickerCell">
<a href="ticker.shtml.htm#" id="ticker_anchor" target="_top" name="ticker_anchor"><span id="ticker"></span></a>
</td>
<td id="buttonsCell" valign="top">
<a href="javascript:t_prev(this);"><img src="images/btn-anterior.gif" width="18" height="18" valign="top" border="0" alt=""></a>
<a href="javascript:t_pause(this);"><img src="images/btn-play_pause.gif" width="18" height="18" valign="top" border="0" alt=""></a>
<a href="javascript:t_next(this);"><img src="images/btn-proximo.gif" width="18" height="18" valign="top" border="0" alt=""></a></td>
</tr>
</table>
<span id="dummy"></span>
</body>
</html>

