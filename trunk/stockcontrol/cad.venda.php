<?php
require 'header.php';

include_once("class.pedido.php");
$pedido = new pedido();

$readonly="";
if($id){
	$pedido->select($id);
	$readonly="readonly";
}

$mensagem="$modo"."o";

?>
		<div class="conteudo-principal">
			<fieldset>
			<form role="form"  action="dao.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id?>"> 
			<input type="hidden" name="type" value="pedido">
			
			<span style="display:none" id="msg">Venda <?php echo $mensagem?> com sucesso</span>
	<div class="form-group col-md-12" style="text-align: left">
			  <select class="form-control input-sm" name="idx_produto">
					<option value="0">Selecione um Produto</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, codigo, nome
								FROM produto
								ORDER BY codigo";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($pedido->idx_produto==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['codigo'].'_'.$row['nome'].'</option>';
						}
					?>
			  </select>
			              
		</div>
		
		
	<div class="form-group col-md-12" style="text-align: left">
					Quantidade <input type="text" name="quantidade" class=" form-control input-sm"  placeholder="Quantidade" value="<?php echo $pedido->quantidade?>" <?php echo $readonly?>>
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Valor <input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $pedido->valor?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Data <input type="text" name="data" class="datepicker form-control input-sm" data-date-format="yyyy-mm-dd" placeholder="Data" value="<?php echo $pedido->data?>">
			                
		</div>
		
	<div class="form-group col-md-12" style="text-align: left">
					Cliente <input type="text" name="cliente" class=" form-control input-sm"  placeholder="Cliente" value="<?php echo $pedido->cliente?>">
			                
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
