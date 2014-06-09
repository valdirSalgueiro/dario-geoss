
<?php
require 'header.php';

include_once("class.servico.php");
include_once("class.dia.php");
include_once("class.horario.php");

$servico = new servico();

if($id){
	$servico->select($id);
}

if($servico->id){
	$db = Database::getConnection();
	$sql = "SELECT *
			FROM dia_horario_servico
			WHERE idx_servico=$servico->id";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$temp=new dia();
		$temp->select($row['idx_dia']);
		$temp=$temp->nome;
		$dia.=$temp.",";
		$diaid.=$row['idx_dia'].",";
		$temp=new horario();
		$temp->select($row['idx_horario']);
		$temp=$temp->horario;
		$horario.=$temp.",";
		$horarioid.=$row['idx_horario'].",";		
	}
}

$mensagem="$modo".a;
?>
<script type="text/javascript" language="javascript">
var id=0;

function adicionar(type,type2){
	var valor=$("#"+type+'Campo').val();
	var texto=$("#"+type+"Campo option:selected").text();
	var valor2=$("#"+type2+'Campo').val();
	var texto2=$("#"+type2+"Campo option:selected").text();
	adicionar_(type,type2,valor,texto,valor2,texto2);
}
function adicionar_(type,type2,valor,texto,valor2,texto2){
	$("#"+type+'Conteudo').append("\
	<div id=\""+type+id+"\" class=\"form-group col-md-4\">\
	<input type=\"hidden\" name=\""+type+"[]\" class=\"form-control input-sm\" value=\""+valor+"\">\
	<input type=\"text\" class=\"form-control input-sm\" value=\""+texto+"\" readonly>\
	</div>\
	<div id=\""+type+id+"\" class=\"form-group col-md-4\">\
	<input type=\"hidden\" name=\""+type2+"[]\" class=\"form-control input-sm\" value=\""+valor2+"\">\
	<input type=\"text\" class=\"form-control input-sm\" value=\""+texto2+"\" readonly>\
	</div>\
	<div id=\""+type+id+"\" class=\"form-group col-md-4\"><input type=\"button\" onclick=\"remover("+type+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>\
	");
	id++;
}

function remover(removerId){
  $(removerId).remove();
}

</script>

<?php
$servico_id=$servico->id==0?0:$servico->id;
echo <<<EOT
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	if($servico_id){
		var array="$diaid".split(",");		
		var arrayText="$dia".split(",");
		var array2="$horarioid".split(",");
		var arrayText2="$horario".split(",");		
		for (var i=0;i<array.length-1; i++) {
			adicionar_('dia','horario',array[i],arrayText[i],array2[i],arrayText2[i]);
		}			
	}
} 
);
</script>
EOT;

?>
<div class="conteudo-principal">
    <fieldset> 
							<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Servico <?php echo $mensagem ?> com sucesso');">
							<input type="hidden" name="id" value="<?php echo $id?>"> 
							<input type="hidden" name="type" value="servico">

							<div class="form-group col-md-12" style="text-align: left">
									<input type="text" name="nome" class=" form-control input-sm"  placeholder="Nome" value="<?php echo $servico->nome?>">													
							</div>
								
							<div class="form-group col-md-12" style="text-align: left">
								<input type="text" name="tipo" class=" form-control input-sm"  placeholder="Tipo" value="<?php echo $servico->tipo?>">
							</div>

							<div class="form-group col-md-12" style="text-align: left">
								<input type="text" name="valor" class=" form-control input-sm"  placeholder="Valor" value="<?php echo $servico->valor?>">
							</div>							
							
						<div class="form-group col-md-4">
							<select id="diaCampo" class="form-control input-sm">
								<option value="0">Selecione um Dia</option>
								<?php
								$db = Database::getConnection();
								$sql = "SELECT id, nome
										FROM dia
										ORDER BY id";
								$res = $db->query( $sql );
								while ( $row = $res->fetch_assoc() ) {
									echo '<option value="'.$row['id'].'">'.utf8_encode($row['nome']).'</option>';
								}
								?>
						</select>
						</div>
						
						<div class="form-group col-md-4">
							<select id="horarioCampo" class="form-control input-sm">
								<option value="0">Selecione um Horario</option>
								<?php
								$db = Database::getConnection();
								$sql = "SELECT id, horario
										FROM horario
										ORDER BY horario";
								$res = $db->query( $sql );
								while ( $row = $res->fetch_assoc() ) {
									echo '<option value="'.$row['id'].'">'.utf8_encode($row['horario']).'</option>';
								}
								?>
						</select>
						</div>	

						<div class="form-group col-md-4">
						<input type="button" value="Adicionar" onclick="adicionar('dia','horario');" class="btn btn-success btn-block">
						</div>		

					<div id="diaConteudo">
					</div>	
		
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>	
					</form>
				  </fieldset>
				</div>
		</section>
	<?php
           require 'footer.php'
        ?>
