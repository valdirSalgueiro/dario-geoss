
<?php
require 'header.php';

include_once("class.fornecedor.php");

$fornecedor = new fornecedor();

if($id){
	$fornecedor->select($id);
}

$mensagem="$modo".a;

?>
<div class="conteudo-principal">
  <div class="iconGroup cliente">
    <fieldset class="groupFields open">  
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Fornecedor <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="fornecedor">

		<div class="form-group col-md-6">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $fornecedor->nome?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $fornecedor->endereco?>">
			                
		</div>
		
<div class="form-group col-md-12" style="text-align: left">
		<a href="#" class="theme-hidefields-label" onclick="$(opcionais).toggle();"> Exibir mais campos (opcionais) </a>
	</div>	
	
	<div id="opcionais" style="display:none">		
		
		          <div class="form-group col-md-6" style="text-align: left">
            <?php
				$checked=($fornecedor->tipo_pessoa)?"checked":"";
				?>
            Tipo pessoa <input type="checkbox" name="ativo" value="1" <?php echo $checked ?>>

          </div>    
		

		
	<div class="form-group col-md-6">
							<input type="text" name="cnpj" class=" form-control input-sm"  placeholder="Cnpj" value="<?php echo $fornecedor->cnpj?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="razao_social" class=" form-control input-sm"  placeholder="Razao social" value="<?php echo $fornecedor->razao_social?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="inscricao_estadual" class=" form-control input-sm"  placeholder="Inscricao estadual" value="<?php echo $fornecedor->inscricao_estadual?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="inscricao_municipal" class=" form-control input-sm"  placeholder="Inscricao municipal" value="<?php echo $fornecedor->inscricao_municipal?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" name="aniversario" class=" form-control input-sm"  placeholder="Aniversario" value="<?php echo $fornecedor->aniversario?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="cep" class=" form-control input-sm"  placeholder="Cep" value="<?php echo $fornecedor->cep?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="numero" class=" form-control input-sm"  placeholder="Numero" value="<?php echo $fornecedor->numero?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="bairro" class=" form-control input-sm"  placeholder="Bairro" value="<?php echo $fornecedor->bairro?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="complemento" class=" form-control input-sm"  placeholder="Complemento" value="<?php echo $fornecedor->complemento?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="cidade" class=" form-control input-sm"  placeholder="Cidade" value="<?php echo $fornecedor->cidade?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="fone_comercial" class=" form-control input-sm"  placeholder="Fone comercial" value="<?php echo $fornecedor->fone_comercial?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="fone_residencial" class=" form-control input-sm"  placeholder="Fone residencial" value="<?php echo $fornecedor->fone_residencial?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="contato" class=" form-control input-sm"  placeholder="Contato" value="<?php echo $fornecedor->contato?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="celular" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $fornecedor->celular?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="observacoes" class=" form-control input-sm"  placeholder="Observacoes" value="<?php echo $fornecedor->observacoes?>">
			                
		</div>
		
	<div class="form-group col-md-6">
							<input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $fornecedor->email?>">
			                
		</div>
		</div>
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>					  
					</form>
				  </fieldset>
		</div>
</div>		
	<?php
           require 'footer.php'
        ?>
