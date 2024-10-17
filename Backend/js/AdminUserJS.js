// Backend/js/AdminUserJS.js
import { ErrorSuccessMessage } from "./ErrorSuccesfunction.js";
const tbody = document.querySelector('tbody'); // Cuerpo de la tabla

const newUserButton = document.querySelector('#btn_add_user'); //Boton de nuevo usuario
const formAdd = document.querySelector('#users_add_form'); //Formulario de nuevo usuario
const formEdit = document.querySelector('#users_edit_form'); //Boton de tabla de editar usuario y formulario de editar usuario
const editUserForm = document.querySelector('#edit-user-form'); //Formulario de editar usuario
//Formulario Editar
const editId = document.getElementById('edit-id');
const editName = document.getElementById('edit-name');
const editLastname = document.getElementById('edit-lastname');
const editEmail = document.getElementById('edit-email');
const editType = document.getElementById("edit-user-type");
const editPassword = document.getElementById('edit-password');
const editpasswordconfirm = document.getElementById("edit-password-confirm");
//Formulario Crear
const addname = document.getElementById('add-name');
const addlastname = document.getElementById('add-lastname');
const addemail = document.getElementById('add-email');
const addpassword = document.getElementById('add-password');
const addusertype = document.getElementById('add-user-type');
const addpasswordconfirm = document.getElementById("add-password-confirm");


const nameRegex = /^[a-zA-Z ]{2,30}$/;
const lastnameRegex = /^[a-zA-Z ]{2,30}$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^[a-zA-Z0-9]{8,20}$/;

