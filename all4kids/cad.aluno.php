
<?php
require 'header.php';

include_once("class.aluno.php");

$aluno = new aluno();

if($id){
	$aluno->select($id);
}

$mensagem="$modo".o;

?>
    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro Aluno
            </h3>
          </div>
          <div class="panel-body">
			<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno <?php echo $mensagem ?> com sucesso');">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="aluno">

	<div class="form-group col-md-12">
                <input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="nome_mae" class=" form-control input-sm"  placeholder="Nome mae" value="<?php echo $aluno->nome_mae?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="nome_pai" class=" form-control input-sm"  placeholder="Nome pai" value="<?php echo $aluno->nome_pai?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="responsavel_nome" class=" form-control input-sm"  placeholder="Responsavel nome" value="<?php echo $aluno->responsavel_nome?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="responsavel_cpf" class=" form-control input-sm"  placeholder="Responsavel cpf" value="<?php echo $aluno->responsavel_cpf?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="responsavel_rg" class=" form-control input-sm"  placeholder="Responsavel rg" value="<?php echo $aluno->responsavel_rg?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno->endereco?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="idade" class=" form-control input-sm"  placeholder="Idade" value="<?php echo $aluno->idade?>">
			                
		</div>
		
	<div class="form-group col-md-12">
                <input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data nasc" value="<?php echo $aluno->data_nasc?>">
			                
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
