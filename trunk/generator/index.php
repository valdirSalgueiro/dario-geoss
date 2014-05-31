<?php

include("resources/class.database.php");
$database = new Database();

	function startsWith($haystack, $needle)
	{
		return $needle === "" || strpos($haystack, $needle) === 0;
	}

function endsWith($haystack, $needle)
{
	return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}


$database->OpenLink();

$tablelist = mysql_list_tables($database->database, $database->link);
$dir = dirname(__FILE__);
$dao = $dir . "/classes/dao.php";
$header = $dir . "/classes/header.php";

if(file_exists($dao))
{
unlink($dao);
}

if(file_exists($header))
{
unlink($header);
}

while ($row = mysql_fetch_row($tablelist)) {

// fill parameters from form
$table = $row[0];
$class = $row[0];
$classes[].=$class;
$key = "id";

$filename = $dir . "/classes/" . "class." . $class . ".php";
$filenameCadastrar = $dir . "/classes/" . "cad." . $class . ".php";
$filenameListar = $dir . "/classes/" . "list." . $class . ".php";
$filenameServer = $dir . "/classes/" . "server." . $class . ".php";

// if file exists, then delete it
if(file_exists($filename))
{
unlink($filename);
}
if(file_exists($filenameCadastrar))
{
unlink($filenameCadastrar);
}
if(file_exists($filenameListar))
{
unlink($filenameListar);
}
if(file_exists($filenameServer))
{
unlink($filenameServer);
}

$sql = "SHOW COLUMNS FROM $table;";
$database->query($sql);
$result = $database->result;

$fileC = fopen($filenameCadastrar, "w+");
$fileL = fopen($filenameListar, "w+");
$fileS = fopen($filenameServer, "w+");

$genero=endsWith($class,"o")?"o":"a";
$classeUpper=ucfirst($class);
$classeUpper=str_replace("_", " ",$classeUpper);
$classeSelect="$$class"."->select(\$id)";

//if (strpos($str, '.') !== FALSE)


$cad = "
<?php
require 'header.php';

include_once(\"class.$class.php\");

$$class = new $class();

if(\$id){
	$classeSelect;
}

\$mensagem=\"\$modo\".$genero;

?>
    <div class=\"row centered-form\">
      <div class=\"col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3\">
        <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
            <h3 class=\"panel-title\">
              Cadastro $classeUpper
            </h3>
          </div>
          <div class=\"panel-body\">
			<form role=\"form\"  action=\"dao.php\" onSubmit=\"return ajaxSubmit(this,'$classeUpper <?php echo \$mensagem ?> com sucesso');\">
			<input type=\"hidden\" name=\"id\" value=\"<?php echo \$id?>\"> 
			<input type=\"hidden\" name=\"type\" value=\"$class\">
";

$serv="
<?php

\$table = '$class';
 
\$primaryKey = 'id';
 
\$columns = array(    
";

$lis= "
	<?php
require 'header.php';
?>

<script type=\"text/javascript\" language=\"javascript\" src=\"scripts/dataTables.bootstrap.js\"></script>
<script type=\"text/javascript\" language=\"javascript\" src=\"scripts/jquery.dataTables.js\"></script>


<div class=\"page-header\">
    <h1>
        $classeUpper
    </h1>
</div>
<table id=\"example\" class=\"table table-hover table-striped table-bordered\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
";
$countColumns=0;
			
while ($row = mysql_fetch_row($result)) 
{
	$col=$row[0];
	
	if($col!=$key)
	{
	$cad.="
	<div class=\"form-group col-md-12\">"
	;
	$colUper=ucfirst($col);
	$colUper=str_replace("_", " ",$colUper);	
	$atributo="$$class"."->$col";
	
	
		if(startsWith($col,"idx")){
			$partes = explode("_", $col);
			$partesUper=ucfirst($partes[1]);
			
			$tabela=$partes[1];
			$sql1 = "SHOW COLUMNS FROM $tabela;";

			$database->query($sql1);
			$result1 = $database->result;
			
			while ($row1 = mysql_fetch_row($result1)) 
			{
				$cols[].=$row1[0];
			}
			$coluna=$cols[1];
			$cad.="
			  <select class=\"form-control input-sm\" name=\"$col\">
					<option value=\"0\">Selecione uma $partesUper</option>
					<?php
						\$db = Database::getConnection();
						\$sql = \"SELECT id, $coluna
								FROM $tabela
								ORDER BY $coluna\";
						\$res = \$db->query( \$sql );
						while ( \$row = \$res->fetch_assoc() ) {
							\$checked=($atributo==\$row['id'])?\"selected\":\"\";
							echo '<option value=\"'.\$row['id'].'\" '.\$checked.'>'.\$row['$coluna'].'</option>';
						}
					?>
			  </select>
			";	  
			  
		}
		else{
			$lis.="<th>$colUper</th>";
			$cad.= "
                <input type=\"text\" name=\"$col\" class=\"form-control input-sm\" placeholder=\"$colUper\" value=\"<?php echo $atributo?>\">
			  ";
			$serv.="
				array( 'db' => '$col', 'dt' => $countColumns ),
				";
			$countColumns++;
		}
		$cad.="              
		</div>
		";
	} 
} 


$serv.="
	array(
        'db'        => 'id',
        'dt'        => $countColumns,
        'formatter' => function( \$d, \$row ) {
            return \"<a href='cad.$class.php?id=\$d' class='glyphicon glyphicon-edit'></a>\";
        }
    ),	
	";
	$countColumns++;
	$serv.="
	array(
        'db'        => 'id',
        'dt'        => $countColumns,
        'formatter' => function( \$d, \$row ) {
            return \"<a href='javascript:apagar(\\\"$class\\\",\$d)' class='glyphicon glyphicon-remove'></a>\";
        }
    ),
	";	
	$countColumns++;
	$serv.="
);
 
\$sql_details = array(
    'user' => 'root',
	'pass' => '',
    'db'   => 'all4kids',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( \$_GET, \$sql_details, \$table, \$primaryKey, \$columns )
);
?>
";

$lis.="
				<th>Editar</th>
				<th>Remover</th>
            </tr>
        </thead>
    </table>
	<script>
	$(document).ready(function() {
    tableAjax=$('#example').dataTable({
	\"processing\": true,
    \"serverSide\": true,
    \"ajax\": \"server.$class.php\",
	\"oLanguage\": {
    \"sEmptyTable\":     \"Nenhum registro encontrado na tabela\",
    \"sInfo\": \"Mostrar _START_ até _END_ do _TOTAL_ registros\",
    \"sInfoEmpty\": \"Mostrar 0 até 0 de 0 Registros\",
    \"sInfoFiltered\": \"(Filtrar de _MAX_ total registros)\",
    \"sInfoPostFix\":    \"\",
    \"sInfoThousands\":  \".\",
    \"sLengthMenu\": \"Mostrar _MENU_ registros por pagina\",
    \"sLoadingRecords\": \"Carregando...\",
    \"sProcessing\":     \"Processando...\",
    \"sZeroRecords\": \"Nenhum registro encontrado\",
    \"sSearch\": \"Pesquisar\",
    \"oPaginate\": {
        \"sNext\": \"Proximo\",
        \"sPrevious\": \"Anterior\",
        \"sFirst\": \"Primeiro\",
        \"sLast\":\"Ultimo\"
    },
    \"oAria\": {
        \"sSortAscending\":  \": Ordenar colunas de forma ascendente\",
        \"sSortDescending\": \": Ordenar colunas de forma descendente\"
    }
}
	});
	$('#example').footable();
} );
	</script>
    
