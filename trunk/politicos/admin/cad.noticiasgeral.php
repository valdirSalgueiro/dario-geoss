<?php
require 'header.php';

include_once("class.noticiasgeral.php");
$noticiasgeral = new noticiasgeral();

if($id){
	$noticiasgeral->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="noticiasgeral">
			<span style="display:none" id="msg">Noticiasgeral <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Titulo <input type="text" name="titulo" class=" form-control input-sm"  placeholder="Titulo" value="<?php echo $noticiasgeral->titulo?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Chamada <textarea  type="text" name="chamada" class="ckeditor" cols="80" rows="10"><?php echo $noticiasgeral->chamada?></textarea>
			                
		</div>
		
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
