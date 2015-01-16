
<?php
require 'header.php';

include_once("class.aluno_atividade.php");

$aluno_atividade = new aluno_atividade();

if($id){
	$aluno_atividade->select($id);
}

$mensagem="$modo".a;

?>
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno atividade <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="aluno_atividade">

	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_atividade">
					<option value="0">Selecione um Atividade</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM atividade
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_atividade->idx_atividade==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
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
							$checked=($aluno_atividade->idx_aluno==$row['id'])?"selected":"";
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
