# Estilos de Card
```js
<div class="products-container bg-gray-200 flex flex-wrap items-start justify-around min-h-screen p-4">
  <!-- Aquí van las tarjetas de los productos -->
  <div class="max-w-sm mx-auto bg-white shadow-md rounded-lg overflow-hidden m-2 w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">
    <img class="w-48 h-48 object-cover" src="../uploads/${product.id}.webp" alt="${product.name}">
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2">${product.name}</h3>
      <div class="flex items-center justify-between">
        <span class="text-2xl text-green-500 font-semibold">$${product.price}</span>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Comprar</button>
      </div>
    </div>
  </div>
</div>
```

```js
<div class="products-container bg-gray-200 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4 min-h-screen">
  <!-- Aquí van las tarjetas de los productos -->
  <div class="product-card bg-white shadow-md rounded-lg overflow-hidden">
    <img class="w-full h-48 object-cover" src="../uploads/${product.id}.webp" alt="${product.name}">
    <div class="p-4">
      <h3 class="text-xl font-bold mb-2">${product.name}</h3>
      <div class="flex items-center justify-between">
        <span class="text-2xl text-green-500 font-semibold">$${product.price}</span>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Comprar</button>
      </div>
    </div>
  </div>
</div>
```