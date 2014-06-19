<?php
require 'header.php';

include_once("class.config.php");
$config = new config();

if($id){
	$config->select($id);
}

$mensagem="$modo"."";

?>
<?php
          require 'footer.php'
?>
