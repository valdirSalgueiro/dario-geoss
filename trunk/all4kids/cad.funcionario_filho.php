
<?php
require 'header.php';

include_once("class.funcionario_filho.php");

$funcionario_filho = new funcionario_filho();

if($id){
	$funcionario_filho->select($id);
}
?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Funcionario filho
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcionario filho cadastrado com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="funcionario_filho">

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
							$checked=($funcionario_filho->idx_funcionario==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_filho">
					<option value="0">Selecione uma Filho</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM filho
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($funcionario_filho->idx_filho==$row['id'])?"selected":"";
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
