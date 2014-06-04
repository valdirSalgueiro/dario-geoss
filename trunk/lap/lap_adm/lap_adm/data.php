<?
function calculo_tempo($hora_ini,$hora_fim)
{
 $hora_temp=$hora_ini;
 $h_ini=$hora_temp[0].$hora_temp[1];
 $m_ini=$hora_temp[3].$hora_temp[4];
 $hora_temp=$hora_fim;
 $h_fim=$hora_temp[0].$hora_temp[1];
 $m_fim=$hora_temp[3].$hora_temp[4];
 $res=(($h_ini-$h_fim)*60)-($m_ini-$m_fim);
 if($res==0)
 {
  $res=1;
 }
 $tempo=abs($res);
 return $tempo;
}
function num_data_en($data)
{
 if($data[9]!=NULL)
 {
  $temp=$data[0];
  $temp.=$data[1];
  $temp.=$data[2];
  $temp.=$data[3];
  $temp.=$data[5];
  $temp.=$data[6];
  $temp.=$data[8];
  $temp.=$data[9];
  return $temp;
 }
}
function num_data_br($data)
{
 if($data[9]!=NULL)
 {
  $temp=$data[6];
  $temp.=$data[7];
  $temp.=$data[8];
  $temp.=$data[9];
  $temp.=$data[3];
  $temp.=$data[4];
  $temp.=$data[0];
  $temp.=$data[1];
  return $temp;
 }
}
function alt_data_en_br($data)
{
 if($data[9]!=NULL)
 {
  $temp=$data;
  $temp[0]=$data[8];
  $temp[1]=$data[9];
  $temp[2]="/";
  $temp[3]=$data[5];
  $temp[4]=$data[6];
  $temp[5]="/";
  $temp[6]=$data[0];
  $temp[7]=$data[1];
  $temp[8]=$data[2];
  $temp[9]=$data[3];
  return $temp;
 }
}
function alt_hora($hora)
{
 $temp=$hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
 return $temp;
}
function alt_data_br_en($data)
{
if($data[9]!=NULL)
 {
  $temp=$data;
  $temp[0]=$data[6];
  $temp[1]=$data[7];
  $temp[2]=$data[8];
  $temp[3]=$data[9];
  $temp[4]="-";
  $temp[5]=$data[3];
  $temp[6]=$data[4];
  $temp[7]="-";
  $temp[8]=$data[0];
  $temp[9]=$data[1];
  return $temp;
 }
}
function ddd($tel)
{
 $temp=$tel[0];
 $temp.=$tel[1];
 return $temp;
}
function tel($tel)
{
 $temp=$tel[2];
 $temp.=$tel[3];
 $temp.=$tel[4];
 $temp.=$tel[5];
 $temp.=$tel[6];
 $temp.=$tel[7];
 $temp.=$tel[8];
 $temp.=$tel[9];
 $temp.=$tel[10];
 return $temp;
}
?>
<script>
function ContaCaracteres(input, evento, quantidade){
   intCaracteres = quantidade - input.value.length;
   if (intCaracteres > 0) {
      evento.value = intCaracteres;
      return true;
   }
   else {
      evento.value = 0;
      input.value = input.value.substr(0,quantidade)
      return false;
   }
}
function visivel(input,evento)
{
 if(input.checked)
 {
  evento.style.display='block';
 }
 else
 {
  evento.style.display='none';
 }
}
function ajustar_cpf(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if((input.value.length==3)||(input.value.length==7)) {
			    input.value=input.value + "." ;
			}  else {
			      if(input.value.length==11) {
			           input.value=input.value + "-" ;
			         }
			}
		}
 return true;

}
function ajustar_hora(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if(input.value.length==2) {
			    input.value=input.value + ":" ;
			}
		}
 return true;

}
function ajustar_data(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if((input.value.length==2)||(input.value.length==5)) {
			    input.value=input.value + "/" ;
			}
		}
 return true;

}
function ajustar_cep(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if(input.value.length==2) {
			    input.value=input.value + "." ;
			}  else {
			      if(input.value.length==6) {
			           input.value=input.value + "-" ;
			         }
			}
		}
 return true;

}
function ajustar_tel(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if(input.value.length==4) {
			    input.value=input.value + "-" ;
			}
		}
 return true;

}
function ajustar_codigo(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if((input.value.length==4)||(input.value.length==9)||(input.value.length==14)) {
			    input.value=input.value + "." ;
			}
		}
 return true;

}
function ajustar_cnpj(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if((input.value.length==2)||(input.value.length==6)) {
			    input.value=input.value + "." ;
			}
            if(input.value.length==10) {
			           input.value=input.value + "/" ;
			         }
            if(input.value.length==15) {
			           input.value=input.value + "-" ;
			         }

		}
 return true;

}
function ajustar_insc_est(input, evento)
{
         var BACKSPACE=  8;
         var DEL=  46;
         var FRENTE=  39;
         var TRAS=  37;
         var tecla= (evento.keyCode ? evento.keyCode: evento.which ? evento.which : evento.charCode)
         if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
             return true;
             }
         if ( tecla == 13 )     return false;

		if ((tecla<48)||(tecla>57)){
			evento.returnValue =false;
			return false;
		} else {
			if((input.value.length==2)||(input.value.length==6)) {
			    input.value=input.value + "." ;
			}


		}
 return true;

}
</script>
