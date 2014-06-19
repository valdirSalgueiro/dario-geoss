<?php
require 'header.php';

include_once("class.noticiaspartido.php");
$noticiaspartido = new noticiaspartido();

if($id){
	$noticiaspartido->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="noticiaspartido">
			<span style="display:none" id="msg">Noticiaspartido <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Data <input type="text" name="data" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data" value="<?php echo $noticiaspartido->data?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Titulo <textarea  type="text" name="titulo" class="ckeditor" cols="80" rows="10"><?php echo $noticiaspartido->titulo?></textarea>
			                
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
