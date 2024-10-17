// Backend/js/AdminProducts.js
import { ErrorSuccessMessage } from "./ErrorSuccesfunction.js";
const tbody = document.querySelector("tbody"); // Cuerpo de la tabla
const btnAddProduct = document.querySelector("#btn_add_product");
//Formulario de nuevo producto
const formAdd = document.querySelector("#add-product-form"); //Formulario de nuevo producto
const formAddDiv = document.querySelector("#form_div_add_product"); //Div del Formulario de nuevo producto
const addName = document.getElementById("add-name");
const addDescription = document.getElementById("add-description");
const addPrice = document.getElementById("add-price");
const addImage = document.getElementById("add-image");


//Formulario Editar
const formEditDiv = document.querySelector("#form_div_edit_product");
const formEdit = document.querySelector("#edit-product-form");
const editId = document.getElementById("edit-id");
const editName = document.getElementById("edit-name");
const editDescription = document.getElementById("edit-description");
const editPrice = document.getElementById("edit-price");
const editImage = document.getElementById("edit-image");


const nameRegex = /^[a-zA-Z0-9 _-]{3,30}$/;
const descriptionRegex = /^[a-zA-Z0-9 _-]{10,5000}$/;
const priceRegex = /^[0-9]+$/;


document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM cargado");

  /*editName.addEventListener("input", function () {
    if (!nameRegex.test(editName.value)) {
      ErrorSuccessMessage(editName, "El nombre debe tener entre 3 y 30 caracteres y solo puede contener letras", "error");
    } else {
      ErrorSuccessMessage(editName, "", "success");
    }
  });

  editDescription.addEventListener("input", function () {
    if (!descriptionRegex.test(editDescription.value)) {
      ErrorSuccessMessage(editDescription, "La descripción debe tener entre 10 y 500 caracteres y solo puede contener letras", "error");
    } else {
      ErrorSuccessMessage(editDescription, "", "success");
    }
  });

  editPrice.addEventListener("input", function () {
    if (!priceRegex.test(editPrice.value)) {
      ErrorSuccessMessage(editPrice, "El precio debe tener entre 1 y 10 caracteres y solo puede contener numeros", "error");
    } else {
      ErrorSuccessMessage(editPrice, "", "success");
    }
  });

  addName.addEventListener("input", function () {
    if (!nameRegex.test(addName.value)) {
      ErrorSuccessMessage(addName, "El nombre debe tener entre 3 y 30 caracteres y solo puede contener letras", "error");
    } else {
      ErrorSuccessMessage(addName, "", "success");
    }
  });

  addDescription.addEventListener("input", function () {
    if (!descriptionRegex.test(addDescription.value)) {
      ErrorSuccessMessage(addDescription, "La descripción debe tener entre 10 y 100 caracteres y solo puede contener letras", "error");
    } else {
      ErrorSuccessMessage(addDescription, "", "success");
    }
  });

  addPrice.addEventListener("input", function () {
    if (!priceRegex.test(addPrice.value)) {
      ErrorSuccessMessage(addPrice, "El precio debe tener entre 1 y 10 caracteres y solo puede contener numeros", "error");
    } else {
      ErrorSuccessMessage(addPrice, "", "success");
    }
  });
*/

  tbody.addEventListener("click", function (event) {
    if (event.target.classList.contains("btn-edit-product")) {
      const row = event.target.closest("tr");
      const id = row.querySelector("td:nth-child(1)").textContent;
      console.log(id);
      formEditDiv.classList.remove("hidden");
      document.querySelector("#form_div_add_product").classList.add("hidden");
      getProduct(id);
    }

    if (event.target.classList.contains("btn-delete-product")) {
      const row = event.target.closest("tr");
      const id = row.querySelector("td:nth-child(1)").textContent;
      console.log(id);
      deleteProduct(id, row);
    }
  });

  fetch("../Backend/ProductsControllerFromJS.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ action: "GetProducts" }),
  })
    .then((response) => response.json())
    .then((products) => {
      if (products.success === false) {
        console.error("Error:", products.message, products.error);
        return;
      }
      tbody.innerHTML = "";
      products.forEach((product) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.price}</td>
            <td>
              <button class="btn-edit-product text-blue-500 hover:underline mr-2">Editar</button>
              <button class="btn-delete-product text-red-500 hover:underline">Eliminar</button>
            </td>
        `;
        tbody.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  btnAddProduct.addEventListener("click", function () {
    formAddDiv.classList.remove("hidden");
    formEditDiv.classList.add("hidden");
  });

  formAdd.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append("name", addName.value);
    formData.append("description", addDescription.value);
    formData.append("price", addPrice.value);
    formData.append("file", addImage.files[0]);
    formData.append("action", "CreateProduct");

    fetch("../Backend/ProductsControllerFromJS.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        if (data.success) {
          location.reload();
        } else {
          alert("Error al crear el producto: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });

  formEdit.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData();
    formData.append("id", editId.value);
    formData.append("name", editName.value);
    formData.append("description", editDescription.value);
    formData.append("price", editPrice.value);
    formData.append("file", editImage.files[0]);
    formData.append("action", "UpdateProduct");

    fetch("../Backend/ProductsControllerFromJS.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        if (data.success) {
          location.reload();
        } else {
          alert("Error al actualizar el producto: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});

function getProduct(id) {
  fetch("../Backend/ProductsControllerFromJS.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ action: "GetProductByID", product_id: id }),
  })
    .then((response) => response.json())
    .then((product) => {
      console.log(product);
      if (product.success === false) {
        console.error("Error:", product.message, product.error);
        return;
      }
      editId.value = product.id;
      editName.value = product.name;
      editDescription.value = product.description;
      editPrice.value = product.price;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function deleteProduct(id, row) {
  console.log('DEntro de deleteProduct', id, row);
  fetch("../Backend/ProductsControllerFromJS.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ action: "DeleteProductByID", product_id: id }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data.success) {
        row.remove();
      } else {
        alert("Error al eliminar el producto: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
