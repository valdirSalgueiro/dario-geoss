
<?php
require 'header.php';

include_once("class.empresa.php");

$empresa = new empresa();

if($id){
	$empresa->select($id);
}

$mensagem="$modo".a;

?>
<div class="conteudo-principal">
  <div class="iconGroup cliente">
    <fieldset class="groupFields open">  
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Empresa <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="empresa">

	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="razao_social" class=" form-control input-sm"  placeholder="Razao social" value="<?php echo $empresa->razao_social?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="responsavel" class=" form-control input-sm"  placeholder="Responsavel" value="<?php echo $empresa->responsavel?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="cnpj" class=" form-control input-sm"  placeholder="Cnpj" value="<?php echo $empresa->cnpj?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $empresa->endereco?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $empresa->email?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="telefone_comercial" class=" form-control input-sm"  placeholder="Telefone comercial" value="<?php echo $empresa->telefone_comercial?>">
			                
		</div>
		
	<div class="form-group col-md-6" style="text-align: left">
							<input type="text" name="celular" class=" form-control input-sm"  placeholder="Celular" value="<?php echo $empresa->celular?>">
			                
		</div>
		
          <div class="form-group col-md-6" style="text-align: left">
            <input type="hidden" id="logomarca" name="<?php echo $empresa->logomarca?>">
              Logomarca: <input type="file" />

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
