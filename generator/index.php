<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_DEPRECATED); 
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

class Template
{
    protected $_file;
    protected $_data = array();

    public function __construct($file = null)
    {
        $this->_file = $file;
    }

    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->_data);
        ob_start();
        include($this->_file);
        return ob_get_clean();
    }
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

$classes = [];

while ($row = mysql_fetch_row($tablelist)) {

// fill parameters from form
$table = $row[0];
$class = $row[0];
$classes[].=$class;
$key = "id";

echo "creating class for $table<br>";

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

$genero=endsWith($class,"a")?"a":"o";
$classeUpper=ucfirst($class);
$classeUpper=str_replace("_", " ",$classeUpper);
$classeSelect="$$class"."->select(\$id)";

//if (strpos($str, '.') !== FALSE)


$cad = "
<?php
require 'header.php';

include_once(\"class.$class.php\");
";
$template = new Template('template_cad_header.txt');
$template->set('classeUpper', $classeUpper);
$template->set('class', $class);
$template->set('classeSelect', $classeSelect);
$template->set('genero', $genero);
$cad.=$template->render();


$serv="
<?php

include_once(\"class.database.php\");

\$db = Database::getDb(); 


\$table = '$class';
 
\$primaryKey = 'id';
 
\$columns = array(    
";

$lis="<?php
require 'header.php';
?>";

$template = new Template('template_list_header.txt');
$template->set('classeUpper', $classeUpper);
$lis.=$template->render();
$countColumns=0;
			
while ($row = mysql_fetch_row($result)) 
{
	$col=$row[0];
	$tipocol=$row[1];
	
	if($col!=$key)
	{
	$cad.="
	<div class=\"form-group col-md-12\" style=\"text-align: left\">"
	;
	$colUper=ucfirst($col);
	$colUper=str_replace("_", " ",$colUper);	
	$atributo="$$class"."->$col";
	
	echo "generating input for field $col<br>";
		if(startsWith($col,"idx")){
			$partes = explode("_", $col);
			$partesUper=ucfirst($partes[1]);
			
			$tabela=$partes[1];
			if($partes[2]){
				$tabela.="_".$partes[2];
			}
			$sql1 = "SHOW COLUMNS FROM $tabela;";

			$database->query($sql1);
			$result1 = $database->result;
			
			$cols = [];
			while ($row1 = mysql_fetch_row($result1)) 
			{
				$cols[].=$row1[0];
			}
			$coluna=$cols[1];
			$cad.="
			  <select class=\"form-control input-sm\" name=\"$col\">
					<option value=\"0\">Selecione um $partesUper</option>
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
			$datepicker1="";
			$datepicker2="";
			if($tipocol=="datetime"){
				$datepicker1="datepicker";
				$datepicker2="data-date-format=\"yyyy-mm-dd\"";
			}
			if(startsWith($tipocol,"bit")){
			    $cad.= "
				<?php
				\$checked=($atributo)?\"checked\":\"\";
				?>
				$colUper <input type=\"checkbox\" name=\"$col\" value=\"1\" <?php echo \$checked ?>>
			    "; 				
				
			}
			if(endsWith($tipocol,"blob")){
			    $cad.= "
					$colUper <input type=\"file\" name=\"$col\" class=\"form-control input-sm\">
			    "; 				
				
			}else{
			   $cad.= "
					$colUper <input type=\"text\" name=\"$col\" class=\"$datepicker1 form-control input-sm\" $datepicker2 placeholder=\"$colUper\" value=\"<?php echo $atributo?>\">
			  ";			  
			}
			$lis.="<th>$colUper</th>";

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
            return \"<a href='#' onclick='apagar(\\\"$class\\\",\$d)' class='glyphicon glyphicon-remove'></a>\";
        }
    ),
	";	
	$countColumns++;
	$serv.="
);
  
 
\$sql_details = array(
    'user' => \$db->user,
	'pass' => \$db->password,
    'db'   => \$db->database,
    'host' => \$db->host
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( \$_GET, \$sql_details, \$table, \$primaryKey, \$columns )
);
?>
";

$template = new Template('template_list_footer.txt');
$template->set('class', $class);
$lis.=$template->render();
$lis.="   
<?php
    require 'footer.php'
?>
";

fwrite($fileL, $lis);
fwrite($fileS, $serv);	

$template = new Template('template_cad_footer.txt');
$cad.=$template->render();

$cad.="
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
$fileHeader = fopen($header, "w+");

$cDao="<?php";
foreach($classes as $bla){
$cDao.="
include_once(\"class.$bla.php\");";
}
$cDao.=file_get_contents('template_dao.txt');

;
fwrite($fileDao, $cDao);
fwrite($fileHeader, "\xEF\xBB\xBF".file_get_contents('template_header.txt'));



?>