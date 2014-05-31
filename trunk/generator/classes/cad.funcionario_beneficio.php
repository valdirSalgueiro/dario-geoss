
<?php
require 'header.php';

include_once("class.funcionario_beneficio.php");

$funcionario_beneficio = new funcionario_beneficio();

if($id){
	$funcionario_beneficio->select($id);
}

$mensagem="$modo".o;

?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Funcionario beneficio
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcionario beneficio <?php echo $mensagem ?> com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="funcionario_beneficio">

	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_funcionario">
					<option value="0">Selecione uma Funcionario</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM funcionario
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($funcionario_beneficio->idx_funcionario==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_beneficio">
					<option value="0">Selecione uma Beneficio</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM beneficio
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($funcionario_beneficio->idx_beneficio==$row['id'])?"selected":"";
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
