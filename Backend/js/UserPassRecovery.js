import { ErrorSuccessMessage } from "./ErrorSuccesfunction.js";
// Backend/js/UserPassRecovery.js
const formRecovery = document.getElementById('form-recovery');//Formulario de recuperar contraseña
const formRecoveryPass = document.getElementById('form-recovery-pass');//Formulario de recuperar contraseña
const password = document.getElementById('password'); //Campo de nueva contraseña
const confirmPassword = document.getElementById("confirm-password"); //Campo de confirmar nueva contraseña
const email = document.getElementById("recovery-email"); //Campo de email
const formToken = document.getElementById('form-token');
const path = window.location.pathname; //Ruta del archivo actual
const params = new URLSearchParams(window.location.search); //Parametros de la url
const view = params.get("view");//Parametro de la url

//Regex de Campos de formulario
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^[a-zA-Z0-9]{8,20}$/;


document.addEventListener('DOMContentLoaded', function() {

  if (view == "recovery") {
    formRecoveryPass.classList.add('hidden');
    formRecovery.classList.remove('hidden');
    formToken.classList.add('hidden');
  }

  if (view == "recoveryPass") {
    formRecoveryPass.classList.remove('hidden');
    formRecovery.classList.add('hidden'); 
    formToken.calassList.add('hidden');
  }

  if (view == "token") {
    formRecoveryPass.classList.add('hidden');
    formRecovery.classList.add('hidden');
    formToken.classList.remove('hidden');
  }

  email.addEventListener('change', function(event) {
    if (!emailRegex.test(email.value)) {
      ErrorSuccessMessage(email, 'Email incorrecto', 'error');
    } else {
      ErrorSuccessMessage(email, '', 'success');
    }
  })

  password.addEventListener('change', function(event) {
    if (!passwordRegex.test(password.value)) {
      ErrorSuccessMessage(password, 'La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, una letra minúscula y una letra mayúscula', 'error');
    } else {
      ErrorSuccessMessage(password, '', 'success');
    }
  })

  confirmPassword.addEventListener('input', function(event) {
    if (password.value !== confirmPassword.value) {
      ErrorSuccessMessage(confirmPassword, 'La contraseñas no coinciden', 'error');
    } else {
      ErrorSuccessMessage(confirmPassword, '', 'success');
    }
  })

  formRecovery.addEventListener('submit', function(event) {
    fetch("../Backend/UserControllerFromJS.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        action: "RecoveryPass",
        email: email.value
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          console.log(data.message);
          //formRecovery.reset();
        } else {
          console.log(data.message);
          //formRecovery.reset();
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});