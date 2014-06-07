
<?php
require 'header.php';

include_once("class.aluno.php");

$aluno = new aluno();

if($id){
	$aluno->select($id);
}

if($aluno->id){
	$db = Database::getConnection();
	$sql = "SELECT *
			FROM aluno_telefone
			WHERE idx_aluno=$aluno->id";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$telefone.=$row['numero'].",";
	}
}

$mensagem="$modo".o;

?>
<script type="text/javascript" language="javascript">
var id=0;

function adicionar(type){
	var valor=$("#"+type+'Campo').val();
	adicionar_(type,valor);
	id++;
}

function adicionar_(type,valor){
	$("#"+type+'Conteudo').append("<div id=\""+type+id+"\" class=\"form-group col-md-6\"><input type=\"text\" name=\""+type+"[]\" class=\"form-control input-sm\" value=\""+valor+"\" readonly></div><div id=\""+type+id+"\" class=\"form-group col-md-6\"><input type=\"button\" onclick=\"remover("+type+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>");
}	
	

function remover(removerId){
  $(removerId).remove();
}

</script>

<?php
$aluno_id=$aluno->id==0?0:$aluno->id;
echo <<<EOT
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	if($aluno_id){
		var array="$telefone".split(",");
		for (var i=0;i<array.length-1; i++) {
			adicionar_('telefone',array[i]);
		}			
	}
} 
);
</script>
EOT;
?>

		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: auto%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Aluno
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form" enctype="multipart/form-data" action="dao.php" onSubmit="return ajaxSubmit(this,'Aluno <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="aluno">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $aluno->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="email" class=" form-control input-sm"  placeholder="Email" value="<?php echo $aluno->email?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome_mae" class=" form-control input-sm"  placeholder="Nome mae" value="<?php echo $aluno->nome_mae?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome_pai" class=" form-control input-sm"  placeholder="Nome pai" value="<?php echo $aluno->nome_pai?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="responsavel_nome" class=" form-control input-sm"  placeholder="Responsavel nome" value="<?php echo $aluno->responsavel_nome?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="responsavel_cpf" class=" form-control input-sm"  placeholder="Responsavel cpf" value="<?php echo $aluno->responsavel_cpf?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="responsavel_rg" class=" form-control input-sm"  placeholder="Responsavel rg" value="<?php echo $aluno->responsavel_rg?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="endereco" class=" form-control input-sm"  placeholder="Endereco" value="<?php echo $aluno->endereco?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="plano_saude" class=" form-control input-sm"  placeholder="Plano saude" value="<?php echo $aluno->plano_saude?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="emergencia" class=" form-control input-sm"  placeholder="Emergencia" value="<?php echo $aluno->emergencia?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="responsavel_emergencia" class=" form-control input-sm"  placeholder="Responsavel emergencia" value="<?php echo $aluno->responsavel_emergencia?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="hidden" id="carteira" name="carteira">
							Carteira de vacinacao: <input name="carteira_aluno" type="file" />
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
				<?php
				$checked=($aluno->entregou_carteira)?"checked":"";
				?>
				Entregou carteira de vacinacao <input type="checkbox" name="entregou_carteira" value="1" <?php echo $checked ?>>
			                  
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
				<?php
				$checked=($aluno->ativo)?"checked":"";
				?>
				Ativo <input type="checkbox" name="ativo" value="1" <?php echo $checked ?>>
			                  
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="idade" class=" form-control input-sm"  placeholder="Idade" value="<?php echo $aluno->idade?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_nivelescolar">
					<option value="0">Selecione um Nivelescolar</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM nivelescolar
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($aluno->idx_nivelescolar==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="data_nasc" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data nasc" value="<?php echo $aluno->data_nasc?>">
			                
		</div>
					<div class="form-group col-md-6">
						<input id="telefoneCampo" type="text" class="form-control input-sm" placeholder="Telefone">
					</div>
					<div class="form-group col-md-6">
						<input type="button" value="Adicionar" onclick="adicionar('telefone');" class="btn btn-success btn-block">
					</div>			
					<div id="telefoneConteudo">
					</div>
		
					<div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					</div>	
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</section>
	<?php
           require 'footer.php'
        ?>
