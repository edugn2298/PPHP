const productsContainer = document.querySelector('.products-container');
document.addEventListener('DOMContentLoaded', function() {
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
      productsContainer.innerHTML = "";
      products.forEach((product) => {
        const row = document.createElement("div");
        row.innerHTML = `
            <div class="products-container bg-gray-200 flex items-center justify-around h-screen">
    <div class="max-w-sm mx-auto bg-white shadow-md rounded-lg overflow-hidden">
      <img class="w-full h-48 object-cover" src="../uploads/${product.image}.webp" alt="${product.name}">
      <div class="p-4">
        <h3 class="text-xl font-bold mb-2">${product.name}</h3>
        <div class="flex items-center justify-between">
          <span class="text-2xl text-green-500 font-semibold">$${product.price}</span>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Comprar</button>
        </div>
      </div>
    </div>
        `;
        productsContainer.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});