
<?php
require 'header.php';

include_once("class.telefone.php");

$telefone = new telefone();

if($id){
	$telefone->select($id);
}

$mensagem="$modo".a;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: 67%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Telefone
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Telefone <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="telefone">

	<div class="form-group col-md-12">
							<input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $telefone->numero?>">
			                
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</section>
	<?php
           require 'footer.php'
        ?>
