<?
session_start();
?>
<?
 
   include "conn.php";
      if (isset($_POST['estado'])){

      $res=mysql_query('SELECT * FROM cidades WHERE uf = \''.$_POST['estado'].'\'');
   
      $cont=0;

      while($ok=mysql_fetch_array($res)){
  
      $vai=utf8_encode($ok['municipio']);
  
      echo "<option>$vai </option>";
   
      $cont++;
   
      }
  
      }else{
  
      echo 'Erro no envio dos dados';
  
      }

?>