document.addEventListener('DOMContentLoaded', function() {



  addpasswordconfirm.addEventListener("change", function () {
    if (addpasswordconfirm.value !== addpassword.value) {
      ErrorSuccessMessage(
        addpasswordconfirm,
        "Las contrase as no coinciden",
        "error"
      );
    } else {
      ErrorSuccessMessage(addpasswordconfirm, "", "success");
    }
  });

  editpasswordconfirm.addEventListener("change", function () {
    if (editpasswordconfirm.value !== editpassword.value) {
      ErrorSuccessMessage(
        editpasswordconfirm,
        "Las contrase as no coinciden",
        "error"
      );
    } else {
      ErrorSuccessMessage(editpasswordconfirm, "", "success");
    }
  });

  addname.addEventListener("change", function () {
    if (!nameRegex.test(addname.value)) {
      ErrorSuccessMessage(
        addname,
        "El nombre debe tener entre 2 y 30 caracteres y solo puede contener letras",
        "error"
      );
    } else {
      ErrorSuccessMessage(addname, "", "success");
    }
  });

  addlastname.addEventListener("change", function () {
    if (!lastnameRegex.test(addlastname.value)) {
      ErrorSuccessMessage(
        addlastname,
        "El apellido debe tener entre 2 y 30 caracteres y solo puede contener letras",
        "error"
      );
    } else {
      ErrorSuccessMessage(addlastname, "", "success");
    }
  });

  addemail.addEventListener("change", function () {
    if (!emailRegex.test(addemail.value)) {
      ErrorSuccessMessage(
        addemail,
        "El correo debe tener un formato correcto",
        "error"
      );
    } else {
      ErrorSuccessMessage(addemail, "", "success");
    }
  });

  addusertype.addEventListener("change", function () {
    if (addusertype.value === "") {
      ErrorSuccessMessage(
        addusertype,
        "El tipo de usuario es obligatorio",
        "error"
      );
    } else {
      ErrorSuccessMessage(addusertype, "", "success");
    }
  });

  addpassword.addEventListener("change", function () {
    if (!passwordRegex.test(addpassword.value)) {
      ErrorSuccessMessage(
        addpassword,
        "La contrasena debe tener entre 8 y 20 caracteres y solo puede contener letras y numeros",
        "error"
      );
    } else {
      ErrorSuccessMessage(addpassword, "", "success");
    }
  });

  editName.addEventListener("change", function () {
    if (!nameRegex.test(editName.value)) {
      ErrorSuccessMessage(
        editName,
        "El nombre debe tener entre 2 y 30 caracteres y solo puede contener letras",
        "error"
      );
    } else {
      ErrorSuccessMessage(editName, "", "success");
    }
  });

  editLastname.addEventListener("change", function () {
    if (!lastnameRegex.test(editLastname.value)) {
      ErrorSuccessMessage(
        editLastname,
        "El apellido debe tener entre 2 y 30 caracteres y solo puede contener letras",
        "error"
      );
    } else {
      ErrorSuccessMessage(editLastname, "", "success");
    }
  });

  editEmail.addEventListener("change", function () {
    if (!emailRegex.test(editEmail.value)) {
      ErrorSuccessMessage(
        editEmail,
        "El correo debe tener un formato correcto",
        "error"
      );
    } else {
      ErrorSuccessMessage(editEmail, "", "success");
    }
  });

  editType.addEventListener("change", function () {
    if (editType.value === "") {
      ErrorSuccessMessage(
        editType,
        "El tipo de usuario es obligatorio",
        "error"
      );
    } else {
      ErrorSuccessMessage(editType, "", "success");
    }
  });

  editPassword.addEventListener("change", function () {
    if (!passwordRegex.test(editPassword.value)) {
      ErrorSuccessMessage(
        editPassword,
        "La contrasena debe tener entre 8 y 20 caracteres y solo puede contener letras y numeros",
        "error"
      );
    } else {
      ErrorSuccessMessage(editPassword, "", "success");
    }
  });


  tbody.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-edit-user')) {
      const row = event.target.closest('tr');
      const id = row.querySelector('td:nth-child(1)').textContent;
      console.log(id);
      const usersEdit = document.querySelector('#users_edit_form');
      usersEdit.classList.toggle('hidden');
      formAdd.classList.toggle('hidden');
      editUser(id);
    }

    if (event.target.classList.contains('btn-delete-user')) {
      const row = event.target.closest('tr');
      const id = row.querySelector('td:nth-child(1)').textContent;
      console.log(id);
      deleteUser(id,row);
    }
  });

  fetch('../Backend/UserControllerFromJS.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      action: 'GetAllUsers'
    })
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      tbody.innerHTML = '';
      data.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${user.id}</td>
          <td>${user.name}</td>
          <td>${user.lastname}</td>
          <td>${user.email}</td>
          <td>${user.user_type}</td>
          <td>
            <button class="btn-edit-user text-blue-500 hover:underline mr-2">Editar</button>
            <button class="btn-delete-user text-red-500 hover:underline">Eliminar</button>
          </td>
        `;
        tbody.appendChild(row);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });

  formAdd.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(addname.value,addlastname.value,addemail.value,addpassword.value,addusertype.value)
    fetch('../Backend/UserControllerFromJS.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        action: 'CreateUser',
        name: addname.value,
        lastname: addlastname.value,
        email: addemail.value,
        user_type: addusertype.value,
        password: addpassword.value
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

  editUserForm.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(editId.value,editName.value,editLastname.value,editEmail.value,editType.value)
    fetch('../Backend/UserControllerFromJS.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        action: 'UpdateUser',
        user_id: editId.value,
        name: editName.value,
        lastname: editLastname.value,
        email: editEmail.value,
        user_type: editType.value,
        password: editPassword.value
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

  newUserButton.addEventListener('click', function() {
    formAdd.classList.toggle('hidden');
    formEdit.classList.toggle('hidden');
  });

  
});

function editUser(userId) {
  fetch('../Backend/UserControllerFromJS.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({action: 'GetUserById', user_id: userId})
  })
  .then(response => response.json())
  .then(user => {
    console.log(user); 
    document.getElementById('edit-id').value = user.id;
    document.getElementById('edit-name').value = user.name;
    document.getElementById('edit-lastname').value = user.lastname;
    document.getElementById('edit-email').value = user.email;
    document.getElementById('edit-user-type').value = user.user_type; 

    // Ocultar formulario de creación y mostrar el de edición
    formAdd.classList.add('hidden');
    formEdit.classList.remove('hidden');
  })
  .catch(error => {
    console.error('Error:', error);
  });
}

function deleteUser(userID,row) {
  console.log(userID);
  fetch('../Backend/UserControllerFromJS.php', {
    method:'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({action: 'DeleteUserByID', user_id: userID})
  })
  .then(response => response.json())
  .then(data => {
    console.log(data); // Imprime la respuesta para depuración
    if (data.success) {
      row.remove(); // Eliminar la fila de la tabla
    } else {
      alert(data.message);
    }
  })
  .catch(error => {
    console.error('Error',error);
  });
}