<?php
    require 'footer.php'
?>
";

fwrite($fileL, $lis);
fwrite($fileS, $serv);	

$cad.="
			  <div class=\"form-group col-md-6 col-md-offset-3\">
                <input type=\"submit\" value=\"<?php echo \$textoBotao?>\" class=\"btn btn-info btn-block\">
              </div>	
            </form>
          </div>
        </div>
      </div>
    </div>
	<?php
           require 'footer.php'
        ?>
"; 
fwrite($fileC, $cad);

// open file in insert mode
$file = fopen($filename, "w+");
$filedate = date("d.m.Y");

$c = "";

$c = "
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        $class
* GENERATION DATE:  $filedate
* CLASS FILE:       $filename
* FOR MYSQL TABLE:  $table
* FOR MYSQL DB:     $database->database
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.voegeli.li >> (download for free!)
* -------------------------------------------------------
*
*/

include_once(\"class.database.php\");

// **********************
// CLASS DECLARATION
// **********************

class $class
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $$key;   // KEY ATTR. WITH AUTOINCREMENT
";


$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];

if($col!=$key)
{

$c.= "
var $$col;   // (normal Attribute)";


} // endif
//"print "$col";
} // endwhile

$cdb = "$" . "database";
$cdb2 = "database";
$c.="

var $cdb; // Instance of class database

";

$cthis = "$" . "this->";
$thisdb = $cthis . $cdb2 . " = " . "Database::getDb();";

$c.= "
// **********************
// CONSTRUCTOR METHOD
// **********************

function $class()
{

$thisdb

}

";

$sql = "$" . "sql = ";
$id = "$" . "id";
$thisdb = "$" . "this->" . "database";
$thisdbquery = "$" . "this->" . "database->query($" . "sql" . ")";
$result = "$" . "result = ";
$row = "$" . "row";
$result1 = "$" . "result->fetch_object();";
$res = "$" . "result = $" . "this->database->result;";

