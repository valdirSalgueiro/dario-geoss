<?php
include_once("class.database.php");
include_once("class.material.php");
include_once("class.inventario.php");

function post($key) {
    if (isset($_REQUEST[$key]))
        return $_REQUEST[$key];
    return false;
}

$material=new material();

$db = Database::getConnection(); 

$ids=post('ids');
if (strpos($ids,',') !== false) {
    $ids=substr ( $ids, 0, strlen($ids)-1 );
}

$qtds="";
$sql = "SELECT * FROM cad_inventario WHERE cad_inventario.idx_semaf IN ($ids)";
if ($result = $db->query($sql)) {
	while ($obj = $result->fetch_object()) {			
		$inventario = new inventario();
		$inventario->select($obj->id);
		$qtds.=$inventario->quant_mater.",";		
	}
}
				
if (strpos($qtds,',') !== false) {
    $qtds=substr ( $qtds, 0, strlen($qtds)-1 );
	$qtds=explode(",",$qtds);
}


$sql = "SELECT * FROM cad_material LEFT JOIN cad_inventario ON cad_material.id = cad_inventario.idx_material where cad_inventario.idx_semaf IN ($ids)";

function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}
?>




<div class="page-header">
    <h1>
        Materiais
    </h1>
</div>
	<table id="materiais" class="table table-hover table-condensed table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Quantidade</th>
                <th>Nome</th>
				<th>Unidade</th>
				<th data-hide="phone">Modelo</th>
				<th data-hide="phone,tablet">Vida Útil</th>
            </tr>
        </thead>
		<tbody>     
<?php
		$count=0;
		if ($result = $db->query($sql)) {
			while ($obj = $result->fetch_object()) {			
				$material = new material();
				$material->select($obj->idx_material);
				echo "<tr>";
				echo "<td>".(isset($qtds[$count])?$qtds[$count]:"N/A")."</td>";
				foreach($material as $key => $value)
				{				
					if(is_scalar($value) || !$value){
						if(
						$key=="id" 
						|| $key=="quant_estoque"
						|| $key=="idx_fornecedor"
						){
								continue;
						}						
						else if($key=="idx_cidade"){
							$cidade = new cidade();
							$cidade->select($semaforo->idx_cidade);
							echo "<td>".utf8_encode($cidade->cid_nome)."</td>";
						}							
						else{
								echo "<td>".utf8_encode($value)."</td>";
						}
					}
				}	
				$count++;
			}

			/* free result set */
			$result->close();
		}
?> 
       
        </tbody>
    </table>
	
	<form role="form"  action="dao.php" onSubmit="return ajaxSubmit(this,'Inventario cadastrado com sucesso');">
			  <input type="hidden" name="type" value="inventario">
			  <input type="hidden" name="idx_semaf" value="<?php echo $ids?>"> 
			  <input type="hidden" name="id" value="0"> 
              <div class="form-group col-md-12">
                <input type="text" name="mat_nome" id="first_name" class="form-control input-sm" placeholder="Descrição" value="">
              </div>
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_unidade">
                  <option value="0">
                    Selecionar Unidade de Medida
                  </option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, unid_nome
								FROM cad_unidade
								ORDER BY unid_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							echo '<option value="'.$row['id'].'">'.utf8_encode($row['unid_nome']).'</option>';
						}
					?>                 
                </select>
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="quant_estoque" id="password" class="form-control input-sm" placeholder="Quantidade" value="">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="modelo" class="form-control input-sm" placeholder="Modelo" value="">
              </div>
              <div class="form-group col-md-12">
                <input type="text" name="vida_util" class="form-control input-sm" placeholder="Vida Util/Mes" value="">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="quant_mater" class="form-control input-sm" placeholder="Quantidade de Material" value="">
              </div>
			  <div class="form-group col-md-12">
                <input type="text" name="agenda" class="form-control input-sm" placeholder="Agenda" value="">
              </div>
			 <div class="form-group col-md-12">
                <input type="text" name="data_install" class="form-control input-sm" placeholder="Data instalacao" value="">
              </div>
			  
              <div class="form-group col-md-12">
                <select class="form-control input-sm" name="idx_fornecedor">
                  <option value="0">
                    Selecione um Fornecedor
                  </option>
					<?php
						$db = Database::getConnection();
						$sql = "SELECT id, fornec_nome
								FROM cad_fornecedor
								ORDER BY fornec_nome";
						$res = $db->query( $sql );
						while ( $row = $res->fetch_assoc() ) {
							$checked=($material->idx_fornecedor==$row['id'])?"selected":"";
							echo '<option value="'.$row['id'].'" '.$checked.'>'.utf8_encode($row['fornec_nome']).'</option>';
						}
					?>              
                </select>
              </div>
			  <div class="form-group col-md-6 col-md-offset-3">
                <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
              </div>
            </form>
	
	<script>
	$(document).ready(function() {
    tableAjax=$('#materiais').dataTable({
	"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    "lengthChange": false,
    "info": false,
	
	"oLanguage": {
    "sEmptyTable":     "Nenhum registro encontrado na tabela",
    "sInfo": "Mostrar _START_ até _END_ do _TOTAL_ registros",
    "sInfoEmpty": "Mostrar 0 até 0 de 0 Registros",
    "sInfoFiltered": "(Filtrar de _MAX_ total registros)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ".",
    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
    "sLoadingRecords": "Carregando...",
    "sProcessing":     "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Proximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast":"Ultimo"
    },
    "oAria": {
        "sSortAscending":  ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
	});
} );
	</script>