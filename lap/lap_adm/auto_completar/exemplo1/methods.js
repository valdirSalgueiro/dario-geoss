window.onload = function() {
	//cria listener para o campo texto
	$("namesearch").onkeyup = function() {
		if(this.value.length<3) {
			$("usersList").style.display = "none";
			return false;
		}
		//seta a url e os parâmetros a serem usamos pelo PHP
		var url = "name.php";
		var pars = "name=" + this.value + "&rnd=" + Math.random()*4;
		//utiliza objeto Ajax da biblioteca Prototype
		new Ajax.Request(url, { method: 'get', parameters: pars,
			//em caso de sucesso...
			onSuccess: function(transport) {
				var json = transport.responseText.evalJSON(true);
				if(json.length>0) { //se tiver pelo menos um registro, mostra a div que tem os links
					$("usersList").style.display = "block";
					$("usersList").innerHTML = "";
				}
				//percorre a lista de resultados
				for(i=0; i<json.length; i++) {
					//cria um link
					var a = document.createElement("a");
					//o primeiro valor de cada registro é o id do usuário, e o segundo, o nome completo
					a.setAttribute("href", "?id=" + json[i][0]);
					a.setAttribute("title", json[i][1]);
					a.innerHTML = json[i][1];
					//faz alguma coisa no click
					a.onclick = function() {
						alert("Você clicou no link que aponta para " + this.href);
						$("usersList").style.display = "none";
						return false;
					}
					$("usersList").appendChild(a);
		}}});
	}
}