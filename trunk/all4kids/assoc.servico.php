
<?php
require 'header.php';

include_once("class.aluno_servico.php");

$aluno_servico = new aluno_servico();

if($id){
	$aluno_servico->select($id);
}

$mensagem="$modo".a;

?>						

<div class="conteudo-principal">
    <fieldset>  
						  <form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Associacao <?php echo $mensagem ?> com sucesso');">
						  <input type="hidden" name="type" value="aluno_servico">
						  <div class="form-group col-md-6" style="text-align: left">
							  Alunos:
							  <select data-placeholder="Escolha os alunos" class="chosen-select" multiple style="width:500px;" name="aluno[]">
									<?php
										$db = Database::getConnection();
										$sql = "SELECT id, nome
												FROM aluno
												ORDER BY nome";
										$res = $db->query( $sql );
										while ( $row = $res->fetch_assoc() ) {
											$checked=($aluno_servico->idx_servico==$row['id'])?"selected":"";
											echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].'</option>';
										}
									?>
							  </select>							  
						 </div>						  
						  <div class="form-group col-md-6" style="text-align: left">
							  Servicos:
							  <select id="servico" data-placeholder="Escolha os servicos" class="chosen-select" multiple style="width:500px;" name="servico[]">
									<?php
										$db = Database::getConnection();
										$sql = "SELECT id, nome, valor
												FROM servico
												ORDER BY nome";
										$res = $db->query( $sql );
										while ( $row = $res->fetch_assoc() ) {
											$checked=($aluno_servico->idx_servico==$row['id'])?"selected":"";
											echo '<option value="'.$row['id'].'" '.$checked.'>'.$row['nome'].' ('.$row['valor'].')</option>';
										}
									?>
							  </select>										  
						</div>	
						<div class="form-group col-md-6" style="text-align: left">
							Tipo:
							  <select style="width:500px;" name="tipo">
									<?php
										echo '<option value="0">1x</option>';
										echo '<option value="1">2x</option>';
										echo '<option value="2">3x</option>';
										echo '<option value="3">4x</option>';
										echo '<option value="4">5x</option>';
									?>
							  </select>		
						</div>
						<div class="form-group col-md-6" style="text-align: left">
							Desconto:
							<input type="text" id="desconto" class=" form-control input-sm"  style="width:500px" placeholder="Desconto  (em %)">											
						</div>		
						<div class="form-group col-md-6" style="text-align: left">
							<input type="button" value="Recalcular" class="btn btn-success btn-block" style="width:500px" onclick="calcular()">										
						</div>		
						
					<div class="form-group col-md-12" style="text-align: left">
					<table class="table list">
						<thead>
							 <tr> <th>Atividade</th><th>Valor</th></tr>
						</thead>
						<tfoot id="tfoot">
						</tfoot>
						<tbody id="tbody">
							<tr><td colspan="2" align="center">Sem dados para exibir</td><tr>
						</tbody>
					</table>
					</div>
					
					
					  <div class="form-group col-md-6 col-md-offset-3">
						<input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
					  </div>						
					  
					  </form>
					</fieldset>
		</div>
  
  <script type="text/javascript">
	var objServicos = new Object();
	var total;
	var descontos;
	
	

  
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Sem resultados!'},
      '.chosen-select-width'     : {width:"95%"}
	  
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
	
	
	function calcular(){
		total=0;
		var html="";		
		$.each(objServicos, function(key, value)	
		{
		    pos = value.indexOf("(") + 1;
			var valor=value.slice(pos, -1);
			var atv=value.slice(0, pos-1);
			total+=+valor;
			html+="<tr><td>"+atv+"</td><td>"+valor+"</td></tr>";				
		});	
		var offprice=$(desconto).val();
		var descontoTotal=total*(offprice/100);
		total-=descontoTotal;
		$(tbody).html(html);	
		var htmlTotal="";
		htmlTotal+="<tr><td colspan='2' align='right'>Descontos: R$ "+descontoTotal+" ("+offprice+"%)</td></tr>";
		htmlTotal+="<tr><td colspan='2' align='right'>Total: R$ "+total+"</td></tr>";
		$(tfoot).html(htmlTotal);	
	}
	
	$(document).ready(function() {
		Object.size = function(obj) {
			var size = 0, key;
			for (key in obj) {
				if (obj.hasOwnProperty(key)) size++;
			}
			return size;
		};
	
		$(servico).on('change', function(evt, params) {		
			if(params.selected){
				objServicos[params.selected]=$('#servico option[value="' + params.selected + '"]').html();;
			}
			else if(params.deselected){
				delete objServicos[params.deselected];
			}					
			calcular();
		});

		
	});

  </script>	
	<?php
           require 'footer.php'
        ?>