$c.="
// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql \"SELECT * FROM $table WHERE $key = $id;\";
$result $thisdbquery;
$res
$row = $result1

";

$sql = "SHOW COLUMNS FROM $table;";
$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];
$cthis = "$" . "this->" . $col . " = $" . "row->" . $col;

$c.="
$cthis;
";

}



$c.="
}
";


$zeile1 = "$" . "sql" . " = \"DELETE FROM $table WHERE $key = $id;\"";
$zeile2 = "$" . "result = $" . "this->database->query($" . "sql);";
$c.="
// **********************
// DELETE
// **********************

function delete($id)
{
$zeile1;
$zeile2
";
$c.="
}
";


$zeile1 = "$" . "this->$key = \"\"";
$zeile2 = "INSERT INTO $table (";
$zeile5= ")"; 
$zeile3 = "";
$zeile4 = "";
$zeile6 = "VALUES (";

$sql = "SHOW COLUMNS FROM $table;";
$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];

if($col!=$key)
{
$zeile3.= "$col" . ",";
$zeile4.= "'$" . "this->$col" . "',";
//$zeile3 = rtrim($zeile3);
//$zeile4 = rtrim($zeile4);
//$zeile3 = str_replace(",", " ", $zeile3);
//$zeile4 = str_replace(",", " ", $zeile4);



}

}

$zeile3 = substr($zeile3, 0, -1);
$zeile4 = substr($zeile4, 0, -1);
$sql = "$" . "sql =";
$zeile7 = "$" . "result = $" . "this->database->query($" . "sql);";
$zeile8 = "$" . "row";
$zeile9 = "$" . "result";
$zeile10 = "$" . "this->$key = " . "mysql_insert_id($" . "this->database->connection);";

$c.="
// **********************
// INSERT
// **********************

function insert()
{
$zeile1; // clear key for autoincrement

$sql \"$zeile2 $zeile3 $zeile5 $zeile6 $zeile4 $zeile5\";
$zeile7


}
";


// UPDATE ----------------------------------------

$zeile1 = "$" . "this->$key = \"\"";
$zeile2 = "UPDATE $table SET ";
$zeile5= ")"; 
$zeile3 = "";
$zeile4 = "";
$zeile6 = "VALUES (";

$upd = "";

$sql = "SHOW COLUMNS FROM $table;";
$database->query($sql);
$result = $database->result;
while ($row = mysql_fetch_row($result)) 
{
$col=$row[0];

if($col!=$key)
{
$zeile3.= "$col" . ",";
$zeile4.= "$" . "this->$col" . ",";
$upd.= "" . "$col = '$" . "this->$col',";
//$zeile3 = rtrim($zeile3);
//$zeile4 = rtrim($zeile4);
//$zeile3 = str_replace(",", " ", $zeile3);
//$zeile4 = str_replace(",", " ", $zeile4);



}

}

$zeile3 = substr($zeile3, 0, -1);
$zeile4 = substr($zeile4, 0, -1);
$upd = substr($upd, 0, -1);
$sql = "$" . "sql = \"";
$zeile7 = "$" . "result = $" . "this->database->query($" . "sql)";
$zeile8 = "$" . "row";
$zeile9 = "$" . "result";
$zeile10 = "$" . "this->$key = $" . "row->$key";
$id = "$" . "id";
$where = "WHERE " . "$key = $" . "id";

$c.="
// **********************
// UPDATE
// **********************

function update($id)
{



$sql $zeile2 $upd $where \";

$zeile7;


";














$c.="
}
";










$c.= "

} // class : end

?>
";
fwrite($file, $c);

print "
<font face=\"Arial\" size=\"3\"><b>
PHP MYSQL Class Generator
</b>
<p>
<font face=\"Arial\" size=\"2\"><b>
Class '$class' successfully generated as file '$filename'!
<p>
<a href=\"javascript:history.back();\">
back
</a>

</b></font>

