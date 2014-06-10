
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
  <div class="iconGroup cliente">
    <fieldset class="groupFields open">    
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Funcionario <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="funcionario">

		<div class="form-group col-md-6">
			<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $funcionario->nome?>" required>
		</div>
		
		<div class="form-group col-md-6">
			<input type="text" name="telefone" class=" form-control input-sm"  placeholder="Telefone" value="<?php echo $funcionario->telefone?>" required>
		</div>	

		<div class="form-group col-md-6">
			<input type="text" name="remuneracao" class=" form-control input-sm"  placeholder="Remuneracao" value="<?php echo $funcionario->remuneracao?>" required>			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="contatotelefone" class=" form-control input-sm"  placeholder="Contatotelefone" value="<?php echo $funcionario->contatotelefone?>">
			                
		</div>	

	<div class="form-group col-md-6">
							<input type="text" name="contatoendereco" class=" form-control input-sm"  placeholder="Contatoendereco" value="<?php echo $funcionario->contatoendereco?>">
			                
		</div>		
		
		
	<div class="form-group col-md-12" style="text-align: left">
		<a href="#" class="theme-hidefields-label" onclick="$(opcionais).toggle();"> Exibir mais campos (opcionais) </a>
	</div>	
	
	<div id="opcionais" style="display:none">	
	
		<div class="form-group col-md-6">
							<input type="text" name="cpf" class=" form-control input-sm"  placeholder="Cpf" value="<?php echo $funcionario->cpf?>">
			                
		</div>	
		
	<div class="form-group col-md-6">
							<input type="text" name="rg" class=" form-control input-sm"  placeholder="Rg" value="<?php echo $funcionario->rg?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="titulo" class=" form-control input-sm"  placeholder="Titulo" value="<?php echo $funcionario->titulo?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $funcionario->endereco?>">
			                
		</div>

		
	<div class="form-group col-md-6">
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
		
          <div class="form-group col-md-6" style="text-align: left">
            <input type="hidden" id="foto" name="<?php echo $aluno->foto?>">
              Foto: <input type="file" />
          </div>
		  
		  
		         <div class="form-group col-md-6" style="text-align: left">
            <?php
				$checked=($funcionario->planosaude)?"checked":"";
				?>
            Possui Plano de Saúde? <input type="checkbox" name="planosaude" value="1" <?php echo $checked ?>>

          </div>
		  
	<div class="form-group col-md-6">
							<input type="text" name="nomeplano" class=" form-control input-sm"  placeholder="Nomeplano" value="<?php echo $funcionario->nomeplano?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="contatonome" class=" form-control input-sm"  placeholder="Contatonome" value="<?php echo $funcionario->contatonome?>">
			                
		</div>		

		
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>
				  </fieldset>
				</div>
			  </div>

	</section>
	<?php
           require 'footer.php'
        ?>
