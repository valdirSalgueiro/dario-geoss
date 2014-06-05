<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include "conn.php";


$mod_noticia = "update exame set tipo = '7'";

  $ok=mysql_query($mod_noticia,$conn);
  
  if($ok==1){
  
  echo "alterados.";
  }
  

?>
<body>
</body>
</html>