";

}
$fileDao = fopen($dao, "w+");
$cDao="<?php";
foreach($classes as $bla){
$cDao.="
include_once(\"class.$bla.php\");";
}
$cDao.="

include_once(\"class.database.php\");

\$db = Database::getConnection(); 

function post(\$key) {
    if (isset(\$_REQUEST[\$key]))
        return \$_REQUEST[\$key];
    return false;
}

\$type = post('type');
\$id = post('id');
\$mode= post('mode');

\$resp = new stdClass();	
\$resp->success = false;

\$instance = new \$type;

foreach(\$_POST as \$key => \$value)
{		
	if(property_exists ( \$instance , \$key ))
		\$instance->\$key = \$value;
}	

if(\$id){		
	if(\$mode){
		\$instance->delete(\$id);
	}
	else{
		\$instance->update(\$id);
	}
}
else{
	\$instance->insert();
}

\$resp->success = true;

echo json_encode(\$resp);

?>";

fwrite($fileDao, $cDao);

$fileHeader = fopen($header, "w+");

$cHeader="
<?php
	error_reporting (E_ALL ^ E_NOTICE); 

	session_start();
	if(!isset(\$_SESSION[\"user\"])) {
		header(\"Location:login.php\");
	}
	
	function post(\$key) {
		if (isset(\$_REQUEST[\$key]))
			return \$_REQUEST[\$key];
		return false;
	}
	
	function startsWith(\$haystack, \$needle)
	{
		return \$needle === \"\" || strpos(\$haystack, \$needle) === 0;
	}
	function endsWith(\$haystack, \$needle)
	{
		return \$needle === \"\" || substr(\$haystack, -strlen(\$needle)) === \$needle;
	}
	
	\$id = post('id')==0?0:post('id');
	\$textoBotao=\$id?\"Alterar\":\"Cadastrar\";
	\$modo=\$id?\"alterad\":\"cadastrad\";
	
?>
<html lang='pt-br'>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <!--meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"-->
    <meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no' />
    <script type=\"text/javascript\" src=\"scripts/ReView0.65b.js\"></script>
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\"/>
	<link href=\"css/datepicker.css\" rel=\"stylesheet\"/>
	<link rel=\"stylesheet\" href=\"css/font-awesome.min.css\"/>
    <script type=\"text/javascript\" language=\"javascript\" src=\"scripts/jquery-1.11.1.min.js\"></script>
    <script type=\"text/javascript\" language=\"javascript\" src=\"scripts/bootstrap.min.js\"></script>
	<script type=\"text/javascript\">
		var ajaxSubmit = function(formEl,msg) {
			mostrarCarregando();
			// fetch where we want to submit the form to
			var url = \$(formEl).attr('action');

			// fetch the data for the form
			var data = \$(formEl).serializeArray();

			// setup the ajax request
			\$.ajax({
				url: url,
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(rsp) {
					if(rsp.success) {
					    \$(modalbody).html(msg);      
						\$(myModal).modal();
					}
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
		
		var table;
		function apagar(tipo,id) {
			mostrarCarregando();

			// setup the ajax request
			\$.ajax({
				url: 'dao.php',
				data: 'mode=deletar&type='+tipo+'&id='+id,
				type: 'POST',
				dataType: 'json',
				success: function(rsp) {
					if(rsp.success) {
					    \$(modalbody).html(\"Removido com sucesso!\");      
						\$(myModal).modal();
						tableAjax.fnDraw();
					}
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
		
		var pleaseWaitDiv = \$(\"<div class='modal js-loading-bar'><div class='modal-dialog' id='modalLoading'><div class='modal-content'><div class='modal-header'><h3>Carregando...</h3></div><div class='modal-body'><div class='progress progress-striped active'><div class='progress-bar'  role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:70%'><span class='sr-only'>Carregando...</span></div></div></div></div></div></div>\");

        function mostrarCarregando(){
            pleaseWaitDiv.modal({ show: true });
            centralizarModal();
			\$(window).resize(function () { centralizarModal(); });
        }
		
        function esconderCarregando(){
            pleaseWaitDiv.modal('hide');
        }

		function centralizarModal() {
			var modalH = \$(modalLoading).height();
			var windowH = \$(window).height();
			\$('.modal-dialog').css({ 'top': windowH/2 - modalH});
		}
	</script>
	<style>

    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }

	
	</style>
</head>
<body>
<div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">
                        Toggle
                        navigation
                    </span>
                </button> <a class=\"navbar-brand\" href='index.php'>All4Kids</a>
            </div>
            <div class=\"collapse navbar-collapse\">
                <ul class=\"nav navbar-nav\">
					<li class=\"dropdown\">
						<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Geral<b class=\"caret\"></b></a>
						<ul class=\"dropdown-menu\">";
foreach($classes as $bla){
	$blaUper=ucfirst($bla);
	$cHeader.="
	<li><a href=\"cad.$bla.php\"> $blaUper</a></li>
	";		
}				
$cHeader.=
"					
							<li class=\"divider\"></li>
							<li class=\"nav-header\">Editar/Remover</li>";
foreach($classes as $bla){	
	$blaUper=ucfirst($bla);						
	$cHeader.="					
	<li><a href=\"list.$bla.php\"> $blaUper</a></li>
	";
}			
$cHeader.="
						</ul>
					</li>	
					
                    <li>
                        <a href=\"logout.php\">Logout</a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div><!-- Begin page content -->
	
	<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\"
            aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                            &times;</button>
                        <h4 class=\"modal-title\">
                            All4kids</h4>
                    </div>
                    <div class=\"modal-body\" id=\"modalbody\">
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">
                            Ok</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<div class=\"container\">
	<br><br><br>
";

fwrite($fileHeader, $cHeader);
?>