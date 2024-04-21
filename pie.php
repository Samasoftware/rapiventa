		
	<script>
		function vuelto(){
			txt_vuelto.value="";
//vuelto
let total=document.getElementById("id_total").value;

let efectivo=document.getElementById("mixto_efectivo").value;
let tarjeta=document.getElementById("mixto_tarjeta").value;
let cortesia=document.getElementById("mixto_cortesia").value;
let yape=document.getElementById("mixto_yape").value;

if(efectivo==""){
	efectivo=0;
}
if(tarjeta==""){
	tarjeta=0;
}
if(cortesia==""){
	cortesia=0;
}
if(yape==""){
	yape=0;
}

let pagando=parseFloat(efectivo)+parseFloat(tarjeta)+parseFloat(cortesia)+parseFloat(yape);

let vuelto=pagando-total;

//if (vuelto>0){
	txt_vuelto.value=vuelto;
//}


		}

		function pago_mixto_visibilidad(){

			document.getElementById('mixto_efectivo').value="";
			document.getElementById('mixto_tarjeta').value="";
			document.getElementById('mixto_yape').value="";
			document.getElementById('mixto_cortesia').value="";
			document.getElementById('txt_vuelto').value="";


			if(document.getElementById('mixto_visibilidad').value==0){
				document.getElementById('div_mixto').removeAttribute('hidden');
		 document.getElementById('visibilidad_efectivo').style.display = "none";
		 document.getElementById('visibilidad_tarjeta').style.display = "none";
		 document.getElementById('visibilidad_10200').style.display = "none";
		 document.getElementById('visibilidad_yape').style.display = "none";

			document.getElementById('mixto_visibilidad').value=1;
			}else{
				document.getElementById('div_mixto').setAttribute('hidden',false);

				document.getElementById('visibilidad_efectivo').style.display = "inline";
		 document.getElementById('visibilidad_tarjeta').style.display = "inline";
		 document.getElementById('visibilidad_10200').style.display = "inline";
		 document.getElementById('visibilidad_yape').style.display = "inline";

			document.getElementById('mixto_visibilidad').value=0;
			}
	    

		}



		document.getElementById("id_total").required = true;

</script>	
		
		
		</div>
	</div>
</body>
</html>