<!--
var palette, color = '';
var cor = '#FFFFFF';
function setColor(c){
	eval(color+'="'+c+'"');
	c = c.replace("#", "")
    document.getElementById('txtHexa').value = c;

}
function showPalette(el, prop){
	color = prop;
	palette.style.left = getObjX(el) + 57;
	palette.style.top = getObjY(el);
	palette.style.visibility = 'visible';
}
function getObj(name) {
	return (document.getElementById && document.getElementById(name))||document[name]||(document.all && document.all[name]);
}
function getObjX(el){
	var left = 0;
	if(el.offsetParent){
		while(1){
			left += el.offsetLeft;
			if(!el.offsetParent)break;
			el = el.offsetParent;
		}
	}else if(el.x)left += el.x;
	return left;
}

function getObjY(el){
	var top = 0;
	if(el.offsetParent){
		while(1){
			top += el.offsetTop;
			if(!el.offsetParent)break;
			el = el.offsetParent;
		}
	}else if(el.y)top += el.y;
	return top;
}
function init(){
	palette = getObj('palette');
}
-->