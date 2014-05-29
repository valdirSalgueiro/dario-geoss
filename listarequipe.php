<?php
require 'header.php';
include_once("class.equipe.php");

$db = Database::getConnection(); 
$query = "SELECT id FROM cad_equipe";
?>

<script type="text/javascript" language="javascript" src="scripts/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
<script src="scripts/footable.js" type="text/javascript"></script>
<link   href="css/footable.core.css" rel="stylesheet" type="text/css">


<div class="page-header">
    <h1>
        Equipes
    </h1>
</div>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Código</th>
				<th>Tipo</th>
            </tr>
        </thead>
		<tbody>     
<?php
		if ($result = $db->query($query)) {
			while ($obj = $result->fetch_object()) {			
				$equipe = new equipe();
				$equipe->select($obj->id);
				echo "<tr>";
				foreach($equipe as $key => $value)
				{				
					if(is_scalar($value) || !$value){
						if(
						$key=="id" 
						//|| $key=="idx_area"
						){
								continue;
						}											
						else{
								echo "<td>".utf8_encode($value)."</td>";
						}
					}
				}	
				echo "</tr>";
			}

			/* free result set */
			$result->close();
		}
?> 
       
        </tbody>
    </table>
	<script>
	$(document).ready(function() {
    $('#example').dataTable();
	$('#example').footable();
} );
	</script>
    
<?php
    require 'footer.php'
?>
