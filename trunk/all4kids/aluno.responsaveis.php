<div class="form-group col-md-12" style="text-align: left">
	<h4>Dados do Responsavel 01</h4>
</div>

<form role="form"  action="dao.php" method="post" enctype="multipart/form-data"  onSubmit="return ajaxSubmit(this,'Responsavel cadastrado com sucesso');">
			<input type="hidden" name="idx_aluno" value="<?php echo $id?>"> 
			<input type="hidden" name="id" value="<?php echo $aluno_responsavel1->id?>"> 
			<input type="hidden" name="type" value="aluno_responsavel">
			<span style="display:none" id="msg">Responsavel cadastrado com sucesso</span>			

		
		  <div class="form-group col-md-6" style="text-align: left">	
			<input type="radio" name="tipo" value="0"  <?php if (!$aluno_responsavel1->tipo): ?>checked='checked'<?php endif; ?> onclick="$(outro).hide()"/> Mae
			<input type="radio" name="tipo" value="1"   <?php if ($aluno_responsavel1->tipo): ?>checked='checked'<?php endif; ?> onclick="$(outro).hide()" /> Pai
			<input type="radio" name="tipo" value="2"   <?php if ($aluno_responsavel1->tipo==2): ?>checked='checked'<?php endif; ?> onclick="$(outro).show()"/> Outro (Especificar)
			<input type="text" name="outro" id="outro" style="display:none" class=" form-control input-sm"  placeholder="Especifique" value="<?php echo $aluno_responsavel1->outro?>">
		  </div>
	
	<div class="form-group col-md-6" style="text-align: left">
		<br><br><br>
	</div>
	
	<div class="form-group col-md-6" style="text-align: left">
					Nome <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno_responsavel1->nome?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Data nasc <input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data nasc" value="<?php echo $aluno_responsavel1->data_nasc?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					CPF <input type="text" name="cpf" class=" form-control input-sm"  placeholder="Cpf" value="<?php echo $aluno_responsavel1->cpf?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					RG <input type="text" name="rg" class=" form-control input-sm"  placeholder="Rg" value="<?php echo $aluno_responsavel1->rg?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Orgao <input type="text" name="orgao" class=" form-control input-sm"  placeholder="Orgao" value="<?php echo $aluno_responsavel1->orgao?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					UF <input type="text" name="uf" class=" form-control input-sm"  placeholder="Uf" value="<?php echo $aluno_responsavel1->uf?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Local de trabalho <input type="text" name="local" class=" form-control input-sm"  placeholder="Local" value="<?php echo $aluno_responsavel1->local?>">
			                
		</div>
			
	<div class="form-group col-md-6" style="text-align: left">
					Cargo <input type="text" name="cargo" class=" form-control input-sm"  placeholder="Cargo" value="<?php echo $aluno_responsavel1->cargo?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Endereco <input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno_responsavel1->endereco?>">
			                
		</div>

		
	<div class="form-group col-md-6" style="text-align: left">
					Numero <input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $aluno_responsavel1->numero?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Complemento <input type="text" name="complemento" class=" form-control input-sm"  placeholder="Complemento" value="<?php echo $aluno_responsavel1->complemento?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Bairro <input type="text" name="bairro" class=" form-control input-sm"  placeholder="Bairro" value="<?php echo $aluno_responsavel1->bairro?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Cidade <input type="text" name="cidade" class=" form-control input-sm"  placeholder="Cidade" value="<?php echo $aluno_responsavel1->cidade?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Estado <input type="text" name="estado" class=" form-control input-sm"  placeholder="Estado" value="<?php echo $aluno_responsavel1->estado?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Telefone comercial <input type="text" name="telefone_comercial" class=" form-control input-sm"  placeholder="Telefone comercial" value="<?php echo $aluno_responsavel1->telefone_comercial?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Telefone residencial <input type="text" name="telefone_residencial" class=" form-control input-sm"  placeholder="Telefone residencial" value="<?php echo $aluno_responsavel1->telefone_residencial?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Celular (1) <input type="text" name="celular1" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $aluno_responsavel1->celular1?>">
			                
		</div>
			<div class="form-group col-md-6" style="text-align: left">
					Operadora <input type="text" name="celular1_operadora" class=" form-control input-sm"  placeholder="Operadora" value="<?php echo $aluno_responsavel1->celular1_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Celular (2) <input type="text" name="celular2" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $aluno_responsavel1->celular2?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Operadora <input type="text" name="celular2_operadora" class=" form-control input-sm"  placeholder="Operadora" value="<?php echo $aluno_responsavel1->celular2_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Email <input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $aluno_responsavel1->email?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Facebook <input type="text" name="facebook" class=" form-control input-sm"  placeholder="Facebook" value="<?php echo $aluno_responsavel1->facebook?>">
			                
		</div>
							  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>
					

	<div style="border-top: 1px solid #ddd;" class="form-group col-md-12">
		<br>
		<h4>Dados do Responsavel 02</h4>						
	</div>
					
	<form role="form"  action="dao.php" method="post" enctype="multipart/form-data"  onSubmit="return ajaxSubmit(this,'Responsavel cadastrado com sucesso');">
			<input type="hidden" name="idx_aluno" value="<?php echo $id?>"> 
			<input type="hidden" name="id" value="<?php echo $id_responsavel_2?>"> 
			<input type="hidden" name="type" value="aluno_responsavel">
			<span style="display:none" id="msg">Responsavel Fincanceiro cadastrado com sucesso</span>			

		
		  <div class="form-group col-md-6" style="text-align: left:margin-bottom:-10px">	
			<input type="radio" name="tipo" value="0"  <?php if (!$aluno_responsavel2->tipo): ?>checked='checked'<?php endif; ?> onclick="$(outro).hide()"/> Mae
			<input type="radio" name="tipo" value="1"   <?php if ($aluno_responsavel2->tipo): ?>checked='checked'<?php endif; ?> onclick="$(outro).hide()" /> Pai
			<input type="radio" name="tipo" value="2"   <?php if ($aluno_responsavel2->tipo==2): ?>checked='checked'<?php endif; ?> onclick="$(outro).show()"/> Outro (Especificar)
			<input type="text" name="outro" id="outro" style="display:none" class=" form-control input-sm"  placeholder="Especifique" value="<?php echo $aluno_responsavel2->outro?>">
		  </div>
	
	<div class="form-group col-md-6" style="text-align: left">
		<br><br><br>
	</div>
	
	<div class="form-group col-md-6" style="text-align: left">
					Nome <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno_responsavel2->nome?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Data nasc <input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data nasc" value="<?php echo $aluno_responsavel2->data_nasc?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					CPF <input type="text" name="cpf" class=" form-control input-sm"  placeholder="Cpf" value="<?php echo $aluno_responsavel2->cpf?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					RG <input type="text" name="rg" class=" form-control input-sm"  placeholder="Rg" value="<?php echo $aluno_responsavel2->rg?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Orgao <input type="text" name="orgao" class=" form-control input-sm"  placeholder="Orgao" value="<?php echo $aluno_responsavel2->orgao?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					UF <input type="text" name="uf" class=" form-control input-sm"  placeholder="Uf" value="<?php echo $aluno_responsavel2->uf?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Local de trabalho <input type="text" name="local" class=" form-control input-sm"  placeholder="Local" value="<?php echo $aluno_responsavel2->local?>">
			                
		</div>
			
	<div class="form-group col-md-6" style="text-align: left">
					Cargo <input type="text" name="cargo" class=" form-control input-sm"  placeholder="Cargo" value="<?php echo $aluno_responsavel2->cargo?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Endereco <input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno_responsavel2->endereco?>">
			                
		</div>

		
	<div class="form-group col-md-6" style="text-align: left">
					Numero <input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $aluno_responsavel2->numero?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Complemento <input type="text" name="complemento" class=" form-control input-sm"  placeholder="Complemento" value="<?php echo $aluno_responsavel2->complemento?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Bairro <input type="text" name="bairro" class=" form-control input-sm"  placeholder="Bairro" value="<?php echo $aluno_responsavel2->bairro?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Cidade <input type="text" name="cidade" class=" form-control input-sm"  placeholder="Cidade" value="<?php echo $aluno_responsavel2->cidade?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Estado <input type="text" name="estado" class=" form-control input-sm"  placeholder="Estado" value="<?php echo $aluno_responsavel2->estado?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Telefone comercial <input type="text" name="telefone_comercial" class=" form-control input-sm"  placeholder="Telefone comercial" value="<?php echo $aluno_responsavel2->telefone_comercial?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Telefone residencial <input type="text" name="telefone_residencial" class=" form-control input-sm"  placeholder="Telefone residencial" value="<?php echo $aluno_responsavel2->telefone_residencial?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Celular (1) <input type="text" name="celular1" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $aluno_responsavel2->celular1?>">
			                
		</div>
			<div class="form-group col-md-6" style="text-align: left">
					Operadora <input type="text" name="celular1_operadora" class=" form-control input-sm"  placeholder="Operadora" value="<?php echo $aluno_responsavel2->celular1_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Celular (2) <input type="text" name="celular2" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $aluno_responsavel2->celular2?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Operadora <input type="text" name="celular2_operadora" class=" form-control input-sm"  placeholder="Operadora" value="<?php echo $aluno_responsavel2->celular2_operadora?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Email <input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $aluno_responsavel2->email?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
					Facebook <input type="text" name="facebook" class=" form-control input-sm"  placeholder="Facebook" value="<?php echo $aluno_responsavel2->facebook?>">
			                
		</div>
							  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>