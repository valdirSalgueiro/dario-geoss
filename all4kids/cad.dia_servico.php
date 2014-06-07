
<?php
require 'header.php';

include_once("class.dia_servico.php");

$dia_servico = new dia_servico();

if($id){
	$dia_servico->select($id);
}

$mensagem="$modo".o;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: auto%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Dia servico
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Dia servico <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="dia_servico">

	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_servico">
					<option value="0">Selecione um Servico</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM servico
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($dia_servico->idx_servico==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_dia">
					<option value="0">Selecione um Dia</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM dia
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($dia_servico->idx_dia==$row['id'])?"selected":"";
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
