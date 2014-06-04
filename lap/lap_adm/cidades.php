<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Teste de Ajax </title>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
$().ready(function() {
	$("select[@name=listEstados]").change(function(){
		$('select[@name=listCidades]').html('<option value="sda">Procurando :::::::</option>');
		$.post('buscacidade.php', 
			{ estado : $(this).val() }, 
			function(resposta){
				
				$('select[@name=listCidades]').html(resposta);
			}
			
		);
	});
});
</script>
</head>

<body>
<form name="frmAjax">

	    <label for="listEstados"> Estado:&nbsp;</label>
	     <select name="listEstados">
	        <option value="0"> Selecione o estado >></option>

		    		       <option value="ac">
			   Acre</option>
		    		       <option value="al">
			   Alagoas</option>

		    		       <option value="ap">
			   Amapa</option>
		    		       <option value="am">

			   Amazonas</option>
		    		       <option value="ba">
			   Bahia</option>
		    		       <option value="ce">

			   Ceara</option>
		    		       <option value="df">
			   Distrito Federal</option>

		    		       <option value="es">
			   Espirito Santo</option>
		    		       <option value="go">
			   Goias</option>

		    		       <option value="ma">
			   Maranhao</option>
		    		       <option value="mt">

			   Mato Grosso</option>
		    		       <option value="ms">
			   Mato Grosso do Sul</option>
		    		       <option value="mg">

			   Minhas Gerais</option>
		    		       <option value="pa">
			   Para</option>

		    		       <option value="pb">
			   Paraiba</option>
		    		       <option value="pr">
			   Parana</option>

		    		       <option value="pe">
			   Pernambuco</option>
		    		       <option value="pi">

			   Piaui</option>
		    		       <option value="rj">
			   Rio de Janeiro</option>
		    		       <option value="rn">

			   Rio Grande do Norte</option>
		    		       <option value="rs">
			   Rio Grande do Sul</option>

		    		       <option value="ro">
			   Rondonia</option>
		    		       <option value="rr">
			   Roraima</option>

		    		       <option value="sc">
			   Santa Catarina</option>
		    		       <option value="sp">

			   Sao Paulo</option>
		    		       <option value="se">
			   Sergipe</option>
		    		       <option value="to">

			   Tocantins</option>
		    	     </select>
	  
	     <br><br>

	     <label for="listCidades">Cidade:&nbsp;</label>
	     <select name="listCidades">
            <option id="opcoes" value="0">-- Primeiro selecione o estado --</option>
			


	     </select>

	  </form>

</body>
</html>