<?php
require 'header.php';

include_once("class.atividade.php");
include_once("class.dia.php");
include_once("class.horario.php");

$atividade = new atividade();
$dia = new dia();
$horario = new horario();

if($id){
	$atividade->select($id);
	$db = Database::getConnection();
	$sql = "SELECT * FROM `dia_horario_atividade` WHERE idx_atividade=$id";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$dia->select($row[idx_dia]);
		$horario->select($row[idx_horario]);
		$dia_[]=$dia->nome;
		$horario_[]=$horario->horario;
	}		
}

$mensagem="$modo".a;
?>

<script type="text/javascript">
$(function() {	
	// Fullexample
	$( ".horario").tagedit({
		autocompleteURL: 'horario.php',
	});
});
$(function() {	
	// Fullexample
	$( ".dia").tagedit({
		autocompleteURL: 'dia.php',
	});
});
</script>

<div class="conteudo-principal">
    <fieldset>  
						<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Atividade <?php echo $mensagem ?> com sucesso');">
						<input type="hidden" name="id" value="<?php echo $id?>"> 
						<input type="hidden" name="type" value="atividade">

						<div class="form-group col-md-12" style="text-align: left">
							Nome:
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $atividade->nome?>">											
						</div>
		
					    <div class="form-group col-md-12" style="text-align: left">
							Vagas:
							<input type="text" name="vagas" class=" form-control input-sm"  placeholder="Vagas" value="<?php echo $atividade->vagas?>">								
					   </div>
					   
					   	<div class="form-group col-md-12" style="text-align: left">
							Valor:
							<input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $atividade->valor?>">
						</div>		
					
					   	<div class="form-group col-md-12" style="text-align: left">
							Dia:
							<?php
							if(count($dia_)>0) 	
								foreach($dia_ as $dia__)
							?>
									<input type="text" name="dia[]"   class="tag dia form-control input-sm"  placeholder="Dia" value="<?php echo $dia__?>">
							<?
								;
							?>
						</div>	
							
						<div class="form-group col-md-12" style="text-align: left">
							Horario:
							<?php
							if(count($horario_)>0) 	
								foreach($horario_ as $horario__)
							?>
							<input type="text" name="horario[]" class="tag horario form-control input-sm"  placeholder="Horario" value="<?php echo $horario__?>">
							<?
								;
							?>
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
