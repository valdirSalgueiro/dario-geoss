<?php
require 'header.php';

include_once("class.downloads.php");
$downloads = new downloads();

if($id){
	$downloads->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="downloads">
			<span style="display:none" id="msg">Downloads <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Arquivo <input type="file" name="arquivo" class="form-control input-sm">
			                  
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Descricao <input type="text" name="descricao" class=" form-control input-sm"  placeholder="Descricao" value="<?php echo $downloads->descricao?>">
			                
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
