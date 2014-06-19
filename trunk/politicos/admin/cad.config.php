<?php
require 'header.php';

include_once("class.config.php");
$config = new config();

if($id){
	$config->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="config">
			<span style="display:none" id="msg">Config <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Logomarca <input type="file" name="logomarca" class="form-control input-sm">
			                  
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Full banner <input type="file" name="full_banner" class="form-control input-sm">
			                  
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
