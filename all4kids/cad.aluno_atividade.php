
<?php
require 'header.php';

include_once("class.aluno_atividade.php");

$aluno_atividade = new aluno_atividade();

if($id){
	$aluno_atividade->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Aluno atividade
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno atividade cadastrada com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="aluno_atividade">

	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_atividade_desconto">
					<option value="0">Selecione uma Atividade</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM atividade
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno_atividade->idx_atividade_desconto==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_aluno">
					<option value="0">Selecione uma Aluno</option>
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
          </div>
        </div>
      </div>
    </div>
	<?php
           require 'footer.php'
        ?>
