<?php require_once('../Connections/conn.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE compromisso SET `data`=%s, hora=%s, titulo=%s, compromisso=%s, cor=%s WHERE id=%s",
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString($_POST['hora'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['ta'], "text"),
                       GetSQLValueString($_POST['cor'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "listar_eventos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rs_evento = "-1";
if (isset($_GET['id'])) {
  $colname_rs_evento = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conn, $conn);
$query_rs_evento = sprintf("SELECT * FROM compromisso WHERE id = %s", $colname_rs_evento);
$rs_evento = mysql_query($query_rs_evento, $conn) or die(mysql_error());
$row_rs_evento = mysql_fetch_assoc($rs_evento);
$totalRows_rs_evento = mysql_num_rows($rs_evento);

$data = $_GET['data'];
$data = addslashes($data);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Carlos Silva Jr</title>
<meta name="Keywords" content="">
<meta name="Description" content="">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow" />
<script type="text/javascript" src="palette.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="calendar-blue.css" title="win2k-cold-1" />
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-br.js"></script>
<script type="text/javascript" src="calendar-setup.js"></script>
<script type="text/javascript">
  _editor_url = "./";
  _editor_lang = "br";
</script>
<script type="text/javascript" src="htmlarea.js"></script>
<style type="text/css">
<!--
.style9 {font-family: verdana, sans-serif}
.style10 {
	color: #FFFFFF;
	font-family: verdana, sans-serif;
}

html, body {
  font-family: Verdana,sans-serif;
  background-color: #F2F2F2;
  color: #000;
}
a:link, a:visited { color: #00f; }
a:hover { color: #048; }
a:active { color: #f00; }

textarea { background-color: #fff; border: 1px solid 00f; }
-->
</style>
<script type="text/javascript">
var editor = null;
function initEditor() {
  editor = new HTMLArea("ta");

  // comment the following two lines to see how customization works
  editor.generate();
  return false;

  var cfg = editor.config; // this is the default configuration
  cfg.registerButton({
    id        : "my-hilite",
    tooltip   : "Highlight text",
    image     : "ed_custom.gif",
    textMode  : false,
    action    : function(editor) {
                  editor.surroundHTML("<span class=\"hilite\">", "</span>");
                },
    context   : 'table'
  });

  cfg.toolbar.push(["linebreak", "my-hilite"]); // add the new button to the toolbar

  // BEGIN: code that adds a custom button
  // uncomment it to test
  var cfg = editor.config; // this is the default configuration
  /*
  cfg.registerButton({
    id        : "my-hilite",
    tooltip   : "Highlight text",
    image     : "ed_custom.gif",
    textMode  : false,
    action    : function(editor) {
                  editor.surroundHTML("<span class=\"hilite\">", "</span>");
                }
  });
  */

function clickHandler(editor, buttonId) {
  switch (buttonId) {
    case "my-toc":
      editor.insertHTML("<h1>Table Of Contents</h1>");
      break;
    case "my-date":
      editor.insertHTML((new Date()).toString());
      break;
    case "my-bold":
      editor.execCommand("bold");
      editor.execCommand("italic");
      break;
    case "my-hilite":
      editor.surroundHTML("<span class=\"hilite\">", "</span>");
      break;
  }
};
cfg.registerButton("my-toc",  "Insert TOC", "ed_custom.gif", false, clickHandler);
cfg.registerButton("my-date", "Insert date/time", "ed_custom.gif", false, clickHandler);
cfg.registerButton("my-bold", "Toggle bold/italic", "ed_custom.gif", false, clickHandler);
cfg.registerButton("my-hilite", "Hilite selection", "ed_custom.gif", false, clickHandler);

cfg.registerButton("my-sample", "Class: sample", "ed_custom.gif", false,
  function(editor) {
    if (HTMLArea.is_ie) {
      editor.insertHTML("<span class=\"sample\">&nbsp;&nbsp;</span>");
      var r = editor._doc.selection.createRange();
      r.move("character", -2);
      r.moveEnd("character", 2);
      r.select();
    } else { // Gecko/W3C compliant
      var n = editor._doc.createElement("span");
      n.className = "sample";
      editor.insertNodeAtSelection(n);
      var sel = editor._iframe.contentWindow.getSelection();
      sel.removeAllRanges();
      var r = editor._doc.createRange();
      r.setStart(n, 0);
      r.setEnd(n, 0);
      sel.addRange(r);
    }
  }
);


  /*
  cfg.registerButton("my-hilite", "Highlight text", "ed_custom.gif", false,
    function(editor) {
      editor.surroundHTML('<span class="hilite">', '</span>');
    }
  );
  */
  cfg.pageStyle = "body { background-color: #efd; } .hilite { background-color: yellow; } "+
                  ".sample { color: green; font-family: monospace; }";
  cfg.toolbar.push(["linebreak", "my-toc", "my-date", "my-bold", "my-hilite", "my-sample"]); // add the new button to the toolbar
  // END: code that adds a custom button

  editor.generate();
}
function insertHTML() {
  var html = prompt("Enter some HTML code here");
  if (html) {
    editor.insertHTML(html);
  }
}
function highlight() {
  editor.surroundHTML('<span style="background-color: yellow">', '</span>');
}
</script>
</head>

<body onLoad="init();initEditor()">
<iframe width="150" height="115" name="palette" id="palette" src="palette.html" marginwidth="0" marginheight="0" scrolling="no" style="position:absolute;visibility:hidden;"></iframe>
<table width="452" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" background="../imgs/fundo_top.jpg"><div align="center" class="barra style10">
      <div align="justify"><strong>Cadastro de Evento </strong></div>
    </div></td>
  </tr>
  <tr>
    <td height="491" valign="top" background="../imgs/fundo.jpg"><form action="<?php echo $editFormAction; ?>" id="frmColour" name="form1" method="POST">
      <table width="92%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20"><span class="preto style9"><strong>Evento:</strong></span></td>
          <td><label>
            <input name="titulo" type="text" id="titulo" value="<?php echo $row_rs_evento['titulo']; ?>" size="40" />
            <input name="id" type="hidden" id="id" value="<?php echo $row_rs_evento['id']; ?>" />
          </label></td>
        </tr>
        <tr>
          <td height="20"><span class="preto style9"><strong>Data:</strong></span></td>
          <td width="233"><input name="data" class="caixaTexto" id="f_date_c" value="<?php echo $row_rs_evento['data']; ?>" size="9" maxlength="10" readonly="1" />
                      <img src="images/img.gif" name="f_trigger_c" width="20" height="14" id="f_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector"
      onmouseover="this.style.background='red';" onMouseOut="this.style.background=''" /> <font color="#333333" size="1" face="Verdana, Arial, Helvetica, sans-serif">&lt;- 
                        Clique</font>
                      <script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_c",     // id of the input field
        ifFormat       :    "%Y-%m-%d",    // format of the input field
        button         :    "f_trigger_c",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
                    </script>
          </td>
        </tr>
        <tr>
          <td width="14%" height="20"><span class="preto style9"><strong>Hora:</strong></span></td>
          <td width="86%" class="style7"><input name="hora" type="text" id="hora" value="<?php echo $row_rs_evento['hora']; ?>" size="30" /></td>
        </tr>
        <tr>
          <td height="20"><span class="preto style9"><strong>Cor:</strong></span></td>
          <td class="style8">
		  
		  <table width="100" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="16%">
			  
      <input readonly type="text" name="cor" value="<?php echo $row_rs_evento['cor']; ?>" id="txtHexa" size=6 style="width:47px;font-size: 12px">
    
			  </td>
              <td width="84%"><a href="javascript:void(0)" id='bgColorPreview' onClick="showPalette(this,'document.body.style.color')"><img src="../imgs/spacer.gif" alt="" width="20" height="20"  border="0"></a></td>
            </tr>
          </table>
		  
		  
		  </td>
        </tr>
        <tr>
          <td height="20"><span class="preto style9"><strong>Texto:</strong></span></td>
          <td><textarea id="ta" name="ta" style="width:99%; border-style: solid; border-width: 1" rows="20" cols="50"><?php echo $row_rs_evento['compromisso']; ?></textarea>
                          <input type="submit" name="ok" value="Editar" />
                          <input type="button" name="ins" value="  insert html  " onClick="return insertHTML();" />
                        <input type="button" name="hil" value="  highlight text  " onClick="return highlight();" /></td>
</tr>
        <tr>
          <td height="20" colspan="2" class="style8">&nbsp;</td>
</tr>
      </table>
        
      <input type="hidden" name="MM_update" value="form1">
    </form>
    </td>
  </tr>
  <tr>
    <td height="1"><img src="../imgs/fundo_button.jpg" width="669" height="9" /></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rs_evento);
?>