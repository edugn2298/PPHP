import {ErrorSuccessMessage} from "./ErrorSuccesfunction.js";

// Backend/js/AdminUserLogin-Register.js
const registerLink = document.getElementById('register-link'); //Boton de link de registro
const loginLink = document.getElementById('login-link'); //Boton de link de login

const formAdd = document.getElementById('form-add'); //Formulario de nuevo usuario
const formLogin = document.getElementById('form-login'); //Formulario de login

const path = window.location.pathname; //Ruta del archivo actual

const params = new URLSearchParams(window.location.search); //Parametros de la URL
const view = params.get("view");//Parametro de la URL

//Formulario Login
const loginForm = document.getElementById('login-form');
const loginEmail = document.getElementById('login-email');
const loginPassword = document.getElementById('login-password');

//Formulario Registro
const regisForm = document.getElementById('register-form');
const regisName = document.getElementById('register-name');
const regisLastname = document.getElementById('register-lastname');
const regisEmail = document.getElementById('register-email');
const regisUserType = document.getElementById('register-user-type');
const regisPassword = document.getElementById('register-password');
const regisConfirmPassword = document.getElementById("register-password-confirm");

const nameRegex = /^[a-zA-Z ]{2,30}$/;
const lastnameRegex = /^[a-zA-Z ]{2,30}$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^[a-zA-Z0-9]{8,20}$/;




document.addEventListener('DOMContentLoaded', function() {
  regisName.addEventListener('change', function() {
    if (!nameRegex.test(regisName.value)) {
      ErrorSuccessMessage(regisName, 'El nombre debe tener entre 2 y 30 caracteres y solo puede contener letras', 'error');
    } else {
      ErrorSuccessMessage(regisName, '', 'success');
    }
  });

  regisLastname.addEventListener('change', function() {
    if (!lastnameRegex.test(regisLastname.value)) {
      ErrorSuccessMessage(regisLastname, 'El apellido debe tener entre 2 y 30 caracteres y solo puede contener letras', 'error');
    } else {
      ErrorSuccessMessage(regisLastname, '', 'success');
    }
  });

  regisEmail.addEventListener('change', function() {
    if (!emailRegex.test(regisEmail.value)) {
      ErrorSuccessMessage(regisEmail, 'El correo debe tener un formato correcto', 'error');
    } else {
      ErrorSuccessMessage(regisEmail, '', 'success');
    }
  });

  regisUserType.addEventListener('change', function() {
    if (regisUserType.value === '') {
      ErrorSuccessMessage(regisUserType, 'El tipo de usuario es obligatorio', 'error');
    } else {
      ErrorSuccessMessage(regisUserType, '', 'success');
    }
  });

  regisPassword.addEventListener('change', function() {
    if (!passwordRegex.test(regisPassword.value)) {
      ErrorSuccessMessage(regisPassword, 'La contrasena debe tener entre 8 y 20 caracteres y solo puede contener letras y numeros', 'error');
    } else {
      ErrorSuccessMessage(regisPassword, '', 'success');
    }
  });

  regisConfirmPassword.addEventListener('change', function() {
    if (regisConfirmPassword.value !== regisPassword.value) {
      ErrorSuccessMessage(regisConfirmPassword, 'Las contrase as no coinciden', 'error');
    } else {
      ErrorSuccessMessage(regisConfirmPassword, '', 'success');
    }
  });



  if (view === 'Register') {
    regisForm.classList.remove('hidden');
    loginForm.classList.add('hidden');
  } else if (view === 'Login') {
    regisForm.classList.add('hidden');
    loginForm.classList.remove('hidden');
  }

  console.log("DOM cargado");
  registerLink.addEventListener('click', function() {
    regisForm.classList.remove('hidden');
    loginForm.classList.add('hidden');
  });

  loginLink.addEventListener('click', function() {
    regisForm.classList.add('hidden');
    loginForm.classList.remove('hidden');
  });

  formLogin.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(loginEmail.value,loginPassword.value)
    fetch('../Backend/UserControllerFromJS.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        action: 'LoginUser',
        email: loginEmail.value,
        password: loginPassword.value
      })
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success) {
          console.log(data.success);
          if (path.includes('AdminPanelogin.php')) {
            window.location.href = '../View/AdminPanelHome.php';
          } else if (path.includes('UserLoginRegister.php')) {
            window.location.href = '../View/UserHome.php';
          }
        } else {  
          alert(data.message);  
        } 
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });

  formAdd.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(regisName.value,regisLastname.value,regisEmail.value,regisPassword.value,regisUserType.value)
    fetch('../Backend/UserControllerFromJS.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        action: 'CreateUser',
        name: regisName.value,
        lastname: regisLastname.value,
        email: regisEmail.value,
        user_type: regisUserType.value,
        password: regisPassword.value
      })
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        location.reload();
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });

});




