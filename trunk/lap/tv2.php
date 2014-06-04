<script>
function checkBrowserForVersion4(){

var x=navigator.appVersion;y=x.substring(0,4);if(y>=4)strobeEffect();}

var isNav=(navigator.appName.indexOf("Netscape")!=-1);

var colors=new Array("FFFFFF","FFFFFF","FFFFFF","FFFFFF","FFFFFF","FFFFFF","FFFFFF","F9F9F9","F1F1F1","E9E9E9","E1E1E1","D9D9D9","D1D1D1","C9C9C9","C1C1C1","B9B9B9","B1B1B1","A9A9A9","A1A1A1","999999","919191","898989","818181","797979","717171","696969","616161","595959","515151","494949","414141","393939","313131","292929","212121","191919","111111","090909","000000")

a=0,b=1

function strobeEffect(){

// Inserir o texto aqui

color=colors[a];

aa="<font color="+color+">PLANOS</font>"

if(isNav) {document.object1.document.write(aa);document.object1.document.close();}

else object1.innerHTML=aa

a+=b;if (a==38) b-=2;if (a==0) b+=2;xx=setTimeout("strobeEffect()",10);}

</script>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Videos Sentinela</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
	background-color: #333333;
}
.style48 {color: #CCCCCC;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
<script src="http://www.fifabr.com.br/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="http://www.fifabr.com.br/botoes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style49 {font-size: 12px}
.style50 {color: #CCCCCC}
.style1 {font-size: 16px}
-->
</style>
</head>
<script language="javascript">
function abrir(pagina,nome,caracteristicas) {
	window.open(pagina,nome,caracteristicas);
	
}

</script>
<body>
<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" background="http://www.fifabr.com.br/bg/bg_tv.jpg">
  <tr>
    <td width="181" height="600">&nbsp;</td>
    <td width="605" valign="top"><br />
        <table width="447" height="404" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="447" height="404" background="http://www.fifabr.com.br/fifbr/imgs/bg_fifa.jpg"><div align="center">
          <iframe src="webtv.html" name="Pagina" width="408" marginwidth="0" height="308" marginheight="0" align="center" scrolling="No" id="Pagina"></iframe>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

