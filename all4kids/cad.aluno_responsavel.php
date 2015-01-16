
<?php
require 'header.php';

include_once("class.aluno_responsavel.php");
$aluno_responsavel = new aluno_responsavel();

if($id){
	$aluno_responsavel->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			
					</fieldset>
				  </div>

	<?php
           require 'footer.php'
    ?>
