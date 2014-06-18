
<?php
require 'header.php';

include_once("class.agenda_conteudo.php");
$agenda_conteudo = new agenda_conteudo();

if($id){
	$agenda_conteudo->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="agenda_conteudo">
			<span style="display:none" id="msg">Agenda conteudo <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_agenda">
					<option value="0">Selecione um Agenda</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, dia
								FROM agenda
								ORDER BY dia";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($agenda_conteudo->idx_agenda==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['dia'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Hora <input type="text" name="hora" class=" form-control input-sm"  placeholder="Hora" value="<?php echo $agenda_conteudo->hora?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Conteudo <input type="text" name="conteudo" class=" form-control input-sm"  placeholder="Conteudo" value="<?php echo $agenda_conteudo->conteudo?>">
			                
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
