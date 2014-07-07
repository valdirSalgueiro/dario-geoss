<?php
require 'header.php';

include_once("class.produto.php");
$produto = new produto();

if($id){
	$produto->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="produto">
			<span style="display:none" id="msg">Produto <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Codigo <input type="text" name="codigo" class=" form-control input-sm"  placeholder="Codigo" value="<?php echo $produto->codigo?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Nome <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $produto->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Quantidade <input type="text" name="quantidade" class=" form-control input-sm"  placeholder="Quantidade" value="<?php echo $produto->quantidade?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Quantidade Minima <input type="text" name="quantidadeMinima" class=" form-control input-sm"  placeholder="Quantidade Minima" value="<?php echo $produto->quantidadeMinima?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Valor <input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $produto->valor?>">
			                
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
