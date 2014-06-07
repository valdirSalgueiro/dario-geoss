
<?php
require 'header.php';

include_once("class.intervalo.php");

$intervalo = new intervalo();

if($id){
	$intervalo->select($id);
}

$mensagem="$modo".o;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: auto%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Intervalo
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Intervalo <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="intervalo">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="descricao" class=" form-control input-sm"  placeholder="Descricao" value="<?php echo $intervalo->descricao?>">
			                
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
