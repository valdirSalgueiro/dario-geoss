// JavaScript Document
function mostra(div){
	document.getElementById(div).style.display="block";
}
function dismostra(div) {
	document.getElementById(div).style.display="none";
}

function wopen(endereco,titulo,caracteristicas) {
/* Caracteristicas:
width=600, - largura
height=500, - altura
status=yes, - Parte de baixo
menubar=yes, - Menu Cima(arquivo, editar...)
scrollbars=yes, - rolagem
toolbar=no, - rolagem
resizable=yes, ajustável
location=no,
directories=no'


*/
	window.open(endereco,titulo,caracteristicas);

}

function ValidarLogin() {
	window.open('adm_index.php','login','width=800,height=600,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=yes')
	document.form_login.target = 'login'
	document.form_login.action = 'adm_index.php'
	document.form_login.submit();
}
function env_perg(id) {
	window.open('env_pergunta.php?id='+id+'','pergunta','width=400,height=500,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'Cadastrar Pergunta'
	document.form_login.action = 'env_pergunta.php?id='+id+''
	document.form_login.submit();
}
function resp_perg(id) {
	window.open('env_resposta.php?id='+id+'','resposta','width=400,height=500,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'Cadastrar Resposta'
	document.form_login.action = 'env_resposta.php?id='+id+''
	document.form_login.submit();
}
function Comentar(id) {
	window.open('comentarios_g.php?id='+id+'','comentarios','width=400,height=500,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'comentarios'
	document.form_login.action = 'comentarios_g.php?id='+id+''
	document.form_login.submit();
}

function EnviarMateria(id) {
	window.open('enviar_materia.php?id='+id+'','envie','width=500,height=200,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'envie'
	document.form_login.action = 'enviar_materia.php?id='+id+''
	document.form_login.submit();
}

function Imprimir(id) {
	window.open('imprimir_materia.php?id='+id+'','imprimir','width=600,height=500,status=no,menubar=no,scrollbars=yes,toolbar=no,resizable=no')
	document.form_login.target = 'imprimir'
	document.form_login.action = 'imprimir_materia.php?id='+id+''
	document.form_login.submit();
}

function postPopup(acao,targ,caracteristicas,nomeForm) {
	frm = eval("document." + nomeForm);
	window.open(acao,targ,caracteristicas)
	frm.target = targ
	frm.action = acao
	frm.submit();
}


function submitt(acao,nomeform){

	document.getElementById(nomeform).action = acao
	document.getElementById(nomeform).submit();
}