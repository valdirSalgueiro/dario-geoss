
<?php
require 'header.php';

include_once("class.usuario.php");
$usuario = new usuario();

if($id){
	$usuario->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="usuario">
			<span style="display:none" id="msg">Usuario <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Nivel <input type="text" name="nivel" class=" form-control input-sm"  placeholder="Nivel" value="<?php echo $usuario->nivel?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Email <input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $usuario->email?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Senha <input type="text" name="senha" class=" form-control input-sm"  placeholder="Senha" value="<?php echo $usuario->senha?>">
			                
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
