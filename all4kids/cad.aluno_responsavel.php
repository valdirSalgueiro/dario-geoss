
<?php
require 'header.php';

include_once("class.aluno_responsavel.php");
$aluno_responsavel = new aluno_responsavel();

if($id){
	$aluno_responsavel->select($id);
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="aluno_responsavel">
			<span style="display:none" id="msg">Aluno responsavel <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
				<?php
				$checked=($aluno_responsavel->financeiro)?"checked":"";
				?>
				Financeiro <input type="checkbox" name="financeiro" value="1" <?php echo $checked ?>>
			    
					Financeiro <input type="text" name="financeiro" class=" form-control input-sm"  placeholder="Financeiro" value="<?php echo $aluno_responsavel->financeiro?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Tipo <input type="text" name="tipo" class=" form-control input-sm"  placeholder="Tipo" value="<?php echo $aluno_responsavel->tipo?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Nome <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno_responsavel->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Data nasc <input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data nasc" value="<?php echo $aluno_responsavel->data_nasc?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Cpf <input type="text" name="cpf" class=" form-control input-sm"  placeholder="Cpf" value="<?php echo $aluno_responsavel->cpf?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Rg <input type="text" name="rg" class=" form-control input-sm"  placeholder="Rg" value="<?php echo $aluno_responsavel->rg?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Orgao <input type="text" name="orgao" class=" form-control input-sm"  placeholder="Orgao" value="<?php echo $aluno_responsavel->orgao?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Uf <input type="text" name="uf" class=" form-control input-sm"  placeholder="Uf" value="<?php echo $aluno_responsavel->uf?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Local <input type="text" name="local" class=" form-control input-sm"  placeholder="Local" value="<?php echo $aluno_responsavel->local?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Endereco <input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno_responsavel->endereco?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Cargo <input type="text" name="cargo" class=" form-control input-sm"  placeholder="Cargo" value="<?php echo $aluno_responsavel->cargo?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Numero <input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $aluno_responsavel->numero?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Complemento <input type="text" name="complemento" class=" form-control input-sm"  placeholder="Complemento" value="<?php echo $aluno_responsavel->complemento?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Bairro <input type="text" name="bairro" class=" form-control input-sm"  placeholder="Bairro" value="<?php echo $aluno_responsavel->bairro?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Cidade <input type="text" name="cidade" class=" form-control input-sm"  placeholder="Cidade" value="<?php echo $aluno_responsavel->cidade?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Estado <input type="text" name="estado" class=" form-control input-sm"  placeholder="Estado" value="<?php echo $aluno_responsavel->estado?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Telefone comercial <input type="text" name="telefone_comercial" class=" form-control input-sm"  placeholder="Telefone comercial" value="<?php echo $aluno_responsavel->telefone_comercial?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Telefone residencial <input type="text" name="telefone_residencial" class=" form-control input-sm"  placeholder="Telefone residencial" value="<?php echo $aluno_responsavel->telefone_residencial?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Celular1 <input type="text" name="celular1" class=" form-control input-sm"  placeholder="Celular1" value="<?php echo $aluno_responsavel->celular1?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Celular2 <input type="text" name="celular2" class=" form-control input-sm"  placeholder="Celular2" value="<?php echo $aluno_responsavel->celular2?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Celular1 operadora <input type="text" name="celular1_operadora" class=" form-control input-sm"  placeholder="Celular1 operadora" value="<?php echo $aluno_responsavel->celular1_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Celular2 operadora <input type="text" name="celular2_operadora" class=" form-control input-sm"  placeholder="Celular2 operadora" value="<?php echo $aluno_responsavel->celular2_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Email <input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $aluno_responsavel->email?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Facebook <input type="text" name="facebook" class=" form-control input-sm"  placeholder="Facebook" value="<?php echo $aluno_responsavel->facebook?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Outro <input type="text" name="outro" class=" form-control input-sm"  placeholder="Outro" value="<?php echo $aluno_responsavel->outro?>">
			                
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
							$checked=($aluno_responsavel->idx_aluno==$row['id'])?"selected":"";
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
