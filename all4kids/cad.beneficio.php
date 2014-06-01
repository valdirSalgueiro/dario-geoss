
<?php
require 'header.php';

include_once("class.beneficio.php");

$beneficio = new beneficio();

if($id){
	$beneficio->select($id);
}

$mensagem="$modo".o;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: 67%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Beneficio
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Beneficio <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="beneficio">

	<div class="form-group col-md-12">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $beneficio->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12">
							<input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $beneficio->valor?>">
			                
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
