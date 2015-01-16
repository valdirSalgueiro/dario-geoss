
<?php
require 'header.php';

include_once("class.categoria.php");

$categoria = new categoria();

if($id){
	$categoria->select($id);
}

$mensagem="$modo".a;

?>
<div class="conteudo-principal">
    <fieldset>  
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Categoria <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="categoria">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $categoria->nome?>">
			                
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
