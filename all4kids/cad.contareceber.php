
<?php
require 'header.php';

include_once("class.conta.php");

$conta = new conta();

if($id){
	$conta->select($id);
}

$mensagem="$modo".a;

?>
		<section id="contact" class="background1 background-image" style="margin-top:160px;min-height: 67%;
    height: auto%;">
			<div class="container">
				<div class="row text-center" style="transition: all 0s ease; -webkit-transition: all 0s ease; opacity: 1;">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">
							  Cadastro Conta a Receber
							</h3>
						  </div>
						  <div class="panel-body">
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Conta <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="conta">

	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $conta->nome?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $conta->valor?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="data_vencimento" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data vencimento" value="<?php echo $conta->data_vencimento?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
				<?php
				$checked=($conta->faturado)?"checked":"";
				?>
				Recebido <input type="checkbox" name="faturado" value="1" <?php echo $checked ?>>
			                  
		</div>
		
	<input type="hidden" name="pagar" value="0">			                  
	
	<div class="form-group col-md-12" style="text-align: left">
				<?php
				$checked=($conta->repetir)?"checked":"";
				?>
				Repetir <input type="checkbox" name="repetir" value="1" <?php echo $checked ?>>
			                  
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="juros" class=" form-control input-sm"  placeholder="Juros" value="<?php echo $conta->juros?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="descontos" class=" form-control input-sm"  placeholder="Descontos" value="<?php echo $conta->descontos?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
							<input type="text" name="valor_repetir" class=" form-control input-sm"  placeholder="Repetir quantas vezes" value="<?php echo $conta->valor_repetir?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_categoria">
					<option value="0">Selecione um Categoria</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, nome
								FROM categoria
								ORDER BY nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($conta->idx_categoria==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_intervalo">
					<option value="0">Selecione um Intervalo</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, descricao
								FROM intervalo
								ORDER BY id";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($conta->idx_intervalo==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['descricao'].'</option>';
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
