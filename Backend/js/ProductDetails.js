const params = new URLSearchParams(window.location.search);
const id = params.get("id");
document.addEventListener("DOMContentLoaded", function () {
  if (id) {
    const product = getProduct(id);
  }
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
      return product;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
