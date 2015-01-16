
<?php
require 'header.php';

include_once("class.aluno_servico.php");

$aluno_servico = new aluno_servico();

if($id){
	$aluno_servico->select($id);
}

$mensagem="$modo".o;

?>

							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno servico <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="aluno_servico">

	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_aluno">
					<option value="0">Selecione um Aluno</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM aluno
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_servico->idx_aluno==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_servico">
					<option value="0">Selecione um Servico</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM servico
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_servico->idx_servico==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>

	<?php
           require 'footer.php'
        ?>
