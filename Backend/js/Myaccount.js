import { ErrorSuccessMessage } from "./ErrorSuccesfunction.js";
// Backend/js/Myaccount.js
const formUpdated = document.getElementById('form-update'); //Formulario de editar usuario
//Formulario Editar Campos
const updatedId = document.getElementById("update-id");
const updatedName = document.getElementById('update-name');
const updatedLastname = document.getElementById('update-lastname');
const updatedEmail = document.getElementById('update-email');
//Regex de Campos de formulario
const nameRegex = /^[a-zA-Z ]{2,30}$/;
const lastnameRegex = /^[a-zA-Z ]{2,30}$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^[a-zA-Z0-9]{8,20}$/;

//Password Update Formulario
const passwordForm = document.getElementById('password-update'); //Formulario de editar usuario
const updatedPassId = document.getElementById("update-pass-id"); //Input para el id del usuario hidden
const updatedPasswordOld = document.getElementById('old-password'); //Input para Old Password
const updatedPassword = document.getElementById('password'); //Input para New Password
const updatedPasswordConfirm = document.getElementById('password-confirm'); //Input para Confirm New Password

document.addEventListener('DOMContentLoaded', function() {
  console.log(" Dom Cargado");

  fetch("../Backend/UserControllerFromJS.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ action: "GetUserById", user_id: updatedPassId.value }),
  })
    .then((response) => response.json())
    .then((user) => {
      console.log(user);
      updatedName.value = user.name;
      updatedLastname.value = user.lastname;
      updatedEmail.value = user.email;
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  updatedPasswordOld.addEventListener('change', function() {
    if (!passwordRegex.test(updatedPasswordOld.value)) {
      ErrorSuccessMessage(updatedPasswordOld, 'La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, una letra minúscula y una letra mayúscula', 'error');
    } else {
      ErrorSuccessMessage(updatedPasswordOld, '', 'success');
    }
  })

  updatedPassword.addEventListener('change', function() {
    if (!passwordRegex.test(updatedPassword.value)) {
      ErrorSuccessMessage(updatedPassword, 'La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, una letra minúscula y una letra mayúscula', 'error');
    } else {
      ErrorSuccessMessage(updatedPassword, '', 'success');
    }
  })

  updatedPasswordConfirm.addEventListener('input', function() {
    if (updatedPassword.value !== updatedPasswordConfirm.value) {
      ErrorSuccessMessage(updatedPasswordConfirm, 'La contraseñas no coinciden', 'error');
    } else {
      ErrorSuccessMessage(updatedPasswordConfirm, '', 'success');
    }
  })

  updatedName.addEventListener('change', function() {
    if (!nameRegex.test(updatedName.value)) {
      ErrorSuccessMessage(updatedName, 'El nombre debe tener entre 2 y 30 caracteres y solo puede contener letras', 'error');
    } else {
      ErrorSuccessMessage(updatedName, '', 'success');
    }
  });

  updatedLastname.addEventListener('change', function() {
    if (!lastnameRegex.test(updatedLastname.value)) {
      ErrorSuccessMessage(updatedLastname, 'El apellido debe tener entre 2 y 30 caracteres y solo puede contener letras', 'error');
    } else {
      ErrorSuccessMessage(updatedLastname, '', 'success');
    }
  });

  updatedEmail.addEventListener('change', function() {
    if (!emailRegex.test(updatedEmail.value)) {
      ErrorSuccessMessage(updatedEmail, 'El correo debe tener un formato correcto', 'error');
    } else {
      ErrorSuccessMessage(updatedEmail, '', 'success');
    }
  });



  

  formUpdated.addEventListener('submit', function(event) {
    event.preventDefault();
    fetch("../Backend/UserControllerFromJS.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        action: "UpdateUser",
        user_id: updatedId.value,
        name: updatedName.value,
        lastname: updatedLastname.value,
        email: updatedEmail.value,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        location.reload();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });

  passwordForm.addEventListener("submit", function (event) {
    event.preventDefault();
    console.log("Formulario enviado");
    fetch("../Backend/UserControllerFromJS.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        action: "UpdatedPassword",
        user_id: updatedPassId.value,
        old_password: updatedPasswordOld.value,
        new_password: updatedPassword.value,
      }),
    })
      .then((response) =>
        response.text().then((text) => {
          console.log("Raw response:", text); // Verifica aquí
          return text ? JSON.parse(text) : {};
        })
      )
      .then((data) => {
        if (data.success) {
          alert(data.message);
          passwordForm.reset();
        } else {
          alert(data.message);
          passwordForm.reset();
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert(
          "Hubo un error al procesar la solicitud. Por favor, intenta de nuevo."
        );
      });
  });

});