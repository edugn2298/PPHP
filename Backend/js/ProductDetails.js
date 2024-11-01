import {
  ErrorSuccessMessage,
  openModal,
  closeModal,
} from "./ErrorSuccesfunction.js";
const params = new URLSearchParams(window.location.search);
const id = params.get("id");
const productDetails = document.querySelector(".product-details");

document.addEventListener("DOMContentLoaded", async function () {
  if (id) {
    try {
      const product = await getProduct(id);
      if (product) {
        updateProductDetails(product);
      }
    } catch (error) {}
  } else {
    openModal("Product not found", "error");
  }
});

async function getProduct(id) {
  try {
    const response = await fetch("../Backend/ProductsControllerFromJS.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "GetProductByID", product_id: id }),
    });
    const product = await response.json();
    // Assuming a valid product is returned when found
    if (!product || !product.id) {
      return null;
    }
    return product;
  } catch (error) {
    return null;
  }
}
function updateProductDetails(product) {
  productDetails.innerHTML = `
    <div class="product-card bg-white shadow-md rounded-lg overflow-hidden">
      <img class="w-48 h-48 object-cover" src="../uploads/${product.id}.webp" alt="${product.name}">
      <div class="p-4">
        <h3 class="text-xl font-bold mb-2">${product.name}</h3>
        <div class="flex items-center justify-between">
          <span class="text-2xl text-green-500 font-semibold">$${product.price}</span>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Comprar</button>
        </div>
      </div>
    </div>
  `;
}
