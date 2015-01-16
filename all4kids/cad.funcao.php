
<?php
require 'header.php';

include_once("class.funcao.php");

$funcao = new funcao();

if($id){
	$funcao->select($id);
}

$mensagem="$modo".o;

?>

							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcao <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="funcao">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $funcao->nome?>">
			                
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>

	<?php
           require 'footer.php'
        ?>
