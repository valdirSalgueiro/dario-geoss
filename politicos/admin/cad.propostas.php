<?php
require 'header.php';

include_once("class.propostas.php");
$propostas = new propostas();

if($id){
	$propostas->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="propostas">
			<span style="display:none" id="msg">Propostas <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Titulo <input type="text" name="titulo" class=" form-control input-sm"  placeholder="Titulo" value="<?php echo $propostas->titulo?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Conteudo <textarea  type="text" name="conteudo" class="ckeditor" cols="80" rows="10"><?php echo $propostas->conteudo?></textarea>
			                
		</div>
							  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>
					</fieldset>
				  </div>

	<?php
           require 'footer.php'
    ?>
