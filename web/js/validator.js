
function validName() {

  var vNombre = document.getElementById("firstname").value ;
  var rxNombre= new RegExp("^[a-zA-Z_áéíóúñ\s]*$");
  if(rxNombre.test(vNombre)=== false) {
    alert(vNombre+" - No en un nombre válido");
    document.getElementById("firstname").value = "";
    document.getElementById("firstname").focus();
	}  
}

function validApe() {

  var vApellido = document.getElementById("lastname").value ;
  var rxApellido= new RegExp("^[a-zA-Z_áéíóúñ\s]*$");
  if(rxApellido.test(vApellido)=== false) {
    alert(vApellido+" - No en un apellido válido");
    document.getElementById("lastname").value = "";
    document.getElementById("lastname").focus();
	}  
}

function validCode() {
  var vCode= document.getElementById("areacode").value;  
  var rxCode = new RegExp("^([0-9])*$");
  if(rxCode.test(vCode)=== false) {
    alert(vCode+" - No en un prefijo de país válido");
    document.getElementById("areacode").value="";
    document.getElementById("areacode").focus();
  }
}

function validTel() {
  var vTel= document.getElementById("telnum").value;  
  var rxTel = new RegExp("^([0-9])*$");
  if(rxTel.test(vTel)=== false) {
    alert(vTel+" - No en un teléfono válido");
    document.getElementById("telnum").value="";
    document.getElementById("telnum").focus();
  }
}


function eventos() {

  var nom = document.getElementById("firstname");
  nom.addEventListener("change", validName);

  var ape = document.getElementById("lastname");
  ape.addEventListener("change", validApe);

  var code = document.getElementById("areacode");
  code.addEventListener("change", validCode);

  var tel = document.getElementById("telnum");
  tel.addEventListener("change", validTel);

}

window.addEventListener("load", eventos);