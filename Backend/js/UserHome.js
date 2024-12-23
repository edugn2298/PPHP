const productsContainer = document.querySelector(".products-container");
document.addEventListener("DOMContentLoaded", function () {
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
        row.classList.add(
          "bg-white",
          "shadow",
          "rounded",
          "overflow-hidden",
          "group",
          "flex",
          "flex-col",
          "justify-between"
        );
        row.innerHTML = `
                <div class="relative">
                    <img  src="../uploads/${product.id}.webp" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="/PPHP/View/ProductDetails.php?id=${product.id}"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">${product.name}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
        `;
        productsContainer.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
