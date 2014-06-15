
<?php
require 'header.php';

include_once("class.galeria.php");
$galeria = new galeria();

if($id){
	$galeria->select($id);
}

$mensagem="$modo"."a";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="galeria">
			<span style="display:none" id="msg">Galeria <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Imagem <input type="file" name="imagem" class="form-control input-sm">
			                  
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
