
<?php
require 'header.php';

include_once("class.conta.php");

$conta = new conta();

if($id){
	$conta->select($id);
}

$mensagem="$modo".a;
?>		

<div class="conteudo-principal">
    <fieldset> 
							<?php include_once("form.contapagar.php");?>
							&nbsp;
    </fieldset>
</div>

<?php
    require 'footer.php'
?>
