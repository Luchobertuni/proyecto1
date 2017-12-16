function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
}



window.addEventListener("load", function(){

/*
if(window.location.pathname == "/register"){
  var first_name = document.querySelector("#first_name");
  var last_name = document.querySelector("#last_name");
  var confirm = document.querySelector("#password-confirm");


  first_name.addEventListener('input', function(){
    if(first_name.value.lenght > 3){
      first_name.style.border = "1px solid green";
    }
    else{
      first_name.style.border = "1px solid red";
    }
    });
    last_name.addEventListener('input', function(){
      if(last_name.value.lenght >3){
        last_name.style.border = "1px solid green";
      }
      else{
        last_name.style.border = "1px solid red";
      }
      });



      confirm.addEventListener('input', function(){
        if( password !== confirm){
          alert("Las contraseñas no coinciden");
        }
      });



}
*/





/*
      email.addEventListener('change', function(){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(email.value)){
          alert("La dirección de email " + email.value + " es correcta.");
          } else {
            alert("La dirección de email es incorrecta.");
          }
        });
      password.addEventListener('input', function(){
        if(password.lenght === 0){
          password.style.border = "1px solid red";
        }
      });
*/


    var form = document.querySelector(".formulario");

    form.addEventListener('submit', function(evento){
      if(errores.lenght==0){
        form.submit();
      } else{
        alert(errores)
      }
      var errores =[]

      evento.preventDefault();


      var email = document.querySelector("#email");
      var password = document.querySelector("#password");


      if(validateEmail(email.value) == false){
        errores.push("Mal el mail");
      }

      if(password.value.length < 3){
        errores.push("Mal el password ");
      }

      if(window.location.pathname == "/register"){
        var first_name = document.querySelector("#first_name");
        var last_name = document.querySelector("#last_name");
        var confirm = document.querySelector("#password-confirm");
        if(first_name.value.length <=3){
          errores.push("Mal el nombre");
        }
        if(last_name.value.length <=3){
          errores.push("Mal el apellido");
        }
        if(password.value !== confirm.value){
          errores.push("Las contraseñas no coinciden");
        }
      }


    });

});
