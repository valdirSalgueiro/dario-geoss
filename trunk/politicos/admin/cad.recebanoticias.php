
<?php
require 'header.php';

include_once("class.recebanoticias.php");
$recebanoticias = new recebanoticias();

if($id){
	$recebanoticias->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="recebanoticias">
			<span style="display:none" id="msg">Recebanoticias <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Email <input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $recebanoticias->email?>">
			                
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
