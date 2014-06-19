<?php
require 'header.php';

include_once("class.agenda.php");
$agenda = new agenda();

if($id){
	$agenda->select($id);
}

$mensagem="$modo"."a";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="agenda">
			<span style="display:none" id="msg">Agenda <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
					Dia <input type="text" name="dia" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Dia" value="<?php echo $agenda->dia?>">
			                
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
