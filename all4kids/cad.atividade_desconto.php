
<?php
require 'header.php';

include_once("class.atividade_desconto.php");

$atividade_desconto = new atividade_desconto();

if($id){
	$atividade_desconto->select($id);
}

$mensagem="$modo".o;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: 67%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Atividade desconto
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Atividade desconto <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="atividade_desconto">

	<div class="form-group col-md-12">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $atividade_desconto->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_atividade">
					<option value="0">Selecione um Atividade</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM atividade
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($atividade_desconto->idx_atividade==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_desconto">
					<option value="0">Selecione um Desconto</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM desconto
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($atividade_desconto->idx_desconto==$row['id'])?"selected":"";
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
		</div>
	</section>
	<?php
           require 'footer.php'
        ?>
