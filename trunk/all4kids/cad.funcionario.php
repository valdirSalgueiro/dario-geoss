
<?php
require 'header.php';

include_once("class.funcionario.php");

$funcionario = new funcionario();

if($id){
	$funcionario->select($id);
}

$mensagem="$modo".o;

?>
<div class="conteudo-principal">
    <fieldset>   
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcionario <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="funcionario">

	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $funcionario->nome?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="cpf" class=" form-control input-sm"  placeholder="Cpf" value="<?php echo $funcionario->cpf?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="rg" class=" form-control input-sm"  placeholder="Rg" value="<?php echo $funcionario->rg?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="titulo" class=" form-control input-sm"  placeholder="Titulo" value="<?php echo $funcionario->titulo?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $funcionario->endereco?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="telefone" class=" form-control input-sm"  placeholder="Telefone" value="<?php echo $funcionario->telefone?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="remuneracao" class=" form-control input-sm"  placeholder="Remuneracao" value="<?php echo $funcionario->remuneracao?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
			  <select class="form-control input-sm" name="idx_funcao">
					<option value="0">Selecione um Funcao</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM funcao
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($funcionario->idx_funcao==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
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
