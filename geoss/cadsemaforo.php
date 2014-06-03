<?php
require 'header.php';

include_once("class.semaforo.php");

$semaforo = new semaforo();
if($id){
	$semaforo->select($id);
}
$cidade=$semaforo->idx_cidade ? $semaforo->idx_cidade : 0;
$bairro=$semaforo->idx_bairro ? $semaforo->idx_bairro : 0;
$lograd=$semaforo->idx_lograd ? $semaforo->idx_lograd : 0;

echo <<<EOT
<script type="text/javascript">
		$(function(){
			$('#cod_estados').change(function(){
				if( $(this).val() ) {
					$('#cod_cidades').hide();
					$.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione uma cidade</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($cidade==j[i].cod_cidades)?"selected":"";
							options += '<option value="' + j[i].cod_cidades + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_cidades').html(options).show();
						if($bairro)
							$('#cod_cidades').change();
					});
				}
				
			});
		});
		
		$(function(){
			$('#cod_cidades').change(function(){
				if( $(this).val() ) {
					$('#cod_bairros').hide();
					$.getJSON('bairros.ajax.php?search=',{cod_bairros: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione um bairro</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($bairro==j[i].cod_bairros)?"selected":"";
							options += '<option value="' + j[i].cod_bairros + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_bairros').html(options).show();
						if($lograd)
							$('#cod_bairros').change();
					});
				}
			});
		});
		
		$(function(){
			$('#cod_bairros').change(function(){
				if( $(this).val() ) {
					$('#cod_logradouros').hide();
					$.getJSON('logradouros.ajax.php?search=',{cod_logradouros: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="0">Selecione um logradouro</option>';	
						for (var i = 0; i < j.length; i++) {
							var selected=($lograd==j[i].cod_logradouros)?"selected":"";
							options += '<option value="' + j[i].cod_logradouros + '" '+selected+'>' + j[i].nome + '</option>';
						}	
						$('#cod_logradouros').html(options).show();						
					});
				}
				
			});
		});
		
	$(document).ready(function() {
		if($cidade)
			$('#cod_estados').change();
	} );		
</script>
EOT;
?>
<script src="http://maps.google.com/maps?file=api&;amp;v=2.x&amp;key=ABQIAAAAtOjLpIVcO8im8KJFR8pcMhQjskl1-YgiA_BGX2yRrf7htVrbmBTWZt39_v1rJ4xxwZZCEomegYBo1w" type="text/javascript"></script>

<script type="text/javascript">		
	function carregarBase(ids) {
			mostrarCarregando();

			// setup the ajax request
			$.ajax({
				url: 'base.php',
				data: {'ids': ids},
				type: 'POST',
				success: function(data) {
				    $(mapaDigital).html(data);      
					esconderCarregando();
				},
				error: function (jqXHR, textStatus,  errorThrown) {
					alert(textStatus);
					alert(errorThrown);
					esconderCarregando();
					}					
			});

			// return false so the form does not actually
			// submit to the page
			return false;
		}
