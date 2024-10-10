const tbody = document.querySelector('tbody');
const newUserButton = document.querySelector('#btn_add_user');
const formAdd = document.querySelector('#users_add_form');
const formEdit = document.querySelector('#users_edit_form');
const editUserForm = document.querySelector('#edit-user-form');
//Formulario Editar
const editId = document.getElementById('edit-id');
const editName = document.getElementById('edit-name');
const editLastname = document.getElementById('edit-lastname');
const editEmail = document.getElementById('edit-email');
const editType = document.getElementById("edit-user-type");
const editPassword = document.getElementById('edit-password');
//Formulario Crear



document.addEventListener('DOMContentLoaded', function() {
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
      document.querySelector(`td:contains('${userID}')`).closest('tr').remove(); // Eliminar la fila de la tabla
    } else {
      alert(data.message);
    }
  })
  .catch(error => {
    console.error('Error',error);
  });
}