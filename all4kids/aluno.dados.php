		<form role="form" enctype="multipart/form-data" action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno <?php echo $mensagem ?> com sucesso');">
		<input type="hidden" name="id" value="<?php echo $id?>">
		<input type="hidden" name="type" value="aluno">
		
		<div class="form-group col-md-6" style="text-align: left">
			Nome:  
            <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno->nome?>">
          </div>  		  
		  
		  <div class="form-group col-md-3" style="text-align: left">
			Data Nascimento:
            <input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data Nascimento" value="<?php echo $aluno->data_nasc?>" >			
          </div>	
		  <div class="form-group col-md-3" style="text-align: left">	
			Idade:
			<input type="text" class="idade form-control input-sm" >
		  </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">	
			Sexo:
			<input type="radio" name="radio" value="0"  <?php if (!$aluno->sexo): ?>checked='checked'<?php endif; ?> /> Masculino
			<input type="radio" name="radio" value="1"   <?php if ($aluno->sexo): ?>checked='checked'<?php endif; ?> /> Feminino
		  </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Naturalidade:  
            <input type="text" name="naturalidade" class=" form-control input-sm"  placeholder="Naturalidade" value="<?php echo $aluno->naturalidade?>">
          </div>  			  
		  
		  <div class="form-group col-md-6" style="text-align: left">
			UF:  
            <input type="text" name="uf" class=" form-control input-sm"  placeholder="UF" value="<?php echo $aluno->uf?>">
          </div>  			  		  
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Pais:  
            <input type="text" name="pais" class=" form-control input-sm"  placeholder="Pais" value="<?php echo $aluno->pais?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Endereco:  
            <input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno->endereco?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Numero:  
            <input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $aluno->numero?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Complemento:  
            <input type="text" name="complemento" class=" form-control input-sm"  placeholder="Complemento" value="<?php echo $aluno->complemento?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Bairro:  
            <input type="text" name="bairro" class=" form-control input-sm"  placeholder="Bairro" value="<?php echo $aluno->bairro?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Cidade:  
            <input type="text" name="cidade" class=" form-control input-sm"  placeholder="Cidade" value="<?php echo $aluno->cidade?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Estado:  
            <input type="text" name="estado" class=" form-control input-sm"  placeholder="Estado" value="<?php echo $aluno->estado?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			CEP:  
            <input type="text" name="cep" class="form-control input-sm"  placeholder="CEP" value="<?php echo $aluno->cep?>">
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">			
			Reside com: <br>
			Pais <input type="checkbox" name="reside[]" value="Pais"> 
			Mae <input type="checkbox" name="reside[]" value="Mae"> 
			Pai <input type="checkbox" name="reside[]" value="Pai"> 			
			<br>
			Outros <input type="text" name="reside_outros" value="<?php echo $aluno->reside_outros?>">             			
          </div>
		  
		  <div class="form-group col-md-6" style="text-align: left">
			Nome mae
            <input type="text" name="nome_mae" class=" form-control input-sm"  placeholder="Nome mae" value="<?php echo $aluno->nome_mae?>">
          </div>

          <div class="form-group col-md-6" style="text-align: left">
			Nome Pai
            <input type="text" name="nome_pai" class=" form-control input-sm"  placeholder="Nome pai" value="<?php echo $aluno->nome_pai?>">
          </div>
		  
		  <div class="form-group col-md-12" style="text-align: left">
			Escola
            <input type="text" name="escola" class=" form-control input-sm"  placeholder="Escola" value="<?php echo $aluno->escola?>">
          </div>  
		  
		  <div class="form-group col-md-12" style="text-align: left">
			Alergia
            <input type="text" name="alergia" class=" form-control input-sm"  placeholder="Alergia" value="<?php echo $aluno->alergia?>">
          </div>

		  <div class="form-group col-md-12" style="text-align: left">
			Restricoes Alimentares
            <input type="text" name="restricao_alimentar" class=" form-control input-sm"  placeholder="Restricoes Alimentares" value="<?php echo $aluno->restricao_alimentar?>">
          </div> 		  
		  
		  <div class="form-group col-md-12" style="text-align: left">
			Em caso de emergencia ligar para:
            <input type="text" name="emergencia" class=" form-control input-sm"  placeholder="Emergencia" value="<?php echo $aluno->emergencia?>">
          </div> 
		  
		  <div class="form-group col-md-12" style="text-align: left">
			Pessoas autorizadas a me retirar
            <input type="text" name="pessoas_autorizadas" class=" form-control input-sm"  placeholder="Pessoas" value="<?php echo $aluno->pessoas_autorizadas?>">
          </div> 
		  
		  <div class="form-group col-md-12" style="text-align: left">
			Observacoes
            <textarea name="observacoes" class="form-control input-sm"  placeholder="Observacoes"><?php echo $aluno->observacoes?></textarea>
          </div> 
		  
		  <div class="form-group col-md-6 col-md-offset-3">
            <input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
          </div>
        </form>	
		  
		  		  
		  
		           	  

          