</script>

    <div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Cadastro semáforo
            </h3>
          </div>
          <div class="panel-body">
			<table>
			<tr>
			<td>
            <form role="form" method="post" action="dao.php" onSubmit="return ajaxSubmit(this,'Semáforo cadastrado com sucesso');">
			  <?php echo $semaforo->id?"<input type=\"hidden\" name=\"mode\" value=\"update\">":"";?>
			  <input type="hidden" name="type" value="semaforo">
			  <input type="hidden" name="id" value="<?php echo $id?>"> 
              <div class="form-group col-md-12">
                <input type="text" name="num_semaforo" id="first_name" class="form-control input-sm" placeholder="Semáforo número" value="<?php echo $semaforo->num_semaforo?>">
              </div>
			  
    		  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="idx_uf" id="cod_estados">
					<option value="0">Selecione um estado</option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, uf_nome
								FROM cad_uf
								ORDER BY uf_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($semaforo->idx_uf==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['uf_nome']).'</option>';
						}
					?>
			  </select>
              </div>
              <div class="form-group col-md-12">
				<select class="form-control input-sm" name="idx_cidade" id="cod_cidades">
					<option value="0">Selecione uma cidade</option>
				</select>
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_bairro" id="cod_bairros">
					<option value="0">Selecione um bairro</option>
				</select>
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_lograd" id="cod_logradouros">
					<option value="0">Selecione um logradouro</option>
				</select>
              </div>
              <div class="form-group col-md-12">
			    <input type="hidden" name="idx_area" id="password_confirmation" class="form-control input-sm" placeholder="Area" value="1">
                <input type="text" name="idx_are" id="password_confirmation" class="form-control input-sm" placeholder="Area" value="<?php echo $semaforo->idx_area?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="latitude" id="latitude" class="form-control input-sm" placeholder="Latitude" value="<?php echo $semaforo->latitude?>">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="longitude" id="longitude" class="form-control input-sm" placeholder="Longitude" value="<?php echo $semaforo->longitude?>">
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="modo" id="estados_config_escola">
				
                  <option value="">
                    Selecionar Modo
                  </option>
                  <option value="Veicular" <?php echo !strcasecmp($semaforo->modo,"Veicular")?"selected":"";?>>
                    Veicular
                  </option>
                  <option value="Pedestre Ocasional" <?php echo !strcasecmp($semaforo->modo,"Pedestre Ocasional")?"selected":"";?>>
                    Pedestre Ocasional
                  </option>
                  <option value="Veicular com Pedestre Paralelo" <?php echo !strcasecmp($semaforo->modo,"Veicular com Pedestre Paralelo")?"selected":"";?>>
                    Veicular com Pedestre Paralelo
                  </option>
                  <option value="Veicular com Pedestre Ocasional" <?php echo !strcasecmp($semaforo->modo,"Veicular com Pedestre Ocasional")?"selected":"";?>>
                    Veicular com Pedestre Ocasional
                  </option>
                  <option value="Piscante" <?php echo !strcasecmp($semaforo->modo,"Piscante")?"selected":"";?>>
                    Piscante
                  </option>
                </select>
              </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="controlador">
                <option value="">
                  Selecionar Controlador
                </option>
                <option value="Eletro-mecanico" <?php echo !strcasecmp(utf8_encode($semaforo->controlador),"Eletro-mecanico")?"selected":"";?>>
                  Eletro-mecanico
                </option>
                <option value="Eletro-eletronico" <?php echo !strcasecmp(utf8_encode($semaforo->controlador),"Eletro-eletronico")?"selected":"";?>>
                  Eletro-eletronico
                </option>
                <option value="Eletrônico" <?php echo !strcasecmp(utf8_encode($semaforo->controlador),"Eletrônico")?"selected":"";?>>
                  Eletrônico
                </option>
                <option value="Eletronico Centralizado" <?php echo !strcasecmp(utf8_encode($semaforo->controlador),"Eletronico Centralizado")?"selected":"";?>>
                  Eletronico Centralizado
                </option>
              </select> 
			  </div>
			  <div class="form-group col-md-12">
			  <select class="form-control input-sm" name="operacao" id="estados_config_escola">
                <option value="">
                  Selecionar Operação
                </option>
                <option value="Isolado" <?php echo !strcasecmp($semaforo->operacao,"Isolado")?"selected":"";?>>
                  Isolado
                </option>
                <option value="Em Rede" <?php echo !strcasecmp($semaforo->operacao,"Em Rede")?"selected":"";?>>
                  Em Rede
                </option>
              </select>
			  </div>	
			</td>	
			<td style="vertical-align:middle">		
				<div id="mapaDigital">
				</div>
			</td>			
			</tr>
			<tr>
			<td>
              <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="<?php echo $textoBotao?>" class="btn btn-info btn-block">
              </div>              			  
            </form>
			</td>
			
			</tr>
          </div>
        </div>
      </div>
    </div>	

	<script>
	$(document).ready(function() {
		carregarBase();
	} );
	</script>	

	<?php
           require 'footer.php'
        ?>
