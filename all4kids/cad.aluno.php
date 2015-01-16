<?php
include_once("header.php");

include_once("class.aluno.php");
include_once("class.aluno_responsavel.php");

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
	
	$sql = "SELECT *
			FROM aluno_responsavel 
			WHERE idx_aluno=$aluno->id and financeiro=1";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$id_responsavel=$row['id'];
	}
	
	if($id_responsavel){
		$aluno_responsavel = new aluno_responsavel();
		$aluno_responsavel->select($id_responsavel);
	}
	
	$sql = "SELECT *
			FROM aluno_responsavel 
			WHERE idx_aluno=$aluno->id and financeiro=0";
	$res = $db->query( $sql );
	while ( $row = $res->fetch_assoc() ) {
		$id_responsaveis[].=$row['id'];
	}
	
	if(isset($id_responsaveis[0])){
		$aluno_responsavel1 = new aluno_responsavel();	
		$aluno_responsavel1->select($id_responsaveis[0]);
	}
	
	if(isset($id_responsaveis[1])){
		$aluno_responsavel2 = new aluno_responsavel();
		$aluno_responsavel2->select($id_responsaveis[1]);
	}
	
	
}



$mensagem="$modo".o;

?>
<script type="text/javascript" language="javascript">
  var id=0;

  function adicionar(type){
	var valor=$("#"+type+'Campo').val();
	adicionar_(type,valor);
  }

  function adicionar_(type,valor){
	$("#"+type+'Conteudo').append("<div id=\""+type+id+"\" class=\"form-group col-md-6\"><input type=\"text\" name=\""+type+"[]\" class=\"form-control input-sm\" value=\""+valor+"\" readonly></div><div id=\""+type+id+"\" class=\"form-group col-md-6\"><input type=\"button\" onclick=\"remover("+type+id+")\" value=\"Remover\" class=\"btn btn-danger btn-block\"></div>");
	id++;
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
<div class="conteudo-principal">
  <div>
	<?php 
		
		if($id){
		
			$aluno=new aluno();
			$aluno->select($id);
			$foto=$aluno->foto;
			
			echo <<<EOT
			<script type="text/javascript" language="javascript">
				$(document).ready(function() {
					$('#croppic').css("background-image", "url($foto)");
				} 
			);
			</script>
EOT;

	?>
	<div  style="float:left;margin-right:10px">			
	<!--a href="uploads/<?php echo $id.'.foto.img'?>" data-lightbox="image-1">
		<img src="uploads/<?php echo $id.'.foto.img'?>" width="150" height="200" >
	</a!-->
	<div id="adeuscrop">
	<div id="croppic"></div>
	<span class="btn" id="cropContainerHeaderButton">Upload</span>
	</div>
	
	<!--div id="alunofoto">
	<img src="<?php echo $aluno->foto ?>">
	</div-->
	
	<h3>Carteira de Vacinacao</h3>
	<a href="uploads/<?php echo $id.'.carteira.img'?>" data-lightbox="image-1">
		<img src="uploads/<?php echo $id.'.carteira.img'?>" width="150" height="200" >
	</a>
	
	</div>
	
	<?php
		}
	?>
	
	
    <fieldset class="groupFields open">      
	
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#dados" role="tab" data-toggle="tab">Dados Pessoais</a></li>      	  
	  
	  
	  <?php
		if($aluno->id){
			echo
			"
				<li class=\"\"><a href=\"#responsaveis_financeiros\" role=\"tab\" data-toggle=\"tab\">Responsavel Financeiro</a></li>
				<li class=\"\"><a href=\"#dados_responsaveis\" role=\"tab\" data-toggle=\"tab\">Dados dos Responsaveis</a></li>
				<li class=\"\"><a href=\"#retirada\" role=\"tab\" data-toggle=\"tab\">Responsaveis Retirada</a></li>
				<li class=\"\"><a href=\"#medicamentos\" role=\"tab\" data-toggle=\"tab\">Medicamentos</a></li>
				<li class=\"\"><a href=\"#financeiro\" role=\"tab\" data-toggle=\"tab\">Financeiro</a></li>
			";
				//<li class=\"\"><a href=\"#atividades\" role=\"tab\" data-toggle=\"tab\">Atividades</a></li>
				//<li class=\"\"><a href=\"#servicos\" role=\"tab\" data-toggle=\"tab\">Servicos</a></li>
				//<li class=\"\"><a href=\"#calendario\" role=\"tab\" data-toggle=\"tab\">Calendario</a></li>
		}else{
			echo
			"
				<li class=\"\"><a style=\"color:gray\">Responsavel Financeiro</a></li>
				<li class=\"\"><a style=\"color:gray\">Responsaveis</a></li>
				<li class=\"\"><a style=\"color:gray\">Responsaveis Retirada</a></li>
				<li class=\"\"><a style=\"color:gray\">Medicamentos</a></li>
				<li class=\"\"><a style=\"color:gray\">Financeiro</a></li>

			";
				//<li class=\"\"><a style=\"color:gray\">Atividades</a></li>
				//<li class=\"\"><a style=\"color:gray\">Servicos</a></li>
				//<li class=\"\"><a style=\"color:gray\">Calendario</a></li>
		}
	  ?>
    </ul>
	
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="dados">
	  <br>
	  	
		<?php
           include_once("aluno.dados.php")
        ?>       
      </div>
	  
	  <div class="tab-pane fade" id="retirada">
	  <br>	  
        <?php
           include_once("aluno.retirada.php")
        ?>		
      </div>
	  
      <div class="tab-pane fade" id="medicamentos">
	  <br>	  
        <?php
           include_once("aluno.medicamentos.php")
        ?>		
      </div>
      <div class="tab-pane fade" id="dados_responsaveis">
	  <br>
        <?php
           include_once("aluno.responsaveis.php")
        ?>
		
      </div>
      <div class="tab-pane fade" id="responsaveis_financeiros">
	  <br>
        <?php
           include_once("aluno.responsavel_financeiro.php")
        ?>      
      </div>
	  <div class="tab-pane fade" id="atividades">
	  <br>
        <?php
           include_once("aluno.atividades.php")
        ?>      
      </div>
	  <div class="tab-pane fade" id="servicos">
	  <br>
        <?php
           include_once("aluno.servicos.php")
        ?>      
      </div>
	  <div class="tab-pane fade" id="calendario">
	  <br>
        <?php
           include_once("aluno.calendario.php")
        ?>      
      </div>
	  	  <div class="tab-pane fade" id="financeiro">
	  <br>
        <?php
           include_once("aluno.financeiro.php")
        ?>      
      </div>
    </div>	
    </fieldset>
	<br><br>
  </div>
</div>


<?php
           include_once("footer.php")
        ?>
