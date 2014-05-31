
<?php
require 'header.php';

include_once("class.aluno_atividade_desconto.php");

$aluno_atividade_desconto = new aluno_atividade_desconto();

if($id){
	$aluno_atividade_desconto->select($id);
}

$mensagem="$modo".o;

?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Aluno atividade desconto
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno atividade desconto <?php echo $mensagem ?> com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="aluno_atividade_desconto">

	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_atividade_desconto">
					<option value="0">Selecione um Atividade</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM atividade_desconto
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_atividade_desconto->idx_atividade_desconto==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_aluno">
					<option value="0">Selecione um Aluno</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM aluno
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_atividade_desconto->idx_aluno==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
			  <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
              </div>	
            </form>
          </div>
        </div>
      </div>
    </div>
	<?php
           require 'footer.php'
        ?>
