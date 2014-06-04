<?php
    
      $host = "localhost";#CONFIGURE SEU HOST AQUI
  
      $user = "root";#USUARIO DO BANCO DE DADOS
  
      $pass = "";#SENHA DO BANCO DE DADOS
  
      $db = "fifabr_laboratorio";#BASE QUE OS DADOS SERAO EXPORTADOS
	  
	  $data_atual = date("d_m_Y");
  
       
 
      $arquivoSQL = "Backup_$data_atual.txt";#ARQUIVO TXT NO QUAL VOCE QUER GUARDAR OS INSERTS, PODE SER .SQL TAMBÉM
      $data_backup = date("d/m/Y");
      #SE O ARQUIVO NAO EXISTIR ELE SERÁ CRIADO.
      include "conn.php";
	  //Buscando se existe backup para o dia atual
	  $busca_backup="select * from backup where data  = '".$data_backup."';";
      $res_busca_backup=mysql_query($busca_backup,$conn);
      $campo_backup=mysql_fetch_array($res_busca_backup);
	   
      $hora_agora = date("H"); 
      if(($hora_agora>=17)and($campo_backup['data']==NULL)){
      $data_backup = date("d/m/Y");
	  $por=$_SESSION["usuario_autenticado"];
	  $caminho="http://192.168.1.4/neap_adm/backups/$arquivoSQL";
	  include "conn.php";
	  $cad_backup="insert into backup values ('','".$arquivoSQL."','".$data_backup."','".$por."','".$caminho."');";
      $ok=mysql_query($cad_backup,$conn);
      }
      $clausulaSQL = DumpSQL($host, $user, $pass, $db);#AQUI EU CHAMO A FUNÇAO DumpSQL, QUE GUARDA NA VARIAVEL

      #$clausulaSQL OS DADOS NA FORMA DE INSERT INTO.
 
       

      escreveNoTXT($clausulaSQL, $arquivoSQL);#ESCREVE NO ARQUIVO BasedeDados.txt O VALOR DA VARIAVEL $clausulaSQL.

      function escreveNoTXT($consultasSQL, $arquivoSQL){
  
      //ARQUIVO TXT
 
      $arquivo = "backups/$arquivoSQL";
 
      //TENTA ABRIR O ARQUIVO TXT
 
      if (!$abrir = fopen($arquivo,"w")){

      $retorno = "ERRO AO ABRIR";

      }else{

      $retorno = true;

      }

      //ESCREVE NO ARQUIVO TXT

      if (!fwrite($abrir,$consultasSQL)){

      $retorno = "ERRO AO ESCREVER";
 
      }else{

      $retorno = true;

      }

      //FECHA O ARQUIVO
 
      fclose($abrir);
 
      return $retorno;
 
      }

       
 
      function DumpSQL($host, $user, $pass, $db){

      mysql_connect( $host,$user, $pass) or die(mysql_error( ));
 
      mysql_select_db($db) or die(mysql_error( ));

      #mysql_list_tables PEGA TODAS AS TABELAS DA BASE DE DADOS
 
      $res = mysql_list_tables($db) or die(mysql_error());

      while($row = mysql_fetch_row($res)){

      $table = $row[0]; #CADA TABELA DA BASE DE DADOS
 

      $res3 = mysql_query("SELECT * FROM $table");
 
      while($r=mysql_fetch_row( $res3)){ #AQUI OCORRE A EXTRAÇAO DOS DADOS DA TABELA
 
      $sql="INSERT INTO $table VALUES ('";

      $sql .= implode("','",$r);

      $sql .= "');\n";
 
      $back.=$sql;

      }
 
      }
 
      $data = date("d/m/Y");

	  
	  

      $back .= "\n\n--Backup feito em $data";
 
      mysql_free_result($res);

      return $back;

      }
      ?>

