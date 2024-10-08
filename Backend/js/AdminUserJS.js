document.addEventListener('DOMContentLoaded', function() {
  fetch('../Backend/UserController.php',{
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({action: 'GetAllUsers'})
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);

  })
  .catch(error => {
    console.error(error);
  });
});